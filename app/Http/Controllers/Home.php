<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function index() {
        $contacts = Contact::all();

        return view('pages.home.welcome', ['contacts' => $contacts]);
    }
}
