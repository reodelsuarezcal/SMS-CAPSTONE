<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\patients;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{
    public function index (){
        return view('layouts.tables');
    }

    public function addIndex(){
        return view('layouts.add-patient');
    }

    public function viewProfile(){
        return view('layouts.view-profile');
    }


    public function store(Request $request)
    {
        // Check if form is submitted
        if ($request->has('submit')) {
            // Retrieve input fields
            $patient_id = $request->input('patient_id');
            $lastname = $request->input('lastname');
            $firstname = $request->input('firstname');
            $middlename = $request->input('middlename');
            $suffix = $request->input('suffix');
            $gender = $request->input('gender');
            $birthday = $request->input('birthday');
            $height = $request->input('height'); // Use input for height
            $weight = $request->input('weight'); // Use input for weight
            $parent_id = $request->input('parent_id'); // Use input for parent_id
    
            // Handle file upload for profile picture
            if ($request->hasFile('profile_pic')) {
                $picture = $request->file('profile_pic');
                $ext = $picture->getClientOriginalExtension();
    
                // Validate file extension
                if (!in_array($ext, ['jpg', 'png', 'jpeg'])) {
                    return redirect()->back()->with('error', 'Profile picture must be an image (jpg, png, jpeg).');
                }
    
                // Generate a unique filename
                $profile_pic = time() . '_' . $picture->getClientOriginalName();
                $picture->move(public_path('storage/pictures'), $profile_pic);
            } else {
                return redirect()->back()->with('error', 'Profile picture is required.');
            }
    
            // Check if patient already exists
            $existingPatient = patients::where('patient_id', $patient_id)->first();
            if ($existingPatient) {
                return redirect()->back()->with('error', 'Patient already in records!');
            }
    
            // Prepare data for saving
            $data = [
                'patient_id' => $patient_id,
                'lastname' => $lastname,
                'firstname' => $firstname,
                'middlename' => $middlename,
                'suffix' => $suffix,
                'gender' => $gender,
                'birthday' => $birthday,
                'height' => $height,
                'weight' => $weight,
                'parent_id' => $parent_id,
                'profile_pic' => $profile_pic, 
            ];
    
            $patient = patients::create($data);
            if ($patient) {
                return redirect()->back()->with('success', 'Information saved successfully!');
            } else {
                return redirect()->back()->with('error', 'Unable to save information!');
            }
        }
        return redirect()->back()->with('error', 'Form submission error!');
    }
    
    

}
