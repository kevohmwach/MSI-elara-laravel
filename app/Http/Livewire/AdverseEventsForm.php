<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Ct4her;
use App\Models\AdverseEvents;


class AdverseEventsForm extends Component
{
    
    use WithFileUploads;

    public $adverse_drug_reaction;
    public $adr_details;
    public $dropouts;
    public $dropout_reason;
    // public $other_dropout_reasons;
    public $mental_health;
    public $other_mental_health;

    public $totalSteps = 1;
    public $currentStep = 1;
    public $method;
    public $dropout_data;
    public $ct4herdata;
    public $patientdata;
    public $physiciandata;

    public function mount($dropout_data,$method, $ct4herdata, $patientdata, $physiciandata){
        $this->currentStep = 1;
        $this->method = $method;

        $this->ct4herdata = $ct4herdata;
        $this->patientdata = $patientdata;
        $this->physiciandata = $physiciandata;

        // $this->insurance_data = $insurance_data;
        $this->dropout_data = $dropout_data;
        // $this->patient_data = $patient_data;
        // $this->physician_data = $physician_data;
        // dd($this->patientdata);

        if($method=='update'){
            $adverse_event = AdverseEvents::where('facility_id',$this->ct4herdata->id)->where('patient_id',$this->patientdata->id)->first();
            $this->adverse_drug_reaction =  $adverse_event->adverse_drug_reaction;
            $this->adr_details =  $adverse_event->adr_details;
            $this->dropouts =  $adverse_event->dropouts;
            $this->dropout_reason =  $adverse_event->dropout_reason;
            // $this->other_dropout_reasons =  $adverse_event->other_dropout_reasons;
            $this->mental_health =  $adverse_event->mental_health;
            $this->other_mental_health =  $adverse_event->other_mental_health;
        }
    }

    public function render()
    {
        return view('livewire.adverse-events-form');
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
                'adverse_drug_reaction'=>'',
                'adr_details'=>'',
                'dropouts'=>'',
                'dropout_reason'=>'',
                // 'other_dropout_reasons'=>'',
                'mental_health'=>'',
                'other_mental_health'=>'',
            ]);
        }
        
    }

    public function register(){
        $data = array(
            'patient_id' => $this->patientdata->id,
            'facility_id' => $this->ct4herdata->id,
            'adverse_drug_reaction' =>$this->adverse_drug_reaction,
            'adr_details' =>$this->adr_details,
            'dropouts' =>$this->dropouts,
            'dropout_reason' =>$this->dropout_reason,
            // 'other_dropout_reasons' =>$this->other_dropout_reasons,
            'mental_health' =>$this->mental_health,
            'other_mental_health' =>$this->other_mental_health,
        );

        auth()->user()->adverse_events()->create($data);
        //$this->reset();
        // $this->currentStep = 1;
        return $this->redirectRoute('patient');

    }

    public function update(){
       
        $adverse_events = AdverseEvents::where('facility_id',$this->ct4herdata->id)->where('patient_id',$this->patientdata->id)->first();

        $adverse_events->adverse_drug_reaction = $this->adverse_drug_reaction;
        $adverse_events->adr_details = $this->adr_details;
        $adverse_events->dropouts = $this->dropouts;
        $adverse_events->dropout_reason = $this->dropout_reason;
        // $adverse_events->other_dropout_reasons = $this->other_dropout_reasons;
        $adverse_events->mental_health = $this->mental_health;
        $adverse_events->other_mental_health = $this->other_mental_health;

        $adverse_events->save();

        // $this->reset();
        // $this->currentStep = 1;
        return $this->redirectRoute('patient');
    }
}
