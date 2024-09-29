<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index (){
        return view('layouts.tables');
    }

    public function addIndex(){
        return view('layouts.add-patient');
    }
}
