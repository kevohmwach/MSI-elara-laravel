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
        Schema::create('patient', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('account_no');
            $table->string('fname');
            $table->string('lname');
            $table->string('birth_date');
            $table->string('gender');
            $table->string('address');
            $table->string('address_code');
            $table->string('physical_address');
            $table->string('county');
            $table->string('mobile_contact');
            $table->string('alt_contact')->nullable();
            $table->integer('id_no');
            $table->string('email');
            $table->string('ethinicity');
            $table->double('weight');
            $table->double('height');
            $table->string('language');
            $table->string('other_language')->nullable();
            $table->string('marital');
            $table->string('spouse_name')->nullable();
            $table->string('spouse_phone')->nullable();;
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_rel');
            $table->string('emergency_contact_email');
            $table->string('emergency_contact_mobile');
            $table->string('emergency_contact_alt_mobile')->nullable();
            $table->string('physician_id_1');
            $table->string('physician_id_2')->nullable();
            $table->string('pharmacist_id_1')->nullable();
            $table->string('pharmacist_id_2')->nullable();
            $table->string('x_ray_file');
            $table->string('ct_scan_file');
            $table->string('patient_consent_file');

            $table->string('dose_n_sig_1');
            $table->string('dose_n_sig_1_quantity');
            $table->string('dose_n_sig_1_units');
            $table->string('dose_n_sig_1_administration');
            $table->string('dose_n_sig_1_frequency');
            $table->string('dose_n_sig_1_tabs_freq');
            $table->string('dose_n_sig_1_medication');

            $table->string('dose_n_sig_2')->nullable();
            $table->string('dose_n_sig_2_quantity')->nullable();
            $table->string('dose_n_sig_2_units')->nullable();
            $table->string('dose_n_sig_2_administration')->nullable();
            $table->string('dose_n_sig_2_frequency')->nullable();
            $table->string('dose_n_sig_2_tabs_freq')->nullable();
            $table->string('dose_n_sig_2_medication')->nullable();

            $table->string('dose_n_sig_3')->nullable();
            $table->string('dose_n_sig_3_quantity')->nullable();
            $table->string('dose_n_sig_3_units')->nullable();
            $table->string('dose_n_sig_3_administration')->nullable();
            $table->string('dose_n_sig_3_frequency')->nullable();
            $table->string('dose_n_sig_3_tabs_freq')->nullable();
            $table->string('dose_n_sig_3_medication')->nullable();

            $table->string('dose_n_sig_4')->nullable();
            $table->string('dose_n_sig_4_quantity')->nullable();
            $table->string('dose_n_sig_4_units')->nullable();
            $table->string('dose_n_sig_4_administration')->nullable();
            $table->string('dose_n_sig_4_frequency')->nullable();
            $table->string('dose_n_sig_4_tabs_freq')->nullable();
            $table->string('dose_n_sig_4_medication')->nullable();

           

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
        Schema::dropIfExists('patient');
    }
};
