<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectConfig;
use Illuminate\Support\Facades\Validator;

class ProjectConfigController extends Controller
{
    public function index($id)
    {
        $project = Project::where([['id', '=', $id], ['user_id', '=', auth()->id()]])->with('projectConfig')->firstOrFail();
        $html = ($project->projectConfig) ? view('project-config.database-tables', ['tables' => $project->projectConfig->db_tables])->render():'';
        return view('project-config.index', ['db_tables' => $html]);
    }

    public function parseSqlFile(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                "sql_file" => "required|file|mimetypes:text/plain,application/sql",
                "project_id" => "required",
            ],[
                "sql_file.required" => "File is required",
                "sql_file.file" => "File must be a valid file",
                "sql_file.mimetypes" => "The file must be a file of type: sql.",
                "project_id.required" => "Invalid project"
            ]);

            if($validator->fails())
            {
                return response()->json(['success' => false , 'error' => $validator->errors()->first()]);
            }

            $parsedData = [];
            if ($request->hasFile('sql_file')) {
                $sqlContent = file_get_contents($request->file('sql_file')->getRealPath());
                $parsedData = $this->parseSql($sqlContent);
            }
            $finalData = $this->formatSchema($parsedData);

            ProjectConfig::updateOrCreate(['project_id' => $request->project_id],['db_tables' => $finalData]);

            $html = view('project-config.database-tables', ['tables' => $finalData])->render();

            return response()->json(['success' => true, 'message' => 'SQL file parsed successfully.', 'html' => $html]);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'Something went wrong.']);
        }
    }

    private function parseSql($sqlContent)
    {
        $pattern = '/CREATE TABLE `?(\w+)`? \(([^;]*?)\)\s*ENGINE=/si';

        preg_match_all($pattern, $sqlContent, $matches, PREG_SET_ORDER);

        $data = [];
        foreach ($matches as $match) {
            $tableName = $match[1];
            $columnsString = $match[2];

            $columns = $this->parseColumns($columnsString, $tableName);
            $data[$tableName] = $columns;
        }

        $alterPattern = '/ALTER TABLE `?(\w+)`?\s+(ADD.*?);/si';
        preg_match_all($alterPattern, $sqlContent, $alterMatches, PREG_SET_ORDER);
        foreach ($alterMatches as $alterMatch) {
            $tableName = $alterMatch[1];
            $alterString = $alterMatch[2];
    
            // Check if the table has been created
            if (!array_key_exists($tableName, $data)) {
                $data[$tableName] = [];
            }
    
            // Parse constraints and keys from the ALTER TABLE statement
            $this->parseAlterTable($alterString, $data[$tableName]);
        }

        return $data;
    }

    private function parseColumns($columnsString, $tableName)
    {
        $cleanedString = preg_replace('/(\/\*.*?\*\/)|(--.*?\n)|(;)/s', '', $columnsString);
        
        $pattern = '/`(\w+)`\s+(enum\([^)]+\)|decimal\(\d+,\d+\)|[\w()]+)/';
        preg_match_all($pattern, $cleanedString, $columnMatches, PREG_SET_ORDER);

        $columns = [];
        foreach ($columnMatches as $colMatch) {
            $columnName = $colMatch[1];
            $dataType = $colMatch[2];

            if (array_key_exists($columnName, $columns) || $columnName == $tableName) {
                continue;
            }

            $columns[$columnName] = [
                'name' => $columnName,
                'type' => $dataType,
                'constraints' => []
            ];
        }
    
        // Check for primary key
        if (preg_match('/PRIMARY KEY \(`(\w+)`\)/', $cleanedString, $primaryKeyMatch)) {
            $primaryKey = $primaryKeyMatch[1];
            if (isset($columns[$primaryKey])) {
                $columns[$primaryKey]['constraints'][] = "PRIMARY KEY";
            }
        }

        // Check for foreign keys
        if (preg_match_all('/FOREIGN KEY \(`(\w+)`\) REFERENCES `(\w+)` \(`(\w+)`\)/', $cleanedString, $foreignKeyMatches)) {
            foreach ($foreignKeyMatches[1] as $index => $foreignKeyColumn) {
                if (isset($columns[$foreignKeyColumn])) {
                    $referencedTable = $foreignKeyMatches[2][$index];
                    $referencedColumn = $foreignKeyMatches[3][$index];
                    $columns[$foreignKeyColumn]['constraints'][] = "FOREIGN KEY REFERENCES {$referencedTable}({$referencedColumn})";
                }
            }
        }

        // Check for unique and other keys, including those with additional details
        if (preg_match_all('/(UNIQUE KEY|KEY) `(\w+)` \(([^)]+?)\)/', $cleanedString, $keyMatches)) {
            foreach ($keyMatches[3] as $index => $keyColumns) {
                // Match individual columns within the key definition, including additional details
                if (preg_match_all('/`(\w+)`(?:\((\d+)\))?/', $keyColumns, $columnDetailMatches)) {
                    $keyName = $keyMatches[2][$index];
                    $keyType = $keyMatches[1][$index];
                    $compositeKey = count($columnDetailMatches[1]) > 1;
        
                    foreach ($columnDetailMatches[1] as $colIndex => $keyColumn) {
                        $columnDetail = (isset($columnDetailMatches[2][$colIndex]) && !empty($columnDetailMatches[2][$colIndex])) ? "({$columnDetailMatches[2][$colIndex]})" : "";
                        if (isset($columns[$keyColumn])) {
                            $keyRepresentation = $compositeKey ? " Part of {$keyType} {$keyName}" : " {$keyType} {$keyName}";
                            if ($columnDetail) {
                                $columns[$keyColumn]['constraints'][] = $keyRepresentation . $columnDetail;
                            } else {
                                // If no column detail, append only key representation without ()
                                $columns[$keyColumn]['constraints'][] = $keyRepresentation;
                            }
                        }
                    }
                }
            }
        }
    
        return $columns;
    }

    private function parseAlterTable($alterString, &$tableColumns)
    {
        // Check for primary key
        if (preg_match('/ADD PRIMARY KEY \(`(\w+)`\)/', $alterString, $primaryKeyMatch)) {
            $primaryKey = $primaryKeyMatch[1];
            if (isset($tableColumns[$primaryKey])) {
                $tableColumns[$primaryKey]['constraints'][] = "PRIMARY KEY";
            }
        }

        // Check for foreign keys
        if (preg_match_all('/FOREIGN KEY \(`(\w+)`\) REFERENCES `(\w+)` \(`(\w+)`\)/', $alterString, $foreignKeyMatches)) {
            foreach ($foreignKeyMatches[1] as $index => $foreignKeyColumn) {
                if (isset($columns[$foreignKeyColumn])) {
                    $referencedTable = $foreignKeyMatches[2][$index];
                    $referencedColumn = $foreignKeyMatches[3][$index];
                    $columns[$foreignKeyColumn]['constraints'][] = "FOREIGN KEY REFERENCES {$referencedTable}({$referencedColumn})";
                }
            }
        }

        // Check for ADD CONSTRAINT foreign keys
        if (preg_match_all('/ADD CONSTRAINT `(\w+)` FOREIGN KEY \(`(\w+)`\) REFERENCES `(\w+)` \(`(\w+)`\)/', $alterString, $foreignKeyMatches, PREG_SET_ORDER)) {
            foreach ($foreignKeyMatches as $fkMatch) {
                $constraintName = $fkMatch[1];
                $foreignKeyColumn = $fkMatch[2];
                $referencedTable = $fkMatch[3];
                $referencedColumn = $fkMatch[4];
    
                if (isset($tableColumns[$foreignKeyColumn])) {
                    $tableColumns[$foreignKeyColumn]['constraints'][] = "FOREIGN KEY {$constraintName} REFERENCES {$referencedTable}({$referencedColumn})";
                }
            }
        }

        // Check for unique keys
        if (preg_match_all('/ADD UNIQUE KEY `(\w+)` \(([^)]+?)\)/', $alterString, $uniqueKeyMatches)) {
            foreach ($uniqueKeyMatches[2] as $index => $keyColumns) {
                $keyColumnsArray = explode(',', str_replace('`', '', $keyColumns));
                foreach ($keyColumnsArray as $keyColumn) {
                    $keyColumn = trim($keyColumn);
                    if (isset($tableColumns[$keyColumn])) {
                        $uniqueKeyName = $uniqueKeyMatches[1][$index];
                        $tableColumns[$keyColumn]['constraints'][] = "UNIQUE KEY {$uniqueKeyName}";
                    }
                }
            }
        }
    }

    private function formatSchema($schema)
    {
        $finalSchema = [];

        foreach ($schema as $tableName => $cols) {
            $table = [];
            $table['name'] = $tableName;
            $table['columns'] = [];
            foreach ($cols as $key => $value) {
                $table['columns'][] = $value;
            }
            $finalSchema[] = $table;
        }

        return $finalSchema;
    }
}
