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
        Schema::create('ct4her', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('ct4her_account_no');
            $table->string('facility_name')->nullable();
            $table->string('facility_email_address')->nullable();
            $table->string('facility_contact_person')->nullable();
            $table->string('facility_contact_person_phone')->nullable();
            $table->string('facility_contact_person_email_address')->nullable();
            $table->string('facility_type')->nullable();
            $table->string('other_facility_type')->nullable();

            $table->integer('physician_id');
            // $table->string('physician_name')->nullable();
            // $table->string('physician_title')->nullable();
            // $table->string('other_physician_title')->nullable();
            // $table->string('physician_license_no')->nullable();
            // $table->string('physician_phone')->nullable();
            // $table->string('physician_email')->nullable();
            // $table->string('physician_expr_years')->nullable();

            $table->integer('patient_id');
            // $table->string('patient_name')->nullable();
            // $table->string('patient_unique_id')->nullable();
            // $table->string('patient_birth_date')->nullable();
            // $table->string('patient_gender')->nullable();

            $table->string('breast_cancer_confirmed')->nullable();
            $table->string('diagnosis_date')->nullable();
            $table->string('cancer_stage')->nullable();
            $table->string('tumor_burden')->nullable();
            $table->string('biomarkers_initiation')->nullable();
            $table->string('chemotherapy')->nullable();
            $table->string('chemo_details')->nullable();
            $table->string('surgery')->nullable();
            $table->string('surgery_details')->nullable();
            $table->string('post_treatment')->nullable();
            $table->string('post_treatment_details')->nullable();
            $table->string('enhertu_duration')->nullable();
            $table->string('liver_function')->nullable();
            $table->string('renal_function')->nullable();
            $table->string('cardiac_function')->nullable();
            $table->string('lab_report_attached')->nullable();
            $table->string('key_findings_lab')->nullable();
            $table->string('lab_report_file')->nullable();
            $table->string('hr_ct_scan_attached')->nullable();
            $table->string('key_findings_hr_ct_scan')->nullable();
            $table->string('hr_ct_scan_file')->nullable();
            $table->string('price_ct_scan')->nullable();
            $table->string('insuarance_provider')->nullable();
            $table->string('insuarance_level')->nullable();
            $table->string('insuarance_policy_no')->nullable();
            $table->string('insuarance_cover_details')->nullable();
            $table->string('ct_scan_coverage')->nullable();
            $table->string('lab_coverage')->nullable();
            $table->string('cost_of_care_estimate')->nullable();
            // $table->string('adverse_drug_reaction')->nullable();
            // $table->string('adr_details')->nullable();
            // $table->string('dropouts')->nullable();
            // $table->string('dropout_reason')->nullable();
            // $table->string('other_dropout_reasons')->nullable();
            // $table->string('mental_health')->nullable();
            // $table->string('other_mental_health')->nullable();

            $table->string('consent_file')->nullable();
            $table->string('comments_concerns')->nullable();

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
        Schema::dropIfExists('ct4her');
    }
};
