<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

use App\Models\Patient;
use App\Models\Cancer;
use App\Models\History;
use App\Models\SocialHistory;
use App\Models\User;
use App\Models\CallScript;
use App\Models\DiagnosisPre;
use App\Models\PractitionerPre;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function checkInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data, ENT_QUOTES);
        return $data;
    }
    public function sanitizeString($dataString){
        if (filter_var($dataString, FILTER_SANITIZE_STRING)!== false) {
            return $dataString;
        }
    }

    public function index(){
        if(Auth::user()->role>0){
            $data = Patient::latest()->paginate(12);
            //dd($promotion->id);
            return view('patient.index', [
                'patients' => $data,
            ]);
        }else{
            return redirect(route('home'));
        }
       
        
    }
    public function show_cancer($id){
        if(Auth::user()->role>0){
            $data = Patient::find($id);
            if($data){
                $userCreate = User::find($data->user_id);
                $cancerRecord = Cancer::where('patient_id', $data->id)->first();
                $medicalHistory = History::where('patient_id', $data->id)->first();
                $socialHistory = SocialHistory::where('patient_id', $data->id)->first();
                $callScript = CallScript::where('patient_id', $data->id)->first();

                $physicians = array (
                    array($cancerRecord->physician_1_name,$cancerRecord->physician_1_speciality),
                    array($cancerRecord->physician_2_name,$cancerRecord->physician_2_speciality),
                    array($cancerRecord->physician_3_name,$cancerRecord->physician_3_speciality),
                    array($cancerRecord->physician_4_name,$cancerRecord->physician_4_speciality),
                );

                $allergys = array (
                    array($cancerRecord->allergy_1,$cancerRecord->allergy_1_reaction),
                    array($cancerRecord->allergy_2,$cancerRecord->allergy_2_reaction),
                    array($cancerRecord->allergy_3,$cancerRecord->allergy_3_reaction),
                    array($cancerRecord->allergy_4,$cancerRecord->allergy_4_reaction),
                );

                $dose_n_sigs = array (
                    array($cancerRecord->dose_n_sig_1,$cancerRecord->dose_n_sig_1_medication),
                    array($cancerRecord->dose_n_sig_2,$cancerRecord->dose_n_sig_2_medication),
                    array($cancerRecord->dose_n_sig_3,$cancerRecord->dose_n_sig_3_medication),
                    array($cancerRecord->dose_n_sig_4,$cancerRecord->dose_n_sig_4_medication),
                );

                return view('patient.show_cancer', [
                    'patients' => $data,
                    'createUser' => $userCreate->name,
                    'cancerRecord' => $cancerRecord,
                    'physicians' => $physicians,
                    'allergys' => $allergys,
                    'dose_n_sigs' => $dose_n_sigs,

                ]);
            }
        }else{
            return redirect(route('home'));
        }
        
        
       
        
    }

    public function show_medHistory($id){
        if(Auth::user()->role>0){

        }else{
            return redirect(route('home'));
        }
        $data = Patient::find($id);
        if($data){
            $userCreate = User::find($data->user_id);
            //$medHistorycord = Cancer::where('patient_id', $data->id)->first();
            $medicalHistory = History::where('patient_id', $data->id)->first();
            //$socialHistory = SocialHistory::where('patient_id', $data->id)->first();
            //$callScript = CallScript::where('patient_id', $data->id)->first();

            $physicians = array (
                array($cancerRecord->physician_1_name,$cancerRecord->physician_1_speciality),
                array($cancerRecord->physician_2_name,$cancerRecord->physician_2_speciality),
                array($cancerRecord->physician_3_name,$cancerRecord->physician_3_speciality),
                array($cancerRecord->physician_4_name,$cancerRecord->physician_4_speciality),
            );

            $allergys = array (
                array($cancerRecord->allergy_1,$cancerRecord->allergy_1_reaction),
                array($cancerRecord->allergy_2,$cancerRecord->allergy_2_reaction),
                array($cancerRecord->allergy_3,$cancerRecord->allergy_3_reaction),
                array($cancerRecord->allergy_4,$cancerRecord->allergy_4_reaction),
            );

            $dose_n_sigs = array (
                array($cancerRecord->dose_n_sig_1,$cancerRecord->dose_n_sig_1_medication),
                array($cancerRecord->dose_n_sig_2,$cancerRecord->dose_n_sig_2_medication),
                array($cancerRecord->dose_n_sig_3,$cancerRecord->dose_n_sig_3_medication),
                array($cancerRecord->dose_n_sig_4,$cancerRecord->dose_n_sig_4_medication),
            );

            return view('patient.show_medhistory', [
                // 'cancerRecord' => $cancerRecord,
                'medicalHistory' => $medicalHistory,
                // 'socialHistory' => $socialHistory,
                // 'callScript' => $callScript,
                
                //'physicianSpeciality' => $physicianSpeciality,

            ]);
        }
        
       
        
    }

    public function register() { 
        if(Auth::user()->role>0){
            $practitioner_data = PractitionerPre::latest()->get();
            return view ('patient.register',[
                'practitioner_data' => $practitioner_data,
            ]);
        }else{
            return redirect(route('home'));
        }
       
    }

    public function update($id){
        if(Auth::user()->role>0){
            $data = Patient::find($id);
            $practitioner_data = PractitionerPre::latest()->get();
            $physician_data = PractitionerPre::find($data->physician_id_1);
            return view('patient.update', [
                'patientdata' => $data,
                'practitioner_data' => $practitioner_data,
                'physician_data' => $physician_data,
            ]);
        }else{
            return redirect(route('home'));
        }
       
        
    }

    public function cancer($id,$acc_no){
        if(Auth::user()->role>0){
            $data = Patient::find($id);
            $diagnosis_data = DiagnosisPre::latest()->get();
            $cancer_data = Cancer::where('patient_id', $id)->first();
            $physician_data = PractitionerPre::find($data->physician_id_1);

            if($data->account_no == $acc_no){
                //check whether user has cancer details set
                //$cancerData = Cancer::where('patient_id', $id)->first();
                if($cancer_data){
                    $method = 'update';
                }else{
                    $method = 'register';
                }
                
            }else{
                echo 'invalid user';
            }
            return view('patient.cancer', [
                'method'=> $method,
                'patientdata' => $data,
                'diagnosis_data' =>  $diagnosis_data,
                'physician_data' => $physician_data,
            ]);
        }else{
            return redirect(route('home'));
        }
        
        
    }
    public function medicalhistory($id,$acc_no){
        if(Auth::user()->role>0){
            $data = Patient::find($id);
            $physician_data = PractitionerPre::find($data->physician_id_1);

            if($data->account_no == $acc_no){
                //check whether user has Medical History details set
                $medicalHistoryData = History::where('patient_id', $id)->first();
                if($medicalHistoryData){
                    $method = 'update';
                }else{
                    $method = 'register';
                }
                
            }else{
                echo 'invalid user';
            }
            return view('patient.medicalhistory', [
                'method'=> $method,
                'patientdata' => $data,
                // 'practitioner_data' => $practitioner_data,
                'physician_data' => $physician_data,
            ]);
        }else{
            return redirect(route('home'));
        }
        
        
    }
    public function socialhistory($id,$acc_no){
        if(Auth::user()->role>0){
            $data = Patient::find($id);
            $physician_data = PractitionerPre::find($data->physician_id_1);
    
            if($data->account_no == $acc_no){
                //check whether user has Social History details set
                $sociallHistoryData = SocialHistory::where('patient_id', $id)->first();
                if($sociallHistoryData){
                    $method = 'update';
                }else{
                    $method = 'register';
                }
                
            }else{
                echo 'invalid user';
            }
            return view('patient.socialhistory', [
                'method'=> $method,
                'patientdata' => $data,
                // 'practitioner_data' => $practitioner_data,
                'physician_data' => $physician_data,
            ]);
        }else{
            return redirect(route('home'));
        }

        
    }

    // public function adverse_events($facility, $id){
    //     $data = Patient::find($id);
    //     $diagnosis_data = DiagnosisPre::latest()->get();
    //     $cancer_data = Cancer::where('patient_id', $id)->first();
    //     $physician_data = PractitionerPre::find($data->physician_id);

    //     if($data->account_no == $acc_no){
    //         //check whether user has cancer details set
    //         //$cancerData = Cancer::where('patient_id', $id)->first();
    //         if($cancer_data){
    //             $method = 'update';
    //         }else{
    //             $method = 'register';
    //         }
            
    //     }else{
    //         echo 'invalid user';
    //     }
    //     return view('patient.cancer', [
    //         'method'=> $method,
    //         'patientdata' => $data,
    //         'diagnosis_data' =>  $diagnosis_data,
    //         'physician_data' => $physician_data,
    //     ]);
        
    // }

    public function download(){
        if(Auth::user()->role>0){
            $data = Patient::latest()->get()->toArray();
            return view('patient.download', [
                'patients' => $data,
            ]);
        }else{
            return redirect(route('home'));
        }
       
        
    }

    public function search(){
        if(Auth::user()->role>0){
            $searchTerm = $this->checkInput(request()->searchTerm);
            $searchTerm = $this->sanitizeString($searchTerm);

            $searchField = $this->checkInput(request()->searchField);
            $searchField = $this->sanitizeString($searchField);

            if($searchTerm){
                if($searchField=="name"){
                    $searchTerm =  explode(" ",  $searchTerm);
                    $searchTermFname = $searchTerm[0];
                    if(count($searchTerm)>1 ){
                        $searchTermLname = $searchTerm[1];
                    }
        
                    if(count($searchTerm)>1 ){
                        $results = Patient::where('fname', 'LIKE', "%{$searchTermFname}%")
                        ->where('lname', 'LIKE', "%{$searchTermLname}%")
                        ->latest()
                        ->paginate(12);
                        //$results = $this->paginate($results);
                    }else{
                        $results = Patient::where('fname', 'LIKE', "%{$searchTermFname}%")->latest()->paginate(12);
                        //$results = $this->paginate($results);
                    }
                }else if($searchField=="account_no"){
                    $results = Patient::where($searchField, $searchTerm)->latest()->paginate(12);
                    //$results = $this->paginate($results);
                }
            }else{
                $results = Patient::latest()->paginate(12);
            }

            return view('patient.search', [
                'patients' => $results,
            ]);

        }else{
            return redirect(route('home'));
        }

       
        
    }


    public function paginate($items, $perPage = 1, $page = null, $options = [])

    {

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        //return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, ['path' => route('patient_search')]);
    }
    

}
