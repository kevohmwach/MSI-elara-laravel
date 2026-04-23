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
        Schema::create('cancer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('patient_id');
            $table->string('current_diagnosis')->nullable();
            $table->string('diagnosis_date')->nullable();
            $table->string('last_name')->nullable();
            $table->string('had_surgery')->nullable();
            $table->string('surgery_date')->nullable();
            $table->string('surgeon_name')->nullable();
            $table->string('surgeon_phone')->nullable();
            $table->string('what_surgery')->nullable();
            $table->string('surgery_recovered')->nullable();
            $table->string('surgery_complication')->nullable();
            $table->string('surgery_complication_explain')->nullable();
            $table->string('had_radiation')->nullable();
            $table->string('radiation_date')->nullable();
            $table->string('radiologist_name')->nullable();
            $table->string('radiologist_phone')->nullable();
            $table->string('radiation_treatment')->nullable();
            $table->string('radiation_recovered')->nullable();
            $table->string('radiation_complications')->nullable();
            $table->string('radiation_complication_explain')->nullable();
            $table->string('primary_physician_name')->nullable();
            $table->string('primary_physician_contact')->nullable();
            $table->string('oncologist_name')->nullable();
            $table->string('oncologist_phone')->nullable();
            $table->string('physician_1_name')->nullable();
            $table->string('physician_1_speciality')->nullable();
            $table->string('physician_2_name')->nullable();
            $table->string('physician_2_speciality')->nullable();
            $table->string('physician_3_name')->nullable();
            $table->string('physician_3_speciality')->nullable();
            $table->string('physician_4_name')->nullable();
            $table->string('physician_4_speciality')->nullable();
            $table->string('allergy_1')->nullable();
            $table->string('allergy_1_reaction')->nullable();
            $table->string('allergy_2')->nullable();
            $table->string('allergy_2_reaction')->nullable();
            $table->string('allergy_3')->nullable();
            $table->string('allergy_3_reaction')->nullable();
            $table->string('allergy_4')->nullable();
            $table->string('allergy_4_reaction')->nullable();
            // $table->string('dose_n_sig_1')->nullable();
            // $table->string('dose_n_sig_1_medication')->nullable();
            // $table->string('dose_n_sig_2')->nullable();
            // $table->string('dose_n_sig_2_medication')->nullable();
            // $table->string('dose_n_sig_3')->nullable();
            // $table->string('dose_n_sig_3_medication')->nullable();
            // $table->string('dose_n_sig_4')->nullable();
            // $table->string('dose_n_sig_4_medication')->nullable();
            $table->string('primary_worry')->nullable();
            $table->string('issue_began')->nullable();
            $table->string('in_pain')->nullable();
            $table->string('pain_location')->nullable();
            $table->string('pain_treatment')->nullable();
            $table->string('pain_treatment_change')->nullable();
            $table->string('pain_begin_trend')->nullable();
            $table->string('pain_occurence')->nullable();
            $table->string('pain_worst')->nullable();
            $table->string('curr_symptoms')->nullable();
            $table->string('pain_descr')->nullable();
            $table->string('other_health_concerns')->nullable();
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
        Schema::dropIfExists('cancer')->nullable();
    }
};
