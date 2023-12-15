<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ProjectController;
use App\Models\Project;
use App\Models\User;
use Yoeunes\Toastr\Facades\Toastr;


class ProjectController extends Controller
{
    public function create()
    {
        return view("create-project");
    }

    public function store(Request $request)
{
    $request->validate([
        "name" => "required|string",
    ]);
    $userid = auth()->user()->id;

    $project = Project::create([
        "name" => $request->input("name"),
        "user_id" => $userid,
    ]);
    return redirect()->back();
}
    public function show(Request $request)
    {
        $project = Project::all();
        return view('dashboard', compact('project'));
    }

    public function edit(Request $request, $id)
    {
        $project = Project::findorfail($id);
        if (!$project) {
            return redirect()->back()->with("error", "Project not found");
        }
        return view("edit-project", ["project" => $project]);
    }
    public function update(Request $request)
{   
    $project = Project::where('user_id', auth()->user()->id)->first();
    if (!$project) {
        return redirect()->back()->with("error", "Project not found");
    }

    $requestdata = $request->validate([
        "name" => "required|string",
    ]);

    $project->name = $requestdata['name'];
    $project->save();

    return redirect()->back()->with('success', 'Project updated successfully.');
}

    public function destroy(Request $request)
    {
        $project = Project::where('user_id', auth()->user()->id)->first();

    if($project) {
   $project->delete();
        return redirect()->back()->with('success', 'Project Deleted successfully.');
    }
    }
    public function config(Request $request, $id){
        return view("project-config");
    }
}
    

