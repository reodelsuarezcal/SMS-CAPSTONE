<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parents;

class ParentController extends Controller
{
    public function store(Request $request){

        if($request->has('submit')){
        $lastname = $request->input('lastname');
        $firstname = $request->input('firstname');
        $middlename = $request->input('middlename');
        $birthday = $request->input('birthday');
        $civil_stat = $request->input('civil_stat');
        $contact_no = $request->input('contact_no');


        $data = [
            'lastname' => $lastname,
            'firstname' => $firstname,
            'middlename' => $middlename,
            'birthday' => $birthday,
            'civil_stat' => $civil_stat,
            'contact_no' => $contact_no, 
        ];

        $parent = parents::create($data);
        if ($parent) {
            return redirect()->back()->with('success', 'Parent info saved successfully!');
        } else {
            return redirect()->back()->with('error', 'Unable to saved information!');
        }

        $existingParent = parents::where('lastname', $lastname && 'firstname', $firstname && 'middlename', $middlename)->first();
        if ($existingParent) {
            return redirect()->back()->with('error', 'Parent already in records!');
        }
        }
        else{
            return redirect()->back()->with('error', 'Form submission error!');
        }

    }
    public function parentIndex(){
        $parentsData = parents::all();
        return view('layouts.parents-data', compact('parentsData'));
    }

    public function updateParent(Request $request, String $id){

        $parent = parents::findOrFail($id);
        $parent->lastname = $request->input('lastname');
        $parent->firstname = $request->input('firstname');
        $parent->middlename = $request->input('middlename');
        $parent->birthday = $request->input('birthday');
        $parent->civil_stat = $request->input('civil_stat');
        $parent->contact_no = $request->input('contact_no');

        $parent->save();
        return redirect()->back()->with('success', 'Parent data updated Successfully');
    }

    public function destroy(String $id){

        $parent = parents::findOrFail($id);
        $parent->delete();
        return redirect()->back()->with('success', 'Parent deleted successfully!');

    }
}
