<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Patient;
use App\Models\PractitionerPre;

class MultiStepFormUpdate extends Component
{
    
    use WithFileUploads;

    public $patient;
    public $practitioner_data;
    public $patientId;
    public $fname;
    public $lname;
    public $birth_date;
    public $gender;
    public $address;
    public $address_code;
    public $physical_address;
    public $county;
    public $mobile_contact;
    public $alt_contact;
    public $id_no;
    public $email;
    public $ethinicity;
    public $weight;
    public $height;
    public $language = [];
    public $other_language;
    public $marital;
    public $spouse_name;
    public $spouse_phone;
    public $emergency_contact_name;
    public $emergency_contact_rel;
    public $emergency_contact_email;
    public $emergency_contact_mobile;
    public $emergency_contact_alt_mobile;
    // public $physician_id;
    public $ct_scan_file;
    public $x_ray_file;
    public $dose_n_sig_1;
    public $dose_n_sig_1_medication;
    public $dose_n_sig_2;
    public $dose_n_sig_2_medication;
    public $dose_n_sig_3;
    public $dose_n_sig_3_medication;
    public $dose_n_sig_4;
    public $dose_n_sig_4_medication;

    public $patient_consent_file;
    public $physician_id_1;
    public $physician_id_2;
    public $pharmacist_id_1;
    public $pharmacist_id_2;
    public $dose_n_sig_4_quantity;
    public $dose_n_sig_4_units;
    public $dose_n_sig_4_administration;
    public $dose_n_sig_4_frequency;
    public $dose_n_sig_4_tabs_freq;
    public $dose_n_sig_3_quantity;
    public $dose_n_sig_3_units;
    public $dose_n_sig_3_administration;
    public $dose_n_sig_3_frequency;
    public $dose_n_sig_3_tabs_freq;
    public $dose_n_sig_2_quantity;
    public $dose_n_sig_2_units;
    public $dose_n_sig_2_administration;
    public $dose_n_sig_2_frequency;
    public $dose_n_sig_2_tabs_freq;
    public $dose_n_sig_1_quantity;
    public $dose_n_sig_1_units;
    public $dose_n_sig_1_administration;
    public $dose_n_sig_1_frequency;
    public $dose_n_sig_1_tabs_freq;

    public $x_ray_file_name = '';
    public $ct_scan_file_name = '';

    public $totalSteps = 4;
    public $currentStep = 1;

    public function mount($patient_id, $practitioner_data){
        $this->currentStep = 1;
        $this->patientId = $patient_id;
        $this->patient = Patient::find($patient_id);
        $this->practitioner_data = $practitioner_data;

        $this->fname = $this->patient->fname;
        $this->lname = $this->patient->lname;
        $this->birth_date = $this->patient->birth_date;
        $this->gender = $this->patient->gender;
        $this->address = $this->patient->address;
        $this->address_code = $this->patient->address_code;
        $this->physical_address = $this->patient->physical_address;
        $this->county = $this->patient->county;
        $this->mobile_contact = $this->patient->mobile_contact;
        $this->alt_contact = $this->patient->alt_contact;
        $this->id_no = $this->patient->id_no;
        $this->email = $this->patient->email;
        $this->ethinicity = $this->patient->ethinicity;
        $this->weight = $this->patient->weight;
        $this->height = $this->patient->height;
        $this->language = json_decode($this->patient->language);
        $this->other_language = $this->patient->other_language;
        $this->marital = $this->patient->marital;
        $this->spouse_name = $this->patient->spouse_name;
        $this->spouse_phone = $this->patient->spouse_phone;
        $this->emergency_contact_name = $this->patient->emergency_contact_name;
        $this->emergency_contact_rel = $this->patient->emergency_contact_rel;
        $this->emergency_contact_email = $this->patient->emergency_contact_email;
        $this->emergency_contact_mobile = $this->patient->emergency_contact_mobile;
        $this->emergency_contact_alt_mobile = $this->patient->emergency_contact_alt_mobile;
        $this->physician_id_1 = $this->patient->physician_id_1;
        $this->physician_id_2 = $this->patient->physician_id_2;
        $this->pharmacist_id_1 = $this->patient->pharmacist_id_1;
        $this->pharmacist_id_2 = $this->patient->pharmacist_id_2;

        // $this->ct_scan_file = $this->patient->ct_scan_file;
        // $this->x_ray_file = $this->patient->x_ray_file;
        // $this->patient_consent_file = $this->patient->patient_consent_file;
        $this->dose_n_sig_1 = $this->patient->dose_n_sig_1;
        $this->dose_n_sig_1_medication = $this->patient->dose_n_sig_1_medication;
        $this->dose_n_sig_2 = $this->patient->dose_n_sig_2;
        $this->dose_n_sig_2_medication = $this->patient->dose_n_sig_2_medication;
        $this->dose_n_sig_3 = $this->patient->dose_n_sig_3;
        $this->dose_n_sig_3_medication = $this->patient->dose_n_sig_3_medication;
        $this->dose_n_sig_4 = $this->patient->dose_n_sig_4;
        $this->dose_n_sig_4_medication = $this->patient->dose_n_sig_4_medication;
        $this->dose_n_sig_4_quantity = $this->patient->dose_n_sig_4_quantity;

        $this->dose_n_sig_4_units = $this->patient->dose_n_sig_4_units;
        $this->dose_n_sig_4_administration = $this->patient->dose_n_sig_4_administration;
        $this->dose_n_sig_4_frequency = $this->patient->dose_n_sig_4_frequency;
        $this->dose_n_sig_4_tabs_freq = $this->patient->dose_n_sig_4_tabs_freq;
        $this->dose_n_sig_3_quantity = $this->patient->dose_n_sig_3_quantity;
        $this->dose_n_sig_3_units = $this->patient->dose_n_sig_3_units;
        $this->dose_n_sig_3_administration = $this->patient->dose_n_sig_3_administration;
        $this->dose_n_sig_3_frequency = $this->patient->dose_n_sig_3_frequency;
        $this->dose_n_sig_3_tabs_freq = $this->patient->dose_n_sig_3_tabs_freq;
        $this->dose_n_sig_2_quantity = $this->patient->dose_n_sig_2_quantity;
        $this->dose_n_sig_2_units = $this->patient->dose_n_sig_2_units;
        $this->dose_n_sig_2_administration = $this->patient->dose_n_sig_2_administration;
        $this->dose_n_sig_2_frequency = $this->patient->dose_n_sig_2_frequency;
        $this->dose_n_sig_2_tabs_freq = $this->patient->dose_n_sig_2_tabs_freq;
        $this->dose_n_sig_1_quantity = $this->patient->dose_n_sig_1_quantity;
        $this->dose_n_sig_1_units = $this->patient->dose_n_sig_1_units;
        $this->dose_n_sig_1_administration = $this->patient->dose_n_sig_1_administration;
        $this->dose_n_sig_1_frequency = $this->patient->dose_n_sig_1_frequency;
        $this->dose_n_sig_1_tabs_freq = $this->patient->dose_n_sig_1_tabs_freq;


    }
    
    public function render()
    {
        return view('livewire.multi-step-form-update');
    }

    public function increaseStep(){
        $this->resetErrorBag();
        $this->validateData();
         $this->currentStep++;
         if($this->currentStep > $this->totalSteps){
             $this->currentStep = $this->totalSteps;
         }
    }

    public function decreaseStep(){
        $this->resetErrorBag();
        $this->currentStep--;
        if($this->currentStep < 1){
            $this->currentStep = 1;
        }
    }

    public function validateData(){

        if($this->currentStep == 1){
            $this->validate([
                'fname'=>'required|string',
                'lname'=>'required|string',
                'birth_date'=>'required|date',
                'gender'=>'required|string',
                'address'=>'required|string',
                'address_code'=>'required|string',
                'physical_address'=>'required|string',
                'county'=>'required|string',
                'mobile_contact'=>'required|numeric|digits:10',
                'alt_contact'=>'',
                'id_no'=>'required|numeric',
                'email'=>'required|string',
                'ethinicity'=>'required|string',
                'weight'=>'required|numeric',
                'height'=>'required|numeric',
                'language'=>'required|array',
                'other_language'=>'',
                'marital'=>'required|string',
                'spouse_name'=>'',
                'spouse_phone'=>'',
            ]);
        }
        else if($this->currentStep == 2){
            $this->validate([
                'emergency_contact_name'=>'required|string',
                'emergency_contact_rel'=>'required|string',
                'emergency_contact_email'=>'required|string',
                'emergency_contact_mobile'=>'required|string',
                'emergency_contact_alt_mobile'=>'',
                'physician_id_1'=>'required|string',
                'physician_id_2'=>'',
                // 'physician_id_1'=>'required|string',
                'pharmacist_id_1' => '',
                'pharmacist_id_2' => '',
                'ct_scan_file' => '',
                'x_ray_file' => '',
                'patient_consent_file' => '',
            ]);
        }

        else if($this->currentStep == 3){
            $this->validate([
                'dose_n_sig_1'=>'required|string',
                'dose_n_sig_1_medication'=>'required|string',
                'dose_n_sig_1_quantity'=>'required|string',
                'dose_n_sig_1_units'=>'required|string',
                'dose_n_sig_1_administration'=>'required|string',
                'dose_n_sig_1_frequency'=>'required|string',
                'dose_n_sig_1_tabs_freq'=>'required|string',

                'dose_n_sig_2'=>'',
                'dose_n_sig_2_medication'=>'',
                'dose_n_sig_2_quantity'=>'',
                'dose_n_sig_2_units'=>'',
                'dose_n_sig_2_administration'=>'',
                'dose_n_sig_2_frequency'=>'',
                'dose_n_sig_2_tabs_freq'=>'',

                'dose_n_sig_3'=>'',
                'dose_n_sig_3_medication'=>'',
                'dose_n_sig_3_quantity'=>'',
                'dose_n_sig_3_units'=>'',
                'dose_n_sig_3_administration'=>'',
                'dose_n_sig_3_frequency'=>'',
                'dose_n_sig_3_tabs_freq'=>'',

                'dose_n_sig_4'=>'',
                'dose_n_sig_4_medication'=>'',
                'dose_n_sig_4_quantity'=>'',
                'dose_n_sig_4_units'=>'',
                'dose_n_sig_4_administration'=>'',
                'dose_n_sig_4_frequency'=>'',
                'dose_n_sig_4_tabs_freq'=>'',

            ]);
        }

    }
    public function update(){

        $patientData = Patient::find($this->patientId);
        $upload_ray_file = null;
        $upload_ct_scan_file = null;
        $upload_patient_consent_file =null;

        // if($this->lab_report_attached == 'Yes'){
        //     $labAttachmentRequired=true;

        // }
        // if($this->hr_ct_scan_attached == 'Yes'){
        //     $ctScanAttachmentRequired=true;
        // }

        if($this->x_ray_file){
            $this->x_ray_file_name = 'x_ray_'.rand(10,1000)."_".$this->x_ray_file->getClientOriginalName();
            $upload_x_ray_file = $this->x_ray_file->storeAs('X_ray',$this->x_ray_file_name);
        }else{
            $this->x_ray_file_name = $patientData->x_ray_file;
            $upload_x_ray_file = true;
        }
        if($this->ct_scan_file ){
            $this->ct_scan_file_name = 'ct_scan_'.rand(10,1000)."_".$this->ct_scan_file->getClientOriginalName();
            $upload_ct_scan_file = $this->ct_scan_file->storeAs('CT_Scan', $this->ct_scan_file_name);
        }else{
            $this->ct_scan_file_name = $patientData->ct_scan_file;
            $upload_ct_scan_file = true;
        }
        if($this->patient_consent_file ){
            $patient_consent_file_name = 'patient_consent_'.rand(10,1000)."_".$this->patient_consent_file->getClientOriginalName();
            $upload_patient_consent_file = $this->patient_consent_file->storeAs('patient_consent', $patient_consent_file_name);
        }else{
            $this->patient_consent_file = $patientData->patient_consent_file;
            $upload_patient_consent_file = true;
        }

        if(( $upload_ct_scan_file && $upload_x_ray_file && $upload_patient_consent_file) ){
            $patientData->fname =$this->fname;
            $patientData->lname = $this->lname;
            $patientData->birth_date = $this->birth_date;
            $patientData->gender = $this->gender;
            $patientData->address = $this->address;
            $patientData->address_code = $this->address_code;
            $patientData->physical_address = $this->physical_address;
            $patientData->county = $this->county;
            $patientData->mobile_contact = $this->mobile_contact;
            $patientData->alt_contact = $this->alt_contact;
            $patientData->id_no = $this->id_no;
            $patientData->email = $this->email;
            $patientData->ethinicity = $this->ethinicity;
            $patientData->weight = $this->weight;
            $patientData->height = $this->height;
            $patientData->language = json_encode($this->language);
            $patientData->other_language = $this->other_language;
            $patientData->marital = $this->marital;
            $patientData->spouse_name = $this->spouse_name;
            $patientData->spouse_phone = $this->spouse_phone;
            $patientData->emergency_contact_name = $this->emergency_contact_name;
            $patientData->emergency_contact_rel = $this->emergency_contact_rel;
            $patientData->emergency_contact_email = $this->emergency_contact_email;
            $patientData->emergency_contact_mobile = $this->emergency_contact_mobile;
            $patientData->emergency_contact_alt_mobile = $this->emergency_contact_alt_mobile;
            $patientData->physician_id_1 = $this->physician_id_1;
            $patientData->physician_id_2 = $this->physician_id_2;
            $patientData->pharmacist_id_1 = $this->pharmacist_id_1;
            $patientData->pharmacist_id_2 = $this->pharmacist_id_2;

            $patientData->ct_scan_file = $this->ct_scan_file_name;
            $patientData->x_ray_file = $this->x_ray_file_name;
            $patientData->patient_consent_file = $this->patient_consent_file;

            $patientData->dose_n_sig_1 = $this->dose_n_sig_1;
            $patientData->dose_n_sig_1_medication = $this->dose_n_sig_1_medication;
            $patientData->dose_n_sig_2 = $this->dose_n_sig_2;
            $patientData->dose_n_sig_2_medication = $this->dose_n_sig_2_medication;
            $patientData->dose_n_sig_3 = $this->dose_n_sig_3;
            $patientData->dose_n_sig_3_medication = $this->dose_n_sig_3_medication;
            $patientData->dose_n_sig_4 = $this->dose_n_sig_4;
            $patientData->dose_n_sig_4_medication = $this->dose_n_sig_4_medication;

            $patientData->dose_n_sig_4_quantity = $this->dose_n_sig_4_quantity;
            $patientData->dose_n_sig_4_units = $this->dose_n_sig_4_units;
            $patientData->dose_n_sig_4_administration = $this->dose_n_sig_4_administration;
            $patientData->dose_n_sig_4_frequency = $this->dose_n_sig_4_frequency;
            $patientData->dose_n_sig_4_tabs_freq = $this->dose_n_sig_4_tabs_freq;
            $patientData->dose_n_sig_3_quantity = $this->dose_n_sig_3_quantity;
            $patientData->dose_n_sig_3_units = $this->dose_n_sig_3_units;
            $patientData->dose_n_sig_3_administration = $this->dose_n_sig_3_administration;
            $patientData->dose_n_sig_3_frequency = $this->dose_n_sig_3_frequency;
            $patientData->dose_n_sig_3_tabs_freq = $this->dose_n_sig_3_tabs_freq;
            $patientData->dose_n_sig_2_quantity = $this->dose_n_sig_2_quantity;
            $patientData->dose_n_sig_2_units = $this->dose_n_sig_2_units;
            $patientData->dose_n_sig_2_administration = $this->dose_n_sig_2_administration;
            $patientData->dose_n_sig_2_frequency = $this->dose_n_sig_2_frequency;
            $patientData->dose_n_sig_2_tabs_freq = $this->dose_n_sig_2_tabs_freq;
            $patientData->dose_n_sig_1_quantity = $this->dose_n_sig_1_quantity;
            $patientData->dose_n_sig_1_units = $this->dose_n_sig_1_units;
            $patientData->dose_n_sig_1_administration = $this->dose_n_sig_1_administration;
            $patientData->dose_n_sig_1_frequency = $this->dose_n_sig_1_frequency;
            $patientData->dose_n_sig_1_tabs_freq = $this->dose_n_sig_1_tabs_freq;


            $patientData->save();

            // $this->reset();
            return $this->redirectRoute('patient');
            //$this->currentStep = 1;


        }
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
}
