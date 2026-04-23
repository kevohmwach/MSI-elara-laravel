<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\History;

class HistoryForm extends Component
{
    use WithFileUploads;

   
    public $surgery_1_description;
    public $surgery_1_Doctor;
    public $surgery_1_location;
    public $surgery_1_year;
    public $surgery_2_description;
    public $surgery_2_Doctor;
    public $surgery_2_location;
    public $surgery_2_year;
    public $surgery_3_description;
    public $surgery_3_Doctor;
    public $surgery_3_location;
    public $surgery_3_year;
    public $surgery_4_description;
    public $surgery_4_Doctor;
    public $surgery_4_location;
    public $surgery_4_year;
    public $surgery_5_description;
    public $surgery_5_Doctor;
    public $surgery_5_location;
    public $surgery_5_year;
    public $med_hist_anemia;
    public $med_hist_arthritis;
    public $med_hist_asthma;
    public $med_hist_Atrial_fibrillation;
    public $med_hist_bleeding_problems;
    public $med_hist_benign_prostatic_hyperplasia;
    public $med_hist_coronary_artery_disease;
    public $med_hist_cancer;
    public $med_hist_cardiac;
    public $med_hist_celiac;
    public $med_hist_chestPain;
    public $med_hist_heartfailure;
    public $med_hist_fatiguesyndrome;
    public $med_hist_depression;
    public $med_hist_diabetes;
    public $med_hist_drug_alcohol_abuse;
    public $med_hist_erectile_dysfunction;
    public $med_hist_fibromyalgia;
    public $med_hist_gerd;
    public $med_hist_heart_disease;
    public $med_hist_hyperinsulinemia;
    public $med_hist_hyperlipidemia;
    public $med_hist_hypertension;
    public $med_hist_male_hypogonadism;
    public $med_hist_hypogonadism;
    public $med_hist_Infection_problems;
    public $med_hist_insomnia;
    public $med_hist_irritable_bowel_syndrome;
    public $med_hist_kidney_problems;
    public $med_hist_menopause;
    public $med_hist_migranes_headaches;
    public $med_hist_neuropathy;
    public $med_hist_onychomycosis;
    public $med_hist_organ_injury;
    public $med_hist_osteoporosis;
    public $med_hist_pulmonary_embolism;
    public $med_hist_seizure_disorders;
    public $med_hist_short_Breath;
    public $med_hist_sinus_onditions;
    public $med_hist_stroke;
    public $med_hist_syndrome_x;
    public $med_hist_tremors;
    public $med_hist_wheat_allergy;
    public $any_other_medical_problem;
    public $discussed_at_mdt;
    

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
            $this->patient = History::where('patient_id', $this->patient_id)->first();
            if($this->patient){
                $this->surgery_1_description = $this->patient->surgery_1_description;
                $this->surgery_1_Doctor = $this->patient->surgery_1_Doctor;
                $this->surgery_1_location = $this->patient->surgery_1_location;
                $this->surgery_1_year = $this->patient->surgery_1_year;
                $this->surgery_2_description = $this->patient->surgery_2_description;
                $this->surgery_2_Doctor = $this->patient->surgery_2_Doctor;
                $this->surgery_2_location = $this->patient->surgery_2_location;
                $this->surgery_2_year = $this->patient->surgery_2_year;
                $this->surgery_3_description = $this->patient->surgery_3_description;
                $this->surgery_3_Doctor = $this->patient->surgery_3_Doctor;
                $this->surgery_3_location = $this->patient->surgery_3_location;
                $this->surgery_3_year = $this->patient->surgery_3_year;
                $this->surgery_4_description = $this->patient->surgery_4_description;
                $this->surgery_4_Doctor = $this->patient->surgery_4_Doctor;
                $this->surgery_4_location = $this->patient->surgery_4_location;
                $this->surgery_4_year = $this->patient->surgery_4_year;
                // $this->surgery_5_description = $this->patient->surgery_5_description;
                // $this->surgery_5_Doctor = $this->patient->surgery_5_Doctor;
                // $this->surgery_5_location = $this->patient->surgery_5_location;
                // $this->surgery_5_year = $this->patient->surgery_5_year;
                $this->med_hist_anemia = $this->patient->med_hist_anemia;
                $this->med_hist_arthritis = $this->patient->med_hist_arthritis;
                $this->med_hist_asthma = $this->patient->med_hist_asthma;
                $this->med_hist_Atrial_fibrillation = $this->patient->med_hist_Atrial_fibrillation;
                $this->med_hist_bleeding_problems = $this->patient->med_hist_bleeding_problems;
                $this->med_hist_benign_prostatic_hyperplasia = $this->patient->med_hist_benign_prostatic_hyperplasia;
                $this->med_hist_coronary_artery_disease = $this->patient->med_hist_coronary_artery_disease;
                $this->med_hist_cancer = $this->patient->med_hist_cancer;
                $this->med_hist_cardiac = $this->patient->med_hist_cardiac;
                $this->med_hist_celiac = $this->patient->med_hist_celiac;
                $this->med_hist_chestPain = $this->patient->med_hist_chestPain;
                $this->med_hist_heartfailure = $this->patient->med_hist_heartfailure;
                $this->med_hist_fatiguesyndrome = $this->patient->med_hist_fatiguesyndrome;
                $this->med_hist_depression = $this->patient->med_hist_depression;
                $this->med_hist_diabetes = $this->patient->med_hist_diabetes;
                $this->med_hist_drug_alcohol_abuse = $this->patient->med_hist_drug_alcohol_abuse;
                $this->med_hist_erectile_dysfunction = $this->patient->med_hist_erectile_dysfunction;
                $this->med_hist_fibromyalgia = $this->patient->med_hist_fibromyalgia;
                $this->med_hist_gerd = $this->patient->med_hist_gerd;
                $this->med_hist_heart_disease = $this->patient->med_hist_heart_disease;
                $this->med_hist_hyperinsulinemia = $this->patient->med_hist_hyperinsulinemia;
                $this->med_hist_hyperlipidemia = $this->patient->med_hist_hyperlipidemia;
                $this->med_hist_hypertension = $this->patient->med_hist_hypertension;
                $this->med_hist_male_hypogonadism = $this->patient->med_hist_male_hypogonadism;
                $this->med_hist_hypogonadism = $this->patient->med_hist_hypogonadism;
                $this->med_hist_Infection_problems = $this->patient->med_hist_Infection_problems;
                $this->med_hist_insomnia = $this->patient->med_hist_insomnia;
                $this->med_hist_irritable_bowel_syndrome = $this->patient->med_hist_irritable_bowel_syndrome;
                $this->med_hist_kidney_problems = $this->patient->med_hist_kidney_problems;
                $this->med_hist_menopause = $this->patient->med_hist_menopause;
                $this->med_hist_migranes_headaches = $this->patient->med_hist_migranes_headaches;
                $this->med_hist_neuropathy = $this->patient->med_hist_neuropathy;
                $this->med_hist_onychomycosis = $this->patient->med_hist_onychomycosis;
                $this->med_hist_organ_injury = $this->patient->med_hist_organ_injury;
                $this->med_hist_osteoporosis = $this->patient->med_hist_osteoporosis;
                $this->med_hist_pulmonary_embolism = $this->patient->med_hist_pulmonary_embolism;
                $this->med_hist_seizure_disorders = $this->patient->med_hist_seizure_disorders;
                $this->med_hist_short_Breath = $this->patient->med_hist_short_Breath;
                $this->med_hist_sinus_onditions = $this->patient->med_hist_sinus_onditions;
                $this->med_hist_stroke = $this->patient->med_hist_stroke;
                $this->med_hist_syndrome_x = $this->patient->med_hist_syndrome_x;
                $this->med_hist_tremors = $this->patient->med_hist_tremors;
                $this->med_hist_wheat_allergy = $this->patient->med_hist_wheat_allergy;
                $this->any_other_medical_problem = $this->patient->any_other_medical_problem;
                $this->discussed_at_mdt = $this->patient->discussed_at_mdt;

                

            }
        }
    }


    public function render()
    {
        return view('livewire.history-form');
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
                'surgery_1_description'=>'',
                'surgery_1_Doctor'=>'',
                'surgery_1_location'=>'',
                'surgery_1_year'=>'',
                'surgery_2_description'=>'',
                'surgery_2_Doctor'=>'',
                'surgery_2_location'=>'',
                'surgery_2_year'=>'',
                'surgery_3_description'=>'',
                'surgery_3_Doctor'=>'',
                'surgery_3_location'=>'',
                'surgery_3_year'=>'',
                'surgery_4_description'=>'',
                'surgery_4_Doctor'=>'',
                'surgery_4_location'=>'',
                'surgery_4_year'=>'',
                // 'surgery_5_description'=>'',
                // 'surgery_5_Doctor'=>'',
                // 'surgery_5_location'=>'',
                // 'surgery_5_year'=>'',
            ]);
        }
        elseif($this->currentStep == 2){
            $this->validate([
                'med_hist_anemia'=>'',
                'med_hist_arthritis'=>'',
                'med_hist_asthma'=>'',
                'med_hist_Atrial_fibrillation'=>'',
                'med_hist_bleeding_problems'=>'',
                'med_hist_benign_prostatic_hyperplasia'=>'',
                'med_hist_coronary_artery_disease'=>'',
                'med_hist_cancer'=>'',
                'med_hist_cardiac'=>'',
                'med_hist_celiac'=>'',
                'med_hist_chestPain'=>'',
                'med_hist_heartfailure'=>'',
                'med_hist_fatiguesyndrome'=>'',
                'med_hist_depression'=>'',
                'med_hist_diabetes'=>'',
                'med_hist_drug_alcohol_abuse'=>'',
                'med_hist_erectile_dysfunction'=>'',
                'med_hist_fibromyalgia'=>'',
                'med_hist_gerd'=>'',
                'med_hist_heart_disease'=>'',
                'med_hist_hyperinsulinemia'=>'',
                'med_hist_hyperlipidemia'=>'',
                'med_hist_hypertension'=>'',
                'med_hist_male_hypogonadism'=>'',
                'med_hist_hypogonadism'=>'',
                'med_hist_Infection_problems'=>'',
                'med_hist_insomnia'=>'',
                'med_hist_irritable_bowel_syndrome'=>'',
                'med_hist_kidney_problems'=>'',
                'med_hist_menopause'=>'',
                'med_hist_migranes_headaches'=>'',
                'med_hist_neuropathy'=>'',
                'med_hist_onychomycosis'=>'',
                'med_hist_organ_injury'=>'',
                'med_hist_osteoporosis'=>'',
                'med_hist_pulmonary_embolism'=>'',
                'med_hist_seizure_disorders'=>'',
                'med_hist_short_Breath'=>'',
                'med_hist_sinus_onditions'=>'',
                'med_hist_stroke'=>'',
                'med_hist_syndrome_x'=>'',
                'med_hist_tremors'=>'',
                'med_hist_wheat_allergy'=>'',
                'any_other_medical_problem'=>'',
                'discussed_at_mdt'=>'required|string',
                
            ]);
        }
        
    }



    public function register(){
       
        $data = array(
            // 'condition_mother'=>$this->condition_mother,
            // 'mother_alive'=>$this->mother_alive,
            // 'mother_deceased_age'=>$this->mother_deceased_age,
            // 'condition_father'=>$this->condition_father,
            // 'father_alive'=>$this->father_alive,
            // 'father_deceased_age'=>$this->father_deceased_age,
            // 'condition_sibling_1'=>$this->condition_sibling_1,
            // 'sibling_1_alive'=>$this->sibling_1_alive,
            // 'sibling_1_deceased_age'=>$this->sibling_1_deceased_age,
            // 'condition_sibling_2'=>$this->condition_sibling_2,
            // 'sibling_2_alive'=>$this->sibling_2_alive,
            // 'sibling_2_deceased_age'=>$this->sibling_2_deceased_age,
            // 'condition_others_1'=>$this->condition_others_1,
            // 'others_1_alive'=>$this->others_1_alive,
            // 'others_1_deceased_age'=>$this->others_1_deceased_age,
            // 'condition_others_2'=>$this->condition_others_2,
            // 'others_2_alive'=>$this->others_2_alive,
            // 'others_2_deceased_age'=>$this->others_2_deceased_age,
            'patient_id'=>$this->patient_id,
            'surgery_1_description'=>$this->surgery_1_description,
            'surgery_1_Doctor'=>$this->surgery_1_Doctor,
            'surgery_1_location'=>$this->surgery_1_location,
            'surgery_1_year'=>$this->surgery_1_year,
            'surgery_2_description'=>$this->surgery_2_description,
            'surgery_2_Doctor'=>$this->surgery_2_Doctor,
            'surgery_2_location'=>$this->surgery_2_location,
            'surgery_2_year'=>$this->surgery_2_year,
            'surgery_3_description'=>$this->surgery_3_description,
            'surgery_3_Doctor'=>$this->surgery_3_Doctor,
            'surgery_3_location'=>$this->surgery_3_location,
            'surgery_3_year'=>$this->surgery_3_year,
            'surgery_4_description'=>$this->surgery_4_description,
            'surgery_4_Doctor'=>$this->surgery_4_Doctor,
            'surgery_4_location'=>$this->surgery_4_location,
            'surgery_4_year'=>$this->surgery_4_year,
            // 'surgery_5_description'=>$this->surgery_5_description,
            // 'surgery_5_Doctor'=>$this->surgery_5_Doctor,
            // 'surgery_5_location'=>$this->surgery_5_location,
            // 'surgery_5_year'=>$this->surgery_5_year,
            'med_hist_anemia'=>$this->med_hist_anemia,
            'med_hist_arthritis'=>$this->med_hist_arthritis,
            'med_hist_asthma'=>$this->med_hist_asthma,
            'med_hist_Atrial_fibrillation'=>$this->med_hist_Atrial_fibrillation,
            'med_hist_bleeding_problems'=>$this->med_hist_bleeding_problems,
            'med_hist_benign_prostatic_hyperplasia'=>$this->med_hist_benign_prostatic_hyperplasia,
            'med_hist_coronary_artery_disease'=>$this->med_hist_coronary_artery_disease,
            'med_hist_cancer'=>$this->med_hist_cancer,
            'med_hist_cardiac'=>$this->med_hist_cardiac,
            'med_hist_celiac'=>$this->med_hist_celiac,
            'med_hist_chestPain'=>$this->med_hist_chestPain,
            'med_hist_heartfailure'=>$this->med_hist_heartfailure,
            'med_hist_fatiguesyndrome'=>$this->med_hist_fatiguesyndrome,
            'med_hist_depression'=>$this->med_hist_depression,
            'med_hist_diabetes'=>$this->med_hist_diabetes,
            'med_hist_drug_alcohol_abuse'=>$this->med_hist_drug_alcohol_abuse,
            'med_hist_erectile_dysfunction'=>$this->med_hist_erectile_dysfunction,
            'med_hist_fibromyalgia'=>$this->med_hist_fibromyalgia,
            'med_hist_gerd'=>$this->med_hist_gerd,
            'med_hist_heart_disease'=>$this->med_hist_heart_disease,
            'med_hist_hyperinsulinemia'=>$this->med_hist_hyperinsulinemia,
            'med_hist_hyperlipidemia'=>$this->med_hist_hyperlipidemia,
            'med_hist_hypertension'=>$this->med_hist_hypertension,
            'med_hist_male_hypogonadism'=>$this->med_hist_male_hypogonadism,
            'med_hist_hypogonadism'=>$this->med_hist_hypogonadism,
            'med_hist_Infection_problems'=>$this->med_hist_Infection_problems,
            'med_hist_insomnia'=>$this->med_hist_insomnia,
            'med_hist_irritable_bowel_syndrome'=>$this->med_hist_irritable_bowel_syndrome,
            'med_hist_kidney_problems'=>$this->med_hist_kidney_problems,
            'med_hist_menopause'=>$this->med_hist_menopause,
            'med_hist_migranes_headaches'=>$this->med_hist_migranes_headaches,
            'med_hist_neuropathy'=>$this->med_hist_neuropathy,
            'med_hist_onychomycosis'=>$this->med_hist_onychomycosis,
            'med_hist_organ_injury'=>$this->med_hist_organ_injury,
            'med_hist_osteoporosis'=>$this->med_hist_osteoporosis,
            'med_hist_pulmonary_embolism'=>$this->med_hist_pulmonary_embolism,
            'med_hist_seizure_disorders'=>$this->med_hist_seizure_disorders,
            'med_hist_short_Breath'=>$this->med_hist_short_Breath,
            'med_hist_sinus_onditions'=>$this->med_hist_sinus_onditions,
            'med_hist_stroke'=>$this->med_hist_stroke,
            'med_hist_syndrome_x'=>$this->med_hist_syndrome_x,
            'med_hist_tremors'=>$this->med_hist_tremors,
            'med_hist_wheat_allergy'=>$this->med_hist_wheat_allergy,
            'any_other_medical_problem'=>$this->any_other_medical_problem,
            'discussed_at_mdt'=>$this->discussed_at_mdt,
            // 'consume_alcohol'=>$this->consume_alcohol,
            // 'drinks_per_week'=>$this->drinks_per_week,
            // 'currently_smoke'=>$this->currently_smoke,
            // 'cigarettes_per_day'=>$this->cigarettes_per_day,
            // 'use_any_other_drug'=>$this->use_any_other_drug,
            // 'any_other_drug'=>$this->any_other_drug,
            // 'any_other_drug_frequency'=>$this->any_other_drug_frequency,
            // 'drink_caffein'=>$this->drink_caffein,
            // 'caffein_cups_per_day'=>$this->caffein_cups_per_day,
            // 'sexually_active'=>$this->sexually_active,
            // 'like_checked_stis'=>$this->like_checked_stis,
            // 'excercise_frequency'=>$this->excercise_frequency,
            // 'on_special_diet'=>$this->on_special_diet,
            // 'special_diet_type'=>$this->special_diet_type,
            // 'pregnancy_plan'=>$this->pregnancy_plan,
            // 'pregnant_now'=>$this->pregnant_now,
            // 'contraception_in_use'=>$this->contraception_in_use,
            // 'last_menstrual_cycle'=>$this->last_menstrual_cycle,

        );

        auth()->user()->history()->create($data);
        //$this->reset();
        // $this->currentStep = 1;
        return $this->redirectRoute('patient');

    }
    public function update(){
        $patientData = History::where('patient_id', $this->patient_id)->first();
        if($patientData){
            //update data
            $patientData->surgery_1_description = $this->surgery_1_description;
            $patientData->surgery_1_Doctor = $this->surgery_1_Doctor;
            $patientData->surgery_1_location = $this->surgery_1_location;
            $patientData->surgery_1_year = $this->surgery_1_year;
            $patientData->surgery_2_description = $this->surgery_2_description;
            $patientData->surgery_2_Doctor = $this->surgery_2_Doctor;
            $patientData->surgery_2_location = $this->surgery_2_location;
            $patientData->surgery_2_year = $this->surgery_2_year;
            $patientData->surgery_3_description = $this->surgery_3_description;
            $patientData->surgery_3_Doctor = $this->surgery_3_Doctor;
            $patientData->surgery_3_location = $this->surgery_3_location;
            $patientData->surgery_3_year = $this->surgery_3_year;
            $patientData->surgery_4_description = $this->surgery_4_description;
            $patientData->surgery_4_Doctor = $this->surgery_4_Doctor;
            $patientData->surgery_4_location = $this->surgery_4_location;
            $patientData->surgery_4_year = $this->surgery_4_year;
            // $patientData->surgery_5_description = $this->surgery_5_description;
            // $patientData->surgery_5_Doctor = $this->surgery_5_Doctor;
            // $patientData->surgery_5_location = $this->surgery_5_location;
            // $patientData->surgery_5_year = $this->surgery_5_year;
            $patientData->med_hist_anemia = $this->med_hist_anemia;
            $patientData->med_hist_arthritis = $this->med_hist_arthritis;
            $patientData->med_hist_asthma = $this->med_hist_asthma;
            $patientData->med_hist_Atrial_fibrillation = $this->med_hist_Atrial_fibrillation;
            $patientData->med_hist_bleeding_problems = $this->med_hist_bleeding_problems;
            $patientData->med_hist_benign_prostatic_hyperplasia = $this->med_hist_benign_prostatic_hyperplasia;
            $patientData->med_hist_coronary_artery_disease = $this->med_hist_coronary_artery_disease;
            $patientData->med_hist_cancer = $this->med_hist_cancer;
            $patientData->med_hist_cardiac = $this->med_hist_cardiac;
            $patientData->med_hist_celiac = $this->med_hist_celiac;
            $patientData->med_hist_chestPain = $this->med_hist_chestPain;
            $patientData->med_hist_heartfailure = $this->med_hist_heartfailure;
            $patientData->med_hist_fatiguesyndrome = $this->med_hist_fatiguesyndrome;
            $patientData->med_hist_depression = $this->med_hist_depression;
            $patientData->med_hist_diabetes = $this->med_hist_diabetes;
            $patientData->med_hist_drug_alcohol_abuse = $this->med_hist_drug_alcohol_abuse;
            $patientData->med_hist_erectile_dysfunction = $this->med_hist_erectile_dysfunction;
            $patientData->med_hist_fibromyalgia = $this->med_hist_fibromyalgia;
            $patientData->med_hist_gerd = $this->med_hist_gerd;
            $patientData->med_hist_heart_disease = $this->med_hist_heart_disease;
            $patientData->med_hist_hyperinsulinemia = $this->med_hist_hyperinsulinemia;
            $patientData->med_hist_hyperlipidemia = $this->med_hist_hyperlipidemia;
            $patientData->med_hist_hypertension = $this->med_hist_hypertension;
            $patientData->med_hist_male_hypogonadism = $this->med_hist_male_hypogonadism;
            $patientData->med_hist_hypogonadism = $this->med_hist_hypogonadism;
            $patientData->med_hist_Infection_problems = $this->med_hist_Infection_problems;
            $patientData->med_hist_insomnia = $this->med_hist_insomnia;
            $patientData->med_hist_irritable_bowel_syndrome = $this->med_hist_irritable_bowel_syndrome;
            $patientData->med_hist_kidney_problems = $this->med_hist_kidney_problems;
            $patientData->med_hist_menopause = $this->med_hist_menopause;
            $patientData->med_hist_migranes_headaches = $this->med_hist_migranes_headaches;
            $patientData->med_hist_neuropathy = $this->med_hist_neuropathy;
            $patientData->med_hist_onychomycosis = $this->med_hist_onychomycosis;
            $patientData->med_hist_organ_injury = $this->med_hist_organ_injury;
            $patientData->med_hist_osteoporosis = $this->med_hist_osteoporosis;
            $patientData->med_hist_pulmonary_embolism = $this->med_hist_pulmonary_embolism;
            $patientData->med_hist_seizure_disorders = $this->med_hist_seizure_disorders;
            $patientData->med_hist_short_Breath = $this->med_hist_short_Breath;
            $patientData->med_hist_sinus_onditions = $this->med_hist_sinus_onditions;
            $patientData->med_hist_stroke = $this->med_hist_stroke;
            $patientData->med_hist_syndrome_x = $this->med_hist_syndrome_x;
            $patientData->med_hist_tremors = $this->med_hist_tremors;
            $patientData->med_hist_wheat_allergy = $this->med_hist_wheat_allergy;
            $patientData->any_other_medical_problem = $this->any_other_medical_problem;
            $patientData->discussed_at_mdt = $this->discussed_at_mdt;

            

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
