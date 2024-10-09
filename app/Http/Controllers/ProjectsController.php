<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::query()->inRandomOrder()->get(); // or fetch relevant projects

        // dd($projects);

        return view('projects.index', compact('projects'));
    }
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }
}