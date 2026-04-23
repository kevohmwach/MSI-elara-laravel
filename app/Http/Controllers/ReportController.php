<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Cancer;
use App\Models\History;
use App\Models\SocialHistory;
use App\Models\CallScript;
use App\Models\P_CallScript;
use App\Models\Ct4her;
use App\Models\AdverseEvents;
use App\Models\PractitionerPre;
use Illuminate\Support\Facades\Auth;

use DateTime;
use File;
use Response;

class ReportController extends Controller
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

    public function isDate($string){// Specify the expected date format
        $date = DateTime::createFromFormat('Y-m-d', $string); 
        return $date && $date->format('Y-m-d') === $string;
    }
    
    public function index(){
        if(Auth::user()->role>0){
            return view('report.index', [
            ]);
        }else{
            return redirect(route('home'));
        }
      
        
    }

    public function patient_details(){
        if(Auth::user()->role>1){
            $toDate = null;
            $fromDate = null;
            $patient_detail_report = [];
            $counter = 0;
            
            if (request()->toDate) {
                if($this->isDate(request()->toDate)){
                    $toDate = request()->toDate;
                }
                if($this->isDate(request()->fromDate)){
                    $fromDate = request()->fromDate;
                }
                if(isset($toDate) && isset($fromDate)){
                    $patients = Patient::latest()
                    ->where('created_at','>=',$fromDate)
                    ->where('created_at','<=',$toDate)
                    ->get();
                }else{
                    // echo "Wrong Date Provided";
                    $patients = null;
                }
            
                // dd($fromDate);

            }else{
                $toDate = DateTime::createFromFormat('Y-m-d', date('Y-m-d'));
                $toDate = $toDate->modify('+1 day')->format('Y-m-d');

                $fromDate = DateTime::createFromFormat('Y-m-d', date('Y-m-d'));
                $fromDate = $fromDate->modify('-6 months')->format('Y-m-d');

                $patients = Patient::latest()
                        ->where('created_at','>=',$fromDate)
                        ->where('created_at','<=',$toDate)
                        ->get();
            }

                if($patients->count()){
                    foreach ($patients as $patient) {

                        $physician_1 = PractitionerPre::find($patient->physician_id_1);
                        $physician_2 = PractitionerPre::find($patient->physician_id_1);
                        $physician_3 = PractitionerPre::find($patient->physician_id_1);

                        $patient_detail_report[$counter] = [
                            "account_no" => $patient->account_no,
                            "name" => $patient->fname." ".$patient->lname,
                            "gender" => $patient->gender,
                            "email" => $patient->email,
                            "mobile_contact" => $patient->mobile_contact,
                            "created_at" => date_format($patient->created_at, 'Y-m-d'),
                            "emergency_contact_name" => $patient->emergency_contact_name,
                            "emergency_contact_mobile" => $patient->emergency_contact_mobile,
                        


                            "physician_1_name" => $physician_1->pract_name,
                            "physician_1_phone" => $physician_1->pract_mobile_phone,
                            "physician_1_speciality" => $physician_1->pract_speciality,
                        ];
                        $counter++;
                    }
                }else{
                    $patient_detail_report =  null;
                }

            // }

            return view('report.patient_details', [
                'records' => $patient_detail_report,
                'toDate' => $toDate,
                'fromDate' => $fromDate,
            ]);
        
        }else{
            return redirect(route('home'));
        }
        
    }


    public function download_patient_details($from, $to){
        if(Auth::user()->role>1){
            $patient_detail_report = [];
            $counter = 1;
    
            if($this->isDate($to)){
                $toDate = $to;
            }
            if($this->isDate($from)){
                $fromDate = $from;
            }
            if(isset($toDate) && isset($fromDate)){
                $patients = Patient::latest()
                    ->where('created_at','>=',$fromDate)
                    ->where('created_at','<=',$toDate)
                    ->get();
    
                if($patients->count()){
    
                    foreach ($patients as $patient) {
                        $patient_detail_report[0] = [
                            'Account No',
                            'Name',
                            'Gender',
                            'Email',
                            'Created',
                            'Emergency Contact Person',
                            'Emergency Phone',
                            "Physician Name",
                            "Physician Phone",
                            "Physician Speciality",
    
                        ];
    
                        $physician_1 = PractitionerPre::find($patient->physician_id_1);
                        $physician_2 = PractitionerPre::find($patient->physician_id_1);
                        $physician_3 = PractitionerPre::find($patient->physician_id_1);
    
                        $patient_detail_report[$counter] = [
                            "account_no" => $patient->account_no,
                            "name" => $patient->fname." ".$patient->lname,
                            "gender" => $patient->gender,
                            "email" => $patient->email,
                            "mobile_contact" => $patient->mobile_contact,
                            "created_at" => date_format($patient->created_at, 'Y-m-d'),
                            "emergency_contact_name" => $patient->emergency_contact_name,
                            "emergency_contact_mobile" => $patient->emergency_contact_mobile,
                        
    
    
                            "physician_1_name" => $physician_1->pract_name,
                            "physician_1_phone" => $physician_1->pract_mobile_phone,
                            "physician_1_speciality" => $physician_1->pract_speciality,
                        ];
                        $counter++;
                    }
                }else{
                    $patient_detail_report =  null;
                }
    
            }else{
                // echo "Wrong Date Provided";
                $patients = null;
            }
    
    
            // return view('report.download_patient_details', [
            //     'records' => $patient_detail_report,
            // ]);
            return view('report.download_patient_details_1', [
                'records' => $patient_detail_report,
            ]);
        }else{
            return redirect(route('home'));
        }
       
        
    }

    public function dose_n_sig(){
        if(Auth::user()->role>1){
            $toDate = null;
            $fromDate = null;
            $dose_n_sig_report = [];
            $counter = 0;
            
            if (request()->toDate) {
                if($this->isDate(request()->toDate)){
                    $toDate = request()->toDate;
                }
                if($this->isDate(request()->fromDate)){
                    $fromDate = request()->fromDate;
                }
                if(isset($toDate) && isset($fromDate)){
                    $patients = Patient::latest()
                    ->where('created_at','>=',$fromDate)
                    ->where('created_at','<=',$toDate)
                    ->get();
                }else{
                    // echo "Wrong Date Provided";
                    $patients = null;
                }
            
                // dd($fromDate);

            }else{
                $toDate = DateTime::createFromFormat('Y-m-d', date('Y-m-d'));
                $toDate = $toDate->modify('+1 day')->format('Y-m-d');

                $fromDate = DateTime::createFromFormat('Y-m-d', date('Y-m-d'));
                $fromDate = $fromDate->modify('-6 months')->format('Y-m-d');

                $patients = Patient::latest()
                        ->where('created_at','>=',$fromDate)
                        ->where('created_at','<=',$toDate)
                        ->get();
            }

                if($patients->count()){
                    foreach ($patients as $patient) {

                        // $physician_1 = PractitionerPre::find($patient->physician_id_1);
                        // $physician_2 = PractitionerPre::find($patient->physician_id_1);
                        // $physician_3 = PractitionerPre::find($patient->physician_id_1);

                        $dose_n_sig_report[$counter] = [
                            "account_no" => $patient->account_no,
                            "name" => $patient->fname." ".$patient->lname,
                            "email" => $patient->email,
                            "mobile_contact" => $patient->mobile_contact,

                            "dose_n_sig_1" => $patient->dose_n_sig_1,
                            "dose_n_sig_1_quantity" => $patient->dose_n_sig_1_quantity,
                            "dose_n_sig_1_units" => $patient->dose_n_sig_1_units,
                            "dose_n_sig_1_administration" => $patient->dose_n_sig_1_administration,
                            "dose_n_sig_1_frequency" => $patient->dose_n_sig_1_frequency,
                            "dose_n_sig_1_tabs_freq" => $patient->dose_n_sig_1_tabs_freq,
                            "dose_n_sig_1_medication" => $patient->dose_n_sig_1_medication,

                            "dose_n_sig_2" => $patient->dose_n_sig_2,
                            "dose_n_sig_2_quantity" => $patient->dose_n_sig_2_quantity,
                            "dose_n_sig_2_units" => $patient->dose_n_sig_2_units,
                            "dose_n_sig_2_administration" => $patient->dose_n_sig_2_administration,
                            "dose_n_sig_2_frequency" => $patient->dose_n_sig_2_frequency,
                            "dose_n_sig_2_tabs_freq" => $patient->dose_n_sig_2_tabs_freq,
                            "dose_n_sig_2_medication" => $patient->dose_n_sig_2_medication,

                            "dose_n_sig_3" => $patient->dose_n_sig_3,
                            "dose_n_sig_3_quantity" => $patient->dose_n_sig_3_quantity,
                            "dose_n_sig_3_units" => $patient->dose_n_sig_3_units,
                            "dose_n_sig_3_administration" => $patient->dose_n_sig_3_administration,
                            "dose_n_sig_3_frequency" => $patient->dose_n_sig_3_frequency,
                            "dose_n_sig_3_tabs_freq" => $patient->dose_n_sig_3_tabs_freq,
                            "dose_n_sig_3_medication" => $patient->dose_n_sig_3_medication,

                            "dose_n_sig_4" => $patient->dose_n_sig_4,
                            "dose_n_sig_4_quantity" => $patient->dose_n_sig_4_quantity,
                            "dose_n_sig_4_units" => $patient->dose_n_sig_4_units,
                            "dose_n_sig_4_administration" => $patient->dose_n_sig_4_administration,
                            "dose_n_sig_4_frequency" => $patient->dose_n_sig_4_frequency,
                            "dose_n_sig_4_tabs_freq" => $patient->dose_n_sig_4_tabs_freq,
                            "dose_n_sig_4_medication" => $patient->dose_n_sig_4_medication,

                        
                            // "physician_1_name" => $physician_1->pract_name,
                            // "physician_1_phone" => $physician_1->pract_mobile_phone,
                            // "physician_1_speciality" => $physician_1->pract_speciality,
                        ];
                        $counter++;
                    }
                }else{
                    $dose_n_sig_report =  null;
                }

            //}

            return view('report.dose_n_sig', [
                'records' => $dose_n_sig_report,
                'toDate' => $toDate,
                'fromDate' => $fromDate,
            ]);
        
        }else{
            return redirect(route('home'));
        }
        
    }



    public function download_dose_n_sig($from, $to){
        if(Auth::user()->role>1){
            $dose_n_sig_report = [];
            $counter = 1;
    
            if($this->isDate($to)){
                $toDate = $to;
            }
            if($this->isDate($from)){
                $fromDate = $from;
            }
            if(isset($toDate) && isset($fromDate)){
                $patients = Patient::latest()
                    ->where('created_at','>=',$fromDate)
                    ->where('created_at','<=',$toDate)
                    ->get();
    
                if($patients->count()){
    
                    foreach ($patients as $patient) {
                        $dose_n_sig_report[0] = [
                            'Account No',
                            'Name',

                            'dose_n_sig_1',
                            'quantity_1',
                            'units_1',
                            'administration_1',
                            'frequency_1',
                            'tabs_freq_1',
                            'medication_1',
                            'syrup_freq_1',

                            'dose_n_sig_2',
                            'quantity_2',
                            'units_2',
                            'administration_2',
                            'frequency_2',
                            'tabs_freq_2',
                            'medication_2',
                            'syrup_freq_2',

                            'dose_n_sig_3',
                            'quantity_3',
                            'units_3',
                            'administration_3',
                            'frequency_3',
                            'tabs_freq_3',
                            'medication_3',
                            'syrup_freq_3',

                            'dose_n_sig_4',
                            'quantity_4',
                            'units_4',
                            'administration_4',
                            'frequency_4',
                            'tabs_freq_4',
                            'medication_4',
                            'syrup_freq_4',
    
                        ];
    
                        // $physician_1 = PractitionerPre::find($patient->physician_id_1);
                        // $physician_2 = PractitionerPre::find($patient->physician_id_1);
                        // $physician_3 = PractitionerPre::find($patient->physician_id_1);
    
                        $dose_n_sig_report[$counter] = [
                            "account_no" => $patient->account_no,
                            "name" => $patient->fname." ".$patient->lname,

                            "dose_n_sig_1" => $patient->dose_n_sig_1,
                            "dose_n_sig_1_quantity" => $patient->dose_n_sig_1_quantity,
                            "dose_n_sig_1_units" => $patient->dose_n_sig_1_units,
                            "dose_n_sig_1_administration" => $patient->dose_n_sig_1_administration,
                            "dose_n_sig_1_frequency" => $patient->dose_n_sig_1_frequency,
                            "dose_n_sig_1_tabs_freq" => $patient->dose_n_sig_1_tabs_freq,
                            "dose_n_sig_1_medication" => $patient->dose_n_sig_1_medication,

                            "dose_n_sig_2" => $patient->dose_n_sig_2,
                            "dose_n_sig_2_quantity" => $patient->dose_n_sig_2_quantity,
                            "dose_n_sig_2_units" => $patient->dose_n_sig_2_units,
                            "dose_n_sig_2_administration" => $patient->dose_n_sig_2_administration,
                            "dose_n_sig_2_frequency" => $patient->dose_n_sig_2_frequency,
                            "dose_n_sig_2_tabs_freq" => $patient->dose_n_sig_2_tabs_freq,
                            "dose_n_sig_2_medication" => $patient->dose_n_sig_2_medication,

                            "dose_n_sig_3" => $patient->dose_n_sig_3,
                            "dose_n_sig_3_quantity" => $patient->dose_n_sig_3_quantity,
                            "dose_n_sig_3_units" => $patient->dose_n_sig_3_units,
                            "dose_n_sig_3_administration" => $patient->dose_n_sig_3_administration,
                            "dose_n_sig_3_frequency" => $patient->dose_n_sig_3_frequency,
                            "dose_n_sig_3_tabs_freq" => $patient->dose_n_sig_3_tabs_freq,
                            "dose_n_sig_3_medication" => $patient->dose_n_sig_3_medication,

                            "dose_n_sig_4" => $patient->dose_n_sig_4,
                            "dose_n_sig_4_quantity" => $patient->dose_n_sig_4_quantity,
                            "dose_n_sig_4_units" => $patient->dose_n_sig_4_units,
                            "dose_n_sig_4_administration" => $patient->dose_n_sig_4_administration,
                            "dose_n_sig_4_frequency" => $patient->dose_n_sig_4_frequency,
                            "dose_n_sig_4_tabs_freq" => $patient->dose_n_sig_4_tabs_freq,
                            "dose_n_sig_4_medication" => $patient->dose_n_sig_4_medication,
                        ];
                        $counter++;
                    }
                }else{
                    $dose_n_sig_report =  null;
                }
    
            }else{
                $patients = null;
            }

            return view('report.download_dose_n_sig', [
                'records' => $dose_n_sig_report,
            ]);
        }else{
            return redirect(route('home'));
        }
       
        
    }
    
    public function patient_attachment(){
        if(Auth::user()->role>1){
            $toDate = null;
            $fromDate = null;
            $patient_attachment_report = [];
            $counter = 0;
            
            if (request()->toDate && request()->searchTerm) {
                $searchTerm = $this->checkInput(request()->searchTerm);
                $searchTerm = $this->sanitizeString($searchTerm);

                if($this->isDate(request()->toDate)){
                    $toDate = request()->toDate;
                }
                if($this->isDate(request()->fromDate)){
                    $fromDate = request()->fromDate;
                }
                if(isset($toDate) && isset($fromDate)){
                    $patients = Patient::latest()
                    ->where('created_at','>=',$fromDate)
                    ->where('created_at','<=',$toDate)
                    ->where('account_no' ,$searchTerm)
                    ->get();
                }else{
                    // echo "Wrong Date Provided";
                    $patients = null;
                }

            }else if (request()->toDate && !request()->searchTerm) {
                if($this->isDate(request()->toDate)){
                    $toDate = request()->toDate;
                }
                if($this->isDate(request()->fromDate)){
                    $fromDate = request()->fromDate;
                }
                if(isset($toDate) && isset($fromDate)){
                    $patients = Patient::latest()
                    ->where('created_at','>=',$fromDate)
                    ->where('created_at','<=',$toDate)
                    ->get();
                }else{
                    // echo "Wrong Date Provided";
                    $patients = null;
                }

            }else{
                $toDate = DateTime::createFromFormat('Y-m-d', date('Y-m-d'));
                $toDate = $toDate->modify('+1 day')->format('Y-m-d');

                $fromDate = DateTime::createFromFormat('Y-m-d', date('Y-m-d'));
                $fromDate = $fromDate->modify('-6 months')->format('Y-m-d');

                $patients = Patient::latest()
                        ->where('created_at','>=',$fromDate)
                        ->where('created_at','<=',$toDate)
                        ->get();
            }

                if($patients->count()){
                    foreach ($patients as $patient) {

                        $physician_1 = PractitionerPre::find($patient->physician_id_1);
                        $physician_2 = PractitionerPre::find($patient->physician_id_1);
                        $physician_3 = PractitionerPre::find($patient->physician_id_1);

                        $patient_attachment_report[$counter] = [
                            'id' => $patient->id,
                            "account_no" => $patient->account_no,
                            "name" => $patient->fname." ".$patient->lname,

                            "x_ray_file" => $patient->x_ray_file,
                            "ct_scan_file" => $patient->ct_scan_file,
                            "patient_consent_file" => $patient->patient_consent_file,

                            // "created_at" => date_format($patient->created_at, 'Y-m-d'),
                            // "emergency_contact_name" => $patient->emergency_contact_name,
                            // "emergency_contact_mobile" => $patient->emergency_contact_mobile,
                        


                            // "physician_1_name" => $physician_1->pract_name,
                            // "physician_1_phone" => $physician_1->pract_mobile_phone,
                            // "physician_1_speciality" => $physician_1->pract_speciality,
                        ];
                        $counter++;
                    }
                }else{
                    $patient_attachment_report =  null;
                }

            //}

            return view('report.patient_attachment', [
                'records' => $patient_attachment_report,
                'toDate' => $toDate,
                'fromDate' => $fromDate,
            ]);
        
        }else{
            return redirect(route('home'));
        }
        
    }
    public function showFile($id, $fileType){
        $fileType = $this->checkInput($fileType);
        $fileType =  $this->sanitizeString($fileType);

        $fileName =  "";
        $folder =  "";

        $id = $this->checkInput($id);

        if (filter_var($id, FILTER_VALIDATE_INT)!== false) {
            $data =  Patient::find($id);

            if( $fileType == "X-ray" ){
                $fileName = $data['x_ray_file'];
                $folder =  "X_ray";
            }
            if( $fileType == "CT_Scan" ){
                $fileName = $data['ct_scan_file'];
                $folder =  "CT_Scan";
            }
            if( $fileType == "Consent" ){
                $fileName = $data['patient_consent_file'];
                $folder =  "patient_consent";
            }
           
            $file_path = $folder."/".$fileName;
            if( $file_path != "/"){
                $complete_path = storage_path('app/'.$file_path);

                if (!file_exists($complete_path)) {
                    //return response()->json(['error' => 'File not found.'], Response::HTTP_NOT_FOUND);
                    return response('Error: Preview File not found');
                }
    
                $file = File::get($complete_path);
                $response = Response::make($file, 200);
                $response->header('Content-Type', 'application/pdf');
                return $response;
                
                // dd($complete_path);
            }
          

           
            
            // if (!Auth::check()) {
            //     return response()->json(['error' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
            // }
           
            //return response()->file($complete_path);
            // return view('shop.preview', [
            //     'complete_path' => $complete_path
            // ]);
        }
        

    }
    public function cancer(){
        if(Auth::user()->role>1){
            $toDate = null;
            $fromDate = null;
            $cancer_report = [];
            $counter = 0;
            
            if (request()->toDate) {
                if($this->isDate(request()->toDate)){
                    $toDate = request()->toDate;
                }
                if($this->isDate(request()->fromDate)){
                    $fromDate = request()->fromDate;
                }
                if(isset($toDate) && isset($fromDate)){
                    $patientRecords = Patient::latest()
                    ->where('created_at','>=',$fromDate)
                    ->where('created_at','<=',$toDate)
                    ->get();
                }else{
                    // echo "Wrong Date Provided";
                    $cancer = null;
                }
            
                // dd($fromDate);

            }else{
                $toDate = DateTime::createFromFormat('Y-m-d', date('Y-m-d'));
                $toDate = $toDate->modify('+1 day')->format('Y-m-d');
                
                

                $fromDate = DateTime::createFromFormat('Y-m-d', date('Y-m-d'));
                $fromDate = $fromDate->modify('-6 months')->format('Y-m-d');

                $patientRecords = Patient::latest()
                        ->where('created_at','>=',$fromDate)
                        ->where('created_at','<=',$toDate)
                        ->get();
            }

                if($patientRecords->count()){
                    foreach ($patientRecords as $patientRecord) {
                        $pain_descr = "";

                        $cancerRecord = Cancer::where('patient_id', $patientRecord->id)->first();
                      

                        if($cancerRecord){
                            $painDescriptions = json_decode($cancerRecord->pain_descr);

                            foreach($painDescriptions as $painDescription){
                                $pain_descr = $pain_descr.$painDescription." ";
                            }

                            $cancer_report[$counter] = [
                                "account_no" => $patientRecord->account_no,
                                "name" => $patientRecord->fname." ".$patientRecord->lname,
    
                                "current_diagnosis" => $cancerRecord->current_diagnosis,
                                "diagnosis_date" => $cancerRecord->diagnosis_date,
                                "last_name" => $cancerRecord->last_name,
                                "had_surgery" => $cancerRecord->had_surgery,
                                "surgery_date" => $cancerRecord->surgery_date,
                                "surgeon_name" => $cancerRecord->surgeon_name,
                                "surgeon_phone" => $cancerRecord->surgeon_phone,
                                "what_surgery" => $cancerRecord->what_surgery,
                                "surgery_recovered" => $cancerRecord->surgery_recovered,
                                "surgery_complication" => $cancerRecord->surgery_complication,
                                "surgery_complication_explain" => $cancerRecord->surgery_complication_explain,
                                "had_radiation" => $cancerRecord->had_radiation,
                                "radiation_date" => $cancerRecord->radiation_date,
                                "radiologist_name" => $cancerRecord->radiologist_name,
                                "radiologist_phone" => $cancerRecord->radiologist_phone,
                                "radiation_treatment" => $cancerRecord->radiation_treatment,
                                "radiation_recovered" => $cancerRecord->radiation_recovered,
                                "radiation_complications" => $cancerRecord->radiation_complications,
                                "radiation_complication_explain" => $cancerRecord->radiation_complication_explain,
                                "primary_physician_name" => $cancerRecord->primary_physician_name,
                                "primary_physician_contact" => $cancerRecord->primary_physician_contact,
                                "oncologist_name" => $cancerRecord->oncologist_name,
                                "oncologist_phone" => $cancerRecord->oncologist_phone,
                                "physician_1_name" => $cancerRecord->physician_1_name,
                                "physician_1_speciality" => $cancerRecord->physician_1_speciality,
                                "physician_2_name" => $cancerRecord->physician_2_name,
                                "physician_2_speciality" => $cancerRecord->physician_2_speciality,
                                "physician_3_name" => $cancerRecord->physician_3_name,
                                "physician_3_speciality" => $cancerRecord->physician_3_speciality,
                                "physician_4_name" => $cancerRecord->physician_4_name,
                                "physician_4_speciality" => $cancerRecord->physician_4_speciality,
                                "allergy_1" => $cancerRecord->allergy_1,
                                "allergy_1_reaction" => $cancerRecord->allergy_1_reaction,
                                "allergy_2" => $cancerRecord->allergy_2,
                                "allergy_2_reaction" => $cancerRecord->allergy_2_reaction,
                                "allergy_3" => $cancerRecord->allergy_3,
                                "allergy_3_reaction" => $cancerRecord->allergy_3_reaction,
                                "allergy_4" => $cancerRecord->allergy_4,
                                "allergy_4_reaction" => $cancerRecord->allergy_4_reaction,
                                "primary_worry" => $cancerRecord->primary_worry,
                                "issue_began" => $cancerRecord->issue_began,
                                "in_pain" => $cancerRecord->in_pain,
                                "pain_location" => $cancerRecord->pain_location,
                                "pain_treatment" => $cancerRecord->pain_treatment,
                                "pain_treatment_change" => $cancerRecord->pain_treatment_change,
                                "pain_begin_trend" => $cancerRecord->pain_begin_trend,
                                "pain_occurence" => $cancerRecord->pain_occurence,
                                "pain_worst" => $cancerRecord->pain_worst,
                                "curr_symptoms" => $cancerRecord->curr_symptoms,
                                "pain_descr" => $pain_descr,
                                
                                "other_health_concerns" => $cancerRecord->other_health_concerns,

                            ];
                            $counter++;
                        }else{
                            $cancer_report[$counter] = [
                                "account_no" => $patientRecord->account_no,
                                "name" => $patientRecord->fname." ".$patientRecord->lname,

                                'current_diagnosis' =>'',
                                'diagnosis_date' =>'',
                                'last_name' =>'',
                                'had_surgery' =>'',
                                'surgery_date' =>'',
                                'surgeon_name' =>'',
                                'surgeon_phone' =>'',
                                'what_surgery' =>'',
                                'surgery_recovered' =>'',
                                'surgery_complication' =>'',
                                'surgery_complication_explain' =>'',
                                'had_radiation' =>'',
                                'radiation_date' =>'',
                                'radiologist_name' =>'',
                                'radiologist_phone' =>'',
                                'radiation_treatment' =>'',
                                'radiation_recovered' =>'',
                                'radiation_complications' =>'',
                                'radiation_complication_explain' =>'',
                                'primary_physician_name' =>'',
                                'primary_physician_contact' =>'',
                                'oncologist_name' =>'',
                                'oncologist_phone' =>'',
                                'physician_1_name' =>'',
                                'physician_1_speciality' =>'',
                                'physician_2_name' =>'',
                                'physician_2_speciality' =>'',
                                'physician_3_name' =>'',
                                'physician_3_speciality' =>'',
                                'physician_4_name' =>'',
                                'physician_4_speciality' =>'',
                                'allergy_1' =>'',
                                'allergy_1_reaction' =>'',
                                'allergy_2' =>'',
                                'allergy_2_reaction' =>'',
                                'allergy_3' =>'',
                                'allergy_3_reaction' =>'',
                                'allergy_4' =>'',
                                'allergy_4_reaction' =>'',
                                'primary_worry' =>'',
                                'issue_began' =>'',
                                'in_pain' =>'',
                                'pain_location' =>'',
                                'pain_treatment' =>'',
                                'pain_treatment_change' =>'',
                                'pain_begin_trend' =>'',
                                'pain_occurence' =>'',
                                'pain_worst' =>'',
                                'curr_symptoms' =>'',
                                'pain_descr' =>'',
                                'other_health_concerns' =>'',

                            ];
                            $counter++;
                        }
                        
                    }
                }else{
                    $cancer_report =  null;
                }

            //}

            return view('report.cancer', [
                'records' => $cancer_report,
                'toDate' => $toDate,
                'fromDate' => $fromDate,
            ]);
        
        }else{
            return redirect(route('home'));
        }
        
    }
    /*
    public function cancer(){
        if(Auth::user()->role>1){
            $toDate = null;
            $fromDate = null;
            $cancer_report = [];
            $counter = 0;
            
            if (request()->toDate) {
                if($this->isDate(request()->toDate)){
                    $toDate = request()->toDate;
                }
                if($this->isDate(request()->fromDate)){
                    $fromDate = request()->fromDate;
                }
                if(isset($toDate) && isset($fromDate)){
                    $cancerRecords = Cancer::latest()
                    ->where('created_at','>=',$fromDate)
                    ->where('created_at','<=',$toDate)
                    ->get();
                }else{
                    // echo "Wrong Date Provided";
                    $cancer = null;
                }
            
                // dd($fromDate);

            }else{
                $toDate = DateTime::createFromFormat('Y-m-d', date('Y-m-d'));
                $toDate = $toDate->modify('+1 day')->format('Y-m-d');

                $fromDate = DateTime::createFromFormat('Y-m-d', date('Y-m-d'));
                $fromDate = $fromDate->modify('-6 months')->format('Y-m-d');

                $cancerRecords = Cancer::latest()
                        ->where('created_at','>=',$fromDate)
                        ->where('created_at','<=',$toDate)
                        ->get();
            }

                if($cancerRecords->count()){
                    foreach ($cancerRecords as $cancerRecord) {
                        $pain_descr = "";

                        $patient = Patient::find($cancerRecord->patient_id);
                        $painDescriptions = json_decode($cancerRecord->pain_descr);
                        
                        foreach($painDescriptions as $painDescription){
                            $pain_descr = $pain_descr.$painDescription." ";
                        }

                        $cancer_report[$counter] = [
                            "account_no" => $patient->account_no,
                            "name" => $patient->fname." ".$patient->lname,

                            "current_diagnosis" => $cancerRecord->current_diagnosis,
                            "diagnosis_date" => $cancerRecord->diagnosis_date,
                            "last_name" => $cancerRecord->last_name,
                            "had_surgery" => $cancerRecord->had_surgery,
                            "surgery_date" => $cancerRecord->surgery_date,
                            "surgeon_name" => $cancerRecord->surgeon_name,
                            "surgeon_phone" => $cancerRecord->surgeon_phone,
                            "what_surgery" => $cancerRecord->what_surgery,
                            "surgery_recovered" => $cancerRecord->surgery_recovered,
                            "surgery_complication" => $cancerRecord->surgery_complication,
                            "surgery_complication_explain" => $cancerRecord->surgery_complication_explain,
                            "had_radiation" => $cancerRecord->had_radiation,
                            "radiation_date" => $cancerRecord->radiation_date,
                            "radiologist_name" => $cancerRecord->radiologist_name,
                            "radiologist_phone" => $cancerRecord->radiologist_phone,
                            "radiation_treatment" => $cancerRecord->radiation_treatment,
                            "radiation_recovered" => $cancerRecord->radiation_recovered,
                            "radiation_complications" => $cancerRecord->radiation_complications,
                            "radiation_complication_explain" => $cancerRecord->radiation_complication_explain,
                            "primary_physician_name" => $cancerRecord->primary_physician_name,
                            "primary_physician_contact" => $cancerRecord->primary_physician_contact,
                            "oncologist_name" => $cancerRecord->oncologist_name,
                            "oncologist_phone" => $cancerRecord->oncologist_phone,
                            "physician_1_name" => $cancerRecord->physician_1_name,
                            "physician_1_speciality" => $cancerRecord->physician_1_speciality,
                            "physician_2_name" => $cancerRecord->physician_2_name,
                            "physician_2_speciality" => $cancerRecord->physician_2_speciality,
                            "physician_3_name" => $cancerRecord->physician_3_name,
                            "physician_3_speciality" => $cancerRecord->physician_3_speciality,
                            "physician_4_name" => $cancerRecord->physician_4_name,
                            "physician_4_speciality" => $cancerRecord->physician_4_speciality,
                            "allergy_1" => $cancerRecord->allergy_1,
                            "allergy_1_reaction" => $cancerRecord->allergy_1_reaction,
                            "allergy_2" => $cancerRecord->allergy_2,
                            "allergy_2_reaction" => $cancerRecord->allergy_2_reaction,
                            "allergy_3" => $cancerRecord->allergy_3,
                            "allergy_3_reaction" => $cancerRecord->allergy_3_reaction,
                            "allergy_4" => $cancerRecord->allergy_4,
                            "allergy_4_reaction" => $cancerRecord->allergy_4_reaction,
                            "primary_worry" => $cancerRecord->primary_worry,
                            "issue_began" => $cancerRecord->issue_began,
                            "in_pain" => $cancerRecord->in_pain,
                            "pain_location" => $cancerRecord->pain_location,
                            "pain_treatment" => $cancerRecord->pain_treatment,
                            "pain_treatment_change" => $cancerRecord->pain_treatment_change,
                            "pain_begin_trend" => $cancerRecord->pain_begin_trend,
                            "pain_occurence" => $cancerRecord->pain_occurence,
                            "pain_worst" => $cancerRecord->pain_worst,
                            "curr_symptoms" => $cancerRecord->curr_symptoms,
                            "pain_descr" => $pain_descr,
                            
                            "other_health_concerns" => $cancerRecord->other_health_concerns,
                        ];
                        $counter++;
                    }
                }else{
                    $cancer_report =  null;
                }

            //}

            return view('report.cancer', [
                'records' => $cancer_report,
                'toDate' => $toDate,
                'fromDate' => $fromDate,
            ]);
        
        }else{
            return redirect(route('home'));
        }
        
    }
    

    public function download_cancer($from, $to){
        if(Auth::user()->role>1){
            $cancer_report = [];
            $counter = 1;
    
            if($this->isDate($to)){
                $toDate = $to;
            }
            if($this->isDate($from)){
                $fromDate = $from;
            }
            if(isset($toDate) && isset($fromDate)){
                $cancerRecords = Cancer::latest()
                    ->where('created_at','>=',$fromDate)
                    ->where('created_at','<=',$toDate)
                    ->get();
    
                if($cancerRecords->count()){
    
                    foreach ($cancerRecords as $cancerRecord) {
                        $cancer_report[0] = [
                            'Account No',
                            'Name',

                            'current_diagnosis',
                            'diagnosis_date',
                            'last_name',
                            'had_surgery',
                            'surgery_date',
                            'surgeon_name',
                            'surgeon_phone',
                            'what_surgery',
                            'surgery_recovered',
                            'surgery_complication',
                            'surgery_complication_explain',
                            'had_radiation',
                            'radiation_date',
                            'radiologist_name',
                            'radiologist_phone',
                            'radiation_treatment',
                            'radiation_recovered',
                            'radiation_complications',
                            'radiation_complication_explain',
                            'primary_physician_name',
                            'primary_physician_contact',
                            'oncologist_name',
                            'oncologist_phone',
                            'physician_1_name',
                            'physician_1_speciality',
                            'physician_2_name',
                            'physician_2_speciality',
                            'physician_3_name',
                            'physician_3_speciality',
                            'physician_4_name',
                            'physician_4_speciality',
                            'allergy_1',
                            'allergy_1_reaction',
                            'allergy_2',
                            'allergy_2_reaction',
                            'allergy_3',
                            'allergy_3_reaction',
                            'allergy_4',
                            'allergy_4_reaction',
                            'primary_worry',
                            'issue_began',
                            'in_pain',
                            'pain_location',
                            'pain_treatment',
                            'pain_treatment_change',
                            'pain_begin_trend',
                            'pain_occurence',
                            'pain_worst',
                            'curr_symptoms',
                            'pain_descr',
                            'other_health_concerns',

    
                        ];
    
                        $pain_descr = "";

                        $patient = Patient::find($cancerRecord->patient_id);
                        $painDescriptions = json_decode($cancerRecord->pain_descr);
                        
                        foreach($painDescriptions as $painDescription){
                            $pain_descr = $pain_descr.$painDescription." ";
                        }

                        $cancer_report[$counter] = [
                            "account_no" => $patient->account_no,
                            "name" => $patient->fname." ".$patient->lname,

                            "current_diagnosis" => $cancerRecord->current_diagnosis,
                            "diagnosis_date" => $cancerRecord->diagnosis_date,
                            "last_name" => $cancerRecord->last_name,
                            "had_surgery" => $cancerRecord->had_surgery,
                            "surgery_date" => $cancerRecord->surgery_date,
                            "surgeon_name" => $cancerRecord->surgeon_name,
                            "surgeon_phone" => $cancerRecord->surgeon_phone,
                            "what_surgery" => $cancerRecord->what_surgery,
                            "surgery_recovered" => $cancerRecord->surgery_recovered,
                            "surgery_complication" => $cancerRecord->surgery_complication,
                            "surgery_complication_explain" => $cancerRecord->surgery_complication_explain,
                            "had_radiation" => $cancerRecord->had_radiation,
                            "radiation_date" => $cancerRecord->radiation_date,
                            "radiologist_name" => $cancerRecord->radiologist_name,
                            "radiologist_phone" => $cancerRecord->radiologist_phone,
                            "radiation_treatment" => $cancerRecord->radiation_treatment,
                            "radiation_recovered" => $cancerRecord->radiation_recovered,
                            "radiation_complications" => $cancerRecord->radiation_complications,
                            "radiation_complication_explain" => $cancerRecord->radiation_complication_explain,
                            "primary_physician_name" => $cancerRecord->primary_physician_name,
                            "primary_physician_contact" => $cancerRecord->primary_physician_contact,
                            "oncologist_name" => $cancerRecord->oncologist_name,
                            "oncologist_phone" => $cancerRecord->oncologist_phone,
                            "physician_1_name" => $cancerRecord->physician_1_name,
                            "physician_1_speciality" => $cancerRecord->physician_1_speciality,
                            "physician_2_name" => $cancerRecord->physician_2_name,
                            "physician_2_speciality" => $cancerRecord->physician_2_speciality,
                            "physician_3_name" => $cancerRecord->physician_3_name,
                            "physician_3_speciality" => $cancerRecord->physician_3_speciality,
                            "physician_4_name" => $cancerRecord->physician_4_name,
                            "physician_4_speciality" => $cancerRecord->physician_4_speciality,
                            "allergy_1" => $cancerRecord->allergy_1,
                            "allergy_1_reaction" => $cancerRecord->allergy_1_reaction,
                            "allergy_2" => $cancerRecord->allergy_2,
                            "allergy_2_reaction" => $cancerRecord->allergy_2_reaction,
                            "allergy_3" => $cancerRecord->allergy_3,
                            "allergy_3_reaction" => $cancerRecord->allergy_3_reaction,
                            "allergy_4" => $cancerRecord->allergy_4,
                            "allergy_4_reaction" => $cancerRecord->allergy_4_reaction,
                            "primary_worry" => $cancerRecord->primary_worry,
                            "issue_began" => $cancerRecord->issue_began,
                            "in_pain" => $cancerRecord->in_pain,
                            "pain_location" => $cancerRecord->pain_location,
                            "pain_treatment" => $cancerRecord->pain_treatment,
                            "pain_treatment_change" => $cancerRecord->pain_treatment_change,
                            "pain_begin_trend" => $cancerRecord->pain_begin_trend,
                            "pain_occurence" => $cancerRecord->pain_occurence,
                            "pain_worst" => $cancerRecord->pain_worst,
                            "curr_symptoms" => $cancerRecord->curr_symptoms,
                            "pain_descr" => $pain_descr,
                            
                            "other_health_concerns" => $cancerRecord->other_health_concerns,
                        ];
                        $counter++;
                    }
                }else{
                    $cancer_report =  null;
                }
    
            }else{
                $cancerRecords = null;
            }

            return view('report.download_cancer', [
                'records' => $cancer_report,
            ]);
        }else{
            return redirect(route('home'));
        }
          
    }
    //*/
    //--------------------------------------------------------------------------------------------------------------------------
    
    public function medicalHistory(){
        if(Auth::user()->role>1){
            $toDate = null;
            $fromDate = null;
            $cancer_report = [];
            $counter = 0;
            
            if (request()->toDate) {
                if($this->isDate(request()->toDate)){
                    $toDate = request()->toDate;
                }
                if($this->isDate(request()->fromDate)){
                    $fromDate = request()->fromDate;
                }
                if(isset($toDate) && isset($fromDate)){
                    $patientRecords = Patient::latest()
                    ->where('created_at','>=',$fromDate)
                    ->where('created_at','<=',$toDate)
                    ->get();
                }else{
                    // echo "Wrong Date Provided";
                    $cancer = null;
                }
            
                // dd($fromDate);

            }else{
                $toDate = DateTime::createFromFormat('Y-m-d', date('Y-m-d'));
                $toDate = $toDate->modify('+1 day')->format('Y-m-d');
                
                

                $fromDate = DateTime::createFromFormat('Y-m-d', date('Y-m-d'));
                $fromDate = $fromDate->modify('-6 months')->format('Y-m-d');

                $patientRecords = Patient::latest()
                        ->where('created_at','>=',$fromDate)
                        ->where('created_at','<=',$toDate)
                        ->get();
            }

                if($patientRecords->count()){
                    foreach ($patientRecords as $patientRecord) {
                        $pain_descr = "";

                        $medicalHistoryRecord = History::where('patient_id', $patientRecord->id)->first();

                        if($medicalHistoryRecord){
                            $medicalHistory_report[$counter] = [
                                "account_no" => $patientRecord->account_no,
                                "name" => $patientRecord->fname." ".$patientRecord->lname,
    
                                'surgery_1_Doctor' => $medicalHistoryRecord->surgery_1_Doctor,
                                'surgery_1_location' => $medicalHistoryRecord->surgery_1_location,
                                'surgery_1_year' => $medicalHistoryRecord->surgery_1_year,
                                'surgery_2_description' => $medicalHistoryRecord->surgery_2_description,
                                'surgery_2_Doctor' => $medicalHistoryRecord->surgery_2_Doctor,
                                'surgery_2_location' => $medicalHistoryRecord->surgery_2_location,
                                'surgery_2_year' => $medicalHistoryRecord->surgery_2_year,
                                'surgery_3_description' => $medicalHistoryRecord->surgery_3_description,
                                'surgery_3_Doctor' => $medicalHistoryRecord->surgery_3_Doctor,
                                'surgery_3_location' => $medicalHistoryRecord->surgery_3_location,
                                'surgery_3_year' => $medicalHistoryRecord->surgery_3_year,
                                'surgery_4_description' => $medicalHistoryRecord->surgery_4_description,
                                'surgery_4_Doctor' => $medicalHistoryRecord->surgery_4_Doctor,
                                'surgery_4_location' => $medicalHistoryRecord->surgery_4_location,
                                'surgery_4_year' => $medicalHistoryRecord->surgery_4_year,
                                'surgery_5_description' => $medicalHistoryRecord->surgery_5_description,
                                'surgery_5_Doctor' => $medicalHistoryRecord->surgery_5_Doctor,
                                'surgery_5_location' => $medicalHistoryRecord->surgery_5_location,
                                'surgery_5_year' => $medicalHistoryRecord->surgery_5_year,
                                'med_hist_anemia' => $medicalHistoryRecord->med_hist_anemia,
                                'med_hist_arthritis' => $medicalHistoryRecord->med_hist_arthritis,
                                'med_hist_asthma' => $medicalHistoryRecord->med_hist_asthma,
                                'med_hist_Atrial_fibrillation' => $medicalHistoryRecord->med_hist_Atrial_fibrillation,
                                'med_hist_bleeding_problems' => $medicalHistoryRecord->med_hist_bleeding_problems,
                                'med_hist_benign_prostatic_hyperplasia' => $medicalHistoryRecord->med_hist_benign_prostatic_hyperplasia,
                                'med_hist_coronary_artery_disease' => $medicalHistoryRecord->med_hist_coronary_artery_disease,
                                'med_hist_cancer' => $medicalHistoryRecord->med_hist_cancer,
                                'med_hist_cardiac' => $medicalHistoryRecord->med_hist_cardiac,
                                'med_hist_celiac' => $medicalHistoryRecord->med_hist_celiac,
                                'med_hist_chestPain' => $medicalHistoryRecord->med_hist_chestPain,
                                'med_hist_heartfailure' => $medicalHistoryRecord->med_hist_heartfailure,
                                'med_hist_fatiguesyndrome' => $medicalHistoryRecord->med_hist_fatiguesyndrome,
                                'med_hist_depression' => $medicalHistoryRecord->med_hist_depression,
                                'med_hist_diabetes' => $medicalHistoryRecord->med_hist_diabetes,
                                'med_hist_drug_alcohol_abuse' => $medicalHistoryRecord->med_hist_drug_alcohol_abuse,
                                'med_hist_erectile_dysfunction' => $medicalHistoryRecord->med_hist_erectile_dysfunction,
                                'med_hist_fibromyalgia' => $medicalHistoryRecord->med_hist_fibromyalgia,
                                'med_hist_gerd' => $medicalHistoryRecord->med_hist_gerd,
                                'med_hist_heart_disease' => $medicalHistoryRecord->med_hist_heart_disease,
                                'med_hist_hyperinsulinemia' => $medicalHistoryRecord->med_hist_hyperinsulinemia,
                                'med_hist_hyperlipidemia' => $medicalHistoryRecord->med_hist_hyperlipidemia,
                                'med_hist_hypertension' => $medicalHistoryRecord->med_hist_hypertension,
                                'med_hist_male_hypogonadism' => $medicalHistoryRecord->med_hist_male_hypogonadism,
                                'med_hist_hypogonadism' => $medicalHistoryRecord->med_hist_hypogonadism,
                                'med_hist_Infection_problems' => $medicalHistoryRecord->med_hist_Infection_problems,
                                'med_hist_insomnia' => $medicalHistoryRecord->med_hist_insomnia,
                                'med_hist_irritable_bowel_syndrome' => $medicalHistoryRecord->med_hist_irritable_bowel_syndrome,
                                'med_hist_kidney_problems' => $medicalHistoryRecord->med_hist_kidney_problems,
                                'med_hist_menopause' => $medicalHistoryRecord->med_hist_menopause,
                                'med_hist_migranes_headaches' => $medicalHistoryRecord->med_hist_migranes_headaches,
                                'med_hist_neuropathy' => $medicalHistoryRecord->med_hist_neuropathy,
                                'med_hist_onychomycosis' => $medicalHistoryRecord->med_hist_onychomycosis,
                                'med_hist_organ_injury' => $medicalHistoryRecord->med_hist_organ_injury,
                                'med_hist_osteoporosis' => $medicalHistoryRecord->med_hist_osteoporosis,
                                'med_hist_pulmonary_embolism' => $medicalHistoryRecord->med_hist_pulmonary_embolism,
                                'med_hist_seizure_disorders' => $medicalHistoryRecord->med_hist_seizure_disorders,
                                'med_hist_short_Breath' => $medicalHistoryRecord->med_hist_short_Breath,
                                'med_hist_sinus_onditions' => $medicalHistoryRecord->med_hist_sinus_onditions,
                                'med_hist_stroke' => $medicalHistoryRecord->med_hist_stroke,
                                'med_hist_syndrome_x' => $medicalHistoryRecord->med_hist_syndrome_x,
                                'med_hist_tremors' => $medicalHistoryRecord->med_hist_tremors,
                                'med_hist_wheat_allergy' => $medicalHistoryRecord->med_hist_wheat_allergy,
                                'any_other_medical_problem' => $medicalHistoryRecord->any_other_medical_problem,
                                'discussed_at_mdt' => $medicalHistoryRecord->discussed_at_mdt,
                                
                            ];
                            $counter++;
                        }else{
                            $medicalHistory_report[$counter] = [
                                "account_no" => $patientRecord->account_no,
                                "name" => $patientRecord->fname." ".$patientRecord->lname,

                                'surgery_1_Doctor' =>'',
                                'surgery_1_location' =>'',
                                'surgery_1_year' =>'',
                                'surgery_2_description' =>'',
                                'surgery_2_Doctor' =>'',
                                'surgery_2_location' =>'',
                                'surgery_2_year' =>'',
                                'surgery_3_description' =>'',
                                'surgery_3_Doctor' =>'',
                                'surgery_3_location' =>'',
                                'surgery_3_year' =>'',
                                'surgery_4_description' =>'',
                                'surgery_4_Doctor' =>'',
                                'surgery_4_location' =>'',
                                'surgery_4_year' =>'',
                                'surgery_5_description' =>'',
                                'surgery_5_Doctor' =>'',
                                'surgery_5_location' =>'',
                                'surgery_5_year' =>'',
                                'med_hist_anemia' =>'',
                                'med_hist_arthritis' =>'',
                                'med_hist_asthma' =>'',
                                'med_hist_Atrial_fibrillation' =>'',
                                'med_hist_bleeding_problems' =>'',
                                'med_hist_benign_prostatic_hyperplasia' =>'',
                                'med_hist_coronary_artery_disease' =>'',
                                'med_hist_cancer' =>'',
                                'med_hist_cardiac' =>'',
                                'med_hist_celiac' =>'',
                                'med_hist_chestPain' =>'',
                                'med_hist_heartfailure' =>'',
                                'med_hist_fatiguesyndrome' =>'',
                                'med_hist_depression' =>'',
                                'med_hist_diabetes' =>'',
                                'med_hist_drug_alcohol_abuse' =>'',
                                'med_hist_erectile_dysfunction' =>'',
                                'med_hist_fibromyalgia' =>'',
                                'med_hist_gerd' =>'',
                                'med_hist_heart_disease' =>'',
                                'med_hist_hyperinsulinemia' =>'',
                                'med_hist_hyperlipidemia' =>'',
                                'med_hist_hypertension' =>'',
                                'med_hist_male_hypogonadism' =>'',
                                'med_hist_hypogonadism' =>'',
                                'med_hist_Infection_problems' =>'',
                                'med_hist_insomnia' =>'',
                                'med_hist_irritable_bowel_syndrome' =>'',
                                'med_hist_kidney_problems' =>'',
                                'med_hist_menopause' =>'',
                                'med_hist_migranes_headaches' =>'',
                                'med_hist_neuropathy' =>'',
                                'med_hist_onychomycosis' =>'',
                                'med_hist_organ_injury' =>'',
                                'med_hist_osteoporosis' =>'',
                                'med_hist_pulmonary_embolism' =>'',
                                'med_hist_seizure_disorders' =>'',
                                'med_hist_short_Breath' =>'',
                                'med_hist_sinus_onditions' =>'',
                                'med_hist_stroke' =>'',
                                'med_hist_syndrome_x' =>'',
                                'med_hist_tremors' =>'',
                                'med_hist_wheat_allergy' =>'',
                                'any_other_medical_problem' =>'',
                                'discussed_at_mdt' =>'',
                                
    
                            ];
                            $counter++;
                        }
                        
                    }
                }else{
                    $medicalHistory_report =  null;
                }

            //}

            return view('report.medicalHistory', [
                'records' => $medicalHistory_report,
                'toDate' => $toDate,
                'fromDate' => $fromDate,
            ]);
        
        }else{
            return redirect(route('home'));
        }
        
    }

    public function socialHistory(){
        if(Auth::user()->role>1){
            $toDate = null;
            $fromDate = null;
            $cancer_report = [];
            $counter = 0;
            
            if (request()->toDate) {
                if($this->isDate(request()->toDate)){
                    $toDate = request()->toDate;
                }
                if($this->isDate(request()->fromDate)){
                    $fromDate = request()->fromDate;
                }
                if(isset($toDate) && isset($fromDate)){
                    $patientRecords = Patient::latest()
                    ->where('created_at','>=',$fromDate)
                    ->where('created_at','<=',$toDate)
                    ->get();
                }else{
                    // echo "Wrong Date Provided";
                    $cancer = null;
                }
            
                // dd($fromDate);

            }else{
                $toDate = DateTime::createFromFormat('Y-m-d', date('Y-m-d'));
                $toDate = $toDate->modify('+1 day')->format('Y-m-d');
                
                

                $fromDate = DateTime::createFromFormat('Y-m-d', date('Y-m-d'));
                $fromDate = $fromDate->modify('-6 months')->format('Y-m-d');

                $patientRecords = Patient::latest()
                        ->where('created_at','>=',$fromDate)
                        ->where('created_at','<=',$toDate)
                        ->get();
            }

                if($patientRecords->count()){
                    foreach ($patientRecords as $patientRecord) {

                        $socialHistoryRecord = SocialHistory::where('patient_id', $patientRecord->id)->first();

                        if($socialHistoryRecord){
                            $socialHistory_report[$counter] = [
                                "account_no" => $patientRecord->account_no,
                                "name" => $patientRecord->fname." ".$patientRecord->lname,
    
                                'condition_mother' => $socialHistoryRecord->condition_mother,
                                'mother_alive' => $socialHistoryRecord->mother_alive,
                                'mother_deceased_age' => $socialHistoryRecord->mother_deceased_age,
                                'condition_father' => $socialHistoryRecord->condition_father,
                                'father_alive' => $socialHistoryRecord->father_alive,
                                'father_deceased_age' => $socialHistoryRecord->father_deceased_age,
                                'condition_sibling_1' => $socialHistoryRecord->condition_sibling_1,
                                'sibling_1_alive' => $socialHistoryRecord->sibling_1_alive,
                                'sibling_1_deceased_age' => $socialHistoryRecord->sibling_1_deceased_age,
                                'condition_sibling_2' => $socialHistoryRecord->condition_sibling_2,
                                'sibling_2_alive' => $socialHistoryRecord->sibling_2_alive,
                                'sibling_2_deceased_age' => $socialHistoryRecord->sibling_2_deceased_age,
                                'condition_others_1' => $socialHistoryRecord->condition_others_1,
                                'others_1_alive' => $socialHistoryRecord->others_1_alive,
                                'others_1_deceased_age' => $socialHistoryRecord->others_1_deceased_age,
                                'condition_others_2' => $socialHistoryRecord->condition_others_2,
                                'others_2_alive' => $socialHistoryRecord->others_2_alive,
                                'others_2_deceased_age' => $socialHistoryRecord->others_2_deceased_age,
                                'consume_alcohol' => $socialHistoryRecord->consume_alcohol,
                                'drinks_per_week' => $socialHistoryRecord->drinks_per_week,
                                'currently_smoke' => $socialHistoryRecord->currently_smoke,
                                'cigarettes_per_day' => $socialHistoryRecord->cigarettes_per_day,
                                'use_any_other_drug' => $socialHistoryRecord->use_any_other_drug,
                                'any_other_drug' => $socialHistoryRecord->any_other_drug,
                                'any_other_drug_frequency' => $socialHistoryRecord->any_other_drug_frequency,
                                'drink_caffein' => $socialHistoryRecord->drink_caffein,
                                'caffein_cups_per_day' => $socialHistoryRecord->caffein_cups_per_day,
                                'sexually_active' => $socialHistoryRecord->sexually_active,
                                'like_checked_stis' => $socialHistoryRecord->like_checked_stis,
                                'excercise_frequency' => $socialHistoryRecord->excercise_frequency,
                                'on_special_diet' => $socialHistoryRecord->on_special_diet,
                                'special_diet_type' => $socialHistoryRecord->special_diet_type,
                                'pregnancy_plan' => $socialHistoryRecord->pregnancy_plan,
                                'pregnant_now' => $socialHistoryRecord->pregnant_now,
                                'contraception_in_use' => $socialHistoryRecord->contraception_in_use,

                            ];
                            $counter++;
                        }else{
                            $socialHistory_report[$counter] = [
                                "account_no" => $patientRecord->account_no,
                                "name" => $patientRecord->fname." ".$patientRecord->lname,

                                'condition_mother' =>'',
                                'mother_alive' =>'',
                                'mother_deceased_age' =>'',
                                'condition_father' =>'',
                                'father_alive' =>'',
                                'father_deceased_age' =>'',
                                'condition_sibling_1' =>'',
                                'sibling_1_alive' =>'',
                                'sibling_1_deceased_age' =>'',
                                'condition_sibling_2' =>'',
                                'sibling_2_alive' =>'',
                                'sibling_2_deceased_age' =>'',
                                'condition_others_1' =>'',
                                'others_1_alive' =>'',
                                'others_1_deceased_age' =>'',
                                'condition_others_2' =>'',
                                'others_2_alive' =>'',
                                'others_2_deceased_age' =>'',
                                'consume_alcohol' =>'',
                                'drinks_per_week' =>'',
                                'currently_smoke' =>'',
                                'cigarettes_per_day' =>'',
                                'use_any_other_drug' =>'',
                                'any_other_drug' =>'',
                                'any_other_drug_frequency' =>'',
                                'drink_caffein' =>'',
                                'caffein_cups_per_day' =>'',
                                'sexually_active' =>'',
                                'like_checked_stis' =>'',
                                'excercise_frequency' =>'',
                                'on_special_diet' =>'',
                                'special_diet_type' =>'',
                                'pregnancy_plan' =>'',
                                'pregnant_now' =>'',
                                'contraception_in_use' =>'',

    
                            ];
                            $counter++;
                        }
                        
                    }
                }else{
                    $socialHistory_report =  null;
                }

            //}

            return view('report.socialHistory', [
                'records' => $socialHistory_report,
                'toDate' => $toDate,
                'fromDate' => $fromDate,
            ]);
        
        }else{
            return redirect(route('home'));
        }
        
    }

    public function callScript(){
        if(Auth::user()->role>1){
            $toDate = null;
            $fromDate = null;
            $callScript_report = [];
            $counter = 0;
            
            if (request()->toDate) {
                if($this->isDate(request()->toDate)){
                    $toDate = request()->toDate;
                }
                if($this->isDate(request()->fromDate)){
                    $fromDate = request()->fromDate;
                }
                if(isset($toDate) && isset($fromDate)){
                    $patientRecords = Patient::latest()
                    ->where('created_at','>=',$fromDate)
                    ->where('created_at','<=',$toDate)
                    ->get();
                }else{
                    // echo "Wrong Date Provided";
                    $callScript = null;
                }
            
                // dd($fromDate);

            }else{
                $toDate = DateTime::createFromFormat('Y-m-d', date('Y-m-d'));
                $toDate = $toDate->modify('+1 day')->format('Y-m-d');
                
                

                $fromDate = DateTime::createFromFormat('Y-m-d', date('Y-m-d'));
                $fromDate = $fromDate->modify('-6 months')->format('Y-m-d');

                $patientRecords = Patient::latest()
                        ->where('created_at','>=',$fromDate)
                        ->where('created_at','<=',$toDate)
                        ->get();
            }

                if($patientRecords->count()){
                    foreach ($patientRecords as $patientRecord) {

                        $callScriptRecord = CallScript::where('patient_id', $patientRecord->id)->first();

                        if($callScriptRecord){
                            $callScript_report[$counter] = [
                                "account_no" => $patientRecord->account_no,
                                "name" => $patientRecord->fname." ".$patientRecord->lname,
    
                                'patient_response_salutation' => $callScriptRecord->patient_response_salutation,
                                'patient_response_busy' => $callScriptRecord->patient_response_busy,
                                'script_question_1' => $callScriptRecord->script_question_1,
                                'patient_response_1' => $callScriptRecord->patient_response_1,
                                'script_question_2' => $callScriptRecord->script_question_2,
                                'patient_response_2' => $callScriptRecord->patient_response_2,
                                'script_question_3' => $callScriptRecord->script_question_3,
                                'patient_response_3' => $callScriptRecord->patient_response_3,
                                'script_question_4' => $callScriptRecord->script_question_4,
                                'patient_response_4' => $callScriptRecord->patient_response_4,
                                'script_question_5' => $callScriptRecord->script_question_5,
                                'patient_response_5' => $callScriptRecord->patient_response_5,
                                'patient_response_wrap_advice' => $callScriptRecord->patient_response_wrap_advice,
                                'patient_response_wrap_bye' => $callScriptRecord->patient_response_wrap_bye,
                                'weekly_check_in_quiz_1' => $callScriptRecord->weekly_check_in_quiz_1,
                                'weekly_check_in_response_1' => $callScriptRecord->weekly_check_in_response_1,
                                'weekly_check_in_quiz_2' => $callScriptRecord->weekly_check_in_quiz_2,
                                'weekly_check_in_response_2' => $callScriptRecord->weekly_check_in_response_2,
                                'weekly_check_in_quiz_3' => $callScriptRecord->weekly_check_in_quiz_3,
                                'weekly_check_in_response_3' => $callScriptRecord->weekly_check_in_response_3,
                                'weekly_check_in_quiz_4' => $callScriptRecord->weekly_check_in_quiz_4,
                                'weekly_check_in_response_4' => $callScriptRecord->weekly_check_in_response_4,
                                'weekly_check_in_quiz_5' => $callScriptRecord->weekly_check_in_quiz_5,
                                'weekly_check_in_response_5' => $callScriptRecord->weekly_check_in_response_5,
                                'weekly_check_in_quiz_6' => $callScriptRecord->weekly_check_in_quiz_6,
                                'weekly_check_in_response_6' => $callScriptRecord->weekly_check_in_response_6,
                                'weekly_check_in_quiz_7' => $callScriptRecord->weekly_check_in_quiz_7,
                                'weekly_check_in_response_7' => $callScriptRecord->weekly_check_in_response_7,
                                'patient_response_wrap_advice_weekly' => $callScriptRecord->patient_response_wrap_advice_weekly,
                                'patient_response_wrap_bye_weekly' => $callScriptRecord->patient_response_wrap_bye_weekly,

                            ];
                            $counter++;
                        }else{
                            $callScript_report[$counter] = [
                                "account_no" => $patientRecord->account_no,
                                "name" => $patientRecord->fname." ".$patientRecord->lname,

                                'patient_response_salutation' =>'',
                                'patient_response_busy' =>'',
                                'script_question_1' =>'',
                                'patient_response_1' =>'',
                                'script_question_2' =>'',
                                'patient_response_2' =>'',
                                'script_question_3' =>'',
                                'patient_response_3' =>'',
                                'script_question_4' =>'',
                                'patient_response_4' =>'',
                                'script_question_5' =>'',
                                'patient_response_5' =>'',
                                'patient_response_wrap_advice' =>'',
                                'patient_response_wrap_bye' =>'',
                                'weekly_check_in_quiz_1' =>'',
                                'weekly_check_in_response_1' =>'',
                                'weekly_check_in_quiz_2' =>'',
                                'weekly_check_in_response_2' =>'',
                                'weekly_check_in_quiz_3' =>'',
                                'weekly_check_in_response_3' =>'',
                                'weekly_check_in_quiz_4' =>'',
                                'weekly_check_in_response_4' =>'',
                                'weekly_check_in_quiz_5' =>'',
                                'weekly_check_in_response_5' =>'',
                                'weekly_check_in_quiz_6' =>'',
                                'weekly_check_in_response_6' =>'',
                                'weekly_check_in_quiz_7' =>'',
                                'weekly_check_in_response_7' =>'',
                                'patient_response_wrap_advice_weekly' =>'',
                                'patient_response_wrap_bye_weekly' =>'',


                            ];
                            $counter++;
                        }
                        
                    }
                }else{
                    $callScript_report =  null;
                }

            //}

            return view('report.callScript', [
                'records' => $callScript_report,
                'toDate' => $toDate,
                'fromDate' => $fromDate,
            ]);
        
        }else{
            return redirect(route('home'));
        }
        
    }


    public function p_callScript(){
        if(Auth::user()->role>1){
            $toDate = null;
            $fromDate = null;
            $callScript_report = [];
            $counter = 0;
            
            if (request()->toDate) {
                if($this->isDate(request()->toDate)){
                    $toDate = request()->toDate;
                }
                if($this->isDate(request()->fromDate)){
                    $fromDate = request()->fromDate;
                }
                if(isset($toDate) && isset($fromDate)){
                    $patientRecords = Patient::latest()
                    ->where('created_at','>=',$fromDate)
                    ->where('created_at','<=',$toDate)
                    ->get();
                }else{
                    // echo "Wrong Date Provided";
                    $callScript = null;
                }
            
                // dd($fromDate);

            }else{
                $toDate = DateTime::createFromFormat('Y-m-d', date('Y-m-d'));
                $toDate = $toDate->modify('+1 day')->format('Y-m-d');
                
                

                $fromDate = DateTime::createFromFormat('Y-m-d', date('Y-m-d'));
                $fromDate = $fromDate->modify('-6 months')->format('Y-m-d');

                $patientRecords = Patient::latest()
                        ->where('created_at','>=',$fromDate)
                        ->where('created_at','<=',$toDate)
                        ->get();
            }

                if($patientRecords->count()){
                    foreach ($patientRecords as $patientRecord) {

                        $callScriptRecord = P_CallScript::where('patient_id', $patientRecord->id)->first();

                        if($callScriptRecord){
                            $callScript_report[$counter] = [
                                "account_no" => $patientRecord->account_no,
                                "name" => $patientRecord->fname." ".$patientRecord->lname,
    
                                
                                'patient_response_1' => $callScriptRecord->patient_response_1,
                                
                                'patient_response_2' => $callScriptRecord->patient_response_2,
                                
                                'patient_response_3' => $callScriptRecord->patient_response_3,
                                
                                'patient_response_4' => $callScriptRecord->patient_response_4,
                                
                                'patient_response_5' => $callScriptRecord->patient_response_5,
                                
                                'patient_response_6' => $callScriptRecord->patient_response_6,
                                
                                'patient_response_7' => $callScriptRecord->patient_response_7,

                                'call_doctor_or_er_response' => $callScriptRecord->call_doctor_or_er_response,
                                'routine_monitoring_response' => $callScriptRecord->routine_monitoring_response,
                                'red_flags_response' => $callScriptRecord->red_flags_response,
                                'enhertu_effects_response' => $callScriptRecord->enhertu_effects_response,
                                'patient_understanding_response' => $callScriptRecord->patient_understanding_response,
                                'action_needed_response' => $callScriptRecord->action_needed_response,

                            ];
                            $counter++;
                        }else{
                            $callScript_report[$counter] = [
                                "account_no" => $patientRecord->account_no,
                                "name" => $patientRecord->fname." ".$patientRecord->lname,

                                
                                'patient_response_1' =>'',
                                
                                'patient_response_2' =>'',
                                
                                'patient_response_3' =>'',
                                
                                'patient_response_4' =>'',
                                
                                'patient_response_5' =>'',
                                'patient_response_6' =>'',
                                'patient_response_7' =>'',
                                'call_doctor_or_er_response' =>'',
                                'routine_monitoring_response' =>'',
                                'red_flags_response' =>'',
                                'enhertu_effects_response' =>'',
                                'patient_understanding_response' =>'',
                                'action_needed_response' =>'',


                            ];
                            $counter++;
                        }
                        
                    }
                }else{
                    $callScript_report =  null;
                }

            //}

            return view('report.p_callScript', [
                'records' => $callScript_report,
                'toDate' => $toDate,
                'fromDate' => $fromDate,
            ]);
        
        }else{
            return redirect(route('home'));
        }
        
    }

    public function ct4her(){
        if(Auth::user()->role>1){
            $toDate = null;
            $fromDate = null;
            $ct4her_report = [];
            $counter = 0;
            
            if (request()->toDate) {
                if($this->isDate(request()->toDate)){
                    $toDate = request()->toDate;
                }
                if($this->isDate(request()->fromDate)){
                    $fromDate = request()->fromDate;
                }
                if(isset($toDate) && isset($fromDate)){
                    $ct4herRecords = Ct4her::latest()
                    ->where('created_at','>=',$fromDate)
                    ->where('created_at','<=',$toDate)
                    ->get();
                }else{
                    // echo "Wrong Date Provided";
                    $ct4hers = null;
                }
            
                // dd($fromDate);

            }else{
                $toDate = DateTime::createFromFormat('Y-m-d', date('Y-m-d'));
                $toDate = $toDate->modify('+1 day')->format('Y-m-d');

                $fromDate = DateTime::createFromFormat('Y-m-d', date('Y-m-d'));
                $fromDate = $fromDate->modify('-6 months')->format('Y-m-d');

                $ct4herRecords = Ct4her::latest()
                        ->where('created_at','>=',$fromDate)
                        ->where('created_at','<=',$toDate)
                        ->get();
            }

                if($ct4herRecords->count()){
                    foreach ($ct4herRecords as $ct4herRecord) {

                        $physician = PractitionerPre::find($ct4herRecord->physician_id);
                        $patient = Patient::find($ct4herRecord->patient_id);
                     

                        $ct4her_report[$counter] = [
                            "account_no" => $ct4herRecord->ct4her_account_no,
                            "facility_name" => $ct4herRecord->facility_name,

                            'facility_email_address' => $ct4herRecord->facility_email_address,
                            'facility_contact_person' => $ct4herRecord->facility_contact_person,
                            'facility_contact_person_phone' => $ct4herRecord->facility_contact_person_phone,
                            'facility_contact_person_email_address' => $ct4herRecord->facility_contact_person_email_address,
                            'facility_type' => $ct4herRecord->facility_type,
                            'other_facility_type' => $ct4herRecord->other_facility_type,
                            
                            "physician_name" => $physician->pract_name,
                            "physician_phone" => $physician->pract_mobile_phone,
                            "physician_speciality" => $physician->pract_speciality,
                            
                            //'physician_id' => $ct4herRecord->physician_id,
                            //'patient_id' => $ct4herRecord->patient_id,

                            "patient_account" => $patient->account_no,
                            "patient_name" => $patient->fname." ".$patient->lname,

                            'breast_cancer_confirmed' => $ct4herRecord->breast_cancer_confirmed,
                            'diagnosis_date' => $ct4herRecord->diagnosis_date,
                            'cancer_stage' => $ct4herRecord->cancer_stage,
                            'tumor_burden' => $ct4herRecord->tumor_burden,
                            'biomarkers_initiation' => $ct4herRecord->biomarkers_initiation,
                            'chemotherapy' => $ct4herRecord->chemotherapy,
                            'chemo_details' => $ct4herRecord->chemo_details,
                            'surgery' => $ct4herRecord->surgery,
                            'surgery_details' => $ct4herRecord->surgery_details,
                            'post_treatment' => $ct4herRecord->post_treatment,
                            'post_treatment_details' => $ct4herRecord->post_treatment_details,
                            'enhertu_duration' => $ct4herRecord->enhertu_duration,
                            'liver_function' => $ct4herRecord->liver_function,
                            'renal_function' => $ct4herRecord->renal_function,
                            'cardiac_function' => $ct4herRecord->cardiac_function,
                            'lab_report_attached' => $ct4herRecord->lab_report_attached,
                            'key_findings_lab' => $ct4herRecord->key_findings_lab,
                            'lab_report_file' => $ct4herRecord->lab_report_file,
                            'hr_ct_scan_attached' => $ct4herRecord->hr_ct_scan_attached,
                            'key_findings_hr_ct_scan' => $ct4herRecord->key_findings_hr_ct_scan,
                            'hr_ct_scan_file' => $ct4herRecord->hr_ct_scan_file,
                            'price_ct_scan' => $ct4herRecord->price_ct_scan,
                            'insuarance_provider' => $ct4herRecord->insuarance_provider,
                            'insuarance_level' => $ct4herRecord->insuarance_level,
                            'insuarance_policy_no' => $ct4herRecord->insuarance_policy_no,
                            'insuarance_cover_details' => $ct4herRecord->insuarance_cover_details,
                            'ct_scan_coverage' => $ct4herRecord->ct_scan_coverage,
                            'lab_coverage' => $ct4herRecord->lab_coverage,
                            'cost_of_care_estimate' => $ct4herRecord->cost_of_care_estimate,
                            'consent_file' => $ct4herRecord->consent_file,
                            'comments_concerns' => $ct4herRecord->comments_concerns,


                          
                        ];
                        $counter++;
                    }
                }else{
                    $ct4her_report =  null;
                }

            // }

            return view('report.ct4her', [
                'records' => $ct4her_report,
                'toDate' => $toDate,
                'fromDate' => $fromDate,
            ]);
        
        }else{
            return redirect(route('home'));
        }
        
    }

    public function adverse(){
        if(Auth::user()->role>1){
            $toDate = null;
            $fromDate = null;
            $adverse_report = [];
            $counter = 0;
            
            if (request()->toDate) {
                if($this->isDate(request()->toDate)){
                    $toDate = request()->toDate;
                }
                if($this->isDate(request()->fromDate)){
                    $fromDate = request()->fromDate;
                }
                if(isset($toDate) && isset($fromDate)){
                    $adverseRecords = AdverseEvents::latest()
                    ->where('created_at','>=',$fromDate)
                    ->where('created_at','<=',$toDate)
                    ->get();
                }else{
                    // echo "Wrong Date Provided";
                    $adverse = null;
                }
            
                // dd($fromDate);

            }else{ 
                $toDate = DateTime::createFromFormat('Y-m-d', date('Y-m-d'));
                $toDate = $toDate->modify('+1 day')->format('Y-m-d');
                
                

                $fromDate = DateTime::createFromFormat('Y-m-d', date('Y-m-d'));
                $fromDate = $fromDate->modify('-6 months')->format('Y-m-d');

                $adverseRecords = AdverseEvents::latest()
                        ->where('created_at','>=',$fromDate)
                        ->where('created_at','<=',$toDate)
                        ->get();
            }

                if($adverseRecords->count()){
                    foreach ($adverseRecords as $adverseRecord) {

                        $patient = Patient::find($adverseRecord->patient_id);
                        $facility = Ct4her::find($adverseRecord->facility_id);

                        if($adverseRecord){
                            $adverse_report[$counter] = [
                                "account_no" => $patient->account_no,
                                "patient_name" => $patient->fname." ".$patient->lname,
                                'facility_name' => $facility->facility_name,
                                'adverse_drug_reaction' => $adverseRecord->adverse_drug_reaction,
                                'adr_details' => $adverseRecord->adr_details,
                                'dropouts' => $adverseRecord->dropouts,
                                'dropout_reason' => $adverseRecord->dropout_reason,
                                'mental_health' => $adverseRecord->mental_health,
                                'other_mental_health' => $adverseRecord->other_mental_health,

                            ];
                            $counter++;
                        }
                        
                    }
                }else{
                    $adverse_report =  null;
                }

            //}

            return view('report.adverse', [
                'records' => $adverse_report,
                'toDate' => $toDate,
                'fromDate' => $fromDate,
            ]);
        
        }else{
            return redirect(route('home'));
        }
        
    }
   
    //-------------------------------Download-------------------------------------
    public function download_medicalHistory($from, $to){
        if(Auth::user()->role>1){
            $toDate = null;
            $fromDate = null;
            $cancer_report = [];
            $counter = 1;
            
            if($this->isDate($to)){
                $toDate = $to;
            }
            if($this->isDate($from)){
                $fromDate = $from;
            }
            if(isset($toDate) && isset($fromDate)){
                $patientRecords = Patient::latest()
                ->where('created_at','>=',$fromDate)
                ->where('created_at','<=',$toDate)
                ->get();
            }else{
                $patientRecords = null;
            }

                if($patientRecords->count()){
                    foreach ($patientRecords as $patientRecord) {
                        $medicalHistory_report[0] = [
                            'Account_No',
                            'Patient_Name',
                            'Surgery_1_Doctor',
                            'Surgery_1_Location',
                            'Surgery_1_Year',
                            'Surgery_2_Description',
                            'Surgery_2_Doctor',
                            'Surgery_2_Location',
                            'Surgery_2_Year',
                            'Surgery_3_Description',
                            'Surgery_3_Doctor',
                            'Surgery_3_Location',
                            'Surgery_3_Year',
                            'Surgery_4_Description',
                            'Surgery_4_Doctor',
                            'Surgery_4_Location',
                            'Surgery_4_Year',
                            'Surgery_5_Description',
                            'Surgery_5_Doctor',
                            'Surgery_5_Location',
                            'Surgery_5_Year',
                            'Anemia',
                            'Arthritis',
                            'Asthma',
                            'Atrial_Fibrillation',
                            'Bleeding_Problems',
                            'Benign_Prostatic_Hyperplasia',
                            'Coronary_Artery_Disease',
                            'Cancer',
                            'Cardiac',
                            'Celiac',
                            'Chestpain',
                            'Heartfailure',
                            'Fatiguesyndrome',
                            'Depression',
                            'Diabetes',
                            'Drug_Alcohol_Abuse',
                            'Erectile_Dysfunction',
                            'Fibromyalgia',
                            'Gerd',
                            'Heart_Disease',
                            'Hyperinsulinemia',
                            'Hyperlipidemia',
                            'Hypertension',
                            'Male_Hypogonadism',
                            'Hypogonadism',
                            'Infection_Problems',
                            'Insomnia',
                            'Irritable_Bowel_Syndrome',
                            'Kidney_Problems',
                            'Menopause',
                            'Migranes_Headaches',
                            'Neuropathy',
                            'Onychomycosis',
                            'Organ_Injury',
                            'Osteoporosis',
                            'Pulmonary_Embolism',
                            'Seizure_Disorders',
                            'Short_Breath',
                            'Sinus_Onditions',
                            'Stroke',
                            'Syndrome_X',
                            'Tremors',
                            'Wheat_Allergy',
                            'Any_Other_Medical_Problem',
                            'Patient_discussed_at_MDT?',
                            



    
                        ];
                        $pain_descr = "";

                        $medicalHistoryRecord = History::where('patient_id', $patientRecord->id)->first();

                        if($medicalHistoryRecord){
                            $medicalHistory_report[$counter] = [
                                "account_no" => $patientRecord->account_no,
                                "name" => $patientRecord->fname." ".$patientRecord->lname,
    
                                'surgery_1_Doctor' => $medicalHistoryRecord->surgery_1_Doctor,
                                'surgery_1_location' => $medicalHistoryRecord->surgery_1_location,
                                'surgery_1_year' => $medicalHistoryRecord->surgery_1_year,
                                'surgery_2_description' => $medicalHistoryRecord->surgery_2_description,
                                'surgery_2_Doctor' => $medicalHistoryRecord->surgery_2_Doctor,
                                'surgery_2_location' => $medicalHistoryRecord->surgery_2_location,
                                'surgery_2_year' => $medicalHistoryRecord->surgery_2_year,
                                'surgery_3_description' => $medicalHistoryRecord->surgery_3_description,
                                'surgery_3_Doctor' => $medicalHistoryRecord->surgery_3_Doctor,
                                'surgery_3_location' => $medicalHistoryRecord->surgery_3_location,
                                'surgery_3_year' => $medicalHistoryRecord->surgery_3_year,
                                'surgery_4_description' => $medicalHistoryRecord->surgery_4_description,
                                'surgery_4_Doctor' => $medicalHistoryRecord->surgery_4_Doctor,
                                'surgery_4_location' => $medicalHistoryRecord->surgery_4_location,
                                'surgery_4_year' => $medicalHistoryRecord->surgery_4_year,
                                'surgery_5_description' => $medicalHistoryRecord->surgery_5_description,
                                'surgery_5_Doctor' => $medicalHistoryRecord->surgery_5_Doctor,
                                'surgery_5_location' => $medicalHistoryRecord->surgery_5_location,
                                'surgery_5_year' => $medicalHistoryRecord->surgery_5_year,
                                'med_hist_anemia' => $medicalHistoryRecord->med_hist_anemia,
                                'med_hist_arthritis' => $medicalHistoryRecord->med_hist_arthritis,
                                'med_hist_asthma' => $medicalHistoryRecord->med_hist_asthma,
                                'med_hist_Atrial_fibrillation' => $medicalHistoryRecord->med_hist_Atrial_fibrillation,
                                'med_hist_bleeding_problems' => $medicalHistoryRecord->med_hist_bleeding_problems,
                                'med_hist_benign_prostatic_hyperplasia' => $medicalHistoryRecord->med_hist_benign_prostatic_hyperplasia,
                                'med_hist_coronary_artery_disease' => $medicalHistoryRecord->med_hist_coronary_artery_disease,
                                'med_hist_cancer' => $medicalHistoryRecord->med_hist_cancer,
                                'med_hist_cardiac' => $medicalHistoryRecord->med_hist_cardiac,
                                'med_hist_celiac' => $medicalHistoryRecord->med_hist_celiac,
                                'med_hist_chestPain' => $medicalHistoryRecord->med_hist_chestPain,
                                'med_hist_heartfailure' => $medicalHistoryRecord->med_hist_heartfailure,
                                'med_hist_fatiguesyndrome' => $medicalHistoryRecord->med_hist_fatiguesyndrome,
                                'med_hist_depression' => $medicalHistoryRecord->med_hist_depression,
                                'med_hist_diabetes' => $medicalHistoryRecord->med_hist_diabetes,
                                'med_hist_drug_alcohol_abuse' => $medicalHistoryRecord->med_hist_drug_alcohol_abuse,
                                'med_hist_erectile_dysfunction' => $medicalHistoryRecord->med_hist_erectile_dysfunction,
                                'med_hist_fibromyalgia' => $medicalHistoryRecord->med_hist_fibromyalgia,
                                'med_hist_gerd' => $medicalHistoryRecord->med_hist_gerd,
                                'med_hist_heart_disease' => $medicalHistoryRecord->med_hist_heart_disease,
                                'med_hist_hyperinsulinemia' => $medicalHistoryRecord->med_hist_hyperinsulinemia,
                                'med_hist_hyperlipidemia' => $medicalHistoryRecord->med_hist_hyperlipidemia,
                                'med_hist_hypertension' => $medicalHistoryRecord->med_hist_hypertension,
                                'med_hist_male_hypogonadism' => $medicalHistoryRecord->med_hist_male_hypogonadism,
                                'med_hist_hypogonadism' => $medicalHistoryRecord->med_hist_hypogonadism,
                                'med_hist_Infection_problems' => $medicalHistoryRecord->med_hist_Infection_problems,
                                'med_hist_insomnia' => $medicalHistoryRecord->med_hist_insomnia,
                                'med_hist_irritable_bowel_syndrome' => $medicalHistoryRecord->med_hist_irritable_bowel_syndrome,
                                'med_hist_kidney_problems' => $medicalHistoryRecord->med_hist_kidney_problems,
                                'med_hist_menopause' => $medicalHistoryRecord->med_hist_menopause,
                                'med_hist_migranes_headaches' => $medicalHistoryRecord->med_hist_migranes_headaches,
                                'med_hist_neuropathy' => $medicalHistoryRecord->med_hist_neuropathy,
                                'med_hist_onychomycosis' => $medicalHistoryRecord->med_hist_onychomycosis,
                                'med_hist_organ_injury' => $medicalHistoryRecord->med_hist_organ_injury,
                                'med_hist_osteoporosis' => $medicalHistoryRecord->med_hist_osteoporosis,
                                'med_hist_pulmonary_embolism' => $medicalHistoryRecord->med_hist_pulmonary_embolism,
                                'med_hist_seizure_disorders' => $medicalHistoryRecord->med_hist_seizure_disorders,
                                'med_hist_short_Breath' => $medicalHistoryRecord->med_hist_short_Breath,
                                'med_hist_sinus_onditions' => $medicalHistoryRecord->med_hist_sinus_onditions,
                                'med_hist_stroke' => $medicalHistoryRecord->med_hist_stroke,
                                'med_hist_syndrome_x' => $medicalHistoryRecord->med_hist_syndrome_x,
                                'med_hist_tremors' => $medicalHistoryRecord->med_hist_tremors,
                                'med_hist_wheat_allergy' => $medicalHistoryRecord->med_hist_wheat_allergy,
                                'any_other_medical_problem' => $medicalHistoryRecord->any_other_medical_problem,
                                'discussed_at_mdt' => $medicalHistoryRecord->discussed_at_mdt,
                                
    
                            ];
                            $counter++;
                        }else{
                            $medicalHistory_report[$counter] = [
                                "account_no" => $patientRecord->account_no,
                                "name" => $patientRecord->fname." ".$patientRecord->lname,

                                'surgery_1_Doctor' =>'',
                                'surgery_1_location' =>'',
                                'surgery_1_year' =>'',
                                'surgery_2_description' =>'',
                                'surgery_2_Doctor' =>'',
                                'surgery_2_location' =>'',
                                'surgery_2_year' =>'',
                                'surgery_3_description' =>'',
                                'surgery_3_Doctor' =>'',
                                'surgery_3_location' =>'',
                                'surgery_3_year' =>'',
                                'surgery_4_description' =>'',
                                'surgery_4_Doctor' =>'',
                                'surgery_4_location' =>'',
                                'surgery_4_year' =>'',
                                'surgery_5_description' =>'',
                                'surgery_5_Doctor' =>'',
                                'surgery_5_location' =>'',
                                'surgery_5_year' =>'',
                                'med_hist_anemia' =>'',
                                'med_hist_arthritis' =>'',
                                'med_hist_asthma' =>'',
                                'med_hist_Atrial_fibrillation' =>'',
                                'med_hist_bleeding_problems' =>'',
                                'med_hist_benign_prostatic_hyperplasia' =>'',
                                'med_hist_coronary_artery_disease' =>'',
                                'med_hist_cancer' =>'',
                                'med_hist_cardiac' =>'',
                                'med_hist_celiac' =>'',
                                'med_hist_chestPain' =>'',
                                'med_hist_heartfailure' =>'',
                                'med_hist_fatiguesyndrome' =>'',
                                'med_hist_depression' =>'',
                                'med_hist_diabetes' =>'',
                                'med_hist_drug_alcohol_abuse' =>'',
                                'med_hist_erectile_dysfunction' =>'',
                                'med_hist_fibromyalgia' =>'',
                                'med_hist_gerd' =>'',
                                'med_hist_heart_disease' =>'',
                                'med_hist_hyperinsulinemia' =>'',
                                'med_hist_hyperlipidemia' =>'',
                                'med_hist_hypertension' =>'',
                                'med_hist_male_hypogonadism' =>'',
                                'med_hist_hypogonadism' =>'',
                                'med_hist_Infection_problems' =>'',
                                'med_hist_insomnia' =>'',
                                'med_hist_irritable_bowel_syndrome' =>'',
                                'med_hist_kidney_problems' =>'',
                                'med_hist_menopause' =>'',
                                'med_hist_migranes_headaches' =>'',
                                'med_hist_neuropathy' =>'',
                                'med_hist_onychomycosis' =>'',
                                'med_hist_organ_injury' =>'',
                                'med_hist_osteoporosis' =>'',
                                'med_hist_pulmonary_embolism' =>'',
                                'med_hist_seizure_disorders' =>'',
                                'med_hist_short_Breath' =>'',
                                'med_hist_sinus_onditions' =>'',
                                'med_hist_stroke' =>'',
                                'med_hist_syndrome_x' =>'',
                                'med_hist_tremors' =>'',
                                'med_hist_wheat_allergy' =>'',
                                'any_other_medical_problem' =>'',
                                'discussed_at_mdt' =>'',
                            ];
                            $counter++;
                        }
                        
                    }
                }else{
                    $medicalHistory_report =  null;
                }

            //}

            return view('report.download_gen', [
                'records' => $medicalHistory_report,
                'fileName' => 'MedicalHistory',
            ]);
        
        }else{
            return redirect(route('home'));
        }
        
    }

    public function download_socialHistory($from, $to){
        if(Auth::user()->role>1){
            $toDate = null;
            $fromDate = null;
            $cancer_report = [];
            $counter = 1;
            
            if($this->isDate($to)){
                $toDate = $to;
            }
            if($this->isDate($from)){
                $fromDate = $from;
            }
            if(isset($toDate) && isset($fromDate)){
                $patientRecords = Patient::latest()
                ->where('created_at','>=',$fromDate)
                ->where('created_at','<=',$toDate)
                ->get();
            }else{
                $patientRecords = null;
            }

                if($patientRecords->count()){
                    foreach ($patientRecords as $patientRecord) {
                        $socialHistory_report[0] = [
                            'Account No',
                            'Patient Name',
                            'Condition_Mother',
                            'Mother_Alive',
                            'Mother_Deceased_Age',
                            'Condition_Father',
                            'Father_Alive',
                            'Father_Deceased_Age',
                            'Condition_Sibling_1',
                            'Sibling_1_Alive',
                            'Sibling_1_Deceased_Age',
                            'Condition_Sibling_2',
                            'Sibling_2_Alive',
                            'Sibling_2_Deceased_Age',
                            'Condition_Others_1',
                            'Others_1_Alive',
                            'Others_1_Deceased_Age',
                            'Condition_Others_2',
                            'Others_2_Alive',
                            'Others_2_Deceased_Age',
                            'Consume_Alcohol',
                            'Drinks_Per_Week',
                            'Currently_Smoke',
                            'Cigarettes_Per_Day',
                            'Use_Any_Other_Drug',
                            'Any_Other_Drug',
                            'Any_Other_Drug_Frequency',
                            'Drink_Caffein',
                            'Caffein_Cups_Per_Day',
                            'Sexually_Active',
                            'Would_like_be_checked_STIS?',
                            'Excercise_Frequency',
                            'On_Special_Diet',
                            'Special_Diet_Type',
                            'Pregnancy_Plan',
                            'Pregnant_Now',
                            'Contraception_In_Use',
                            'Last_Menstrual_Cycle',

    
                        ];
                        $pain_descr = "";

                        $socialHistoryRecord = SocialHistory::where('patient_id', $patientRecord->id)->first();

                        if($socialHistoryRecord){
                            $socialHistory_report[$counter] = [
                                "account_no" => $patientRecord->account_no,
                                "name" => $patientRecord->fname." ".$patientRecord->lname,
    
                                'condition_mother' => $socialHistoryRecord->condition_mother,
                                'mother_alive' => $socialHistoryRecord->mother_alive,
                                'mother_deceased_age' => $socialHistoryRecord->mother_deceased_age,
                                'condition_father' => $socialHistoryRecord->condition_father,
                                'father_alive' => $socialHistoryRecord->father_alive,
                                'father_deceased_age' => $socialHistoryRecord->father_deceased_age,
                                'condition_sibling_1' => $socialHistoryRecord->condition_sibling_1,
                                'sibling_1_alive' => $socialHistoryRecord->sibling_1_alive,
                                'sibling_1_deceased_age' => $socialHistoryRecord->sibling_1_deceased_age,
                                'condition_sibling_2' => $socialHistoryRecord->condition_sibling_2,
                                'sibling_2_alive' => $socialHistoryRecord->sibling_2_alive,
                                'sibling_2_deceased_age' => $socialHistoryRecord->sibling_2_deceased_age,
                                'condition_others_1' => $socialHistoryRecord->condition_others_1,
                                'others_1_alive' => $socialHistoryRecord->others_1_alive,
                                'others_1_deceased_age' => $socialHistoryRecord->others_1_deceased_age,
                                'condition_others_2' => $socialHistoryRecord->condition_others_2,
                                'others_2_alive' => $socialHistoryRecord->others_2_alive,
                                'others_2_deceased_age' => $socialHistoryRecord->others_2_deceased_age,
                                'consume_alcohol' => $socialHistoryRecord->consume_alcohol,
                                'drinks_per_week' => $socialHistoryRecord->drinks_per_week,
                                'currently_smoke' => $socialHistoryRecord->currently_smoke,
                                'cigarettes_per_day' => $socialHistoryRecord->cigarettes_per_day,
                                'use_any_other_drug' => $socialHistoryRecord->use_any_other_drug,
                                'any_other_drug' => $socialHistoryRecord->any_other_drug,
                                'any_other_drug_frequency' => $socialHistoryRecord->any_other_drug_frequency,
                                'drink_caffein' => $socialHistoryRecord->drink_caffein,
                                'caffein_cups_per_day' => $socialHistoryRecord->caffein_cups_per_day,
                                'sexually_active' => $socialHistoryRecord->sexually_active,
                                'like_checked_stis' => $socialHistoryRecord->like_checked_stis,
                                'excercise_frequency' => $socialHistoryRecord->excercise_frequency,
                                'on_special_diet' => $socialHistoryRecord->on_special_diet,
                                'special_diet_type' => $socialHistoryRecord->special_diet_type,
                                'pregnancy_plan' => $socialHistoryRecord->pregnancy_plan,
                                'pregnant_now' => $socialHistoryRecord->pregnant_now,
                                'contraception_in_use' => $socialHistoryRecord->contraception_in_use,
                                'last_menstrual_cycle' => $socialHistoryRecord->last_menstrual_cycle,

                            ];
                            $counter++;
                        }else{
                            $socialHistory_report[$counter] = [
                                "account_no" => $patientRecord->account_no,
                                "name" => $patientRecord->fname." ".$patientRecord->lname,

                                'condition_mother' =>'',
                                'mother_alive' =>'',
                                'mother_deceased_age' =>'',
                                'condition_father' =>'',
                                'father_alive' =>'',
                                'father_deceased_age' =>'',
                                'condition_sibling_1' =>'',
                                'sibling_1_alive' =>'',
                                'sibling_1_deceased_age' =>'',
                                'condition_sibling_2' =>'',
                                'sibling_2_alive' =>'',
                                'sibling_2_deceased_age' =>'',
                                'condition_others_1' =>'',
                                'others_1_alive' =>'',
                                'others_1_deceased_age' =>'',
                                'condition_others_2' =>'',
                                'others_2_alive' =>'',
                                'others_2_deceased_age' =>'',
                                'consume_alcohol' =>'',
                                'drinks_per_week' =>'',
                                'currently_smoke' =>'',
                                'cigarettes_per_day' =>'',
                                'use_any_other_drug' =>'',
                                'any_other_drug' =>'',
                                'any_other_drug_frequency' =>'',
                                'drink_caffein' =>'',
                                'caffein_cups_per_day' =>'',
                                'sexually_active' =>'',
                                'like_checked_stis' =>'',
                                'excercise_frequency' =>'',
                                'on_special_diet' =>'',
                                'special_diet_type' =>'',
                                'pregnancy_plan' =>'',
                                'pregnant_now' =>'',
                                'contraception_in_use' =>'',
                                'last_menstrual_cycle' =>'',

    
                            ];
                            $counter++;
                        }
                        
                    }
                }else{
                    $socialHistory_report =  null;
                }

            //}

            return view('report.download_gen', [
                'records' => $socialHistory_report,
                'fileName' => 'socialHistory',
            ]);
        
        }else{
            return redirect(route('home'));
        }
        
    }

    public function download_callScript($from, $to){
        if(Auth::user()->role>1){
            $toDate = null;
            $fromDate = null;
            $cancer_report = [];
            $counter = 1;
            
            if($this->isDate($to)){
                $toDate = $to;
            }
            if($this->isDate($from)){
                $fromDate = $from;
            }
            if(isset($toDate) && isset($fromDate)){
                $patientRecords = Patient::latest()
                ->where('created_at','>=',$fromDate)
                ->where('created_at','<=',$toDate)
                ->get();
            }else{
                $patientRecords = null;
            }

                if($patientRecords->count()){
                    foreach ($patientRecords as $patientRecord) {
                        $callScript_report[0] = [
                            'Account No',
                            'Patient Name',
                            'Patient_Response_Salutation',
                            'Patient_Response_Busy',
                            'Script_Question_1',
                            'Patient_Response_1',
                            'Script_Question_2',
                            'Patient_Response_2',
                            'Script_Question_3',
                            'Patient_Response_3',
                            'Script_Question_4',
                            'Patient_Response_4',
                            'Script_Question_5',
                            'Patient_Response_5',
                            'Patient_Response_Wrap_Advice',
                            'Patient_Response_Wrap_Bye',
                            'Weekly_Check_In_Quiz_1',
                            'Weekly_Check_In_Response_1',
                            'Weekly_Check_In_Quiz_2',
                            'Weekly_Check_In_Response_2',
                            'Weekly_Check_In_Quiz_3',
                            'Weekly_Check_In_Response_3',
                            'Weekly_Check_In_Quiz_4',
                            'Weekly_Check_In_Response_4',
                            'Weekly_Check_In_Quiz_5',
                            'Weekly_Check_In_Response_5',
                            'Weekly_Check_In_Quiz_6',
                            'Weekly_Check_In_Response_6',
                            'Weekly_Check_In_Quiz_7',
                            'Weekly_Check_In_Response_7',
                            'Patient_Response_Wrap_Advice_Weekly',
                            'Patient_Response_Wrap_Bye_Weekly',
                           
                        ];
                        $pain_descr = "";

                        $callScriptRecord = CallScript::where('patient_id', $patientRecord->id)->first();

                        if($callScriptRecord){
                            $callScript_report[$counter] = [
                                "account_no" => $patientRecord->account_no,
                                "name" => $patientRecord->fname." ".$patientRecord->lname,
    
                                'patient_response_salutation' => $callScriptRecord->patient_response_salutation,
                                'patient_response_busy' => $callScriptRecord->patient_response_busy,
                                'script_question_1' => $callScriptRecord->script_question_1,
                                'patient_response_1' => $callScriptRecord->patient_response_1,
                                'script_question_2' => $callScriptRecord->script_question_2,
                                'patient_response_2' => $callScriptRecord->patient_response_2,
                                'script_question_3' => $callScriptRecord->script_question_3,
                                'patient_response_3' => $callScriptRecord->patient_response_3,
                                'script_question_4' => $callScriptRecord->script_question_4,
                                'patient_response_4' => $callScriptRecord->patient_response_4,
                                'script_question_5' => $callScriptRecord->script_question_5,
                                'patient_response_5' => $callScriptRecord->patient_response_5,
                                'patient_response_wrap_advice' => $callScriptRecord->patient_response_wrap_advice,
                                'patient_response_wrap_bye' => $callScriptRecord->patient_response_wrap_bye,
                                'weekly_check_in_quiz_1' => $callScriptRecord->weekly_check_in_quiz_1,
                                'weekly_check_in_response_1' => $callScriptRecord->weekly_check_in_response_1,
                                'weekly_check_in_quiz_2' => $callScriptRecord->weekly_check_in_quiz_2,
                                'weekly_check_in_response_2' => $callScriptRecord->weekly_check_in_response_2,
                                'weekly_check_in_quiz_3' => $callScriptRecord->weekly_check_in_quiz_3,
                                'weekly_check_in_response_3' => $callScriptRecord->weekly_check_in_response_3,
                                'weekly_check_in_quiz_4' => $callScriptRecord->weekly_check_in_quiz_4,
                                'weekly_check_in_response_4' => $callScriptRecord->weekly_check_in_response_4,
                                'weekly_check_in_quiz_5' => $callScriptRecord->weekly_check_in_quiz_5,
                                'weekly_check_in_response_5' => $callScriptRecord->weekly_check_in_response_5,
                                'weekly_check_in_quiz_6' => $callScriptRecord->weekly_check_in_quiz_6,
                                'weekly_check_in_response_6' => $callScriptRecord->weekly_check_in_response_6,
                                'weekly_check_in_quiz_7' => $callScriptRecord->weekly_check_in_quiz_7,
                                'weekly_check_in_response_7' => $callScriptRecord->weekly_check_in_response_7,
                                'patient_response_wrap_advice_weekly' => $callScriptRecord->patient_response_wrap_advice_weekly,
                                'patient_response_wrap_bye_weekly' => $callScriptRecord->patient_response_wrap_bye_weekly,


                            ];
                            $counter++;
                        }else{
                            $callScript_report[$counter] = [
                                "account_no" => $patientRecord->account_no,
                                "name" => $patientRecord->fname." ".$patientRecord->lname,

                                'patient_response_salutation' =>'',
                                'patient_response_busy' =>'',
                                'script_question_1' =>'',
                                'patient_response_1' =>'',
                                'script_question_2' =>'',
                                'patient_response_2' =>'',
                                'script_question_3' =>'',
                                'patient_response_3' =>'',
                                'script_question_4' =>'',
                                'patient_response_4' =>'',
                                'script_question_5' =>'',
                                'patient_response_5' =>'',
                                'patient_response_wrap_advice' =>'',
                                'patient_response_wrap_bye' =>'',
                                'weekly_check_in_quiz_1' =>'',
                                'weekly_check_in_response_1' =>'',
                                'weekly_check_in_quiz_2' =>'',
                                'weekly_check_in_response_2' =>'',
                                'weekly_check_in_quiz_3' =>'',
                                'weekly_check_in_response_3' =>'',
                                'weekly_check_in_quiz_4' =>'',
                                'weekly_check_in_response_4' =>'',
                                'weekly_check_in_quiz_5' =>'',
                                'weekly_check_in_response_5' =>'',
                                'weekly_check_in_quiz_6' =>'',
                                'weekly_check_in_response_6' =>'',
                                'weekly_check_in_quiz_7' =>'',
                                'weekly_check_in_response_7' =>'',
                                'patient_response_wrap_advice_weekly' =>'',
                                'patient_response_wrap_bye_weekly' =>'',


                            ];
                            $counter++;
                        }
                        
                    }
                }else{
                    $callScript_report =  null;
                }

            //}

            return view('report.download_gen', [
                'records' => $callScript_report,
                'fileName' => 'callScript',
            ]);
        
        }else{
            return redirect(route('home'));
        }
        
    }


    public function p_download_callScript($from, $to){
        if(Auth::user()->role>1){
            $toDate = null;
            $fromDate = null;
            $cancer_report = [];
            $counter = 1;
            
            if($this->isDate($to)){
                $toDate = $to;
            }
            if($this->isDate($from)){
                $fromDate = $from;
            }
            if(isset($toDate) && isset($fromDate)){
                $patientRecords = Patient::latest()
                ->where('created_at','>=',$fromDate)
                ->where('created_at','<=',$toDate)
                ->get();
            }else{
                $patientRecords = null;
            }

                if($patientRecords->count()){
                    foreach ($patientRecords as $patientRecord) {
                        $callScript_report[0] = [
                            "Account No",
                            "Patient Name",
                           
                            "Are_you_walking_or_exercising_like_usual? Do you have any difficulty with activities or notice yourself getting short of breath since your last infusion?",
                            "When_you_re_moving_around_the_house_or_going about your day, does your heart race or pound? Are your legs and feet more swollen than usual?",
                
                            "How_are_you_feeling_day_to_day?_Are_you_running a fever or feeling like you might be coming down with a cold or flu?",
                            
                            "When_you_bump_into_things_or_get_small_cuts, are you bruising easier or bleeding more than before?",
                            
                            "How_are_your_meals_going?_Are_you_eating like you normally do, or are you having trouble with nausea or your appetite?",

                            "Are_you_able_to_do_your_usual_daily_routine - things like housework, shopping, or hobbies? How's your energy for getting things done?",
                            "Are_you_ready_for_your_next_Enhertu_infusion as scheduled? Have you needed to contact your doctor or go anywhere for medical care since your last infusion?",
                            "TELL_PATIENT_TO_CALL_DOCTOR_TODAY_OR_GO_TO_ER",
                            "routine_monitoring",
                            
                            "red_flags_call_medical_team_now",
                            "NORMAL_ENHERTU_EFFECTS_ROUTINE_FOLLOW_UP",
                            "patient_understanding_Quick_staff_notes",
                            "action_needed",
                           
                        ];
                        $pain_descr = "";

                        $callScriptRecord = P_CallScript::where('patient_id', $patientRecord->id)->first();

                        if($callScriptRecord){
                            $callScript_report[$counter] = [
                                "account_no" => $patientRecord->account_no,
                                "name" => $patientRecord->fname." ".$patientRecord->lname,
    
                                "patient_response_1" => $callScriptRecord->patient_response_1,
                                
                                "patient_response_2" => $callScriptRecord->patient_response_2,
                                
                                "patient_response_3" => $callScriptRecord->patient_response_3,
                                
                                "patient_response_4" => $callScriptRecord->patient_response_4,
                                
                                "patient_response_5" => $callScriptRecord->patient_response_5,
                                
                                "patient_response_6" => $callScriptRecord->patient_response_6,
                                
                                "patient_response_7" => $callScriptRecord->patient_response_7,

                                "call_doctor_or_er_response" => $callScriptRecord->call_doctor_or_er_response,
                                "routine_monitoring_response" => $callScriptRecord->routine_monitoring_response,
                                "red_flags_response" => $callScriptRecord->red_flags_response,
                                "enhertu_effects_response" => $callScriptRecord->enhertu_effects_response,
                                "patient_understanding_response" => $callScriptRecord->patient_understanding_response,
                                "action_needed_response" => $callScriptRecord->action_needed_response,

                            ];
                            $counter++;
                        }else{
                            $callScript_report[$counter] = [
                                "account_no" => $patientRecord->account_no,
                                "name" => $patientRecord->fname." ".$patientRecord->lname,
                                "patient_response_1" =>"",
                                
                                "patient_response_2" =>"",
                                
                                "patient_response_3" =>"",
                                
                                "patient_response_4" =>"",
                                
                                "patient_response_5" =>"",
                                "patient_response_6" =>"",
                                "patient_response_7" =>"",
                                "call_doctor_or_er_response" =>"",
                                "routine_monitoring_response" =>"",
                                "red_flags_response" =>"",
                                "enhertu_effects_response" =>"",
                                "patient_understanding_response" =>"",
                                "action_needed_response" =>"",


                            ];
                            $counter++;
                        }
                        
                    }
                }else{
                    $callScript_report =  null;
                }

            //}

            return view('report.download_gen', [
                'records' => $callScript_report,
                'fileName' => 'callScript',
            ]);
        
        }else{
            return redirect(route('home'));
        }
        
    }

    public function download_cancer($from, $to){
        if(Auth::user()->role>1){
            $toDate = null;
            $fromDate = null;
            $cancer_report = [];
            $counter = 1;
            
            if($this->isDate($to)){
                $toDate = $to;
            }
            if($this->isDate($from)){
                $fromDate = $from;
            }
            if(isset($toDate) && isset($fromDate)){
                $patientRecords = Patient::latest()
                ->where('created_at','>=',$fromDate)
                ->where('created_at','<=',$toDate)
                ->get();
            }else{
                $patientRecords = null;
            }

                if($patientRecords->count()){
                    foreach ($patientRecords as $patientRecord) {
                        $cancer_report[0] = [
                            'Account No',
                            'Patient Name',
                            'current_diagnosis',
                            'diagnosis_date',
                            'last_name',
                            'had_surgery',
                            'surgery_date',
                            'surgeon_name',
                            'surgeon_phone',
                            'what_surgery',
                            'surgery_recovered',
                            'surgery_complication',
                            'surgery_complication_explain',
                            'had_radiation',
                            'radiation_date',
                            'radiologist_name',
                            'radiologist_phone',
                            'radiation_treatment',
                            'radiation_recovered',
                            'radiation_complications',
                            'radiation_complication_explain',
                            'primary_physician_name',
                            'primary_physician_contact',
                            'oncologist_name',
                            'oncologist_phone',
                            'physician_1_name',
                            'physician_1_speciality',
                            'physician_2_name',
                            'physician_2_speciality',
                            'physician_3_name',
                            'physician_3_speciality',
                            'physician_4_name',
                            'physician_4_speciality',
                            'allergy_1',
                            'allergy_1_reaction',
                            'allergy_2',
                            'allergy_2_reaction',
                            'allergy_3',
                            'allergy_3_reaction',
                            'allergy_4',
                            'allergy_4_reaction',
                            'primary_worry',
                            'issue_began',
                            'in_pain',
                            'pain_location',
                            'pain_treatment',
                            'pain_treatment_change',
                            'pain_begin_trend',
                            'pain_occurence',
                            'pain_worst',
                            'curr_symptoms',
                            'pain_descr',
                            'other_health_concerns',
                           
                        ];
                        $cancerRecord = Cancer::where('patient_id', $patientRecord->id)->first();
                        $pain_descr = "";


                        if($cancerRecord){
                            $painDescriptions = json_decode($cancerRecord->pain_descr);

                            foreach($painDescriptions as $painDescription){
                                $pain_descr = $pain_descr.$painDescription." ";
                            }

                            $cancer_report[$counter] = [
                                "account_no" => $patientRecord->account_no,
                                "name" => $patientRecord->fname." ".$patientRecord->lname,
    
                                "current_diagnosis" => $cancerRecord->current_diagnosis,
                                "diagnosis_date" => $cancerRecord->diagnosis_date,
                                "last_name" => $cancerRecord->last_name,
                                "had_surgery" => $cancerRecord->had_surgery,
                                "surgery_date" => $cancerRecord->surgery_date,
                                "surgeon_name" => $cancerRecord->surgeon_name,
                                "surgeon_phone" => $cancerRecord->surgeon_phone,
                                "what_surgery" => $cancerRecord->what_surgery,
                                "surgery_recovered" => $cancerRecord->surgery_recovered,
                                "surgery_complication" => $cancerRecord->surgery_complication,
                                "surgery_complication_explain" => $cancerRecord->surgery_complication_explain,
                                "had_radiation" => $cancerRecord->had_radiation,
                                "radiation_date" => $cancerRecord->radiation_date,
                                "radiologist_name" => $cancerRecord->radiologist_name,
                                "radiologist_phone" => $cancerRecord->radiologist_phone,
                                "radiation_treatment" => $cancerRecord->radiation_treatment,
                                "radiation_recovered" => $cancerRecord->radiation_recovered,
                                "radiation_complications" => $cancerRecord->radiation_complications,
                                "radiation_complication_explain" => $cancerRecord->radiation_complication_explain,
                                "primary_physician_name" => $cancerRecord->primary_physician_name,
                                "primary_physician_contact" => $cancerRecord->primary_physician_contact,
                                "oncologist_name" => $cancerRecord->oncologist_name,
                                "oncologist_phone" => $cancerRecord->oncologist_phone,
                                "physician_1_name" => $cancerRecord->physician_1_name,
                                "physician_1_speciality" => $cancerRecord->physician_1_speciality,
                                "physician_2_name" => $cancerRecord->physician_2_name,
                                "physician_2_speciality" => $cancerRecord->physician_2_speciality,
                                "physician_3_name" => $cancerRecord->physician_3_name,
                                "physician_3_speciality" => $cancerRecord->physician_3_speciality,
                                "physician_4_name" => $cancerRecord->physician_4_name,
                                "physician_4_speciality" => $cancerRecord->physician_4_speciality,
                                "allergy_1" => $cancerRecord->allergy_1,
                                "allergy_1_reaction" => $cancerRecord->allergy_1_reaction,
                                "allergy_2" => $cancerRecord->allergy_2,
                                "allergy_2_reaction" => $cancerRecord->allergy_2_reaction,
                                "allergy_3" => $cancerRecord->allergy_3,
                                "allergy_3_reaction" => $cancerRecord->allergy_3_reaction,
                                "allergy_4" => $cancerRecord->allergy_4,
                                "allergy_4_reaction" => $cancerRecord->allergy_4_reaction,
                                "primary_worry" => $cancerRecord->primary_worry,
                                "issue_began" => $cancerRecord->issue_began,
                                "in_pain" => $cancerRecord->in_pain,
                                "pain_location" => $cancerRecord->pain_location,
                                "pain_treatment" => $cancerRecord->pain_treatment,
                                "pain_treatment_change" => $cancerRecord->pain_treatment_change,
                                "pain_begin_trend" => $cancerRecord->pain_begin_trend,
                                "pain_occurence" => $cancerRecord->pain_occurence,
                                "pain_worst" => $cancerRecord->pain_worst,
                                "curr_symptoms" => $cancerRecord->curr_symptoms,
                                "pain_descr" => $pain_descr,

                            ];
                            $counter++;
                        }else{
                            $cancer_report[$counter] = [
                                "account_no" => $patientRecord->account_no,
                                "name" => $patientRecord->fname." ".$patientRecord->lname,

                                'current_diagnosis' =>'',
                                'diagnosis_date' =>'',
                                'last_name' =>'',
                                'had_surgery' =>'',
                                'surgery_date' =>'',
                                'surgeon_name' =>'',
                                'surgeon_phone' =>'',
                                'what_surgery' =>'',
                                'surgery_recovered' =>'',
                                'surgery_complication' =>'',
                                'surgery_complication_explain' =>'',
                                'had_radiation' =>'',
                                'radiation_date' =>'',
                                'radiologist_name' =>'',
                                'radiologist_phone' =>'',
                                'radiation_treatment' =>'',
                                'radiation_recovered' =>'',
                                'radiation_complications' =>'',
                                'radiation_complication_explain' =>'',
                                'primary_physician_name' =>'',
                                'primary_physician_contact' =>'',
                                'oncologist_name' =>'',
                                'oncologist_phone' =>'',
                                'physician_1_name' =>'',
                                'physician_1_speciality' =>'',
                                'physician_2_name' =>'',
                                'physician_2_speciality' =>'',
                                'physician_3_name' =>'',
                                'physician_3_speciality' =>'',
                                'physician_4_name' =>'',
                                'physician_4_speciality' =>'',
                                'allergy_1' =>'',
                                'allergy_1_reaction' =>'',
                                'allergy_2' =>'',
                                'allergy_2_reaction' =>'',
                                'allergy_3' =>'',
                                'allergy_3_reaction' =>'',
                                'allergy_4' =>'',
                                'allergy_4_reaction' =>'',
                                'primary_worry' =>'',
                                'issue_began' =>'',
                                'in_pain' =>'',
                                'pain_location' =>'',
                                'pain_treatment' =>'',
                                'pain_treatment_change' =>'',
                                'pain_begin_trend' =>'',
                                'pain_occurence' =>'',
                                'pain_worst' =>'',
                                'curr_symptoms' =>'',
                                'pain_descr' =>'',
                                'other_health_concerns' =>'',

                            ];
                            $counter++;
                        }
                        
                    }
                }else{
                    $cancer_report =  null;
                }

            //}

            return view('report.download_gen', [
                'records' => $cancer_report,
                'fileName' => 'cancer',
            ]);
        
        }else{
            return redirect(route('home'));
        }
        
    }

    public function download_ct4her($from, $to){
        if(Auth::user()->role>1){
            $toDate = null;
            $fromDate = null;
            $ct4her_report = [];
            $counter = 1;
            
        
            if($this->isDate($to)){
                $toDate = $to;
            }
            if($this->isDate($from)){
                $fromDate = $from;
            }
            if(isset($toDate) && isset($fromDate)){
                $ct4herRecords = Ct4her::latest()
                ->where('created_at','>=',$fromDate)
                ->where('created_at','<=',$toDate)
                ->get();
            }else{
                $ct4hers = null;
            }


            if($ct4herRecords->count()){
                foreach ($ct4herRecords as $ct4herRecord) {
                    $ct4her_report[0] = [
                        // "account_no" => $ct4herRecord->ct4her_account_no,
                        "facility_name" => $ct4herRecord->facility_name,

                        'Facility_Email_Address',
                        'Facility_Contact_Person',
                        'Facility_Contact_Person_Phone',
                        'Facility_Contact_Person_Email_Address',
                        'Facility_Type',
                        'Other_Facility_Type',
                        
                        'physician_name',
                        "physician_phone" ,
                        "physician_speciality",

                        "patient_account",
                        "patient_name" ,

                        'Breast_Cancer_Confirmed',
                        'Diagnosis_Date',
                        'Cancer_Stage',
                        'Tumor_Burden',
                        'Biomarkers_Initiation',
                        'Chemotherapy',
                        'Chemo_Details',
                        'Surgery',
                        'Surgery_Details',
                        'Post_Treatment',
                        'Post_Treatment_Details',
                        'Enhertu_Duration',
                        'Liver_Function',
                        'Renal_Function',
                        'Cardiac_Function',
                        'Lab_Report_Attached',
                        'Key_Findings_Lab',
                        'Lab_Report_File',
                        'Hr_Ct_Scan_Attached',
                        'Key_Findings_Hr_Ct_Scan',
                        'Hr_Ct_Scan_File',
                        'Price_Ct_Scan',
                        'Insuarance_Provider',
                        'Insuarance_Level',
                        'Insuarance_Policy_No',
                        'Insuarance_Cover_Details',
                        'Ct_Scan_Coverage',
                        'Lab_Coverage',
                        'Cost_Of_Care_Estimate',
                        'Consent_File',
                        'Comments_Concerns',


                        ];

                    $physician = PractitionerPre::find($ct4herRecord->physician_id);
                    $patient = Patient::find($ct4herRecord->patient_id);
                    

                    $ct4her_report[$counter] = [
                        // "account_no" => $ct4herRecord->ct4her_account_no,
                        "facility_name" => $ct4herRecord->facility_name,

                        'facility_email_address' => $ct4herRecord->facility_email_address,
                        'facility_contact_person' => $ct4herRecord->facility_contact_person,
                        'facility_contact_person_phone' => $ct4herRecord->facility_contact_person_phone,
                        'facility_contact_person_email_address' => $ct4herRecord->facility_contact_person_email_address,
                        'facility_type' => $ct4herRecord->facility_type,
                        'other_facility_type' => $ct4herRecord->other_facility_type,
                        
                        "physician_name" => $physician->pract_name,
                        "physician_phone" => $physician->pract_mobile_phone,
                        "physician_speciality" => $physician->pract_speciality,

                        "patient_account" => $patient->account_no,
                        "patient_name" => $patient->fname." ".$patient->lname,

                        'breast_cancer_confirmed' => $ct4herRecord->breast_cancer_confirmed,
                        'diagnosis_date' => $ct4herRecord->diagnosis_date,
                        'cancer_stage' => $ct4herRecord->cancer_stage,
                        'tumor_burden' => $ct4herRecord->tumor_burden,
                        'biomarkers_initiation' => $ct4herRecord->biomarkers_initiation,
                        'chemotherapy' => $ct4herRecord->chemotherapy,
                        'chemo_details' => $ct4herRecord->chemo_details,
                        'surgery' => $ct4herRecord->surgery,
                        'surgery_details' => $ct4herRecord->surgery_details,
                        'post_treatment' => $ct4herRecord->post_treatment,
                        'post_treatment_details' => $ct4herRecord->post_treatment_details,
                        'enhertu_duration' => $ct4herRecord->enhertu_duration,
                        'liver_function' => $ct4herRecord->liver_function,
                        'renal_function' => $ct4herRecord->renal_function,
                        'cardiac_function' => $ct4herRecord->cardiac_function,
                        'lab_report_attached' => $ct4herRecord->lab_report_attached,
                        'key_findings_lab' => $ct4herRecord->key_findings_lab,
                        'lab_report_file' => $ct4herRecord->lab_report_file,
                        'hr_ct_scan_attached' => $ct4herRecord->hr_ct_scan_attached,
                        'key_findings_hr_ct_scan' => $ct4herRecord->key_findings_hr_ct_scan,
                        'hr_ct_scan_file' => $ct4herRecord->hr_ct_scan_file,
                        'price_ct_scan' => $ct4herRecord->price_ct_scan,
                        'insuarance_provider' => $ct4herRecord->insuarance_provider,
                        'insuarance_level' => $ct4herRecord->insuarance_level,
                        'insuarance_policy_no' => $ct4herRecord->insuarance_policy_no,
                        'insuarance_cover_details' => $ct4herRecord->insuarance_cover_details,
                        'ct_scan_coverage' => $ct4herRecord->ct_scan_coverage,
                        'lab_coverage' => $ct4herRecord->lab_coverage,
                        'cost_of_care_estimate' => $ct4herRecord->cost_of_care_estimate,
                        'consent_file' => $ct4herRecord->consent_file,
                        'comments_concerns' => $ct4herRecord->comments_concerns,
                        
                    ];
                    $counter++;
                    }
                }else{
                    $ct4her_report =  null;
                }

            // }

            return view('report.download_gen', [
                'records' => $ct4her_report,
                'fileName' => 'Ct4her',
            ]);
        
        }else{
            return redirect(route('home'));
        }
        
    }
    public function download_adverse($from, $to){
        if(Auth::user()->role>1){
            $toDate = null;
            $fromDate = null;
            $adverse_report = [];
            $counter = 1;
            
            if($this->isDate($to)){
                $toDate = $to;
            }
            if($this->isDate($from)){
                $fromDate = $from;
            }
            if(isset($toDate) && isset($fromDate)){
                $adverseRecords = AdverseEvents::latest()
                ->where('created_at','>=',$fromDate)
                ->where('created_at','<=',$toDate)
                ->get();
            }else{
                $adverse = null;
            }
            if($adverseRecords->count()){
                foreach ($adverseRecords as $adverseRecord) {
                    $adverse_report[0] = [
                        'Account_no',
                        'Patient_name',
                        'Facility_Name',
                        'Adverse_Drug_Reaction',
                        'Adr_Details',
                        'Dropouts',
                        'Dropout_Reason',
                        'Mental_Health',
                        'Other_Mental_Health',

                    ];

                    $patient = Patient::find($adverseRecord->patient_id);
                    $facility = Ct4her::find($adverseRecord->facility_id);

                    if($adverseRecord){
                        $adverse_report[$counter] = [
                            "account_no" => $patient->account_no,
                            "patient_name" => $patient->fname." ".$patient->lname,
                            'facility_name' => $facility->facility_name,
                            'adverse_drug_reaction' => $adverseRecord->adverse_drug_reaction,
                            'adr_details' => $adverseRecord->adr_details,
                            'dropouts' => $adverseRecord->dropouts,
                            'dropout_reason' => $adverseRecord->dropout_reason,
                            'mental_health' => $adverseRecord->mental_health,
                            'other_mental_health' => $adverseRecord->other_mental_health,

                        ];
                        $counter++;
                    }
                    
                }
            }else{
                $adverse_report =  null;
            }


            return view('report.download_gen', [
                'records' => $adverse_report,
                'fileName' => 'adverse',
            ]);
        
        }else{
            return redirect(route('home'));
        }
        
    }
   
    
}
