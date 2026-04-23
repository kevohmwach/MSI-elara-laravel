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
        Schema::create('social_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('patient_id');
            $table->string('condition_mother')->nullable();
            $table->string('mother_alive')->nullable();
            $table->string('mother_deceased_age')->nullable();
            $table->string('condition_father')->nullable();
            $table->string('father_alive')->nullable();
            $table->string('father_deceased_age')->nullable();
            $table->string('condition_sibling_1')->nullable();
            $table->string('sibling_1_alive')->nullable();
            $table->string('sibling_1_deceased_age')->nullable();
            $table->string('condition_sibling_2')->nullable();
            $table->string('sibling_2_alive')->nullable();
            $table->string('sibling_2_deceased_age')->nullable();
            $table->string('condition_others_1')->nullable();
            $table->string('others_1_alive')->nullable();
            $table->string('others_1_deceased_age')->nullable();
            $table->string('condition_others_2')->nullable();
            $table->string('others_2_alive')->nullable();
            $table->string('others_2_deceased_age')->nullable();
            $table->string('consume_alcohol')->nullable();
            $table->string('drinks_per_week')->nullable();
            $table->string('currently_smoke')->nullable();
            $table->string('cigarettes_per_day')->nullable();
            $table->string('use_any_other_drug')->nullable();
            $table->string('any_other_drug')->nullable();
            $table->string('any_other_drug_frequency')->nullable();
            $table->string('drink_caffein')->nullable();
            $table->string('caffein_cups_per_day')->nullable();
            $table->string('sexually_active')->nullable();
            $table->string('like_checked_stis')->nullable();
            $table->string('excercise_frequency')->nullable();
            $table->string('on_special_diet')->nullable();
            $table->string('special_diet_type')->nullable();
            $table->string('pregnancy_plan')->nullable();
            $table->string('pregnant_now')->nullable();
            $table->string('contraception_in_use')->nullable();
            $table->string('last_menstrual_cycle')->nullable();

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
        Schema::dropIfExists('social_history')->nullable();
    }
};
