<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactMe as RequestsContactMe;
use Illuminate\Http\Request;

class ContactMe extends Controller
{
    public function sendMessage (RequestsContactMe $request) {
        dd($request);
    }
}
