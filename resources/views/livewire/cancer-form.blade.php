<div>
    <form  wire:submit.prevent="{{$method}}">
        @csrf
    
        <div class="form_title">
            <h3>PATIENT INTAKE FORM </h3>
            <p>
                <b><u>Disclaimer:</u></b> Thank you for the role to serve you. This form is used to collect information  
                about you that will help us provide you with the best care and will be used for internal 
                purposes  only. The information you supply is confidential and will be treated accordingly. 
            </p>
        </div>
        {{-- {{dd($diagnosis_data)}} --}}
        <div class="form_wrapper">
            @if ($currentStep == 1)
                <div class="step-one">
                    <div class="steps  bg-secondary text-white">STEP 1/4</div>
                    <h4 class="sectionTitle" >CANCER DIAGNOSIS DATA</h4>
                    <div class="personal_info">
    
                        {{-- <div class="row_entry">
                            <div>
                                <label for="patient_initials">Patient’s Initials </label><br>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="patient_initials" id="patient_initials" wire:model="patient_initials" >
                                <span class="text-danger">@error('patient_initials'){{ $message }}@enderror</span>
                            </div>
                            <div>
                                <label for="Interviewer_Initials">Interviewer’s Initials</label><br>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="Interviewer_Initials" id="Interviewer_Initials"  wire:model="Interviewer_Initials">
                                <span class="text-danger">@error('Interviewer_Initials'){{ $message }}@enderror</span>
                            </div>
                        </div> --}}
    
                        <div class="single_item">
                            <div>
                                <label for="current_diagnosis">Current Diagnosis</label><br>

                                <select <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="current_diagnosis" id="current_diagnosis"   wire:model="current_diagnosis">
                                    <option value="">Select</option>
                                    @foreach ($diagnosis_data as $diagnosis_data)
                                        <option value="{{$diagnosis_data->diagnosis}}">{{$diagnosis_data->diagnosis}}</option>
                                    @endforeach
                                </select>
                                
                                @if(Auth::user()->role>1)
                                    <a href="{{route('diagnosis_create')}}">
                                        <button <?php if(Auth::user()->role<2){echo 'disabled';} ?>type="button" class="btn btn-md btn-success" >+ Add</button>
                                    </a>
                                @endif
                                    
                                

                                {{-- <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="current_diagnosis" id="current_diagnosis"  wire:model="current_diagnosis"> --}}
                                <span class="text-danger">@error('current_diagnosis'){{ $message }}@enderror</span>
                            </div>
                            
                        </div>
    
                        <div class="row_entry">
                            <div>
                                <label for="diagnosis_date">Diagnosis Date</label><br>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="date" name="diagnosis_date" id="diagnosis_date"  wire:model="diagnosis_date">
                                <span class="text-danger">@error('diagnosis_date'){{ $message }}@enderror</span>
                            </div>
                            <div>
                                <label for="last_name">Last Name-To be confirmed</label><br>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="last_name" id="last_name"  wire:model="last_name">
                                <span class="text-danger">@error('last_name'){{ $message }}@enderror</span>
                            </div>
                            
                        </div>
                        <div class="row_entry">
                            <div>
                                <p>Did you have Surgery?</p>
    
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="surgery_yes" name="had_surgery" value="Yes"  wire:model="had_surgery">
                                <label for="surgery_yes">Yes</label>&nbsp&nbsp&nbsp
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="surgery_no" name="had_surgery" value="No"  wire:model="had_surgery">
                                <label for="surgery_no">No</label><br>
                                <span class="text-danger">@error('had_surgery'){{ $message }}@enderror</span>
                                
                            </div>
    
                            <div>
                                <label for="surgery_date">If Yes Surgery Date?</label><br>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="date" name="surgery_date" id="surgery_date"  wire:model="surgery_date">
                                <span class="text-danger">@error('surgery_date'){{ $message }}@enderror</span>
                            </div>
                            
                        </div>
                        <div class="row_entry">
                            <div>
                                <label for="surgeon_name">Surgeon’s Name</label><br>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="surgeon_name" id="surgeon_name"  wire:model="surgeon_name">
                                <span class="text-danger">@error('surgeon_name'){{ $message }}@enderror</span>
                            </div>
                            <div>
                                <label for="surgeon_phone">Surgeon’s Phone no.</label><br>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="surgeon_phone" id="surgeon_phone"  wire:model="surgeon_phone">
                                <span class="text-danger">@error('surgeon_phone'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <label for="what_surgery">What Surgery?</label><br>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="what_surgery" id="what_surgery"  wire:model="what_surgery">
                                <span class="text-danger">@error('what_surgery'){{ $message }}@enderror</span>
                            </div> 
                        </div>
                        <div class="row_entry">
                            <div>
                                <p>Have Fully Recovered from the surgery?</p>
    
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="surgery_recovered_yes" name="surgery_recovered" value="Yes"  wire:model="surgery_recovered">
                                <label for="surgery_recovered_yes">Yes</label>&nbsp&nbsp&nbsp
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="surgery_recovered_no" name="surgery_recovered" value="No"  wire:model="surgery_recovered">
                                <label for="surgery_recovered_no">No</label><br>
                                <span class="text-danger">@error('surgery_recovered'){{ $message }}@enderror</span>
                                
                            </div>
                            <div>
                                <p>Any Surgery Complications?</p>
    
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="surgery_complication_yes" name="surgery_complication" value="Yes"  wire:model="surgery_complication">
                                <label for="surgery_complication_yes">Yes</label>&nbsp&nbsp&nbsp
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="surgery_complication_no" name="surgery_complication" value="No"  wire:model="surgery_complication">
                                <label for="surgery_complication_no">No</label><br>
                                <span class="text-danger">@error('surgery_complication'){{ $message }}@enderror</span>
                                
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <p>If  Yes, Please Explain</p>
                                <textarea <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> name="surgery_complication_explain" id="surgery_complication_explain" cols="100" rows="5"  
                                    wire:model="surgery_complication_explain">
                                </textarea>
                                <span class="text-danger">@error('surgery_complication_explain'){{ $message }}@enderror</span>
                                
                            </div> 
                            
                        </div>
                        <div class="row_entry">
                            <div>
                                <p>Did you have Radiation?</p>
    
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="had_radiation_yes" name="had_radiation" value="Yes"  wire:model="had_radiation">
                                <label for="had_radiation_yes">Yes</label>&nbsp&nbsp&nbsp
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="had_radiation_no" name="had_radiation" value="No"  wire:model="had_radiation">
                                <label for="had_radiation_no">No</label><br>
                                <span class="text-danger">@error('had_radiation'){{ $message }}@enderror</span>
                                
                            </div>
                            <div>
                                <label for="radiation_date">If Yes, Radiation Date?</label><br>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="date"  name="radiation_date" id="radiation_date"  wire:model="radiation_date">
                                <span class="text-danger">@error('radiation_date'){{ $message }}@enderror</span>
                            </div> 
                        </div>
                        <div class="row_entry">
                            <div>
                                <label for="radiologist_name">Radiologist’s Name</label><br>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="radiologist_name" id="radiologist_name"  wire:model="radiologist_name">
                                <span class="text-danger">@error('radiologist_name'){{ $message }}@enderror</span>
                            </div> 
                            <div>
                                <label for="radiologist_phone">Radiologist’s Phone No.</label><br>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="radiologist_phone" id="radiologist_phone"  wire:model="radiologist_phone">
                                <span class="text-danger">@error('radiologist_phone'){{ $message }}@enderror</span>
                            </div> 
                        </div>
                        <div class="single_item">
                            <div>
                                <p>What Radiation Treatment?</p>
                                <textarea <?php if(Auth::user()->role<2){echo 'disabled';} ?> name="radiation_treatment" id="radiation_treatment" cols="100" rows="3"  
                                    wire:model="radiation_treatment">
                                </textarea>
                                <span class="text-danger">@error('radiation_treatment'){{ $message }}@enderror</span>
                                
                            </div> 
                            
                        </div>
                        <div class="row_entry">
                            <div>
                                <p>Have Fully Recovered from Radiation?</p>
    
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="radiation_recovered_yes" name="radiation_recovered" value="Yes"  wire:model="radiation_recovered">
                                <label for="radiation_recovered_yes">Yes</label>&nbsp&nbsp&nbsp
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="radiation_recovered_no" name="radiation_recovered" value="No"  wire:model="radiation_recovered">
                                <label for="radiation_recovered_no">No</label><br>
                                <span class="text-danger">@error('radiation_recovered'){{ $message }}@enderror</span>
                                
                            </div>
                            <div>
                                <p>Any Radiation Complications?</p>
    
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="radiation_complications_yes" name="radiation_complications" value="Yes"  wire:model="radiation_complications">
                                <label for="radiation_complications_yes">Yes</label>&nbsp&nbsp&nbsp
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="radiation_complications_no" name="radiation_complications" value="No"  wire:model="radiation_complications">
                                <label for="radiation_complications_no">No</label><br>
                                <span class="text-danger">@error('radiation_complications'){{ $message }}@enderror</span>
                                
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <p>If Yes (Radius complicatins) Please Explain</p>
                                <textarea <?php if(Auth::user()->role<2){echo 'disabled';} ?> name="radiation_complication_explain" id="radiation_complication_explain" cols="100" rows="4"  
                                    wire:model="radiation_complication_explain">
                                </textarea>
                                <span class="text-danger">@error('radiation_complication_explain'){{ $message }}@enderror</span>
                                
                            </div> 
                            
                        </div>
                        <div class="single_item">
                            <div>
                                <p>Omitted repetitive info**************** To be confirmed</p>
                                
                                
                            </div> 
                            
                        </div>
                    
                    
                    </div>
                </div>
            @endif
    
            @if ($currentStep == 2)
                <div class="step-two">
                    <div class="steps bg-secondary text-white">STEP 2/4</div>
                    <h4 class="sectionTitle" >TREATING PHYSICIANS</h4>
                
                    <div class="row_entry">
                        <div>
                            <label for="primary_physician_name">Primary Care Physician Name</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="primary_physician_name" id="primary_physician_name"  wire:model="primary_physician_name">
                            <span class="text-danger">@error('primary_physician_name'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="primary_physician_contact">Primary Care Physician Contact </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="primary_physician_contact" id="primary_physician_contact"  wire:model="primary_physician_contact">
                            <span class="text-danger">@error('primary_physician_contact'){{ $message }}@enderror</span>
                        </div> 
                    </div>
                    <div class="row_entry">
                        <div>
                            <label for="oncologist_name">Oncologist Name</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="oncologist_name" id="oncologist_name"  wire:model="oncologist_name">
                            <span class="text-danger">@error('oncologist_name'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="oncologist_phone">Oncologist Contact </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="oncologist_phone" id="oncologist_phone"  wire:model="oncologist_phone">
                            <span class="text-danger">@error('oncologist_phone'){{ $message }}@enderror</span>
                        </div> 
                    </div>
                    <div class="single_item">
                        <div>
                            <p>List all other actively treating physicians:  </p>
                        </div> 
                        
                    </div>
                    <div class="row_entry">
                        <div>
                            <label for="physician_1_name">Physician 1 Name </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="physician_1_name" id="physician_1_name"  wire:model="physician_1_name">
                            <span class="text-danger">@error('physician_1_name'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="physician_1_speciality">Physician 1 Speciality </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="physician_1_speciality" id="physician_1_speciality"  wire:model="physician_1_speciality">
                            <span class="text-danger">@error('physician_1_speciality'){{ $message }}@enderror</span>
                        </div> 
                    </div>
                    <div class="row_entry">
                        <div>
                            <label for="physician_2_name">Physician 2 Name </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="physician_2_name" id="physician_2_name"  wire:model="physician_2_name">
                            <span class="text-danger">@error('physician_2_name'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="physician_2_speciality">Physician 2 Speciality </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="physician_2_speciality" id="physician_2_speciality"  wire:model="physician_2_speciality">
                            <span class="text-danger">@error('physician_2_speciality'){{ $message }}@enderror</span>
                        </div> 
                    </div>
                    <div class="row_entry">
                        <div>
                            <label for="physician_3_name">Physician 3 Name </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="physician_3_name" id="physician_3_name"  wire:model="physician_3_name">
                            <span class="text-danger">@error('physician_3_name'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="physician_3_speciality">Physician 3 Speciality </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="physician_3_speciality" id="physician_3_speciality"  wire:model="physician_3_speciality">
                            <span class="text-danger">@error('physician_3_speciality'){{ $message }}@enderror</span>
                        </div> 
                    </div>
                    <div class="row_entry">
                        <div>
                            <label for="physician_4_name">Physician 4 Name </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="physician_4_name" id="physician_4_name"  wire:model="physician_4_name">
                            <span class="text-danger">@error('physician_4_name'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="physician_4_speciality">Physician 4 Speciality </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="physician_4_speciality" id="physician_4_speciality"  wire:model="physician_4_speciality">
                            <span class="text-danger">@error('physician_4_speciality'){{ $message }}@enderror</span>
                        </div> 
                    </div>
                
                </div>
            @endif

            @if ($currentStep == 3)
                <div class="step-two">
                    <div class="steps bg-secondary text-white">STEP 3/4</div>
                    <h4 class="sectionTitle" >ALLERGIES</h4>

                    <div class="single_item">
                        <div>
                            <p>List your allergies and describe the reactions to your body:   </p>
                        </div> 
                        
                    </div>

                    <div class="row_entry">
                        <div>
                            <label for="allergy_1">Allergy 1 </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="allergy_1" id="allergy_1"  wire:model="allergy_1">
                            <span class="text-danger">@error('allergy_1'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="allergy_1_reaction">Allergy 1 Reaction </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="allergy_1_reaction" id="allergy_1_reaction"  wire:model="allergy_1_reaction">
                            <span class="text-danger">@error('allergy_1_reaction'){{ $message }}@enderror</span>
                        </div> 
                    </div>
                    <div class="row_entry">
                        <div>
                            <label for="allergy_2">Allergy 2 </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="allergy_2" id="allergy_2"  wire:model="allergy_2">
                            <span class="text-danger">@error('allergy_2'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="allergy_2_reaction">Allergy 2 Reaction </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="allergy_2_reaction" id="allergy_2_reaction"  wire:model="allergy_2_reaction">
                            <span class="text-danger">@error('allergy_2_reaction'){{ $message }}@enderror</span>
                        </div> 
                    </div>
                    <div class="row_entry">
                        <div>
                            <label for="allergy_3">Allergy 3 </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="allergy_3" id="allergy_3"  wire:model="allergy_3">
                            <span class="text-danger">@error('allergy_3'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="allergy_3_reaction">Allergy 3 Reaction </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="allergy_3_reaction" id="allergy_3_reaction"  wire:model="allergy_3_reaction">
                            <span class="text-danger">@error('allergy_3_reaction'){{ $message }}@enderror</span>
                        </div> 
                    </div>
                    <div class="row_entry">
                        <div>
                            <label for="allergy_4">Allergy 4 </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="allergy_4" id="allergy_4"  wire:model="allergy_4">
                            <span class="text-danger">@error('allergy_4'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="allergy_4_reaction">Allergy 4 Reaction </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="allergy_4_reaction" id="allergy_4_reaction"  wire:model="allergy_4_reaction">
                            <span class="text-danger">@error('allergy_4_reaction'){{ $message }}@enderror</span>
                        </div> 
                    </div>
                
                </div>
            @endif

            {{-- @if ($currentStep == 4)
                <div class="step-two">
                    <div class="steps bg-secondary text-white">STEP 4/5</div>
                    <h4 class="sectionTitle" >MEDICATION (RX and OTC)</h4>

                    <div class="single_item">
                        <div>
                            <p>List the medications you are currently taking including the dosage: </p>
                        </div> 
                        
                    </div>

                    <div class="row_entry">
                        <div>
                            <label for="dose_n_sig_1">Dose & SIG 1 </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="dose_n_sig_1" id="dose_n_sig_1"  wire:model="dose_n_sig_1">
                            <span class="text-danger">@error('dose_n_sig_1'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="dose_n_sig_1_medication">Dose & SIG 1 Medication </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="dose_n_sig_1_medication" id="dose_n_sig_1_medication"  wire:model="dose_n_sig_1_medication">
                            <span class="text-danger">@error('dose_n_sig_1_medication'){{ $message }}@enderror</span>
                        </div> 
                    </div>
                    <div class="row_entry">
                        <div>
                            <label for="dose_n_sig_2">Dose & SIG 2 </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="dose_n_sig_2" id="dose_n_sig_2"  wire:model="dose_n_sig_2">
                            <span class="text-danger">@error('dose_n_sig_2'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="dose_n_sig_2_medication">Dose & SIG 2 Medication </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="dose_n_sig_2_medication" id="dose_n_sig_2_medication"  wire:model="dose_n_sig_2_medication">
                            <span class="text-danger">@error('dose_n_sig_2_medication'){{ $message }}@enderror</span>
                        </div> 
                    </div>
                    <div class="row_entry">
                        <div>
                            <label for="dose_n_sig_3">Dose & SIG 3 </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="dose_n_sig_3" id="dose_n_sig_3"  wire:model="dose_n_sig_3">
                            <span class="text-danger">@error('dose_n_sig_3'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="dose_n_sig_3_medication">Dose & SIG 3 Medication </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="dose_n_sig_3_medication" id="dose_n_sig_3_medication"  wire:model="dose_n_sig_3_medication">
                            <span class="text-danger">@error('dose_n_sig_3_medication'){{ $message }}@enderror</span>
                        </div> 
                    </div>
                    <div class="row_entry">
                        <div>
                            <label for="dose_n_sig_4">Dose & SIG 4 </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="dose_n_sig_4" id="dose_n_sig_4"  wire:model="dose_n_sig_4">
                            <span class="text-danger">@error('dose_n_sig_4'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="dose_n_sig_4_medication">Dose & SIG 4 Medication </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="dose_n_sig_4_medication" id="dose_n_sig_4_medication"  wire:model="dose_n_sig_4_medication">
                            <span class="text-danger">@error('dose_n_sig_4_medication'){{ $message }}@enderror</span>
                        </div> 
                    </div>
                
                </div>
            @endif --}}

            @if ($currentStep == 4)
                <div class="step-one">
                    <div class="steps  bg-secondary text-white">STEP 4/4</div>
                    <h4 class="sectionTitle" >REGARDING CANCER TREATMENT</h4>
                    <div class="personal_info">
    
                        <div class="single_item">
                            <div>
                                <label for="primary_worry">What is your primary worry </label><br>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="primary_worry" id="primary_worry" wire:model="primary_worry" >
                                <span class="text-danger">@error('primary_worry'){{ $message }}@enderror</span>
                            </div>
                        </div>
    
                        <div class="single_item">
                            <div>
                                <label for="issue_began">Approximately when did this issue begin? </label><br>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="issue_began" id="issue_began"  wire:model="issue_began">
                                <span class="text-danger">@error('issue_began'){{ $message }}@enderror</span>
                            </div>
                            
                        </div>
    
                        <div class="single_item">
                            <div>
                                <p>Are you in pain? </p>
    
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="in_pain_yes" name="in_pain" value="Yes"  wire:model="in_pain">
                                <label for="in_pain_yes">Yes</label>&nbsp&nbsp&nbsp
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="in_pain_no" name="in_pain" value="No"  wire:model="in_pain">
                                <label for="in_pain_no">No</label><br>
                                <span class="text-danger">@error('in_pain'){{ $message }}@enderror</span>
                                
                            </div>
    
                        </div>
                        <div class="single_item">
                            <div>
                                <p>If YES, where is the Pain?</p>
                                <textarea <?php if(Auth::user()->role<2){echo 'disabled';} ?> name="pain_location" id="pain_location" cols="100" rows="3"  
                                    wire:model="pain_location">
                                </textarea>
                            </div>
                            
                        </div>
                        <div class="single_item">
                            <div>
                                <p>How do you treat the Pain?</p>
                                <textarea <?php if(Auth::user()->role<2){echo 'disabled';} ?> name="pain_treatment" id="pain_treatment" cols="100" rows="3"  
                                    wire:model="pain_treatment">
                                </textarea>
                            </div>
                            
                        </div>
                        <div class="row_entry">
                            <div>
                                <p>How has the pain changed when treated?</p>
    
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="pain_treatment_increase" name="pain_treatment_change" value="Increased"  wire:model="pain_treatment_change">
                                <label for="pain_treatment_increase">Increased</label>&nbsp&nbsp&nbsp
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="pain_treatment_decrease" name="pain_treatment_change" value="Decreased"  wire:model="pain_treatment_change">
                                <label for="pain_treatment_decrease">Decreased</label>&nbsp&nbsp&nbsp
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="pain_treatment_unchage" name="pain_treatment_change" value="Unchaged"  wire:model="pain_treatment_change">
                                <label for="pain_treatment_unchage">Unchaged</label><br>
                                <span class="text-danger">@error('pain_treatment_change'){{ $message }}@enderror</span>
                                
                            </div>
                            <div>
                                <p>How quickly did your current pain begin?</p>
    
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="pain_begin_trend_gradual" name="pain_begin_trend" value="Gradually"  wire:model="pain_begin_trend">
                                <label for="pain_begin_trend_gradual">Gradually</label>&nbsp&nbsp&nbsp
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="pain_begin_trend_sudden" name="pain_begin_trend" value="Suddenly"  wire:model="pain_begin_trend">
                                <label for="pain_begin_trend_sudden">Suddenly</label><br>
                                <span class="text-danger">@error('pain_begin_trend'){{ $message }}@enderror</span>
                                
                            </div>
                        </div>

                        <div class="row_entry">
                            <div>
                                <p>How often does your pain occur?</p>
    
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="pain_occurence_constant" name="pain_occurence" value="Constantly"  wire:model="pain_occurence">
                                <label for="pain_occurence_constant">Constantly</label>&nbsp&nbsp&nbsp
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="pain_occurence_occassional" name="pain_occurence" value="Occasionally"  wire:model="pain_occurence">
                                <label for="pain_occurence_occassional">Occasionally</label>&nbsp&nbsp&nbsp
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="pain_occurence_rarely" name="pain_occurence" value="Rarely"  wire:model="pain_occurence">
                                <label for="pain_occurence_rarely">Rarely</label><br>
                                <span class="text-danger">@error('pain_occurence'){{ $message }}@enderror</span>
                                
                            </div>
                            <div>
                                <p>When is your pain at its worst? </p>
    
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="pain_worst_morning" name="pain_worst" value="Morning"  wire:model="pain_worst">
                                <label for="pain_worst_morning">Morning</label>&nbsp&nbsp&nbsp
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="pain_worst_afternoon" name="pain_worst" value="Afternoon"  wire:model="pain_worst">
                                <label for="pain_worst_afternoon">Afternoon</label>&nbsp&nbsp&nbsp
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="pain_worst_even" name="pain_worst" value="Evenning"  wire:model="pain_worst">
                                <label for="pain_worst_even">Evenning</label>&nbsp&nbsp&nbsp
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="pain_worst_night" name="Night" value="Night"  wire:model="pain_worst">
                                <label for="pain_worst_night">Suddenly</label><br>
                                <span class="text-danger">@error('pain_worst'){{ $message }}@enderror</span>
                                
                            </div>
                        </div>

                        <div class="single_item">
                            <div>
                                <p>What are your current symptoms? </p>
                                <textarea <?php if(Auth::user()->role<2){echo 'disabled';} ?> name="curr_symptoms" id="curr_symptoms" cols="100" rows="3"  
                                    wire:model="curr_symptoms">
                                </textarea>
                            </div>
                            
                        </div>
                        <div class="single_item">
                            <div>
                                <p>Check any of the following that describe your pain:  </p>
                                <div class="pain_descr">
                                    <div>
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="checkbox" name="aching" id="aching" value="Aching"  wire:model="pain_descr">
                                        <label for="aching"> Aching</label><br>
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="checkbox" name="cramping" id="cramping" value="Cramping "  wire:model="pain_descr">
                                        <label for="cramping">Cramping </label><br>
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="checkbox" name="dull" id="dull" value="Dull"  wire:model="pain_descr">
                                        <label for="dull"> Dull</label><br>
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="checkbox" name="hot" id="hot" value="Burning"  wire:model="pain_descr">
                                        <label for="hot">Hot/Burning </label><br>
                                        {{-- <span class="text-danger">@error('pain_descr'){{ $message }}@enderror</span> --}}
                                    </div>
                                    <div>
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="checkbox" name="numbness" id="numbness" value="Numbness"  wire:model="pain_descr">
                                        <label for="numbness"> Numbness</label><br>
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="checkbox" name="shock-like " id="shock-like" value="shock-like"  wire:model="pain_descr">
                                        <label for="shock-like ">Shock-like  </label><br>
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="checkbox" name="shooting " id="shooting" value="shooting "  wire:model="pain_descr">
                                        <label for="shooting ">Shooting </label><br>
                                        {{-- <span class="text-danger">@error('pain_descr'){{ $message }}@enderror</span> --}}
                                    </div>
                                    <div>
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="checkbox" name="spasming " id="spasming" value="spasming"  wire:model="pain_descr">
                                        <label for="spasming "> Spasming </label><br>
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="checkbox" name="squeezing  " id="squeezing" value="squeezing"  wire:model="pain_descr">
                                        <label for="squeezing  ">Squeezing   </label><br>
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="checkbox" name="sharp  " id="sharp  " value="sharp"  wire:model="pain_descr">
                                        <label for="sharp  ">Stabbing/Sharp</label><br>
                                        {{-- <span class="text-danger">@error('pain_descr'){{ $message }}@enderror</span> --}}
                                    </div>
                                    <div>
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="checkbox" name="throbbing " id="throbbing " value="Throbbing "  wire:model="pain_descr">
                                        <label for="throbbing "> Throbbing </label><br>
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="checkbox" name="tingling" id="tingling" value="Tingling "  wire:model="pain_descr">
                                        <label for="tingling">Tingling </label><br>
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="checkbox" name="tiring/exhausting" id="tiring/exhausting" value="Tiring/Exhausting"  wire:model="pain_descr">
                                        <label for="tiring/exhausting">Tiring/Exhausting </label><br>
                                        {{-- <span class="text-danger">@error('pain_descr'){{ $message }}@enderror</span> --}}
                                    </div>
                                    <span class="text-danger">@error('pain_descr'){{ $message }}@enderror</span>
                                </div>

                                
                            </div>
                            
                        </div>
                      
                        <div class="single_item">
                            <div>
                                <p>List any other health concerns that you would like us to know about:</p>
                                <textarea <?php if(Auth::user()->role<2){echo 'disabled';} ?> name="other_health_concerns" id="other_health_concerns" cols="100" rows="3"  
                                    wire:model="other_health_concerns">
                                </textarea>
                                <span class="text-danger">@error('other_health_concerns'){{ $message }}@enderror</span>
                            </div> 
                        </div>
                    
                    </div>
                </div>
            @endif
    
    
    
            {{-- ------------------Buttons------------------------- --}}
    
            
        </div>
    
        <div class="action-buttons d-flex justify-content-between bg-white pt-2 pb-2">
    
            @if ($currentStep == 1)
                    <div></div>
            @endif
    
            @if ($currentStep >1 )
                <button type="button" class="btn btn-md btn-secondary" wire:click="decreaseStep()">Previous</button>
            @endif
            @if ($currentStep!=4)
                <button  <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="submit" class="btn btn-md btn-primary">Save draft</button>
            @endif
            @if ($currentStep <4)
                <button type="button" class="btn btn-md btn-success" wire:click="increaseStep()">Next</button>
            @endif
            
            @if ($currentStep == 4)
                <button  <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="submit" class="btn btn-md btn-primary">Submit</button>
            @endif
        </div>
    
    </form>
</div>
