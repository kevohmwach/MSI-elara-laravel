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
        Schema::create('callscript', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('patient_id');
            $table->string('patient_response_salutation')->nullable();
            $table->string('patient_response_busy')->nullable();
            $table->string('script_question_1')->nullable();
            $table->string('patient_response_1')->nullable();
            $table->string('script_question_2')->nullable();
            $table->string('patient_response_2')->nullable();
            $table->string('script_question_3')->nullable();
            $table->string('patient_response_3')->nullable();
            $table->string('script_question_4')->nullable();
            $table->string('patient_response_4')->nullable();
            $table->string('script_question_5')->nullable();
            $table->string('patient_response_5')->nullable();
            $table->string('patient_response_wrap_advice')->nullable();
            $table->string('patient_response_wrap_bye')->nullable();
            $table->string('weekly_check_in_quiz_1')->nullable();
            $table->string('weekly_check_in_response_1')->nullable();
            $table->string('weekly_check_in_quiz_2')->nullable();
            $table->string('weekly_check_in_response_2')->nullable();
            $table->string('weekly_check_in_quiz_3')->nullable();
            $table->string('weekly_check_in_response_3')->nullable();
            $table->string('weekly_check_in_quiz_4')->nullable();
            $table->string('weekly_check_in_response_4')->nullable();
            $table->string('weekly_check_in_quiz_5')->nullable();
            $table->string('weekly_check_in_response_5')->nullable();
            $table->string('weekly_check_in_quiz_6')->nullable();
            $table->string('weekly_check_in_response_6')->nullable();
            $table->string('weekly_check_in_quiz_7')->nullable();
            $table->string('weekly_check_in_response_7')->nullable();
            $table->string('patient_response_wrap_advice_weekly')->nullable();
            $table->string('patient_response_wrap_bye_weekly')->nullable();

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
        Schema::dropIfExists('callscript');
    }
};
