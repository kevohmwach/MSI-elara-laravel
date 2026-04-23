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
        Schema::create('adverse_event', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('patient_id');
            $table->integer('facility_id');
            $table->string('adverse_drug_reaction')->nullable();
            $table->string('adr_details')->nullable();
            $table->string('dropouts')->nullable();
            $table->string('dropout_reason')->nullable();
            // $table->string('other_dropout_reasons')->nullable();
            $table->string('mental_health')->nullable();
            $table->string('other_mental_health')->nullable();
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
        Schema::dropIfExists('adverse_event');
    }
};
