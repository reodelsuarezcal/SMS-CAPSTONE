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
    public function parentIndex(Request $request){

        $perPage = $request->input('perPage', 10);
        
        if ($perPage == 'all') {
            $parentsData = parents::all();
        } else {
            $parentsData = parents::paginate($perPage); 
        }
        return view('layouts.parents-data', compact('parentsData','perPage'));
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

    public function searchParent(Request $request)
    {

        $searchParent = $request->input('searchParent');
        $query = Parents::orderBy('lastname', 'ASC');
    
        
        if (!empty($searchParent)) {
            $query->where(function ($q) use ($searchParent) {
                $q->where('id', 'LIKE', '%' . $searchParent . '%')
                  ->orWhere('lastname', 'LIKE', '%' . $searchParent . '%')
                  ->orWhere('firstname', 'LIKE', '%' . $searchParent . '%')
                  ->orWhere('middlename', 'LIKE', '%' . $searchParent . '%')
                  ->orWhere('civil_stat', 'LIKE', '%' . $searchParent . '%')
                  ->orWhere('contact_no', 'LIKE', '%' . $searchParent . '%');
            });
        }
    
        $perPage = $request->input('perPage', 'all');
        if ($perPage === 'all') {
            $parentsData = $query->get();
        } else {
            $parentsData = $query->paginate($perPage);
        }
        if ($parentsData->isEmpty()) {
            return redirect()->back()->with('error', 'No results found for your search.');
        }
        return view('layouts.parents-data', compact('parentsData', 'perPage'));
    }
    
}
