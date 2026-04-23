<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\SocialHistory;

class SocialHistoryForm extends Component
{
    use WithFileUploads;

    public $condition_mother;
    public $mother_alive;
    public $mother_deceased_age;
    public $condition_father;
    public $father_alive;
    public $father_deceased_age;
    public $condition_sibling_1;
    public $sibling_1_alive;
    public $sibling_1_deceased_age;
    public $condition_sibling_2;
    public $sibling_2_alive;
    public $sibling_2_deceased_age;
    public $condition_others_1;
    public $others_1_alive;
    public $others_1_deceased_age;
    public $condition_others_2;
    public $others_2_alive;
    public $others_2_deceased_age;
    public $consume_alcohol;
    public $drinks_per_week;
    public $currently_smoke;
    public $cigarettes_per_day;
    public $use_any_other_drug;
    public $any_other_drug;
    public $any_other_drug_frequency;
    public $drink_caffein;
    public $caffein_cups_per_day;
    public $sexually_active;
    public $like_checked_stis;
    public $excercise_frequency;
    public $on_special_diet;
    public $special_diet_type;
    public $pregnancy_plan;
    public $pregnant_now;
    public $contraception_in_use;
    public $last_menstrual_cycle;

    public $totalSteps = 3;
    public $currentStep = 1;
    public $method;
    public $patient_id;
    public $patient;

    public function mount($method, $patient_id){
        $this->currentStep = 1;
        $this->method = $method;
        $this->patient_id = $patient_id;

        if($method=='update'){
            $this->patient = SocialHistory::where('patient_id', $this->patient_id)->first();
            if($this->patient){
                $this->condition_mother = $this->patient->condition_mother;
                $this->mother_alive = $this->patient->mother_alive;
                $this->mother_deceased_age = $this->patient->mother_deceased_age;
                $this->condition_father = $this->patient->condition_father;
                $this->father_alive = $this->patient->father_alive;
                $this->father_deceased_age = $this->patient->father_deceased_age;
                $this->condition_sibling_1 = $this->patient->condition_sibling_1;
                $this->sibling_1_alive = $this->patient->sibling_1_alive;
                $this->sibling_1_deceased_age = $this->patient->sibling_1_deceased_age;
                $this->condition_sibling_2 = $this->patient->condition_sibling_2;
                $this->sibling_2_alive = $this->patient->sibling_2_alive;
                $this->sibling_2_deceased_age = $this->patient->sibling_2_deceased_age;
                $this->condition_others_1 = $this->patient->condition_others_1;
                $this->others_1_alive = $this->patient->others_1_alive;
                $this->others_1_deceased_age = $this->patient->others_1_deceased_age;
                $this->condition_others_2 = $this->patient->condition_others_2;
                $this->others_2_alive = $this->patient->others_2_alive;
                $this->others_2_deceased_age = $this->patient->others_2_deceased_age;
                $this->consume_alcohol = $this->patient->consume_alcohol;
                $this->drinks_per_week = $this->patient->drinks_per_week;
                $this->currently_smoke = $this->patient->currently_smoke;
                $this->cigarettes_per_day = $this->patient->cigarettes_per_day;
                $this->use_any_other_drug = $this->patient->use_any_other_drug;
                $this->any_other_drug = $this->patient->any_other_drug;
                $this->any_other_drug_frequency = $this->patient->any_other_drug_frequency;
                $this->drink_caffein = $this->patient->drink_caffein;
                $this->caffein_cups_per_day = $this->patient->caffein_cups_per_day;
                $this->sexually_active = $this->patient->sexually_active;
                $this->like_checked_stis = $this->patient->like_checked_stis;
                $this->excercise_frequency = $this->patient->excercise_frequency;
                $this->on_special_diet = $this->patient->on_special_diet;
                $this->special_diet_type = $this->patient->special_diet_type;
                $this->pregnancy_plan = $this->patient->pregnancy_plan;
                $this->pregnant_now = $this->patient->pregnant_now;
                $this->contraception_in_use = $this->patient->contraception_in_use;
                $this->last_menstrual_cycle = $this->patient->last_menstrual_cycle;

            }
        }
    }

    public function render()
    {
        return view('livewire.social-history-form');
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
                'condition_mother'=>'',
                'mother_alive'=>'',
                'mother_deceased_age'=>'',
                'condition_father'=>'',
                'father_alive'=>'',
                'father_deceased_age'=>'',
                'condition_sibling_1'=>'',
                'sibling_1_alive'=>'',
                'sibling_1_deceased_age'=>'',
                'condition_sibling_2'=>'',
                'sibling_2_alive'=>'',
                'sibling_2_deceased_age'=>'',
                'condition_others_1'=>'',
                'others_1_alive'=>'',
                'others_1_deceased_age'=>'',
                'condition_others_2'=>'',
                'others_2_alive'=>'',
                'others_2_deceased_age'=>'',
                
            ]);
        }
        elseif($this->currentStep == 2){
            $this->validate([
                'consume_alcohol'=>'',
                'drinks_per_week'=>'',
                'currently_smoke'=>'',
                'cigarettes_per_day'=>'',
                'use_any_other_drug'=>'',
                'any_other_drug'=>'',
                'any_other_drug_frequency'=>'',
                'drink_caffein'=>'',
                'caffein_cups_per_day'=>'',
                'sexually_active'=>'',
                'like_checked_stis'=>'',
                'excercise_frequency'=>'',
                'on_special_diet'=>'',
                'special_diet_type'=>'',
                'pregnancy_plan'=>'',
                'pregnant_now'=>'',
                'contraception_in_use'=>'',
                'last_menstrual_cycle'=>'',
            ]);
        }
    }
    public function register(){
       
        $data = array(
            'patient_id'=>$this->patient_id,
            'condition_mother'=>$this->condition_mother,
            'mother_alive'=>$this->mother_alive,
            'mother_deceased_age'=>$this->mother_deceased_age,
            'condition_father'=>$this->condition_father,
            'father_alive'=>$this->father_alive,
            'father_deceased_age'=>$this->father_deceased_age,
            'condition_sibling_1'=>$this->condition_sibling_1,
            'sibling_1_alive'=>$this->sibling_1_alive,
            'sibling_1_deceased_age'=>$this->sibling_1_deceased_age,
            'condition_sibling_2'=>$this->condition_sibling_2,
            'sibling_2_alive'=>$this->sibling_2_alive,
            'sibling_2_deceased_age'=>$this->sibling_2_deceased_age,
            'condition_others_1'=>$this->condition_others_1,
            'others_1_alive'=>$this->others_1_alive,
            'others_1_deceased_age'=>$this->others_1_deceased_age,
            'condition_others_2'=>$this->condition_others_2,
            'others_2_alive'=>$this->others_2_alive,
            'others_2_deceased_age'=>$this->others_2_deceased_age,
            'consume_alcohol'=>$this->consume_alcohol,
            'drinks_per_week'=>$this->drinks_per_week,
            'currently_smoke'=>$this->currently_smoke,
            'cigarettes_per_day'=>$this->cigarettes_per_day,
            'use_any_other_drug'=>$this->use_any_other_drug,
            'any_other_drug'=>$this->any_other_drug,
            'any_other_drug_frequency'=>$this->any_other_drug_frequency,
            'drink_caffein'=>$this->drink_caffein,
            'caffein_cups_per_day'=>$this->caffein_cups_per_day,
            'sexually_active'=>$this->sexually_active,
            'like_checked_stis'=>$this->like_checked_stis,
            'excercise_frequency'=>$this->excercise_frequency,
            'on_special_diet'=>$this->on_special_diet,
            'special_diet_type'=>$this->special_diet_type,
            'pregnancy_plan'=>$this->pregnancy_plan,
            'pregnant_now'=>$this->pregnant_now,
            'contraception_in_use'=>$this->contraception_in_use,
            'last_menstrual_cycle'=>$this->last_menstrual_cycle,

        );

        auth()->user()->socialhistory()->create($data);
        //$this->reset();
        // $this->currentStep = 1;
        return $this->redirectRoute('patient');

    }
    public function update(){
        $patientData = SocialHistory::where('patient_id', $this->patient_id)->first();
        if($patientData){
            //update data
            $patientData->condition_mother = $this->condition_mother;
            $patientData->mother_alive = $this->mother_alive;
            $patientData->mother_deceased_age = $this->mother_deceased_age;
            $patientData->condition_father = $this->condition_father;
            $patientData->father_alive = $this->father_alive;
            $patientData->father_deceased_age = $this->father_deceased_age;
            $patientData->condition_sibling_1 = $this->condition_sibling_1;
            $patientData->sibling_1_alive = $this->sibling_1_alive;
            $patientData->sibling_1_deceased_age = $this->sibling_1_deceased_age;
            $patientData->condition_sibling_2 = $this->condition_sibling_2;
            $patientData->sibling_2_alive = $this->sibling_2_alive;
            $patientData->sibling_2_deceased_age = $this->sibling_2_deceased_age;
            $patientData->condition_others_1 = $this->condition_others_1;
            $patientData->others_1_alive = $this->others_1_alive;
            $patientData->others_1_deceased_age = $this->others_1_deceased_age;
            $patientData->condition_others_2 = $this->condition_others_2;
            $patientData->others_2_alive = $this->others_2_alive;
            $patientData->others_2_deceased_age = $this->others_2_deceased_age;
            $patientData->consume_alcohol = $this->consume_alcohol;
            $patientData->drinks_per_week = $this->drinks_per_week;
            $patientData->currently_smoke = $this->currently_smoke;
            $patientData->cigarettes_per_day = $this->cigarettes_per_day;
            $patientData->use_any_other_drug = $this->use_any_other_drug;
            $patientData->any_other_drug = $this->any_other_drug;
            $patientData->any_other_drug_frequency = $this->any_other_drug_frequency;
            $patientData->drink_caffein = $this->drink_caffein;
            $patientData->caffein_cups_per_day = $this->caffein_cups_per_day;
            $patientData->sexually_active = $this->sexually_active;
            $patientData->like_checked_stis = $this->like_checked_stis;
            $patientData->excercise_frequency = $this->excercise_frequency;
            $patientData->on_special_diet = $this->on_special_diet;
            $patientData->special_diet_type = $this->special_diet_type;
            $patientData->pregnancy_plan = $this->pregnancy_plan;
            $patientData->pregnant_now = $this->pregnant_now;
            $patientData->contraception_in_use = $this->contraception_in_use;
            $patientData->last_menstrual_cycle = $this->last_menstrual_cycle;

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
