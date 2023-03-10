<?php

namespace App\Http\Controllers;

use App\Models\Skills;
use App\Models\AboutMe;
use App\Models\Contact;
use App\Models\Project;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function index() {
        $contacts = Contact::all();
        $skills = Skills::all();
        $about_me = AboutMe::first();
        $avatar = $about_me->attachment->first() ? $about_me->attachment->first()->url() : null;
        $projects = Project::where('is_view_top', true)->orderBy('position', 'desc')->get();
        $pdf = $about_me->pdfCV?->url();

        if ($about_me == null) {
            $about_me = \App\Models\AboutMe::create([
                'text' => 'Example text'
            ]);
        }

        return view('pages.home.welcome', [
            'contacts' => $contacts,
            'skills' => $skills,
            'about_me' => $about_me,
            'avatar' => $avatar,
            'projects' => $projects,
            'pdf' => $pdf
        ]);
    }
}
