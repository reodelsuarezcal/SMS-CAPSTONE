<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\patients;
use App\Models\parents;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class PatientController extends Controller
{
    public function index (){
        
        $patientsData = patients::all();
        return view('layouts.tables', compact ('patientsData'));
    }

    public function addIndex(){
        $parents = parents::with('patients')->get();
        return view('layouts.add-patient', compact('parents'));
    }

    public function viewProfile( String $id){    
        $patient = patients::findOrFail($id);
        return view('layouts.view-profile', compact('patient'));
    }


    public function store(Request $request)
    {
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
            $age = Carbon::parse($birthday)->age;
    
            // Handle file upload for profile picture
            if ($request->hasFile('profile_pic')) {
                $picture = $request->file('profile_pic');
                $ext = $picture->getClientOriginalExtension();
    
                // Validate file extension
                if (!in_array($ext, ['jpg', 'png', 'jpeg'])) {
                    return redirect()->back()->with('error', 'Profile picture must be an image (jpg, png, jpeg).');
                }

                $profile_pic = time() . '_' . $picture->getClientOriginalName();
                $image = Image::make($picture->getRealPath())->fit(1080, 1055);
                $image->save(public_path('storage/pictures/' . $profile_pic), 90);


            } else {
                $profile_pic = null;
                // return redirect()->back()->with('error', 'Profile picture is required.');
            }
    
            // Check if patient already exists
            $existingPatient = patients::where('patient_id', $patient_id)->first();
            if ($existingPatient) {
                return redirect()->back()->with('error', 'Patient already in records!');
            }

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

    public function editIndex(string $id){
        $parents = parents::with('patients')->get();
        $patient = patients::findOrFail($id);
        return view('layouts.edit-patient', compact('patient','parents'));
    }
    public function update( Request $request, String $id){

    $patient = patients::findOrFail($id);
        $existingPatient = patients::where('patient_id', $request->input('call_no'))
        ->where('id', '!=', $id)
        ->first();
        if ($existingPatient) {
        return redirect()->back()->with('error', 'Patient Id already Exist!');
        }
        $patient->patient_id = $request->input('patient_id');
        $patient->lastname = $request->input('lastname');
        $patient->firstname = $request->input('firstname');
        $patient->middlename = $request->input('middlename');
        $patient->suffix = $request->input('suffix');
        $patient->gender = $request->input('gender');
        $patient->birthday = $request->input('birthday');
        $patient->height = $request->input('height');
        $patient->weight = $request->input('weight'); 
        $patient->parent_id = $request->input('parent_id');

        if ($request->hasFile('profile_pic')) {
            $picture = $request->file('profile_pic');
            $ext = $picture->getClientOriginalExtension();
    
            if (!in_array($ext, ['jpg', 'png', 'jpeg'])) {
                return redirect()->back()->with('error', 'Profile picture must be an image(jpg, png, jpeg)');
            }
            $profile_pic = $picture->getClientOriginalName();
            $picture->move('storage/pictures', $profile_pic);
    
            $patient->profile_pic = $profile_pic;
        }
        $patient->save();
        return redirect()->back()->with('success', 'Patient Info updated successfully');
    }


    //Delete patient
    public function destroy(String $id){
    $patient = patients::findOrFail($id);
    $patient->delete();
    return redirect()->back()->with('success', 'Patient deleted sucessfully!');
    }
}
