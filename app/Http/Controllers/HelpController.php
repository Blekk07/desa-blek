<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpController extends Controller
{
    public function help()
    {
        return view('help');
    }

    /**
     * Public-facing help page styled like the contact page
     */
    public function publicHelp()
    {
        return view('help-public');
    }
}
