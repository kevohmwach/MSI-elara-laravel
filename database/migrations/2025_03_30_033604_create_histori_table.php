<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('patient_id');
            $table->string('surgery_1_description')->nullable();
            $table->string('surgery_1_Doctor')->nullable();
            $table->string('surgery_1_location')->nullable();
            $table->string('surgery_1_year')->nullable();
            $table->string('surgery_2_description')->nullable();
            $table->string('surgery_2_Doctor')->nullable();
            $table->string('surgery_2_location')->nullable();
            $table->string('surgery_2_year')->nullable();
            $table->string('surgery_3_description')->nullable();
            $table->string('surgery_3_Doctor')->nullable();
            $table->string('surgery_3_location')->nullable();
            $table->string('surgery_3_year')->nullable();
            $table->string('surgery_4_description')->nullable();
            $table->string('surgery_4_Doctor')->nullable();
            $table->string('surgery_4_location')->nullable();
            $table->string('surgery_4_year')->nullable();
            // $table->string('surgery_5_description')->nullable();
            // $table->string('surgery_5_Doctor')->nullable();
            // $table->string('surgery_5_location')->nullable();
            // $table->string('surgery_5_year')->nullable();
            $table->string('med_hist_anemia')->nullable();
            $table->string('med_hist_arthritis')->nullable();
            $table->string('med_hist_asthma')->nullable();
            $table->string('med_hist_Atrial_fibrillation')->nullable();
            $table->string('med_hist_bleeding_problems')->nullable();
            $table->string('med_hist_benign_prostatic_hyperplasia')->nullable();
            $table->string('med_hist_coronary_artery_disease')->nullable();
            $table->string('med_hist_cancer')->nullable();
            $table->string('med_hist_cardiac')->nullable();
            $table->string('med_hist_celiac')->nullable();
            $table->string('med_hist_chestPain')->nullable();
            $table->string('med_hist_heartfailure')->nullable();
            $table->string('med_hist_fatiguesyndrome')->nullable();
            $table->string('med_hist_depression')->nullable();
            $table->string('med_hist_diabetes')->nullable();
            $table->string('med_hist_drug_alcohol_abuse')->nullable();
            $table->string('med_hist_erectile_dysfunction')->nullable();
            $table->string('med_hist_fibromyalgia')->nullable();
            $table->string('med_hist_gerd')->nullable();
            $table->string('med_hist_heart_disease')->nullable();
            $table->string('med_hist_hyperinsulinemia')->nullable();
            $table->string('med_hist_hyperlipidemia')->nullable();
            $table->string('med_hist_hypertension')->nullable();
            $table->string('med_hist_male_hypogonadism')->nullable();
            $table->string('med_hist_hypogonadism')->nullable();
            $table->string('med_hist_Infection_problems')->nullable();
            $table->string('med_hist_insomnia')->nullable();
            $table->string('med_hist_irritable_bowel_syndrome')->nullable();
            $table->string('med_hist_kidney_problems')->nullable();
            $table->string('med_hist_menopause')->nullable();
            $table->string('med_hist_migranes_headaches')->nullable();
            $table->string('med_hist_neuropathy')->nullable();
            $table->string('med_hist_onychomycosis')->nullable();
            $table->string('med_hist_organ_injury')->nullable();
            $table->string('med_hist_osteoporosis')->nullable();
            $table->string('med_hist_pulmonary_embolism')->nullable();
            $table->string('med_hist_seizure_disorders')->nullable();
            $table->string('med_hist_short_Breath')->nullable();
            $table->string('med_hist_sinus_onditions')->nullable();
            $table->string('med_hist_stroke')->nullable();
            $table->string('med_hist_syndrome_x')->nullable();
            $table->string('med_hist_tremors')->nullable();
            $table->string('med_hist_wheat_allergy')->nullable();
            $table->string('any_other_medical_problem')->nullable();
            $table->string('discussed_at_mdt');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history')->nullable();
    }
};
