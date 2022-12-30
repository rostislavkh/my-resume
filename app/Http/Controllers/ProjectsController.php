<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function allProjects() {
        $projects = Project::where('is_view_all', true)->orderBy('position', 'desc')->paginate(9);

        return view('pages.project.all', [
            'projects' => $projects
        ]);
    }

    public function oneProjects(Project $project) {
        return view('pages.project.one', [
            'project' => $project
        ]);
    }
}
