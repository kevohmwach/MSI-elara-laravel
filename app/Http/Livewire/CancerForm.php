<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Cancer;

class CancerForm extends Component
{
    use WithFileUploads;
    
    public $current_diagnosis;
    public $diagnosis_date;
    public $last_name;
    public $had_surgery;
    public $surgery_date;
    public $surgeon_name;
    public $surgeon_phone;
    public $what_surgery;
    public $surgery_recovered;
    public $surgery_complication;
    public $surgery_complication_explain;
    public $had_radiation;
    public $radiation_date;
    public $radiologist_name;
    public $radiologist_phone;
    public $radiation_treatment;
    public $radiation_recovered;
    public $radiation_complications;
    public $radiation_complication_explain;
    public $primary_physician_name;
    public $primary_physician_contact;
    public $oncologist_name;
    public $oncologist_phone;
    public $physician_1_name;
    public $physician_1_speciality;
    public $physician_2_name;
    public $physician_2_speciality;
    public $physician_3_name;
    public $physician_3_speciality;
    public $physician_4_name;
    public $physician_4_speciality;
    public $allergy_1;
    public $allergy_1_reaction;
    public $allergy_2;
    public $allergy_2_reaction;
    public $allergy_3;
    public $allergy_3_reaction;
    public $allergy_4;
    public $allergy_4_reaction;
    // public $dose_n_sig_1;
    // public $dose_n_sig_1_medication;
    // public $dose_n_sig_2;
    // public $dose_n_sig_2_medication;
    // public $dose_n_sig_3;
    // public $dose_n_sig_3_medication;
    // public $dose_n_sig_4;
    // public $dose_n_sig_4_medication;
    public $primary_worry;
    public $issue_began;
    public $in_pain;
    public $pain_location;
    public $pain_treatment;
    public $pain_treatment_change;
    public $pain_begin_trend;
    public $pain_occurence;
    public $pain_worst;
    public $curr_symptoms;
    public $pain_descr = [];
    public $other_health_concerns;

    
    
    
    public $totalSteps = 4;
    public $currentStep = 1;
    public $method;
    public $patient_id;
    public $patient;
    public $diagnosis_data;

    public function mount($method, $patient_id, $diagnosis_data){
        $this->currentStep = 1;
        $this->method = $method;
        $this->patient_id = $patient_id;
        $this->diagnosis_data = $diagnosis_data;

        if($method=='update'){
            //$this->patient = Cancer::find($patient_id);
            $this->patient = Cancer::where('patient_id', $patient_id)->first();
            if($this->patient->id){
                $this->current_diagnosis = $this->patient->current_diagnosis;
                $this->diagnosis_date = $this->patient->diagnosis_date;
                $this->last_name = $this->patient->last_name;
                $this->had_surgery = $this->patient->had_surgery;
                $this->surgery_date = $this->patient->surgery_date;
                $this->surgeon_name = $this->patient->surgeon_name;
                $this->surgeon_phone = $this->patient->surgeon_phone;
                $this->what_surgery = $this->patient->what_surgery;
                $this->surgery_recovered = $this->patient->surgery_recovered;
                $this->surgery_complication = $this->patient->surgery_complication;
                $this->surgery_complication_explain = $this->patient->surgery_complication_explain;
                $this->had_radiation = $this->patient->had_radiation;
                $this->radiation_date = $this->patient->radiation_date;
                $this->radiologist_name = $this->patient->radiologist_name;
                $this->radiologist_phone = $this->patient->radiologist_phone;
                $this->radiation_treatment = $this->patient->radiation_treatment;
                $this->radiation_recovered = $this->patient->radiation_recovered;
                $this->radiation_complications = $this->patient->radiation_complications;
                $this->radiation_complication_explain = $this->patient->radiation_complication_explain;
                $this->primary_physician_name = $this->patient->primary_physician_name;
                $this->primary_physician_contact = $this->patient->primary_physician_contact;
                $this->oncologist_name = $this->patient->oncologist_name;
                $this->oncologist_phone = $this->patient->oncologist_phone;
                $this->physician_1_name = $this->patient->physician_1_name;
                $this->physician_1_speciality = $this->patient->physician_1_speciality;
                $this->physician_2_name = $this->patient->physician_2_name;
                $this->physician_2_speciality = $this->patient->physician_2_speciality;
                $this->physician_3_name = $this->patient->physician_3_name;
                $this->physician_3_speciality = $this->patient->physician_3_speciality;
                $this->physician_4_name = $this->patient->physician_4_name;
                $this->physician_4_speciality = $this->patient->physician_4_speciality;
                $this->allergy_1 = $this->patient->allergy_1;
                $this->allergy_1_reaction = $this->patient->allergy_1_reaction;
                $this->allergy_2 = $this->patient->allergy_2;
                $this->allergy_2_reaction = $this->patient->allergy_2_reaction;
                $this->allergy_3 = $this->patient->allergy_3;
                $this->allergy_3_reaction = $this->patient->allergy_3_reaction;
                $this->allergy_4 = $this->patient->allergy_4;
                $this->allergy_4_reaction = $this->patient->allergy_4_reaction;
                // $this->dose_n_sig_1 = $this->patient->dose_n_sig_1;
                // $this->dose_n_sig_1_medication = $this->patient->dose_n_sig_1_medication;
                // $this->dose_n_sig_2 = $this->patient->dose_n_sig_2;
                // $this->dose_n_sig_2_medication = $this->patient->dose_n_sig_2_medication;
                // $this->dose_n_sig_3 = $this->patient->dose_n_sig_3;
                // $this->dose_n_sig_3_medication = $this->patient->dose_n_sig_3_medication;
                // $this->dose_n_sig_4 = $this->patient->dose_n_sig_4;
                // $this->dose_n_sig_4_medication = $this->patient->dose_n_sig_4_medication;
                $this->primary_worry = $this->patient->primary_worry;
                $this->issue_began = $this->patient->issue_began;
                $this->in_pain = $this->patient->in_pain;
                $this->pain_location = $this->patient->pain_location;
                $this->pain_treatment = $this->patient->pain_treatment;
                $this->pain_treatment_change = $this->patient->pain_treatment_change;
                $this->pain_begin_trend = $this->patient->pain_begin_trend;
                $this->pain_occurence = $this->patient->pain_occurence;
                $this->pain_worst = $this->patient->pain_worst;
                $this->curr_symptoms = $this->patient->curr_symptoms;
                $this->pain_descr = json_decode($this->patient->pain_descr);
                $this->other_health_concerns = $this->patient->other_health_concerns;
            }
        }
    }

    public function render()
    {
        return view('livewire.cancer-form');
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
                'current_diagnosis'=>'',
                'diagnosis_date'=>'',
                'last_name'=>'',
                'had_surgery'=>'',
                'surgery_date'=>'',
                'surgeon_name'=>'',
                'surgeon_phone'=>'',
                'what_surgery'=>'',
                'surgery_recovered'=>'',
                'surgery_complication'=>'',
                'surgery_complication_explain'=>'',
                'had_radiation'=>'',
                'radiation_date'=>'',
                'radiologist_name'=>'',
                'radiologist_phone'=>'',
                'radiation_treatment'=>'',
                'radiation_recovered'=>'',
                'radiation_complications'=>'',
                'radiation_complication_explain'=>'',
                
            ]);
        }
        else if($this->currentStep == 2){
            $this->validate([
                'primary_physician_name'=>'',
                'primary_physician_contact'=>'',
                'oncologist_name'=>'',
                'oncologist_phone'=>'',
                'physician_1_name'=>'',
                'physician_1_speciality'=>'',
                'physician_2_name'=>'',
                'physician_2_speciality'=>'',
                'physician_3_name'=>'',
                'physician_3_speciality'=>'',
                'physician_4_name'=>'',
                'physician_4_speciality'=>'',
            ]);
      }
      else if($this->currentStep == 3){
            $this->validate([
                'allergy_1'=>'',
                'allergy_1_reaction'=>'',
                'allergy_2'=>'',
                'allergy_2_reaction'=>'',
                'allergy_3'=>'',
                'allergy_3_reaction'=>'',
                'allergy_4'=>'',
                'allergy_4_reaction'=>'',
            ]);
        }
        else if($this->currentStep == 4){
            $this->validate([
                'primary_worry'=>'',
                'issue_began'=>'',
                'in_pain'=>'',
                'pain_location'=>'',
                'pain_treatment'=>'',
                'pain_treatment_change'=>'',
                'pain_begin_trend'=>'',
                'pain_occurence'=>'',
                'pain_worst'=>'',
                'curr_symptoms'=>'',
                'pain_descr'=>'',
                'other_health_concerns'=>'',
            ]);
        }
        else if($this->currentStep == 5){
            $this->validate([
                // 'primary_worry'=>'',
                // 'issue_began'=>'',
                // 'in_pain'=>'',
                // 'pain_location'=>'',
                // 'pain_treatment'=>'',
                // 'pain_treatment_change'=>'',
                // 'pain_begin_trend'=>'',
                // 'pain_occurence'=>'',
                // 'pain_worst'=>'',
                // 'curr_symptoms'=>'',
                // 'pain_descr'=>'',
                // 'other_health_concerns'=>'',
            ]);
        }
    }



    public function register(){
       
        $data = array(
            'patient_id'=>$this->patient_id,
            'current_diagnosis' =>$this->current_diagnosis,
            'diagnosis_date' =>$this->diagnosis_date,
            'last_name' =>$this->last_name,
            'had_surgery' =>$this->had_surgery,
            'surgery_date' =>$this->surgery_date,
            'surgeon_name' =>$this->surgeon_name,
            'surgeon_phone' =>$this->surgeon_phone,
            'what_surgery' =>$this->what_surgery,
            'surgery_recovered' =>$this->surgery_recovered,
            'surgery_complication' =>$this->surgery_complication,
            'surgery_complication_explain' =>$this->surgery_complication_explain,
            'had_radiation' =>$this->had_radiation,
            'radiation_date' =>$this->radiation_date,
            'radiologist_name' =>$this->radiologist_name,
            'radiologist_phone' =>$this->radiologist_phone,
            'radiation_treatment' =>$this->radiation_treatment,
            'radiation_recovered' =>$this->radiation_recovered,
            'radiation_complications' =>$this->radiation_complications,
            'radiation_complication_explain' =>$this->radiation_complication_explain,
            'primary_physician_name' =>$this->primary_physician_name,
            'primary_physician_contact' =>$this->primary_physician_contact,
            'oncologist_name' =>$this->oncologist_name,
            'oncologist_phone' =>$this->oncologist_phone,
            'physician_1_name' =>$this->physician_1_name,
            'physician_1_speciality' =>$this->physician_1_speciality,
            'physician_2_name' =>$this->physician_2_name,
            'physician_2_speciality' =>$this->physician_2_speciality,
            'physician_3_name' =>$this->physician_3_name,
            'physician_3_speciality' =>$this->physician_3_speciality,
            'physician_4_name' =>$this->physician_4_name,
            'physician_4_speciality' =>$this->physician_4_speciality,
            'allergy_1' =>$this->allergy_1,
            'allergy_1_reaction' =>$this->allergy_1_reaction,
            'allergy_2' =>$this->allergy_2,
            'allergy_2_reaction' =>$this->allergy_2_reaction,
            'allergy_3' =>$this->allergy_3,
            'allergy_3_reaction' =>$this->allergy_3_reaction,
            'allergy_4' =>$this->allergy_4,
            'allergy_4_reaction' =>$this->allergy_4_reaction,
            // 'dose_n_sig_1' =>$this->dose_n_sig_1,
            // 'dose_n_sig_1_medication' =>$this->dose_n_sig_1_medication,
            // 'dose_n_sig_2' =>$this->dose_n_sig_2,
            // 'dose_n_sig_2_medication' =>$this->dose_n_sig_2_medication,
            // 'dose_n_sig_3' =>$this->dose_n_sig_3,
            // 'dose_n_sig_3_medication' =>$this->dose_n_sig_3_medication,
            // 'dose_n_sig_4' =>$this->dose_n_sig_4,
            // 'dose_n_sig_4_medication' =>$this->dose_n_sig_4_medication,
            'primary_worry' =>$this->primary_worry,
            'issue_began' =>$this->issue_began,
            'in_pain' =>$this->in_pain,
            'pain_location' =>$this->pain_location,
            'pain_treatment' =>$this->pain_treatment,
            'pain_treatment_change' =>$this->pain_treatment_change,
            'pain_begin_trend' =>$this->pain_begin_trend,
            'pain_occurence' =>$this->pain_occurence,
            'pain_worst' =>$this->pain_worst,
            'curr_symptoms' =>$this->curr_symptoms,
            'pain_descr' =>json_encode($this->pain_descr),
            'other_health_concerns' =>$this->other_health_concerns,
        );

        auth()->user()->cancer()->create($data);
        //$this->reset();
        // $this->currentStep = 1;
        return $this->redirectRoute('patient');

    }

    public function update(){
        //$patientData = Cancer::find($this->patient_id);
        $patientData = Cancer::where('patient_id', $this->patient_id)->first();
        if($patientData){
            $patientData->current_diagnosis = $this->current_diagnosis;
            $patientData->diagnosis_date = $this->diagnosis_date;
            $patientData->last_name = $this->last_name;
            $patientData->had_surgery = $this->had_surgery;
            $patientData->surgery_date = $this->surgery_date;
            $patientData->surgeon_name = $this->surgeon_name;
            $patientData->surgeon_phone = $this->surgeon_phone;
            $patientData->what_surgery = $this->what_surgery;
            $patientData->surgery_recovered = $this->surgery_recovered;
            $patientData->surgery_complication = $this->surgery_complication;
            $patientData->surgery_complication_explain = $this->surgery_complication_explain;
            $patientData->had_radiation = $this->had_radiation;
            $patientData->radiation_date = $this->radiation_date;
            $patientData->radiologist_name = $this->radiologist_name;
            $patientData->radiologist_phone = $this->radiologist_phone;
            $patientData->radiation_treatment = $this->radiation_treatment;
            $patientData->radiation_recovered = $this->radiation_recovered;
            $patientData->radiation_complications = $this->radiation_complications;
            $patientData->radiation_complication_explain = $this->radiation_complication_explain;
            $patientData->primary_physician_name = $this->primary_physician_name;
            $patientData->primary_physician_contact = $this->primary_physician_contact;
            $patientData->oncologist_name = $this->oncologist_name;
            $patientData->oncologist_phone = $this->oncologist_phone;
            $patientData->physician_1_name = $this->physician_1_name;
            $patientData->physician_1_speciality = $this->physician_1_speciality;
            $patientData->physician_2_name = $this->physician_2_name;
            $patientData->physician_2_speciality = $this->physician_2_speciality;
            $patientData->physician_3_name = $this->physician_3_name;
            $patientData->physician_3_speciality = $this->physician_3_speciality;
            $patientData->physician_4_name = $this->physician_4_name;
            $patientData->physician_4_speciality = $this->physician_4_speciality;
            $patientData->allergy_1 = $this->allergy_1;
            $patientData->allergy_1_reaction = $this->allergy_1_reaction;
            $patientData->allergy_2 = $this->allergy_2;
            $patientData->allergy_2_reaction = $this->allergy_2_reaction;
            $patientData->allergy_3 = $this->allergy_3;
            $patientData->allergy_3_reaction = $this->allergy_3_reaction;
            $patientData->allergy_4 = $this->allergy_4;
            $patientData->allergy_4_reaction = $this->allergy_4_reaction;
            // $patientData->dose_n_sig_1 = $this->dose_n_sig_1;
            // $patientData->dose_n_sig_1_medication = $this->dose_n_sig_1_medication;
            // $patientData->dose_n_sig_2 = $this->dose_n_sig_2;
            // $patientData->dose_n_sig_2_medication = $this->dose_n_sig_2_medication;
            // $patientData->dose_n_sig_3 = $this->dose_n_sig_3;
            // $patientData->dose_n_sig_3_medication = $this->dose_n_sig_3_medication;
            // $patientData->dose_n_sig_4 = $this->dose_n_sig_4;
            // $patientData->dose_n_sig_4_medication = $this->dose_n_sig_4_medication;
            $patientData->primary_worry = $this->primary_worry;
            $patientData->issue_began = $this->issue_began;
            $patientData->in_pain = $this->in_pain;
            $patientData->pain_location = $this->pain_location;
            $patientData->pain_treatment = $this->pain_treatment;
            $patientData->pain_treatment_change = $this->pain_treatment_change;
            $patientData->pain_begin_trend = $this->pain_begin_trend;
            $patientData->pain_occurence = $this->pain_occurence;
            $patientData->pain_worst = $this->pain_worst;
            $patientData->curr_symptoms = $this->curr_symptoms;
            $patientData->pain_descr = json_encode($this->pain_descr);
            $patientData->other_health_concerns = $this->other_health_concerns;

            $patientData->save();
            // $this->reset();
            // $this->currentStep = 1;
            return $this->redirectRoute('patient');
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
