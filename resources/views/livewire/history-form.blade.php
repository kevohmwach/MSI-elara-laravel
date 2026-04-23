<div>
    <form  wire:submit.prevent="{{$method}}">
        @csrf
    
        <div class="form_title">
            <h3>PATIENT INTAKE FORM </h3>
            <p>
                <b><u>Disclaimer:</u></b> Thank you for the privilege to serve you. This form is used to collect information  
                about you that will help us provide you with the best care and will be used for internal 
                purposes  only. The information you supply is confidential and will be treated accordingly. 
            </p>
        </div>
        
        <div class="form_wrapper">
           
            @if ($currentStep == 1)
                <div class="step-two">
                    <div class="steps bg-secondary text-white">STEP TWO</div>
                    <h4 class="sectionTitle" >SURGICAL HISTORY</h4>
                
                    <div class="single_item">
                        <div>
                           <p>List any surgeries, fractures, major illnesses, or hospitalizations that you have had</p>
                        </div>
                        
                    </div>
                    <div class="single_item">
                        <div>
                            <div >
                                <p>Surgery 1 Description</p>
                                <textarea <?php if(Auth::user()->role<2){echo 'disabled';} ?> name="surgery_1_description" id="surgery_1_description" cols="100" rows="3"  
                                    wire:model="surgery_1_description">
                                </textarea>
                            </div>
                        </div>
                        
                    </div>
                    <div class="single_item">
                        <div class="surgery_history">
                         
                          <div class="surgery__Doctor">
                            <label for="surgery_1_Doctor">Doctor</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="surgery_1_Doctor" id="surgery_1_Doctor"  wire:model="surgery_1_Doctor">
                            <span class="text-danger">@error('surgery_1_Doctor'){{ $message }}@enderror</span>
                          </div>
                          <div class="surgery__location">
                            <label for="surgery_1_location">Location</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="surgery_1_location" id="surgery_1_location"  wire:model="surgery_1_location">
                            <span class="text-danger">@error('surgery_1_location'){{ $message }}@enderror</span>
                          </div>
                          <div class="surgery__year">
                            <label for="surgery_1_year">Year</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="number"  name="surgery_1_year" id="surgery_1_year"  wire:model="surgery_1_year">
                            <span class="text-danger">@error('surgery_1_year'){{ $message }}@enderror</span>
                          </div>
                        </div>
                        
                    </div>
                    <div class="single_item">
                        <div>
                            <div >
                                <p>Surgery 2 Description</p>
                                <textarea <?php if(Auth::user()->role<2){echo 'disabled';} ?> name="surgery_2_description" id="surgery_2_description" cols="100" rows="3"  
                                    wire:model="surgery_2_description">
                                </textarea>
                              </div>
                        </div>
                        
                    </div>
                    <div class="single_item">
                        <div class="surgery_history">
                         
                          <div class="surgery__Doctor">
                            <label for="surgery_2_Doctor">Doctor</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="surgery_2_Doctor" id="surgery_2_Doctor"  wire:model="surgery_2_Doctor">
                            <span class="text-danger">@error('surgery_2_Doctor'){{ $message }}@enderror</span>
                          </div>
                          <div class="surgery__location">
                            <label for="surgery_2_location">Location</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="surgery_2_location" id="surgery_2_location"  wire:model="surgery_2_location">
                            <span class="text-danger">@error('surgery_2_location'){{ $message }}@enderror</span>
                          </div>
                          <div class="surgery__year">
                            <label for="surgery_2_year">Year</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="number"  name="surgery_2_year" id="surgery_2_year"  wire:model="surgery_2_year">
                            <span class="text-danger">@error('surgery_2_year'){{ $message }}@enderror</span>
                          </div>
                        </div>
                        
                    </div>
                    <div class="single_item">
                        <div>
                            <div >
                                <p>Surgery 3 Description</p>
                                <textarea <?php if(Auth::user()->role<2){echo 'disabled';} ?> name="surgery_3_description" id="surgery_3_description" cols="100" rows="3"  
                                    wire:model="surgery_3_description">
                                </textarea>
                              </div>
                        </div>
                        
                    </div>
                    <div class="single_item">
                        <div class="surgery_history">
                         
                          <div class="surgery__Doctor">
                            <label for="surgery_3_Doctor">Doctor</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="surgery_3_Doctor" id="surgery_3_Doctor"  wire:model="surgery_3_Doctor">
                            <span class="text-danger">@error('surgery_3_Doctor'){{ $message }}@enderror</span>
                          </div>
                          <div class="surgery__location">
                            <label for="surgery_3_location">Location</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="surgery_3_location" id="surgery_3_location"  wire:model="surgery_3_location">
                            <span class="text-danger">@error('surgery_3_location'){{ $message }}@enderror</span>
                          </div>
                          <div class="surgery__year">
                            <label for="surgery_3_year">Year</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="number"  name="surgery_3_year" id="surgery_3_year"  wire:model="surgery_3_year">
                            <span class="text-danger">@error('surgery_3_year'){{ $message }}@enderror</span>
                          </div>
                        </div>
                        
                    </div>
                    
                    <div class="single_item">
                        <div>
                            <div >
                                <p>Surgery 4 Description</p>
                                <textarea <?php if(Auth::user()->role<2){echo 'disabled';} ?> name="surgery_4_description" id="surgery_4_description" cols="100" rows="3"  
                                    wire:model="surgery_4_description">
                                </textarea>
                              </div>
                        </div>
                        
                    </div>
                    <div class="single_item">
                        <div class="surgery_history">
                         
                          <div class="surgery_Doctor">
                            <label for="surgery_4_Doctor">Doctor</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="surgery_4_Doctor" id="surgery_4_Doctor"  wire:model="surgery_4_Doctor">
                            <span class="text-danger">@error('surgery_4_Doctor'){{ $message }}@enderror</span>
                          </div>
                          <div class="surgery_location">
                            <label for="surgery_4_location">Location</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="surgery_4_location" id="surgery_4_location"  wire:model="surgery_4_location">
                            <span class="text-danger">@error('surgery_4_location'){{ $message }}@enderror</span>
                          </div>
                          <div class="surgery_year">
                            <label for="surgery_4_year">Year</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="number"  name="surgery_4_year" id="surgery_4_year"  wire:model="surgery_4_year">
                            <span class="text-danger">@error('surgery_4_year'){{ $message }}@enderror</span>
                          </div>
                        </div>
                        
                    </div>
                    
                    {{-- <div class="single_item">
                        <div>
                            <div >
                                <p>Surgery 5 Description</p>
                                <textarea <?php// if(Auth::user()->role<2){echo 'disabled';} ?> name="surgery_5_description" id="surgery_5_description" cols="100" rows="3"  
                                    wire:model="surgery_5_description">
                                </textarea>
                              </div>
                        </div>
                        
                    </div>
                    <div class="single_item">
                        <div class="surgery_history">
                         
                          <div class="surgery_Doctor">
                            <label for="surgery_5_Doctor">Doctor</label><br>
                            <input <?php// if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="surgery_5_Doctor" id="surgery_5_Doctor"  wire:model="surgery_5_Doctor">
                            <span class="text-danger">@error('surgery_5_Doctor'){{ $message }}@enderror</span>
                          </div>
                          <div class="surgery_location">
                            <label for="surgery_5_location">Location</label><br>
                            <input <?php// if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="surgery_5_location" id="surgery_5_location"  wire:model="surgery_5_location">
                            <span class="text-danger">@error('surgery_5_location'){{ $message }}@enderror</span>
                          </div>
                          <div class="surgery_year">
                            <label for="surgery_5_year">Year</label><br>
                            <input <?php// if(Auth::user()->role<2){echo 'disabled';} ?> type="number"  name="surgery_5_year" id="surgery_5_year"  wire:model="surgery_5_year">
                            <span class="text-danger">@error('surgery_5_year'){{ $message }}@enderror</span>
                          </div>
                        </div>
                        
                    </div>           --}}
                </div>
            @endif

            @if ($currentStep == 2)
                <div class="step-two">
                    <div class="steps bg-secondary text-white">STEP THREE</div>
                    <h4 class="sectionTitle" >MEDICAL HISTORY</h4>

                    <div class="single_item">
                        <div>
                            <p>Have you ever had any of the following?</p>
                            <div class="med_history">
                                <div>
                                    <div class="med_history_diseases">
                                        <div class="disease_spacing"><p>Anemia</p></div>
                                        <div>
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_anemia_yes" name="med_hist_anemia" value="Yes"  wire:model="med_hist_anemia">
                                            <label for="med_hist_anemia_yes">Yes</label>&nbsp&nbsp&nbsp
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_anemia_no" name="med_hist_anemia" value="No"  wire:model="med_hist_anemia">
                                            <label for="med_hist_anemia_no">No</label><br>
                                            <span class="text-danger">@error('med_hist_anemia'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="med_history_diseases">
                                        <div class="disease_spacing"><p>Arthritis Conditions </p></div>
                                        <div>
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_arthritis_yes" name="med_hist_arthritis" value="Yes"  wire:model="med_hist_arthritis">
                                            <label for="med_hist_arthritis_yes">Yes</label>&nbsp&nbsp&nbsp
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_arthritis_no" name="med_hist_arthritis" value="No"  wire:model="med_hist_arthritis">
                                            <label for="med_hist_arthritis_no">No</label><br>
                                            <span class="text-danger">@error('med_hist_arthritis'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="med_history_diseases">
                                        <div class="disease_spacing"><p>Asthma </p></div>
                                        <div>
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_asthma_yes" name="med_hist_asthma" value="Yes"  wire:model="med_hist_asthma">
                                            <label for="med_hist_asthma_yes">Yes</label>&nbsp&nbsp&nbsp
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_asthma_no" name="med_hist_asthma" value="No"  wire:model="med_hist_asthma">
                                            <label for="med_hist_asthma_no">No</label><br>
                                            <span class="text-danger">@error('med_hist_asthma'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="med_history_diseases">
                                        <div class="disease_spacing"><p>Atrial Fibrillation  </p></div>
                                        <div>
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_Atrial_fibrillation_yes" name="med_hist_Atrial_fibrillation" value="Yes"  wire:model="med_hist_Atrial_fibrillation">
                                            <label for="med_hist_Atrial_fibrillation_yes">Yes</label>&nbsp&nbsp&nbsp
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_Atrial_fibrillation_no" name="med_hist_Atrial_fibrillation" value="No"  wire:model="med_hist_Atrial_fibrillation">
                                            <label for="med_hist_Atrial_fibrillation_no">No</label><br>
                                            <span class="text-danger">@error('med_hist_Atrial_fibrillation'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="med_history_diseases">
                                        <div class="disease_spacing"><p>Bleeding Problems </p></div>
                                        <div>
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_bleeding_problems_yes" name="med_hist_bleeding_problems" value="Yes"  wire:model="med_hist_bleeding_problems">
                                            <label for="med_hist_bleeding_problems_yes">Yes</label>&nbsp&nbsp&nbsp
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_bleeding_problems_no" name="med_hist_bleeding_problems" value="No"  wire:model="med_hist_bleeding_problems">
                                            <label for="med_hist_bleeding_problems_no">No</label><br>
                                            <span class="text-danger">@error('med_hist_bleeding_problems'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="med_history_diseases">
                                        <div class="disease_spacing"><p>Benign Prostatic Hyperplasia </p></div>
                                        <div>
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_benign_prostatic_hyperplasia_yes" name="med_hist_benign_prostatic_hyperplasia" value="Yes"  wire:model="med_hist_benign_prostatic_hyperplasia">
                                            <label for="med_hist_benign_prostatic_hyperplasia_yes">Yes</label>&nbsp&nbsp&nbsp
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_benign_prostatic_hyperplasia_no" name="med_hist_benign_prostatic_hyperplasia" value="No"  wire:model="med_hist_benign_prostatic_hyperplasia">
                                            <label for="med_hist_benign_prostatic_hyperplasia_no">No</label><br>
                                            <span class="text-danger">@error('med_hist_benign_prostatic_hyperplasia'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="med_history_diseases">
                                        <div class="disease_spacing"><p>Coronary Artery Disease  </p></div>
                                        <div>
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_coronary_artery_disease_yes" name="med_hist_coronary_artery_disease" value="Yes"  wire:model="med_hist_coronary_artery_disease">
                                            <label for="med_hist_coronary_artery_disease_yes">Yes</label>&nbsp&nbsp&nbsp
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_coronary_artery_disease_no" name="med_hist_coronary_artery_disease" value="No"  wire:model="med_hist_coronary_artery_disease">
                                            <label for="med_hist_coronary_artery_disease_no">No</label><br>
                                            <span class="text-danger">@error('med_hist_coronary_artery_disease'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="med_history_diseases">
                                        <div class="disease_spacing"><p>Cancer </p></div>
                                        <div>
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_cancer _yes" name="med_hist_cancer" value="Yes"  wire:model="med_hist_cancer">
                                            <label for="med_hist_cancer _yes">Yes</label>&nbsp&nbsp&nbsp
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_cancer _no" name="med_hist_cancer" value="No"  wire:model="med_hist_cancer">
                                            <label for="med_hist_cancer _no">No</label><br>
                                            <span class="text-danger">@error('med_hist_cancer'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="med_history_diseases">
                                        <div class="disease_spacing"><p>Cardiac Arrest </p></div>
                                        <div>
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_cardiac _yes" name="med_hist_cardiac" value="Yes"  wire:model="med_hist_cardiac">
                                            <label for="med_hist_cardiac _yes">Yes</label>&nbsp&nbsp&nbsp
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_cardiac _no" name="med_hist_cardiac" value="No"  wire:model="med_hist_cardiac">
                                            <label for="med_hist_cardiac _no">No</label><br>
                                            <span class="text-danger">@error('med_hist_cardiac'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="med_history_diseases">
                                        <div class="disease_spacing"><p>Celiac Disease </p></div>
                                        <div>
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_celiac _yes" name="med_hist_celiac" value="Yes"  wire:model="med_hist_celiac">
                                            <label for="med_hist_celiac _yes">Yes</label>&nbsp&nbsp&nbsp
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_celiac _no" name="med_hist_celiac" value="No"  wire:model="med_hist_celiac">
                                            <label for="med_hist_celiac _no">No</label><br>
                                            <span class="text-danger">@error('med_hist_celiac'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="med_history_diseases">
                                        <div class="disease_spacing"><p>Chest Pain </p></div>
                                        <div>
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_chestPain _yes" name="med_hist_chestPain" value="Yes"  wire:model="med_hist_chestPain">
                                            <label for="med_hist_chestPain _yes">Yes</label>&nbsp&nbsp&nbsp
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_chestPain _no" name="med_hist_chestPain" value="No"  wire:model="med_hist_chestPain">
                                            <label for="med_hist_chestPain _no">No</label><br>
                                            <span class="text-danger">@error('med_hist_chestPain'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="med_history_diseases">
                                        <div class="disease_spacing"><p> Congestive Heart Failure </p></div>
                                        <div>
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_heartfailure _yes" name="med_hist_heartfailure" value="Yes"  wire:model="med_hist_heartfailure">
                                            <label for="med_hist_heartfailure _yes">Yes</label>&nbsp&nbsp&nbsp
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_heartfailure _no" name="med_hist_heartfailure" value="No"  wire:model="med_hist_heartfailure">
                                            <label for="med_hist_heartfailure _no">No</label><br>
                                            <span class="text-danger">@error('med_hist_heartfailure'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="med_history_diseases">
                                        <div class="disease_spacing"><p> Chronic Fatigue Syndrome  </p></div>
                                        <div>
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_fatiguesyndrome _yes" name="med_hist_fatiguesyndrome" value="Yes"  wire:model="med_hist_fatiguesyndrome">
                                            <label for="med_hist_fatiguesyndrome _yes">Yes</label>&nbsp&nbsp&nbsp
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_fatiguesyndrome _no" name="med_hist_fatiguesyndrome" value="No"  wire:model="med_hist_fatiguesyndrome">
                                            <label for="med_hist_fatiguesyndrome _no">No</label><br>
                                            <span class="text-danger">@error('med_hist_fatiguesyndrome'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="med_history_diseases">
                                        <div class="disease_spacing"><p> Depression </p></div>
                                        <div>
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_depression _yes" name="med_hist_depression" value="Yes"  wire:model="med_hist_depression">
                                            <label for="med_hist_depression _yes">Yes</label>&nbsp&nbsp&nbsp
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_depression _no" name="med_hist_depression" value="No"  wire:model="med_hist_depression">
                                            <label for="med_hist_depression _no">No</label><br>
                                            <span class="text-danger">@error('med_hist_depression'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="med_history_diseases">
                                        <div class="disease_spacing"><p> Diabetes  </p></div>
                                        <div>
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_diabetes _yes" name="med_hist_diabetes" value="Yes"  wire:model="med_hist_diabetes">
                                            <label for="med_hist_diabetes _yes">Yes</label>&nbsp&nbsp&nbsp
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_diabetes _no" name="med_hist_diabetes" value="No"  wire:model="med_hist_diabetes">
                                            <label for="med_hist_diabetes _no">No</label><br>
                                            <span class="text-danger">@error('med_hist_diabetes'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="med_history_diseases">
                                        <div class="disease_spacing"><p> Drug/Alcohol Abuse   </p></div>
                                        <div>
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_drug_alcohol_abuse _yes" name="med_hist_drug_alcohol_abuse" value="Yes"  wire:model="med_hist_drug_alcohol_abuse">
                                            <label for="med_hist_drug_alcohol_abuse _yes">Yes</label>&nbsp&nbsp&nbsp
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_drug_alcohol_abuse _no" name="med_hist_drug_alcohol_abuse" value="No"  wire:model="med_hist_drug_alcohol_abuse">
                                            <label for="med_hist_drug_alcohol_abuse _no">No</label><br>
                                            <span class="text-danger">@error('med_hist_drug_alcohol_abuse'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="med_history_diseases">
                                        <div class="disease_spacing"><p>Erectile Dysfunction  </p></div>
                                        <div>
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_erectile_dysfunction_yes" name="med_hist_erectile_dysfunction" value="Yes"  wire:model="med_hist_erectile_dysfunction">
                                            <label for="med_hist_erectile_dysfunction_yes">Yes</label>&nbsp&nbsp&nbsp
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_erectile_dysfunction_no" name="med_hist_erectile_dysfunction" value="No"  wire:model="med_hist_erectile_dysfunction">
                                            <label for="med_hist_erectile_dysfunction_no">No</label><br>
                                            <span class="text-danger">@error('med_hist_erectile_dysfunction'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="med_history_diseases">
                                        <div class="disease_spacing"><p>Fibromyalgia </p></div>
                                        <div>
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_fibromyalgia_yes" name="med_hist_fibromyalgia" value="Yes"  wire:model="med_hist_fibromyalgia">
                                            <label for="med_hist_fibromyalgia_yes">Yes</label>&nbsp&nbsp&nbsp
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_fibromyalgia_no" name="med_hist_fibromyalgia" value="No"  wire:model="med_hist_fibromyalgia">
                                            <label for="med_hist_fibromyalgia_no">No</label><br>
                                            <span class="text-danger">@error('med_hist_fibromyalgia'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="med_history_diseases">
                                        <div class="disease_spacing"><p>Gerd</p></div>
                                        <div>
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_gerd_yes" name="med_hist_gerd" value="Yes"  wire:model="med_hist_gerd">
                                            <label for="med_hist_gerd_yes">Yes</label>&nbsp&nbsp&nbsp
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_gerd_no" name="med_hist_gerd" value="No"  wire:model="med_hist_gerd">
                                            <label for="med_hist_gerd_no">No</label><br>
                                            <span class="text-danger">@error('med_hist_gerd'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="med_history_diseases">
                                        <div class="disease_spacing"><p>Heart Disease </p></div>
                                        <div>
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_heart_disease_yes" name="med_hist_heart_disease" value="Yes"  wire:model="med_hist_heart_disease">
                                            <label for="med_hist_heart_disease_yes">Yes</label>&nbsp&nbsp&nbsp
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_heart_disease_no" name="med_hist_heart_disease" value="No"  wire:model="med_hist_heart_disease">
                                            <label for="med_hist_heart_disease_no">No</label><br>
                                            <span class="text-danger">@error('med_hist_heart_disease'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="med_history_diseases">
                                        <div class="disease_spacing"><p>Hyperinsulinemia </p></div>
                                        <div>
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_hyperinsulinemia_yes" name="med_hist_hyperinsulinemia" value="Yes"  wire:model="med_hist_hyperinsulinemia">
                                            <label for="med_hist_hyperinsulinemia_yes">Yes</label>&nbsp&nbsp&nbsp
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_hyperinsulinemia_no" name="med_hist_hyperinsulinemia" value="No"  wire:model="med_hist_hyperinsulinemia">
                                            <label for="med_hist_hyperinsulinemia_no">No</label><br>
                                            <span class="text-danger">@error('med_hist_hyperinsulinemia'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="med_history_diseases">
                                        <div class="disease_spacing"><p>Hyperlipidemia </p></div>
                                        <div>
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_hyperlipidemia_yes" name="med_hist_hyperlipidemia" value="Yes"  wire:model="med_hist_hyperlipidemia">
                                            <label for="med_hist_hyperlipidemia_yes">Yes</label>&nbsp&nbsp&nbsp
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_hyperlipidemia_no" name="med_hist_hyperlipidemia" value="No"  wire:model="med_hist_hyperlipidemia">
                                            <label for="med_hist_hyperlipidemia_no">No</label><br>
                                            <span class="text-danger">@error('med_hist_hyperlipidemia'){{ $message }}@enderror</span>
                                        </div>
                                    </div>


                                </div>
                                <div>
                                    <div class="med_history_diseases">
                                        <div class="disease_spacing"><p>Hypertension </p></div>
                                        <div>
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_hypertension_yes" name="med_hist_hypertension" value="Yes"  wire:model="med_hist_hypertension">
                                            <label for="med_hist_hypertension_yes">Yes</label>&nbsp&nbsp&nbsp
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_hypertension_no" name="med_hist_hypertension" value="No"  wire:model="med_hist_hypertension">
                                            <label for="med_hist_hypertension_no">No</label><br>
                                            <span class="text-danger">@error('med_hist_hypertension'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="med_history_diseases">
                                        <div class="disease_spacing"><p>Male Hypogonadism  </p></div>
                                        <div>
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_male_hypogonadism_yes" name="med_hist_male_hypogonadism" value="Yes"  wire:model="med_hist_male_hypogonadism">
                                            <label for="med_hist_male_hypogonadism_yes">Yes</label>&nbsp&nbsp&nbsp
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_male_hypogonadism_no" name="med_hist_male_hypogonadism" value="No"  wire:model="med_hist_male_hypogonadism">
                                            <label for="med_hist_male_hypogonadism_no">No</label><br>
                                            <span class="text-danger">@error('med_hist_male_hypogonadism'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="med_history_diseases">
                                        <div class="disease_spacing"><p>Hypogonadism  </p></div>
                                        <div>
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_hypogonadism_yes" name="med_hist_hypogonadism" value="Yes"  wire:model="med_hist_hypogonadism">
                                            <label for="med_hist_hypogonadism_yes">Yes</label>&nbsp&nbsp&nbsp
                                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_hypogonadism_no" name="med_hist_hypogonadism" value="No"  wire:model="med_hist_hypogonadism">
                                            <label for="med_hist_hypogonadism_no">No</label><br>
                                            <span class="text-danger">@error('med_hist_hypogonadism'){{ $message }}@enderror</span>
                                        </div>
                                </div>
                                <div class="med_history_diseases">
                                    <div class="disease_spacing"><p> Infection Problems </p></div>
                                    <div>
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_Infection_problems _yes" name="med_hist_Infection_problems" value="Yes"  wire:model="med_hist_Infection_problems">
                                        <label for="med_hist_Infection_problems _yes">Yes</label>&nbsp&nbsp&nbsp
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_Infection_problems _no" name="med_hist_Infection_problems" value="No"  wire:model="med_hist_Infection_problems">
                                        <label for="med_hist_Infection_problems _no">No</label><br>
                                        <span class="text-danger">@error('med_hist_Infection_problems'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="med_history_diseases">
                                    <div class="disease_spacing"><p>Insomnia</p></div>
                                    <div>
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_insomnia _yes" name="med_hist_insomnia" value="Yes"  wire:model="med_hist_insomnia">
                                        <label for="med_hist_insomnia _yes">Yes</label>&nbsp&nbsp&nbsp
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_insomnia _no" name="med_hist_insomnia" value="No"  wire:model="med_hist_insomnia">
                                        <label for="med_hist_insomnia _no">No</label><br>
                                        <span class="text-danger">@error('med_hist_insomnia'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="med_history_diseases">
                                    <div class="disease_spacing"><p>Irritable Bowel Syndrome  </p></div>
                                    <div>
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_irritable_bowel_syndrome _yes" name="med_hist_irritable_bowel_syndrome" value="Yes"  wire:model="med_hist_irritable_bowel_syndrome">
                                        <label for="med_hist_irritable_bowel_syndrome _yes">Yes</label>&nbsp&nbsp&nbsp
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_irritable_bowel_syndrome _no" name="med_hist_irritable_bowel_syndrome" value="No"  wire:model="med_hist_irritable_bowel_syndrome">
                                        <label for="med_hist_irritable_bowel_syndrome _no">No</label><br>
                                        <span class="text-danger">@error('med_hist_irritable_bowel_syndrome'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="med_history_diseases">
                                    <div class="disease_spacing"><p>Kidney Problems </p></div>
                                    <div>
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_kidney_problems_yes" name="med_hist_kidney_problems " value="Yes"  wire:model="med_hist_kidney_problems ">
                                        <label for="med_hist_kidney_problems_yes">Yes</label>&nbsp&nbsp&nbsp
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_kidney_problems_no" name="med_hist_kidney_problems " value="No"  wire:model="med_hist_kidney_problems ">
                                        <label for="med_hist_kidney_problems_no">No</label><br>
                                        <span class="text-danger">@error('med_hist_kidney_problems'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="med_history_diseases">
                                    <div class="disease_spacing"><p>Menopause  </p></div>
                                    <div>
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_menopause_yes" name="med_hist_menopause" value="Yes"  wire:model="med_hist_menopause">
                                        <label for="med_hist_menopause_yes">Yes</label>&nbsp&nbsp&nbsp
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_menopause_no" name="med_hist_menopause" value="No"  wire:model="med_hist_menopause">
                                        <label for="med_hist_menopause_no">No</label><br>
                                        <span class="text-danger">@error('med_hist_menopause'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="med_history_diseases">
                                    <div class="disease_spacing"><p>Migraines/Headaches </p></div>
                                    <div>
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_migranes_headaches_yes" name="med_hist_migranes_headaches" value="Yes"  wire:model="med_hist_migranes_headaches">
                                        <label for="med_hist_migranes_headaches_yes">Yes</label>&nbsp&nbsp&nbsp
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_migranes_headaches_no" name="med_hist_migranes_headaches" value="No"  wire:model="med_hist_migranes_headaches">
                                        <label for="med_hist_migranes_headaches_no">No</label><br>
                                        <span class="text-danger">@error('med_hist_migranes_headaches'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="med_history_diseases">
                                    <div class="disease_spacing"><p>Neuropathy </p></div>
                                    <div>
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_neuropathy_yes" name="med_hist_neuropathy" value="Yes"  wire:model="med_hist_neuropathy">
                                        <label for="med_hist_neuropathy_yes">Yes</label>&nbsp&nbsp&nbsp
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_neuropathy_no" name="med_hist_neuropathy" value="No"  wire:model="med_hist_neuropathy">
                                        <label for="med_hist_neuropathy_no">No</label><br>
                                        <span class="text-danger">@error('med_hist_neuropathy'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="med_history_diseases">
                                    <div class="disease_spacing"><p>Onychomycosis  </p></div>
                                    <div>
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_onychomycosis_yes" name="med_hist_onychomycosis" value="Yes"  wire:model="med_hist_onychomycosis">
                                        <label for="med_hist_onychomycosis_yes">Yes</label>&nbsp&nbsp&nbsp
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_onychomycosis_no" name="med_hist_onychomycosis" value="No"  wire:model="med_hist_onychomycosis">
                                        <label for="med_hist_onychomycosis_no">No</label><br>
                                        <span class="text-danger">@error('med_hist_onychomycosis'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="med_history_diseases">
                                    <div class="disease_spacing"><p>Organ Injury   </p></div>
                                    <div>
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_organ_injury_yes" name="med_hist_organ_injury" value="Yes"  wire:model="med_hist_organ_injury">
                                        <label for="med_hist_organ_injury_yes">Yes</label>&nbsp&nbsp&nbsp
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_organ_injury_no" name="med_hist_organ_injury" value="No"  wire:model="med_hist_organ_injury">
                                        <label for="med_hist_organ_injury_no">No</label><br>
                                        <span class="text-danger">@error('med_hist_organ_injury'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="med_history_diseases">
                                    <div class="disease_spacing"><p>Osteoporosis</p></div>
                                    <div>
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_osteoporosis_yes" name="med_hist_osteoporosis" value="Yes"  wire:model="med_hist_osteoporosis">
                                        <label for="med_hist_osteoporosis_yes">Yes</label>&nbsp&nbsp&nbsp
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_osteoporosis_no" name="med_hist_osteoporosis" value="No"  wire:model="med_hist_osteoporosis">
                                        <label for="med_hist_osteoporosis_no">No</label><br>
                                        <span class="text-danger">@error('med_hist_osteoporosis'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="med_history_diseases">
                                    <div class="disease_spacing"><p>Pulmonary Embolism </p></div>
                                    <div>
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_pulmonary_embolism_yes" name="med_hist_pulmonary_embolism" value="Yes"  wire:model="med_hist_pulmonary_embolism">
                                        <label for="med_hist_pulmonary_embolism_yes">Yes</label>&nbsp&nbsp&nbsp
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_pulmonary_embolism_no" name="med_hist_pulmonary_embolism" value="No"  wire:model="med_hist_pulmonary_embolism">
                                        <label for="med_hist_pulmonary_embolism_no">No</label><br>
                                        <span class="text-danger">@error('med_hist_pulmonary_embolism'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="med_history_diseases">
                                    <div class="disease_spacing"><p>Seizure Disorders  </p></div>
                                    <div>
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_seizure_disorders_yes" name="med_hist_seizure_disorders" value="Yes"  wire:model="med_hist_seizure_disorders">
                                        <label for="med_hist_seizure_disorders_yes">Yes</label>&nbsp&nbsp&nbsp
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_seizure_disorders_no" name="med_hist_seizure_disorders" value="No"  wire:model="med_hist_seizure_disorders">
                                        <label for="med_hist_seizure_disorders_no">No</label><br>
                                        <span class="text-danger">@error('med_hist_seizure_disorders'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="med_history_diseases">
                                    <div class="disease_spacing"><p>Shortness of Breath </p></div>
                                    <div>
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_short_Breath_yes" name="med_hist_short_Breath" value="Yes"  wire:model="med_hist_short_Breath">
                                        <label for="med_hist_short_Breath_yes">Yes</label>&nbsp&nbsp&nbsp
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_short_Breath_no" name="med_hist_short_Breath" value="No"  wire:model="med_hist_short_Breath">
                                        <label for="med_hist_short_Breath_no">No</label><br>
                                        <span class="text-danger">@error('med_hist_short_Breath'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="med_history_diseases">
                                    <div class="disease_spacing"><p>Sinus Conditions </p></div>
                                    <div>
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_sinus_onditions_yes" name="med_hist_sinus_onditions" value="Yes"  wire:model="med_hist_sinus_onditions">
                                        <label for="med_hist_sinus_onditions_yes">Yes</label>&nbsp&nbsp&nbsp
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_sinus_onditions_no" name="med_hist_sinus_onditions" value="No"  wire:model="med_hist_sinus_onditions">
                                        <label for="med_hist_sinus_onditions_no">No</label><br>
                                        <span class="text-danger">@error('med_hist_sinus_onditions'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="med_history_diseases">
                                    <div class="disease_spacing"><p>Stroke </p></div>
                                    <div>
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_stroke_yes" name="med_hist_stroke" value="Yes"  wire:model="med_hist_stroke">
                                        <label for="med_hist_stroke_yes">Yes</label>&nbsp&nbsp&nbsp
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_stroke_no" name="med_hist_stroke" value="No"  wire:model="med_hist_stroke">
                                        <label for="med_hist_stroke_no">No</label><br>
                                        <span class="text-danger">@error('med_hist_stroke'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="med_history_diseases">
                                    <div class="disease_spacing"><p>Syndrome X</p></div>
                                    <div>
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_syndrome_x_yes" name="med_hist_syndrome_x" value="Yes"  wire:model="med_hist_syndrome_x">
                                        <label for="med_hist_syndrome_x_yes">Yes</label>&nbsp&nbsp&nbsp
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_syndrome_x_no" name="med_hist_syndrome_x" value="No"  wire:model="med_hist_syndrome_x">
                                        <label for="med_hist_syndrome_x_no">No</label><br>
                                        <span class="text-danger">@error('med_hist_syndrome_x'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="med_history_diseases">
                                    <div class="disease_spacing"><p>Tremors  X</p></div>
                                    <div>
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_tremors_yes" name="med_hist_tremors" value="Yes"  wire:model="med_hist_tremors">
                                        <label for="med_hist_tremors_yes">Yes</label>&nbsp&nbsp&nbsp
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_tremors_no" name="med_hist_tremors" value="No"  wire:model="med_hist_tremors">
                                        <label for="med_hist_tremors_no">No</label><br>
                                        <span class="text-danger">@error('med_hist_tremors'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="med_history_diseases">
                                    <div class="disease_spacing"><p>Wheat Allergy </p></div>
                                    <div>
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_wheat_allergy_yes" name="med_hist_wheat_allergy" value="Yes"  wire:model="med_hist_wheat_allergy">
                                        <label for="med_hist_wheat_allergy_yes">Yes</label>&nbsp&nbsp&nbsp
                                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="med_hist_wheat_allergy_no" name="med_hist_wheat_allergy" value="No"  wire:model="med_hist_wheat_allergy">
                                        <label for="med_hist_wheat_allergy_no">No</label><br>
                                        <span class="text-danger">@error('med_hist_wheat_allergy'){{ $message }}@enderror</span>
                                    </div>
                                </div>

                            </div>
                        </div> 
                        
                    </div>

                    <div class="single_item">
                        <div>
                            <label for="any_other_medical_problem">List any other medical problems that you have had</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="any_other_medical_problem" id="any_other_medical_problem"  wire:model="any_other_medical_problem">
                            <span class="text-danger">@error('any_other_medical_problem'){{ $message }}@enderror</span>
                        </div> 
                    </div>
                    <div >
                        <label for="discussed_at_mdt">Was Patient Discussed at MDT?</label><br>

                        <select <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="discussed_at_mdt" id="discussed_at_mdt"  wire:model="discussed_at_mdt">
                            <option value="">Select</option> 
                            <option value="Yes">Yes</option> 
                            <option value="No">No</option> 
                        </select>

                        <span class="text-danger">@error('discussed_at_mdt'){{ $message }}@enderror</span>
                    </div>
                
                </div>
            @endif

            {{-- ------------------Buttons------------------------- --}}
    
            
        </div>
    
        <div class="action-buttons d-flex justify-content-between bg-white pt-2 pb-2">
    
            @if ($currentStep == 1)
                    <div></div>
            @endif
    
            @if ($currentStep >1 && $currentStep <=3)
                <button type="button" class="btn btn-md btn-secondary" wire:click="decreaseStep()">Previous</button>
            @endif
            
            @if ($currentStep <3)
                <button type="button" class="btn btn-md btn-success" wire:click="increaseStep()">Next</button>
            @endif
            
            @if ($currentStep == 3)
                <button  <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="submit" class="btn btn-md btn-primary">Submit</button>
            @endif
        </div>
    
    </form>
</div>
