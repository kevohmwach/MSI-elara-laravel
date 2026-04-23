<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Ct4her;

class Ct4herForm extends Component
{
    use WithFileUploads;

    public $facility_name;
    public $facility_email_address;
    public $facility_contact_person;
    public $facility_contact_person_phone;
    public $facility_contact_person_email_address;
    public $facility_type;
    public $other_facility_type;

    public $physician_id;
    // public $physician_name;
    // public $physician_title;
    // public $other_physician_title;
    // public $physician_license_no;
    // public $physician_phone;
    // public $physician_email;
    // public $physician_expr_years;

    public $patient_id;
    // public $patient_name;
    // public $patient_unique_id;
    // public $patient_birth_date;
    // public $patient_gender;

    public $breast_cancer_confirmed;
    public $diagnosis_date;
    public $cancer_stage;
    public $tumor_burden;
    public $biomarkers_initiation;
    public $chemotherapy;
    public $chemo_details;
    public $surgery;
    public $surgery_details;
    public $post_treatment;
    public $post_treatment_details;
    public $enhertu_duration;
    public $liver_function;
    public $renal_function;
    public $cardiac_function;
    public $lab_report_attached;
    public $key_findings_lab;
    public $lab_report_file;
    public $hr_ct_scan_attached;
    public $key_findings_hr_ct_scan;
    public $hr_ct_scan_file;
    public $price_ct_scan;
    public $insuarance_provider;
    public $insuarance_level;
    public $insuarance_policy_no;
    public $insuarance_cover_details;
    public $ct_scan_coverage;
    public $lab_coverage;
    public $cost_of_care_estimate;
    // public $adverse_drug_reaction;
    // public $adr_details;
    // public $dropouts;
    // public $dropout_reason;
    // public $other_dropout_reasons;
    // public $mental_health;
    // public $other_mental_health;
    public $consent_file;
    public $comments_concerns;
    
    public $totalSteps = 5;
    public $currentStep = 1;
    public $method;
    // public $patient_id;
    public $patient;
    public $insurance_data;
    public $dropout_data;
    public $patient_data;
    public $physician_data;

    public function mount($insurance_data, $dropout_data, $patient_data, $physician_data){
        $this->currentStep = 1;
        $this->insurance_data = $insurance_data;
        $this->dropout_data = $dropout_data;
        $this->patient_data = $patient_data;
        $this->physician_data = $physician_data;
    }

    public function render()
    {
        return view('livewire.ct4her-form');
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
        //dd($this->diagnosis_date);
        if($this->currentStep == 1){
            $this->validate([
                'facility_name'=>'',
                'facility_email_address'=>'',
                'facility_contact_person'=>'',
                'facility_contact_person_phone'=>'',
                'facility_contact_person_email_address'=>'',
                'facility_type'=>'',
                'other_facility_type'=>'',
            ]);
        }
        else if($this->currentStep == 2){
            $this->validate([
                'physician_id'=>'required|int',
                // 'physician_name'=>'',
                // 'physician_title'=>'',
                // 'other_physician_title'=>'',
                // 'physician_license_no'=>'',
                // 'physician_phone'=>'',
                // 'physician_email'=>'',
                // 'physician_expr_years'=>'',
            ]);
      }
      else if($this->currentStep == 3){
            $this->validate([
                'patient_id'=>'required|int',

                // 'patient_name'=>'',
                // 'patient_unique_id'=>'',
                // 'patient_birth_date'=>'',
                // 'patient_gender'=>'',
                'breast_cancer_confirmed'=>'',
                'diagnosis_date'=>'',
                'cancer_stage'=>'',
                'tumor_burden'=>'',
                'biomarkers_initiation'=>'',
                'chemotherapy'=>'',
                'chemo_details'=>'',
                'surgery'=>'',
                'surgery_details'=>'',
                'post_treatment'=>'',
                'post_treatment_details'=>'',
                'enhertu_duration'=>'',
                'liver_function'=>'',
                'renal_function'=>'',
                'cardiac_function'=>'',
                'lab_report_attached'=>'',
                'key_findings_lab'=>'',
                'lab_report_file'=>'',
                'hr_ct_scan_attached'=>'',
                'key_findings_hr_ct_scan'=>'',
                'hr_ct_scan_file'=>'',
                'price_ct_scan'=>'',
            ]);
        }
        else if($this->currentStep == 4){
            $this->validate([
                'insuarance_provider'=>'',
                'insuarance_level'=>'',
                'insuarance_policy_no'=>'',
                'insuarance_cover_details'=>'',
                'ct_scan_coverage'=>'',
                'lab_coverage'=>'',
                'cost_of_care_estimate'=>'',
            ]);
        }
        // else if($this->currentStep == 5){
        //     $this->validate([
        //         // 'adverse_drug_reaction'=>'',
        //         // 'adr_details'=>'',
        //         // 'dropouts'=>'',
        //         // 'dropout_reason'=>'',
        //         // 'other_dropout_reasons'=>'',
        //         // 'mental_health'=>'',
        //         // 'other_mental_health'=>'',
        //     ]);
        // }
        else if($this->currentStep == 5){
            $this->validate([
                'consent_file' => '',
                'comments_concerns'=>'',
            ]);
        }
    }



    public function register(){
        $lastID=0;
        $lastEntry = Ct4her::latest()->limit(1)->get()->toArray();

        $ct4her_exists = Ct4her::where('patient_id',$this->patient_id)->first();

        if($lastEntry){
            $lastID=$lastEntry[0]['id'];
        }

        $labAttachmentRequired=false;
        $ctScanAttachmentRequired=false;
        $lab_report_file_name = '';
        $hr_ct_scan_file_name = '';
        $upload_lab_report_file = null;
        $upload_hr_ct_scan_file = null;

        $consent_file_name = '';
        $upload_consent_file = null;

        if($this->lab_report_attached == 'Yes'){
            $labAttachmentRequired=true;

        }
        if($this->hr_ct_scan_attached == 'Yes'){
            $ctScanAttachmentRequired=true;
        }

        if($this->lab_report_file){
            $lab_report_file_name = 'lab_report_'.rand(10,100)."_".$this->lab_report_file->getClientOriginalName();
            $upload_lab_report_file = $this->lab_report_file->storeAs('LabReports', $lab_report_file_name);
        }
        if($this->hr_ct_scan_file ){
            $hr_ct_scan_file_name = 'hr_ct_scan_'.rand(10,100)."_".$this->hr_ct_scan_file->getClientOriginalName();
            $upload_hr_ct_scan_file = $this->hr_ct_scan_file->storeAs('LabReports', $hr_ct_scan_file_name);
        }
        if($this->consent_file ){
            $consent_file_name = 'consent_'.rand(10,100)."_".$this->consent_file->getClientOriginalName();
            $upload_consent_file = $this->consent_file->storeAs('Consent', $consent_file_name);
        }else{
            // dd("Missing ".$this->consent_file);
        }

        if(($labAttachmentRequired && $upload_lab_report_file) || !$labAttachmentRequired ){

            if(($ctScanAttachmentRequired && $upload_hr_ct_scan_file) || !$ctScanAttachmentRequired ){
                if(!$ct4her_exists){
                    $data = array(
                        'ct4her_account_no' =>"ELF-".str_pad(++$lastID, 4, '0', STR_PAD_LEFT),
                        'facility_name' =>$this->facility_name,
                        'facility_email_address' =>$this->facility_email_address,
                        'facility_contact_person' =>$this->facility_contact_person,
                        'facility_contact_person_phone' =>$this->facility_contact_person_phone,
                        'facility_contact_person_email_address' =>$this->facility_contact_person_email_address,
                        'facility_type' =>$this->facility_type,
                        'other_facility_type' =>$this->other_facility_type,
    
                        'physician_id' =>$this->physician_id,
                        // 'physician_name' =>$this->physician_name,
                        // 'physician_title' =>$this->physician_title,
                        // 'other_physician_title' =>$this->other_physician_title,
                        // 'physician_license_no' =>$this->physician_license_no,
                        // 'physician_phone' =>$this->physician_phone,
                        // 'physician_email' =>$this->physician_email,
                        // 'physician_expr_years' =>$this->physician_expr_years,
    
                        'patient_id' =>$this->patient_id,
                        // 'patient_name' =>$this->patient_name,
                        // 'patient_unique_id' =>$this->patient_unique_id,
                        // 'patient_birth_date' =>$this->patient_birth_date,
                        // 'patient_gender' =>$this->patient_gender,
    
                        'breast_cancer_confirmed' =>$this->breast_cancer_confirmed,
                        'diagnosis_date' =>$this->diagnosis_date,
                        'cancer_stage' =>$this->cancer_stage,
                        'tumor_burden' =>$this->tumor_burden,
                        'biomarkers_initiation' =>$this->biomarkers_initiation,
                        'chemotherapy' =>$this->chemotherapy,
                        'chemo_details' =>$this->chemo_details,
                        'surgery' =>$this->surgery,
                        'surgery_details' =>$this->surgery_details,
                        'post_treatment' =>$this->post_treatment,
                        'post_treatment_details' =>$this->post_treatment_details,
                        'enhertu_duration' =>$this->enhertu_duration,
                        'liver_function' =>$this->liver_function,
                        'renal_function' =>$this->renal_function,
                        'cardiac_function' =>$this->cardiac_function,
                        'lab_report_attached' =>$this->lab_report_attached,
                        'key_findings_lab' =>$this->key_findings_lab,
                        'lab_report_file' =>$lab_report_file_name,
                        'hr_ct_scan_attached' =>$this->hr_ct_scan_attached,
                        'key_findings_hr_ct_scan' =>$this->key_findings_hr_ct_scan,
                        'hr_ct_scan_file' =>$hr_ct_scan_file_name,
                        'price_ct_scan' =>$this->price_ct_scan,
                        'insuarance_provider' =>$this->insuarance_provider,
                        'insuarance_level' =>$this->insuarance_level,
    
                        'insuarance_policy_no' =>$this->insuarance_policy_no,
                        'insuarance_cover_details' =>$this->insuarance_cover_details,
                        'ct_scan_coverage' =>$this->ct_scan_coverage,
                        'lab_coverage' =>$this->lab_coverage,
                        'cost_of_care_estimate' =>$this->cost_of_care_estimate,
                        // 'adverse_drug_reaction' =>$this->adverse_drug_reaction,
                        // 'adr_details' =>$this->adr_details,
                        // 'dropouts' =>$this->dropouts,
                        // 'dropout_reason' =>$this->dropout_reason,
                        // 'other_dropout_reasons' =>$this->other_dropout_reasons,
                        // 'mental_health' =>$this->mental_health,
                        // 'other_mental_health' =>$this->other_mental_health,
    
                        'consent_file' => $consent_file_name,
                        'comments_concerns' =>$this->comments_concerns,
                    );
    
                    auth()->user()->ct4her()->create($data);
                    // $this->reset();
                    // $this->currentStep = 1;
                    return $this->redirectRoute('ct4her');

                }else{
                    dd('Similar Patient already Onboarded! Only edit option is available. Note: Pls Confirm whether desired operation or open multiple onboarding');
                }
                        
            }else{
               dd ("Please attach CT SCAN Report or choose file not attached ");
            }
        }else{
            dd ("Please attach Lab Report or choose file not attached ");
        }

    }

}
