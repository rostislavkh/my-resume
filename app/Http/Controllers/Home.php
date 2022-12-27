<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Skills;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function index() {
        $contacts = Contact::all();
        $skills = Skills::all();

        return view('pages.home.welcome', [
            'contacts' => $contacts,
            'skills' => $skills
        ]);
    }
}
