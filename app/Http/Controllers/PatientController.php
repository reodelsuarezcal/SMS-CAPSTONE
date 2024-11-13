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

    private function getWeightCategory($gender, $age, $weight)
    {
        $gender = strtolower($gender); 
        $growthStandards = config("growth.$gender");
        if (is_null($growthStandards)) {
            return 'Invalid gender or growth data not available';
        }
        foreach ($growthStandards as $standard) {
            if ($standard['age'] == $age) {
                if ($weight >= $standard['severely_underweight'][0] && $weight <= $standard['severely_underweight'][1]) {
                    return 'Severely Underweight';
                } elseif ($weight >= $standard['underweight'][0] && $weight <= $standard['underweight'][1]) {
                    return 'Underweight';
                } elseif ($weight >= $standard['normal'][0] && $weight <= $standard['normal'][1]) {
                    return 'Normal';
                } elseif ($weight >= $standard['overweight'][0]) {
                    return 'Overweight';
                }
            }
        }
    
        return 'Data not available';
    }

    private function getHeightCategory($gender, $age, $height)
    {
        $gender = strtolower($gender); 
        $growthStandardsHfa = config("growthHfa.$gender");
        if (is_null($growthStandardsHfa)) {
            return 'Invalid gender or growth data not available';
        }
        foreach ($growthStandardsHfa as $standard) {
            if ($standard['age'] == $age) {
                if ($height >= $standard['severely_stunted'][0] && $height <= $standard['severely_stunted'][1]) {
                    return 'Severely Stunted';
                } elseif ($height >= $standard['stunted'][0] && $height <= $standard['stunted'][1]) {
                    return 'Stunted';
                } elseif ($height >= $standard['normal'][0] && $height <= $standard['normal'][1]) {
                    return 'Normal';
                } elseif ($height >= $standard['tall'][0]) {
                    return 'Tall';
                }
            }
        }
    
        return 'Data not available';
    }
    
    

    public function index(Request $request)
{
    $perPage = $request->input('perPage', 10);
    $ageGroup = $request->input('ageGroup');

    // Base query for patients
    $query = patients::query();

    // Apply age group filtering
    if ($ageGroup === '0-5') {
        $query->whereRaw('TIMESTAMPDIFF(MONTH, birthday, CURDATE()) BETWEEN 0 AND 5');
    } elseif ($ageGroup === '6-11') {
        $query->whereRaw('TIMESTAMPDIFF(MONTH, birthday, CURDATE()) BETWEEN 6 AND 11');
    } elseif ($ageGroup === '12-23') {
        $query->whereRaw('TIMESTAMPDIFF(MONTH, birthday, CURDATE()) BETWEEN 12 AND 23');
    } elseif ($ageGroup === '24-35') {
        $query->whereRaw('TIMESTAMPDIFF(MONTH, birthday, CURDATE()) BETWEEN 24 AND 35');
    } elseif ($ageGroup === '36-47') {
        $query->whereRaw('TIMESTAMPDIFF(MONTH, birthday, CURDATE()) BETWEEN 36 AND 47');
    } elseif ($ageGroup === '48-59') {
        $query->whereRaw('TIMESTAMPDIFF(MONTH, birthday, CURDATE()) BETWEEN 48 AND 59');
    }

    // Pagination logic
    if ($perPage == 'all') {
        $patientsData = $query->get();
    } else {
        $patientsData = $query->paginate($perPage);
    }

    return view('layouts.tables', compact('patientsData', 'perPage', 'ageGroup'));
}



    

    public function addIndex(){
        $parents = parents::with('patients')->get();
        return view('layouts.add-patient', compact('parents'));
    }

    public function viewProfile(String $id) {    
        $patient = patients::findOrFail($id);
        $height = $patient->height;
        $weight = $patient->weight;
        $bmiNot = $weight / ($height * $height);
        $bmi = number_format($bmiNot, 3);
        return view('layouts.view-profile', compact('patient', 'bmi'));
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
            $height = $request->input('height'); 
            $weight = $request->input('weight'); 
            $parent_id = $request->input('parent_id'); // Use input for parent_id
            $age = Carbon::parse($birthday)->diffInMonths(Carbon::now());
            $wfa = $this->getWeightCategory($request->input('gender'), $age, $request->input('weight'));
            $hfa = $this->getHeightCategory($request->input('gender'), $age, $request->input('height'));
    
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
                'wfa' => $wfa,
                'hfa' => $hfa,
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
        $age = Carbon::parse($patient->birthday)->diffInMonths(Carbon::now());
        $patient->wfa = $this->getWeightCategory($request->input('gender'), $age, $request->input('weight'));
        $patient->hfa = $this->getHeightCategory($request->input('gender'), $age, $request->input('height'));

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
    return redirect()->route('table')->with('success', 'Patient deleted successfully!');

    }

    public function searchPatient(Request $request)
    
    {
       
        $search = $request->input('searchPatient');
        $query = patients::with('parents') 
            ->orderBy('lastname', 'ASC');
        
        if (strlen($search) > 0) {
            $query->where(function ($q) use ($search) {
                $q->where('id', 'LIKE', '%' . $search . '%')
                  ->orWhere('lastname', 'LIKE', '%' . $search . '%')
                  ->orWhere('firstname', 'LIKE', '%' . $search . '%')
                  ->orWhere('middlename', 'LIKE', '%' . $search . '%')
                  ->orWhere('gender', 'LIKE', '%' . $search . '%')
                  ->orWhere('birthday', 'LIKE', '%' . $search . '%')
                  ->orWhere('height', 'LIKE', '%' . $search . '%')
                  ->orWhere('weight', 'LIKE', '%' . $search . '%')
                  ->orWhereHas('parents', function ($parentQuery) use ($search) {
                      $parentQuery->where('lastname', 'LIKE', '%' . $search . '%')
                                  ->orWhere('firstname', 'LIKE', '%' . $search . '%')
                                  ->orWhere('middlename', 'LIKE', '%' . $search . '%')
                                  ->orWhere('civil_stat', 'LIKE', '%' . $search . '%');
                  });
            });
        }
        $perPage = $request->input('perPage', 'all');
        if ($perPage === 'all') {
            $patientsData = $query->get();
        } else {
            $patientsData = $query->paginate($perPage); 
        }
        if ($patientsData->isEmpty()) {
            return redirect()->back()->with('error', 'No results found for your search.');
        } 

        $ageGroup = $request->input('ageGroup');

            $query = patients::query();

            // Apply age group filtering
            if ($ageGroup === '0-5') {
                $query->whereRaw('TIMESTAMPDIFF(MONTH, birthday, CURDATE()) BETWEEN 0 AND 5');
            } elseif ($ageGroup === '6-11') {
                $query->whereRaw('TIMESTAMPDIFF(MONTH, birthday, CURDATE()) BETWEEN 6 AND 11');
            } elseif ($ageGroup === '12-23') {
                $query->whereRaw('TIMESTAMPDIFF(MONTH, birthday, CURDATE()) BETWEEN 12 AND 23');
            } elseif ($ageGroup === '24-35') {
                $query->whereRaw('TIMESTAMPDIFF(MONTH, birthday, CURDATE()) BETWEEN 24 AND 35');
            } elseif ($ageGroup === '36-47') {
                $query->whereRaw('TIMESTAMPDIFF(MONTH, birthday, CURDATE()) BETWEEN 36 AND 47');
            } elseif ($ageGroup === '48-59') {
                $query->whereRaw('TIMESTAMPDIFF(MONTH, birthday, CURDATE()) BETWEEN 48 AND 59');
            }

                return view('layouts.tables', compact('patientsData', 'perPage','ageGroup'));
            }
            
}
