<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermsPrivacyController extends Controller
{
    public function index(){
        return view('layouts.termsprivacy');
    }
}
