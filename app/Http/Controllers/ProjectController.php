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
    public function index()
    {
        return view("projects.home");
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string",
        ]);
        Project::create([
            "name" => $request->input("name"),
            "user_id" => auth()->user()->id,
        ]);
        return redirect('dashboard')->with('success', 'Project Created successfully.');
    }

    public function show(Request $request)
    {
        $projects = Project::where('user_id', auth()->user()->id)->get();
        return view('dashboard', compact('projects'));
    }

    public function update(Request $request)
    {   
        $requestdata = $request->validate([
            "name" => "required|string",
            "id" => "required|int", 
        ]);
        Project::where('user_id', auth()->user()->id)->where('id', $request->id)->update(['name' => $requestdata['name']]);
        return response()->json(['success' => true, 'message' => 'Project updated successfully.']);
    }

    public function destroy(Request $request, $id)
    {
        Project::where('user_id', auth()->user()->id)->where('id', $request->id)->delete();
        return redirect('dashboard')->with('success', 'Project Deleted successfully.');
    }
}
    
