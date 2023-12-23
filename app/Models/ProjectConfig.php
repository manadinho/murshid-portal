<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectConfig extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $casts = ['db_tables' => 'array', 'db_relations' => 'array'];
}
