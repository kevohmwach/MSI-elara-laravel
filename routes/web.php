<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/user', [App\Http\Controllers\Auth\PrivelegeController::class, 'index'])->name('users');
Route::get('/user/edit/{user}', [App\Http\Controllers\Auth\PrivelegeController::class, 'edit'])->name('userEdit');
Route::patch('/user/update/{user}', [App\Http\Controllers\Auth\PrivelegeController::class, 'update'])->name('userUpdate');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('profile');
Route::get('/', [App\Http\Controllers\SiteController::class, 'index'])->name('home');

//Route::post('/site/store', [App\Http\Controllers\SiteController::class, 'store'])->name('survey');
//Route::get('/site/results', [App\Http\Controllers\SiteController::class, 'results'])->name('results');
//Route::get('/site/download', [App\Http\Controllers\SiteController::class, 'download'])->name('download');

Route::get('/patient', [App\Http\Controllers\PatientController::class, 'index'])->name('patient');
Route::get('/patient/register', [App\Http\Controllers\PatientController::class, 'register'])->name('patient_register');
Route::get('/patient/update/{id}', [App\Http\Controllers\PatientController::class, 'update'])->name('updatePatient');
Route::get('/patient/show/cancer/{id}', [App\Http\Controllers\PatientController::class, 'show_cancer'])->name('showCancer');
Route::get('/patient/show/medhistory/{id}', [App\Http\Controllers\PatientController::class, 'show_medHistory'])->name('showMedHistory');

Route::get('/patient/cancer/{id}/{acc_no}', [App\Http\Controllers\PatientController::class, 'cancer'])->name('cancerPatient');
Route::get('/patient/medicalhistory/{id}/{acc_no}', [App\Http\Controllers\PatientController::class, 'medicalhistory'])->name('medical_history');
Route::get('/patient/socialhistory/{id}/{acc_no}', [App\Http\Controllers\PatientController::class, 'socialhistory'])->name('social_history');
Route::get('/patient/p_callscript/{id}/{acc_no}', [App\Http\Controllers\P_CallScriptController::class, 'callScript'])->name('call_script');
// Route::get('/patient/callscript/{id}/{acc_no}', [App\Http\Controllers\CallScriptController::class, 'callScript'])->name('call_script');
Route::get('/patient/download', [App\Http\Controllers\PatientController::class, 'download'])->name('patient_download');
Route::get('/patient/search', [App\Http\Controllers\PatientController::class, 'search'])->name('patient_search');

Route::get('/ct4her', [App\Http\Controllers\Ct4herController::class, 'index'])->name('ct4her');
Route::get('/ct4her/register', [App\Http\Controllers\Ct4herController::class, 'register'])->name('ct4her_register');
// Route::get('/ct4her/update/{id}', [App\Http\Controllers\Ct4herController::class, 'update'])->name('ct4her_update');
Route::get('/ct4her/update/{ct4herid}/{patient}', [App\Http\Controllers\Ct4herController::class, 'update'])->name('ct4her_update');
Route::get('/ct4her/adverseevents/{ct4herid}/{patient}', [App\Http\Controllers\Ct4herController::class, 'adverse_events'])->name('ct4her_adverse_events');
Route::get('/ct4her/download', [App\Http\Controllers\Ct4herController::class, 'download'])->name('ct4her_download');
Route::get('/ct4her/search', [App\Http\Controllers\Ct4herController::class, 'search'])->name('ct4her_search');

Route::get('/diagnosis', [App\Http\Controllers\DiagnosisPreController::class, 'index'])->name('diagnosis');
Route::get('/diagnosis/create', [App\Http\Controllers\DiagnosisPreController::class, 'create'])->name('diagnosis_create');
Route::post('/diagnosis/store', [App\Http\Controllers\DiagnosisPreController::class, 'store'])->name('diagnosis_store');
Route::get('/diagnosis/edit/{diagnosis}', [App\Http\Controllers\DiagnosisPreController::class, 'edit'])->name('diagnosis_edit');
Route::patch('/diagnosis/update/{diagnosis}', [App\Http\Controllers\DiagnosisPreController::class, 'update'])->name('diagnosis_update');

Route::get('/dropout', [App\Http\Controllers\DropoutPreController::class, 'index'])->name('dropout');
Route::get('/dropout/create', [App\Http\Controllers\DropoutPreController::class, 'create'])->name('dropout_create');
Route::post('/dropout/store', [App\Http\Controllers\DropoutPreController::class, 'store'])->name('dropout_store');
Route::get('/dropout/edit/{dropout}', [App\Http\Controllers\DropoutPreController::class, 'edit'])->name('dropout_edit');
Route::patch('/dropout/update/{dropout}', [App\Http\Controllers\DropoutPreController::class, 'update'])->name('dropout_update');

Route::get('/insurance', [App\Http\Controllers\InsurancePreController::class, 'index'])->name('insurance');
Route::get('/insurance/create', [App\Http\Controllers\InsurancePreController::class, 'create'])->name('insurance_create');
Route::post('/insurance/store', [App\Http\Controllers\InsurancePreController::class, 'store'])->name('insurance_store');
Route::get('/insurance/edit/{insurance}', [App\Http\Controllers\InsurancePreController::class, 'edit'])->name('insurance_edit');
Route::patch('/insurance/update/{insurance}', [App\Http\Controllers\InsurancePreController::class, 'update'])->name('insurance_update');

Route::get('/response', [App\Http\Controllers\ResponsePreController::class, 'index'])->name('response');
Route::get('/response/create', [App\Http\Controllers\ResponsePreController::class, 'create'])->name('response_create');
Route::post('/response/store', [App\Http\Controllers\ResponsePreController::class, 'store'])->name('response_store');
Route::get('/response/edit/{response}', [App\Http\Controllers\ResponsePreController::class, 'edit'])->name('response_edit');
Route::patch('/response/update/{response}', [App\Http\Controllers\ResponsePreController::class, 'update'])->name('response_update');

Route::get('/practitioner', [App\Http\Controllers\PractitionerPreContoller::class, 'index'])->name('practitioner');
Route::get('/practitioner/create', [App\Http\Controllers\PractitionerPreContoller::class, 'create'])->name('practitioner_create');
Route::post('/practitioner/store', [App\Http\Controllers\PractitionerPreContoller::class, 'store'])->name('practitioner_store');
Route::get('/practitioner/edit/{practitioner}', [App\Http\Controllers\PractitionerPreContoller::class, 'edit'])->name('practitioner_edit');
Route::patch('/practitioner/update/{practitioner}', [App\Http\Controllers\PractitionerPreContoller::class, 'update'])->name('practitioner_update');

Route::get('/report', [App\Http\Controllers\ReportController::class, 'index'])->name('report');
Route::get('/report/patient/details', [App\Http\Controllers\ReportController::class, 'patient_details'])->name('patient_details_report');
Route::get('/report/patient/details/download/{from}/{to}', [App\Http\Controllers\ReportController::class, 'download_patient_details'])->name('download_patient_details_report');

Route::get('/report/dose_n_sig', [App\Http\Controllers\ReportController::class, 'dose_n_sig'])->name('dose_n_sig_report');
Route::get('/report/dose_n_sig/download/{from}/{to}', [App\Http\Controllers\ReportController::class, 'download_dose_n_sig'])->name('download_dose_n_sig_report');

Route::get('/report/p/attachment', [App\Http\Controllers\ReportController::class, 'patient_attachment'])->name('patient_attachment_report');
Route::get('/report/p/attachment/show/{id}/{fileType}', [App\Http\Controllers\ReportController::class, 'showFile'])->name('patient_attachment_showFile');

Route::get('/report/cancer', [App\Http\Controllers\ReportController::class, 'cancer'])->name('cancer_report');
Route::get('/report/cancer/download/{from}/{to}', [App\Http\Controllers\ReportController::class, 'download_cancer'])->name('download_cancer_report');

Route::get('/report/medical/history', [App\Http\Controllers\ReportController::class, 'medicalHistory'])->name('medical_history_report');
Route::get('/report/medical/history/download/{from}/{to}', [App\Http\Controllers\ReportController::class, 'download_medicalHistory'])->name('download_medical_history_report');

Route::get('/report/social/history', [App\Http\Controllers\ReportController::class, 'socialHistory'])->name('social_history_report');
Route::get('/report/social/history/download/{from}/{to}', [App\Http\Controllers\ReportController::class, 'download_socialHistory'])->name('download_social_history_report');

Route::get('/report/ct4her', [App\Http\Controllers\ReportController::class, 'ct4her'])->name('ct4her_report');
Route::get('/report/ct4her/download/{from}/{to}', [App\Http\Controllers\ReportController::class, 'download_ct4her'])->name('download_ct4her_report');

Route::get('/report/adverse', [App\Http\Controllers\ReportController::class, 'adverse'])->name('adverse_report');
Route::get('/report/adverse/download/{from}/{to}', [App\Http\Controllers\ReportController::class, 'download_adverse'])->name('download_adverse_report');

Route::get('/report/callscript', [App\Http\Controllers\ReportController::class, 'p_callScript'])->name('call_script_report');
//Route::get('/report/callscript', [App\Http\Controllers\ReportController::class, 'callScript'])->name('call_script_report');
Route::get('/report/callscript/download/{from}/{to}', [App\Http\Controllers\ReportController::class, 'p_download_callScript'])->name('download_call_script_report');

//Route::get('/report/dose_n_sig/download/{from}/{to}', [App\Http\Controllers\ReportController::class, 'download_dose_n_sig'])->name('download_dose_n_sig_report');

Route::get('/p_response', [App\Http\Controllers\P_ResponsePreController::class, 'index'])->name('p_response');
Route::get('/p_response/create', [App\Http\Controllers\P_ResponsePreController::class, 'create'])->name('p_response_create');
Route::post('/p_response/store', [App\Http\Controllers\P_ResponsePreController::class, 'store'])->name('p_response_store');
Route::get('/p_response/edit/{response}', [App\Http\Controllers\P_ResponsePreController::class, 'edit'])->name('p_response_edit');
Route::patch('/p_response/update/{response}', [App\Http\Controllers\P_ResponsePreController::class, 'update'])->name('p_response_update');