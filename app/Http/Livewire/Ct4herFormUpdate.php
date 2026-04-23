<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Ct4her;

class Ct4herFormUpdate extends Component
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
    public $ct4her_id;
    public $ct4her;
    public $insurance_data;
    public $dropout_data;
    public $patient_data;
    public $physician_data;

    public function mount($ct4her_id,$insurance_data, $dropout_data, $patient_data, $physician_data){
        $this->currentStep = 1;
        $this->ct4her_id = $ct4her_id;
        $this->insurance_data = $insurance_data;
        $this->dropout_data = $dropout_data;
        $this->patient_data = $patient_data;
        $this->physician_data = $physician_data;
        $this->ct4her = Ct4her::find($ct4her_id);


        $this->facility_name = $this->ct4her->facility_name;
        $this->facility_email_address = $this->ct4her->facility_email_address;
        $this->facility_contact_person = $this->ct4her->facility_contact_person;
        $this->facility_contact_person_phone = $this->ct4her->facility_contact_person_phone;
        $this->facility_contact_person_email_address = $this->ct4her->facility_contact_person_email_address;
        $this->facility_type = $this->ct4her->facility_type;
        $this->other_facility_type = $this->ct4her->other_facility_type;

        $this->physician_id = $this->ct4her->physician_id;
        // $this->physician_name = $this->ct4her->physician_name;
        // $this->physician_title = $this->ct4her->physician_title;
        // $this->other_physician_title = $this->ct4her->other_physician_title;
        // $this->physician_license_no = $this->ct4her->physician_license_no;
        // $this->physician_phone = $this->ct4her->physician_phone;
        // $this->physician_email = $this->ct4her->physician_email;
        // $this->physician_expr_years = $this->ct4her->physician_expr_years;
        
        $this->patient_id = $this->ct4her->patient_id;
        // $this->patient_name = $this->ct4her->patient_name;
        // $this->patient_unique_id = $this->ct4her->patient_unique_id;
        // $this->patient_birth_date = $this->ct4her->patient_birth_date;
        // $this->patient_gender = $this->ct4her->patient_gender;

        $this->breast_cancer_confirmed = $this->ct4her->breast_cancer_confirmed;
        $this->diagnosis_date = $this->ct4her->diagnosis_date;
        $this->cancer_stage = $this->ct4her->cancer_stage;
        $this->tumor_burden = $this->ct4her->tumor_burden;
        $this->biomarkers_initiation = $this->ct4her->biomarkers_initiation;
        $this->chemotherapy = $this->ct4her->chemotherapy;
        $this->chemo_details = $this->ct4her->chemo_details;
        $this->surgery = $this->ct4her->surgery;
        $this->surgery_details = $this->ct4her->surgery_details;
        $this->post_treatment = $this->ct4her->post_treatment;
        $this->post_treatment_details = $this->ct4her->post_treatment_details;
        $this->enhertu_duration = $this->ct4her->enhertu_duration;
        $this->liver_function = $this->ct4her->liver_function;
        $this->renal_function = $this->ct4her->renal_function;
        $this->cardiac_function = $this->ct4her->cardiac_function;
        $this->lab_report_attached = $this->ct4her->lab_report_attached;
        $this->key_findings_lab = $this->ct4her->key_findings_lab;
        //$this->lab_report_file = $this->ct4her->lab_report_file;
        $this->hr_ct_scan_attached = $this->ct4her->hr_ct_scan_attached;
        $this->key_findings_hr_ct_scan = $this->ct4her->key_findings_hr_ct_scan;
        //$this->hr_ct_scan_file = $this->ct4her->hr_ct_scan_file;
        $this->price_ct_scan = $this->ct4her->price_ct_scan;
        $this->insuarance_provider = $this->ct4her->insuarance_provider;
        $this->insuarance_level = $this->ct4her->insuarance_level;
        $this->insuarance_policy_no = $this->ct4her->insuarance_policy_no;
        $this->insuarance_cover_details = $this->ct4her->insuarance_cover_details;
        $this->ct_scan_coverage = $this->ct4her->ct_scan_coverage;
        $this->lab_coverage = $this->ct4her->lab_coverage;
        $this->cost_of_care_estimate = $this->ct4her->cost_of_care_estimate;
        // $this->adverse_drug_reaction = $this->ct4her->adverse_drug_reaction;
        // $this->adr_details = $this->ct4her->adr_details;
        // $this->dropouts = $this->ct4her->dropouts;
        // $this->dropout_reason = $this->ct4her->dropout_reason;
        // $this->other_dropout_reasons = $this->ct4her->other_dropout_reasons;
        // $this->mental_health = $this->ct4her->mental_health;
        // $this->other_mental_health = $this->ct4her->other_mental_health;

        // $this->consent_file = $this->ct4her->consent_file;
        $this->comments_concerns = $this->ct4her->comments_concerns;

    }

    public function render()
    {
        return view('livewire.ct4her-form-update');
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

    public function update(){
       
        $ct4herData = Ct4her::find($this->ct4her_id);

        $labAttachmentRequired=false;
        $ctScanAttachmentRequired=false;
        $lab_report_file_name = '';
        $hr_ct_scan_file_name = '';
        $upload_lab_report_file = null;
        $upload_hr_ct_scan_file = null;

        $consent_file_attached = false;

        
        $consent_file_name = '';
        $upload_consent_file = null;

       
        if($this->lab_report_file){
            $lab_report_file_name = 'lab_report_'.rand(10,100)."_".$this->lab_report_file->getClientOriginalName();
            $upload_lab_report_file = $this->lab_report_file->storeAs('LabReports', $lab_report_file_name);
        }
        if($this->hr_ct_scan_file){
            $hr_ct_scan_file_name = 'hr_ct_scan_'.rand(10,100)."_".$this->hr_ct_scan_file->getClientOriginalName();
            $upload_hr_ct_scan_file = $this->hr_ct_scan_file->storeAs('LabReports', $hr_ct_scan_file_name);
        }
        if($this->consent_file ){
            $consent_file_name = 'consent_'.rand(10,100)."_".$this->consent_file->getClientOriginalName();
            $upload_consent_file = $this->consent_file->storeAs('Consent', $consent_file_name);
            $consent_file_attached = true;
        }else{
            $consent_file_name = $ct4herData->consent_file;
        }

        if($this->lab_report_attached == 'Yes'){
            $labAttachmentRequired=true;

        }
        if($this->hr_ct_scan_attached == 'Yes'){
            $ctScanAttachmentRequired=true;
        }
        if(($labAttachmentRequired && $upload_lab_report_file) || !$labAttachmentRequired ){

            if(($ctScanAttachmentRequired && $upload_hr_ct_scan_file) || !$ctScanAttachmentRequired ){

                if($upload_consent_file ||  !$consent_file_attached){
                    // dd('helloo');
                    $ct4herData->facility_name = $this->facility_name;
                    $ct4herData->facility_email_address = $this->facility_email_address;
                    $ct4herData->facility_contact_person = $this->facility_contact_person;
                    $ct4herData->facility_contact_person_phone = $this->facility_contact_person_phone;
                    $ct4herData->facility_contact_person_email_address = $this->facility_contact_person_email_address;
                    $ct4herData->facility_type = $this->facility_type;
                    $ct4herData->other_facility_type = $this->other_facility_type;

                    $ct4herData->physician_id = $this->physician_id;
                    // $ct4herData->physician_name = $this->physician_name;
                    // $ct4herData->physician_title = $this->physician_title;
                    // $ct4herData->other_physician_title = $this->other_physician_title;
                    // $ct4herData->physician_license_no = $this->physician_license_no;
                    // $ct4herData->physician_phone = $this->physician_phone;
                    // $ct4herData->physician_email = $this->physician_email;
                    // $ct4herData->physician_expr_years = $this->physician_expr_years;

                    $ct4herData->patient_id = $this->patient_id;
                    // $ct4herData->patient_name = $this->patient_name;
                    // $ct4herData->patient_unique_id = $this->patient_unique_id;
                    // $ct4herData->patient_birth_date = $this->patient_birth_date;
                    // $ct4herData->patient_gender = $this->patient_gender;
                    $ct4herData->breast_cancer_confirmed = $this->breast_cancer_confirmed;
                    $ct4herData->diagnosis_date = $this->diagnosis_date;
                    $ct4herData->cancer_stage = $this->cancer_stage;
                    $ct4herData->tumor_burden = $this->tumor_burden;
                    $ct4herData->biomarkers_initiation = $this->biomarkers_initiation;
                    $ct4herData->chemotherapy = $this->chemotherapy;
                    $ct4herData->chemo_details = $this->chemo_details;
                    $ct4herData->surgery = $this->surgery;
                    $ct4herData->surgery_details = $this->surgery_details;
                    $ct4herData->post_treatment = $this->post_treatment;
                    $ct4herData->post_treatment_details = $this->post_treatment_details;
                    $ct4herData->enhertu_duration = $this->enhertu_duration;
                    $ct4herData->liver_function = $this->liver_function;
                    $ct4herData->renal_function = $this->renal_function;
                    $ct4herData->cardiac_function = $this->cardiac_function;
                    $ct4herData->lab_report_attached = $this->lab_report_attached;
                    $ct4herData->key_findings_lab = $this->key_findings_lab;
                    $ct4herData->lab_report_file = $lab_report_file_name;
                    $ct4herData->hr_ct_scan_attached = $this->hr_ct_scan_attached;
                    $ct4herData->key_findings_hr_ct_scan = $this->key_findings_hr_ct_scan;
                    $ct4herData->hr_ct_scan_file = $hr_ct_scan_file_name;
                    $ct4herData->price_ct_scan = $this->price_ct_scan;
                    $ct4herData->insuarance_provider = $this->insuarance_provider;
                    $ct4herData->insuarance_level = $this->insuarance_level;
                    $ct4herData->insuarance_policy_no = $this->insuarance_policy_no;
                    $ct4herData->insuarance_cover_details = $this->insuarance_cover_details;
                    $ct4herData->ct_scan_coverage = $this->ct_scan_coverage;
                    $ct4herData->lab_coverage = $this->lab_coverage;
                    $ct4herData->cost_of_care_estimate = $this->cost_of_care_estimate;
                    // $ct4herData->adverse_drug_reaction = $this->adverse_drug_reaction;
                    // $ct4herData->adr_details = $this->adr_details;
                    // $ct4herData->dropouts = $this->dropouts;
                    // $ct4herData->dropout_reason = $this->dropout_reason;
                    // $ct4herData->other_dropout_reasons = $this->other_dropout_reasons;
                    // $ct4herData->mental_health = $this->mental_health;
                    // $ct4herData->other_mental_health = $this->other_mental_health;

                    $ct4herData->consent_file = $consent_file_name;
                    $ct4herData->comments_concerns = $this->comments_concerns;


                    $ct4herData->save();

                    // $this->reset();
                    // $this->currentStep = 1;
                    return $this->redirectRoute('ct4her');
                }else{
                    echo "Consent FIle upload failed ";
                }
                
            }else{
                echo "Please attach CT SCAN Report or choose file not attached ";
            }
        }else{
            echo "Please attach Lab Report or choose file not attached ";
        }
        

    }
    
}
