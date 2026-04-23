<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ct4her;
use App\Models\InsurancePre;
use App\Models\DropoutPre;
use App\Models\Patient;
use App\Models\PractitionerPre;
use App\Models\AdverseEvents;
use Illuminate\Support\Facades\Auth;

class Ct4herController extends Controller
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
            $data = Ct4her::latest()->get()->toArray();
            //$patient = Patient::find($data->patient_id);
            // if( !$data['facility_type'] ){
                
            // }
    
            return view('ct4her.index', [
                'ct4hers' => $data,
            ]);

        }else{
            return redirect(route('home'));
        }
       
        
    }

    public function register(){
        if(Auth::user()->role>0){
            $insurance_data = InsurancePre::latest()->get();
            $dropout_data = DropoutPre::latest()->get();
            $patient_data = Patient::latest()->get();
            $physician_data = PractitionerPre::latest()->get();
    
            return view('ct4her.register',[
                'insurance_data' => $insurance_data,
                'dropout_data' => $dropout_data,
                'patient_data' => $patient_data,
                'physician_data' => $physician_data,
            ]);

        }else{
            return redirect(route('home'));
        }
    
    }
    public function update($ct4herid, $patient){
        if(Auth::user()->role>0){
            $data = Ct4her::find($ct4herid);
            $insurance_data = InsurancePre::latest()->get();
            $dropout_data = DropoutPre::latest()->get();
            $patient_data = Patient::latest()->get();
            $physician_data = PractitionerPre::latest()->get();
    
            //$ct4herdata = Ct4her::find($ct4herid);
            $patientdata = Patient::find($patient);
            $physiciandata = PractitionerPre::find($data->physician_id);
    
            return view('ct4her.update', [
                'ct4herdata' => $data,
                'insurance_data' => $insurance_data,
                'dropout_data' => $dropout_data,
                'patientdata' => $patientdata,
                'patient_data' => $patient_data,
                'physician_data' => $physician_data,
                'physiciandata' => $physiciandata,
            ]);

        }else{
            return redirect(route('home'));
        }

        
    }

    public function adverse_events($ct4herid, $patient){
        if(Auth::user()->role>0){
            $adverse_eventdata = AdverseEvents::where('facility_id',$ct4herid)->where('patient_id',$patient)->first();

            $ct4herdata = Ct4her::find($ct4herid);
            $patientdata = Patient::find($patient);
            // dd($patientdata);
            
    
            //$diagnosis_data = DiagnosisPre::latest()->get();
            //$cancer_data = Cancer::where('patient_id', $id)->first();
            $physiciandata = PractitionerPre::find($ct4herdata->physician_id);
    
            $dropout_data = DropoutPre::latest()->get();
            $insurance_data = InsurancePre::latest()->get();
            //$patient_data = Patient::latest()->get();
    
            if($ct4herdata->patient_id == $patient){
                //check whether user has cancer details set
                //$cancerData = Cancer::where('patient_id', $id)->first();
                if($adverse_eventdata){
                    $method = 'update';
                }else{
                    $method = 'register';
                }
                
            }else{
                echo 'invalid user';
            }
            
            return view('ct4her.adverse_events', [
                'method'=> $method,
                'ct4herdata' => $ct4herdata,
                'patientdata' => $patientdata,
                'physiciandata' => $physiciandata,
                'dropout_data' => $dropout_data,
    
                'insurance_data' => $insurance_data,
                //'diagnosis_data' =>  $diagnosis_data,
            ]);

        }else{
            return redirect(route('home'));
        }
     

        
    }

    public function download(){
        if(Auth::user()->role>0){
            $data = Ct4her::latest()->get()->toArray();
            // header('Content-type:aplication/xls');
            // header('Content-Disposition:attachment;filename=results'.date("Y-m-d-h:i:s").'.xls');
            return view('ct4her.download', [
                'ct4hers' => $data,
            ]);
        }else{
            return redirect(route('home'));
        }
       
        
    }

    public function search(){

        // dd(request()->searchTerm);
        $searchTerm = $this->checkInput(request()->searchTerm);
        $searchTerm = $this->sanitizeString($searchTerm);

        $searchField = $this->checkInput(request()->searchField);
        $searchField = $this->sanitizeString($searchField);

        $results = null;

        if($searchTerm){
            if($searchField=="facility_name"){
                $results = Ct4her::where($searchField, 'LIKE', "%{$searchTerm}%")->latest()->paginate(12);
            }else if($searchField=="ct4her_account_no"){
                $results = Ct4her::where($searchField, $searchTerm)->latest()->paginate(12);
            }
        }else{
            $results = Ct4her::latest()->paginate(12);
        }

        return view('ct4her.search', [
            'ct4hers' => $results,
        ]);
        
    }
}
