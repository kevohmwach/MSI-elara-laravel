<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\P_CallScript;
use Illuminate\Support\Facades\Auth;

class PCallScript extends Component
{
    
    use WithFileUploads;

    public $script_question_1;
    public $patient_response_1;
    public $lung_inflamation;
    
    public $script_question_2;
    public $patient_response_2;
    public $script_question_3;
    public $patient_response_3;
    public $script_question_4;
    public $patient_response_4;
    public $script_question_5;
    public $patient_response_5;
    public $script_question_6;
    public $patient_response_6;
    public $script_question_7;
    public $patient_response_7;

    public $call_doctor_or_er;
    public $call_doctor_or_er_response;
    public $routine_monitoring;
    public $routine_monitoring_response;

    public $red_flags;
    public $red_flags_response = [];
    public $enhertu_effects;
    public $enhertu_effects_response = [];
    public $patient_understanding;
    public $patient_understanding_response = [];
    public $action_needed;
    public $action_needed_response;

    
    public $totalSteps = 3;
    public $currentStep = 1;
    public $method;
    public $patient_id;
    public $patient;
    public $response_data;
    public $patient_name;


    public $other_language;
    public $language;

    //$questions = 


    public function mount($method, $patient_id, $patient_name, $response_data){
        $this->currentStep = 1;
        $this->method = $method;
        $this->patient_id = $patient_id;
        $this->response_data = $response_data;
        $this->patient_name = $patient_name;

        if($method =='update'){
            $this->patient = P_CallScript::where('patient_id', $patient_id)->first();
            // dd($this->patient);
            if($this->patient){
                $this->patient_response_1 = $this->patient->patient_response_1;
                $this->patient_response_2 = $this->patient->patient_response_2;
                $this->lung_inflamation = $this->patient->lung_inflamation;
                
                $this->patient_response_3 = $this->patient->patient_response_3;
                $this->patient_response_4 = $this->patient->patient_response_4;
                $this->patient_response_5 = $this->patient->patient_response_5;
                $this->patient_response_6 = $this->patient->patient_response_6;
                $this->patient_response_7 = $this->patient->patient_response_7;

                $this->call_doctor_or_er_response = $this->patient->call_doctor_or_er_response;
                //$this->red_flags_response = $this->patient->red_flags_response;
                $this->red_flags_response = json_decode($this->patient->red_flags_response);
                //$this->routine_monitoring_response = json_decode($this->patient->routine_monitoring_response);
                
                $this->routine_monitoring_response = $this->patient->routine_monitoring_response;
                //$this->enhertu_effects_response = $this->patient->enhertu_effects_response;
                $this->enhertu_effects_response = json_decode($this->patient->enhertu_effects_response);
                //$this->patient_understanding_response = $this->patient->patient_understanding_response;
                $this->patient_understanding_response = json_decode($this->patient->patient_understanding_response);
                $this->action_needed_response = $this->patient->action_needed_response;


            }
        }else if($method =='register'){
            //Nothing to pre_populate
        }
    }

    public function render()
    {
        return view('livewire.p-call-script');
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
                'script_question_1'=>'',
                'patient_response_1'=>'',
                'lung_inflamation' => '',
                'script_question_2'=>'',
                'patient_response_2'=>'',
                'script_question_3'=>'',
                'patient_response_3'=>'',
                'script_question_4'=>'',
                'patient_response_4'=>'',
                'script_question_5'=>'',
                'patient_response_5'=>'',
                'script_question_6'=>'',
                'patient_response_6'=>'',
                'script_question_7'=>'',
                'patient_response_7'=>'',
            ]);
        }
        else if($this->currentStep == 2){
            $this->validate([
                'call_doctor_or_er'=>'',
                'call_doctor_or_er_response'=>'',
                'routine_monitoring'=>'',
                'routine_monitoring_response'=>'',

                
            ]);
      }
      else if($this->currentStep == 3){
            $this->validate([
                'language'=>'required|array',
                'red_flags'=>'',
                'red_flags_response'=>'',
                'enhertu_effects'=>'',
                'enhertu_effects_response'=>'',
                'patient_understanding'=>'',
                'patient_understanding_response'=>'',

                'action_needed'=>'',
                'action_needed_response'=>'',
            ]);
        }

    }



    public function register(){
       
        $data = array(
            'patient_id'=>$this->patient_id,
            // 'patient_response_salutation' =>$this->patient_response_salutation,
            // 'patient_response_busy' =>$this->patient_response_busy,
            'script_question_1' =>$this->script_question_1,
            'patient_response_1' =>$this->patient_response_1,
            'lung_inflamation' =>$this->lung_inflamation,
            
            'script_question_2' =>$this->script_question_2,
            'patient_response_2' =>$this->patient_response_2,
            'script_question_3' =>$this->script_question_3,
            'patient_response_3' =>$this->patient_response_3,
            'script_question_4' =>$this->script_question_4,
            'patient_response_4' =>$this->patient_response_4,
            'script_question_5' =>$this->script_question_5,
            'patient_response_5' =>$this->patient_response_5,
            'script_question_6' =>$this->script_question_6,
            'patient_response_6' =>$this->patient_response_6,
            'script_question_7' =>$this->script_question_7,
            'patient_response_7' =>$this->patient_response_7,

            'call_doctor_or_er' =>$this->call_doctor_or_er,
            'call_doctor_or_er_response' =>$this->call_doctor_or_er_response,
            'routine_monitoring' =>$this->routine_monitoring,
            'routine_monitoring_response' =>$this->routine_monitoring_response,
            'red_flags' =>$this->red_flags,
            "red_flags_response"=>json_encode($this->red_flags_response),
            //'red_flags_response' =>$this->red_flags_response,
            'enhertu_effects' =>$this->enhertu_effects,
            //'enhertu_effects_response' =>$this->enhertu_effects_response,
            "enhertu_effects_response"=>json_encode($this->enhertu_effects_response),

            'patient_understanding' =>$this->patient_understanding,
            //'patient_understanding_response' =>$this->patient_understanding_response,
            "patient_understanding_response"=>json_encode($this->patient_understanding_response),
            'action_needed' =>$this->action_needed,
            'action_needed_response' =>$this->action_needed_response,
        );

        auth()->user()->p_callscript()->create($data);
        //$this->reset();
        // $this->currentStep = 1;
        return $this->redirectRoute('patient');

    }

    public function update(){
        //$patientData = CallScript::find($this->patient_id);
        $patientData = P_CallScript::where('patient_id', $this->patient_id)->first();
        if($patientData){
            // $patientData->patient_response_salutation = $this->patient_response_salutation;
            $patientData->updated_by = Auth::user()->id;
            $patientData->script_question_1 = $this->script_question_1;
            $patientData->patient_response_1 = $this->patient_response_1;
            $patientData->lung_inflamation = $this->lung_inflamation;
            $patientData->script_question_2 = $this->script_question_2;
            $patientData->patient_response_2 = $this->patient_response_2;
            $patientData->script_question_3 = $this->script_question_3;
            $patientData->patient_response_3 = $this->patient_response_3;
            $patientData->script_question_4 = $this->script_question_4;
            $patientData->patient_response_4 = $this->patient_response_4;
            $patientData->script_question_5 = $this->script_question_5;
            $patientData->patient_response_5 = $this->patient_response_5;
            $patientData->script_question_6 = $this->script_question_6;
            $patientData->patient_response_6 = $this->patient_response_6;
            $patientData->script_question_7 = $this->script_question_7;
            $patientData->patient_response_7 = $this->patient_response_7;



            $patientData->call_doctor_or_er = $this->call_doctor_or_er;
            $patientData->call_doctor_or_er_response = $this->call_doctor_or_er_response;
            $patientData->routine_monitoring = $this->routine_monitoring;
            $patientData->routine_monitoring_response = $this->routine_monitoring_response;
            $patientData->red_flags = $this->red_flags;
            //$patientData->red_flags_response = $this->red_flags_response;
            $patientData->red_flags_response = json_encode($this->red_flags_response);
            $patientData->enhertu_effects = $this->enhertu_effects;
            $patientData->enhertu_effects_response = json_encode($this->enhertu_effects_response);
            $patientData->patient_understanding = $this->patient_understanding;
            $patientData->patient_understanding_response = json_encode($this->patient_understanding_response);
            //$patientData->patient_understanding_response = $this->patient_understanding_response;
            $patientData->action_needed = $this->action_needed;
            $patientData->action_needed_response = $this->action_needed_response;

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
