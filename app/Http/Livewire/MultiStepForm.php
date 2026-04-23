<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Patient;

class MultiStepForm extends Component
{
    use WithFileUploads;

    public $fname;
    public $lname;
    public $birth_date;
    public $gender;
    public $address;
    public $address_code;
    public $physical_address;
    public $county;
    public $phone;
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


    public $totalSteps = 4;
    public $currentStep = 1;
    public $lastEntry_id;

    public $practitioner_data;

    public function mount($practitioner_data){
        $this->currentStep = 1;
        $this->practitioner_data = $practitioner_data;
    }

    
    
    public function render()
    {
        return view('livewire.multi-step-form');
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
                // 'physician_id_1'=>'',
                'pharmacist_id_1' => '',
                'pharmacist_id_2' => '',
                'ct_scan_file' => 'required|mimes:pdf',
                'x_ray_file' => 'required|mimes:pdf',
                'patient_consent_file' => 'required|mimes:pdf',
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



    public function register(){
        $lastID=0;
        $lastEntry = Patient::latest()->limit(1)->get()->toArray();
        if($lastEntry){
            $lastID=$lastEntry[0]['id'];
        }

        // $labAttachmentRequired=false;
        // $ctScanAttachmentRequired=false;
        $x_ray_file_name = '';
        $ct_scan_file_name = '';
        $patient_consent_file_name = '';
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
            $x_ray_file_name = 'x_ray_'.rand(10,1000)."_".$this->x_ray_file->getClientOriginalName();
            $upload_ray_file = $this->x_ray_file->storeAs('X_ray', $x_ray_file_name);
        }
        if($this->ct_scan_file ){
            $ct_scan_file_name = 'ct_scan_'.rand(10,1000)."_".$this->ct_scan_file->getClientOriginalName();
            $upload_ct_scan_file = $this->ct_scan_file->storeAs('CT_Scan', $ct_scan_file_name);
        }
        if($this->patient_consent_file ){
            $patient_consent_file_name = 'patient_consent_'.rand(10,1000)."_".$this->patient_consent_file->getClientOriginalName();
            $upload_patient_consent_file = $this->patient_consent_file->storeAs('patient_consent', $patient_consent_file_name);
        }
        if(( $upload_ct_scan_file && $upload_ray_file &&$upload_patient_consent_file) ){
            $data = array(
                "account_no"=>"ELH-".str_pad(++$lastID, 4, '0', STR_PAD_LEFT),
                "fname"=>$this->fname,
                "lname"=>$this->lname,
                "birth_date"=>$this->birth_date,
                "gender"=>$this->gender,
                "address"=>$this->address,
                "address_code"=>$this->address_code,
                "physical_address"=>$this->physical_address,
                "county"=>$this->county,
                "mobile_contact"=>$this->mobile_contact,
                "alt_contact"=>$this->alt_contact,
                "id_no"=>$this->id_no,
                "email"=>$this->email,
                "ethinicity"=>$this->ethinicity,
                "weight"=>$this->weight,
                "height"=>$this->height,
                "language"=>json_encode($this->language),
                "other_language"=>$this->other_language,
                "marital"=>$this->marital,
                "spouse_name"=>$this->spouse_name,
                "spouse_phone"=>$this->spouse_phone,
                "emergency_contact_name"=>$this->emergency_contact_name,
                "emergency_contact_rel"=>$this->emergency_contact_rel,
                "emergency_contact_email"=>$this->emergency_contact_email,
                "emergency_contact_mobile"=>$this->emergency_contact_mobile,
                "emergency_contact_alt_mobile"=>$this->emergency_contact_alt_mobile,
                "physician_id_1"=>$this->physician_id_1,
                'physician_id_2' =>$this->physician_id_2,
                'pharmacist_id_1' =>$this->pharmacist_id_1,
                'pharmacist_id_2' =>$this->pharmacist_id_2,

                // 'ct_scan_file' => $this->ct_scan_file_name,
                // 'x_ray_file' => $this->x_ray_file_name,
                // 'patient_consent_file' =>$this->patient_consent_file,

                'ct_scan_file' => $ct_scan_file_name,
                'x_ray_file' => $x_ray_file_name,
                'patient_consent_file' =>$patient_consent_file_name,
                'dose_n_sig_1' =>$this->dose_n_sig_1,
                'dose_n_sig_1_medication' =>$this->dose_n_sig_1_medication,
                'dose_n_sig_2' =>$this->dose_n_sig_2,
                'dose_n_sig_2_medication' =>$this->dose_n_sig_2_medication,
                'dose_n_sig_3' =>$this->dose_n_sig_3,
                'dose_n_sig_3_medication' =>$this->dose_n_sig_3_medication,
                'dose_n_sig_4' =>$this->dose_n_sig_4,
                'dose_n_sig_4_medication' =>$this->dose_n_sig_4_medication,
                'dose_n_sig_4_quantity' =>$this->dose_n_sig_4_quantity,
                'dose_n_sig_4_units' =>$this->dose_n_sig_4_units,
                'dose_n_sig_4_administration' =>$this->dose_n_sig_4_administration,
                'dose_n_sig_4_frequency' =>$this->dose_n_sig_4_frequency,
                'dose_n_sig_4_tabs_freq' =>$this->dose_n_sig_4_tabs_freq,
                'dose_n_sig_3_quantity' =>$this->dose_n_sig_3_quantity,
                'dose_n_sig_3_units' =>$this->dose_n_sig_3_units,
                'dose_n_sig_3_administration' =>$this->dose_n_sig_3_administration,
                'dose_n_sig_3_frequency' =>$this->dose_n_sig_3_frequency,
                'dose_n_sig_3_tabs_freq' =>$this->dose_n_sig_3_tabs_freq,
                'dose_n_sig_2_quantity' =>$this->dose_n_sig_2_quantity,
                'dose_n_sig_2_units' =>$this->dose_n_sig_2_units,
                'dose_n_sig_2_administration' =>$this->dose_n_sig_2_administration,
                'dose_n_sig_2_frequency' =>$this->dose_n_sig_2_frequency,
                'dose_n_sig_2_tabs_freq' =>$this->dose_n_sig_2_tabs_freq,
                'dose_n_sig_1_quantity' =>$this->dose_n_sig_1_quantity,
                'dose_n_sig_1_units' =>$this->dose_n_sig_1_units,
                'dose_n_sig_1_administration' =>$this->dose_n_sig_1_administration,
                'dose_n_sig_1_frequency' =>$this->dose_n_sig_1_frequency,
                'dose_n_sig_1_tabs_freq' =>$this->dose_n_sig_1_tabs_freq,

            );

            $patientExists = Patient::where('id_no',$this->id_no)
                ->orWhere('email',$this->email)
                ->get();
            if( $patientExists->count() ){
                //Patient exists
                dd("Email or ID exists ...");
            }else{
                auth()->user()->patient()->create($data);
                //$this->reset();
                // $this->currentStep = 1;
                return $this->redirectRoute('patient');
            }
           
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
