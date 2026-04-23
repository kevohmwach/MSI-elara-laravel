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
        Schema::create('p_call_scripts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('patient_id');
            $table->integer('updated_by')->nullable();

            $table->string('script_question_1')->nullable();
            $table->string('patient_response_1')->nullable();
            $table->string('lung_inflamation')->nullable();
            $table->string('script_question_2')->nullable();
            $table->string('patient_response_2')->nullable();
            $table->string('script_question_3')->nullable();
            $table->string('patient_response_3')->nullable();
            $table->string('script_question_4')->nullable();
            $table->string('patient_response_4')->nullable();
            $table->string('script_question_5')->nullable();
            $table->string('patient_response_5')->nullable();
            $table->string('script_question_6')->nullable();
            $table->string('patient_response_6')->nullable();
            $table->string('script_question_7')->nullable();
            $table->string('patient_response_7')->nullable();

            $table->string('call_doctor_or_er')->nullable();
            $table->string('call_doctor_or_er_response')->nullable();
            $table->string('routine_monitoring')->nullable();
            $table->string('routine_monitoring_response')->nullable();

            $table->string('red_flags')->nullable();
            $table->string('red_flags_response')->nullable();
            $table->string('enhertu_effects')->nullable();
            $table->string('enhertu_effects_response')->nullable();
            $table->string('patient_understanding')->nullable();
            $table->string('patient_understanding_response')->nullable();
            $table->string('action_needed')->nullable();
            $table->string('action_needed_response')->nullable();


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
        Schema::dropIfExists('p_call_scripts');
    }
};
