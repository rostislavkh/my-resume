<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function allProjects() {
        return view('pages.project.all');
    }

    public function oneProjects() {
        return view('pages.project.one');
    }
}
