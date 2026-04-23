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
                <div class="step-one">
                    <div class="steps  bg-secondary text-white">STEP ONE</div>
                    <h4 class="sectionTitle" >FAMILY HEALTH HISTORY</h4>
                    <div class="personal_info">
    
                        <div class="single_item">
                            <div>
                                <p>List any major conditions/illnesses that your immediate family members have had</p>
                            </div>
                            
                        </div>
                        <div class="single_item">
                            <div>
                                <p class="subsection_heading">Mother</p>
                            </div>
                            
                        </div>

                        <div class="row_entry">
                            <div>
                                <label for="condition_mother">Condition </label><br>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="condition_mother" id="condition_mother" wire:model="condition_mother" >
                                <span class="text-danger">@error('condition_mother'){{ $message }}@enderror</span>
                            </div>
                            <div>
                                <p>Living?</p>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="mother_alive_yes" name="mother_alive" value="Yes"  wire:model="mother_alive">
                                <label for="mother_alive_yes">Yes</label>&nbsp&nbsp&nbsp
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="mother_alive_no" name="mother_alive" value="No"  wire:model="mother_alive">
                                <label for="mother_alive_no">No</label><br>
                                <span class="text-danger">@error('mother_alive'){{ $message }}@enderror</span>
                            </div>
                        </div>
    
                        <div class="single_item">
                            <div>
                                <label for="mother_deceased_age">If deceased,  at what age? (In Years)</label><br>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="number" name="mother_deceased_age" id="mother_deceased_age"  wire:model="mother_deceased_age">
                                <span class="text-danger">@error('mother_deceased_age'){{ $message }}@enderror</span>
                            </div>
                            
                        </div>

                        <div class="single_item">
                            <div>
                                <p class="subsection_heading">Father</p>
                            </div>
                            
                        </div>

                        <div class="row_entry">
                            <div>
                                <label for="condition_father">Condition </label><br>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="condition_father" id="condition_father" wire:model="condition_father" >
                                <span class="text-danger">@error('condition_father'){{ $message }}@enderror</span>
                            </div>
                            <div>
                                <p>Living?</p>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="father_alive_yes" name="father_alive" value="Yes"  wire:model="father_alive">
                                <label for="father_alive_yes">Yes</label>&nbsp&nbsp&nbsp
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="father_alive_no" name="father_alive" value="No"  wire:model="father_alive">
                                <label for="father_alive_no">No</label><br>
                                <span class="text-danger">@error('father_alive'){{ $message }}@enderror</span>
                            </div>
                        </div>
    
                        <div class="single_item">
                            <div>
                                <label for="father_deceased_age">If deceased,  at what age? (In Years)</label><br>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="number" name="father_deceased_age" id="father_deceased_age"  wire:model="father_deceased_age">
                                <span class="text-danger">@error('father_deceased_age'){{ $message }}@enderror</span>
                            </div>
                            
                        </div>

                        <div class="single_item">
                            <div>
                                <p class="subsection_heading">Sibling 1</p>
                            </div>
                            
                        </div>

                        <div class="row_entry">
                            <div>
                                <label for="condition_sibling_1">Condition </label><br>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="condition_sibling_1" id="condition_sibling_1" wire:model="condition_sibling_1" >
                                <span class="text-danger">@error('condition_sibling_1'){{ $message }}@enderror</span>
                            </div>
                            <div>
                                <p>Living?</p>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="sibling_1_alive_yes" name="sibling_1_alive" value="Yes"  wire:model="sibling_1_alive">
                                <label for="sibling_1_alive_yes">Yes</label>&nbsp&nbsp&nbsp
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="sibling_1_alive_no" name="sibling_1_alive" value="No"  wire:model="sibling_1_alive">
                                <label for="sibling_1_alive_no">No</label><br>
                                <span class="text-danger">@error('sibling_1_alive'){{ $message }}@enderror</span>
                            </div>
                        </div>
    
                        <div class="single_item">
                            <div>
                                <label for="sibling_1_deceased_age">If deceased,  at what age? (In Years)</label><br>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="number" name="sibling_1_deceased_age" id="sibling_1_deceased_age"  wire:model="sibling_1_deceased_age">
                                <span class="text-danger">@error('sibling_1_deceased_age'){{ $message }}@enderror</span>
                            </div>
                            
                        </div>
                        <div class="single_item">
                            <div>
                                <p class="subsection_heading">Sibling 2</p>
                            </div>
                            
                        </div>

                        <div class="row_entry">
                            <div>
                                <label for="condition_sibling_2">Condition </label><br>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="condition_sibling_2" id="condition_sibling_2" wire:model="condition_sibling_2" >
                                <span class="text-danger">@error('condition_sibling_2'){{ $message }}@enderror</span>
                            </div>
                            <div>
                                <p>Living?</p>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="sibling_2_alive_yes" name="sibling_2_alive" value="Yes"  wire:model="sibling_2_alive">
                                <label for="sibling_2_alive_yes">Yes</label>&nbsp&nbsp&nbsp
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="sibling_2_alive_no" name="sibling_2_alive" value="No"  wire:model="sibling_2_alive">
                                <label for="sibling_2_alive_no">No</label><br>
                                <span class="text-danger">@error('sibling_2_alive'){{ $message }}@enderror</span>
                            </div>
                        </div>
    
                        <div class="single_item">
                            <div>
                                <label for="sibling_2_deceased_age">If deceased,  at what age? (In Years)</label><br>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="number" name="sibling_2_deceased_age" id="sibling_2_deceased_age"  wire:model="sibling_2_deceased_age">
                                <span class="text-danger">@error('sibling_2_deceased_age'){{ $message }}@enderror</span>
                            </div>
                            
                        </div>
                        <div class="single_item">
                            <div>
                                <p class="subsection_heading">Others 1</p>
                            </div>
                            
                        </div>

                        <div class="row_entry">
                            <div>
                                <label for="condition_others_1">Condition </label><br>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="condition_others_1" id="condition_others_1" wire:model="condition_others_1" >
                                <span class="text-danger">@error('condition_others_1'){{ $message }}@enderror</span>
                            </div>
                            <div>
                                <p>Living?</p>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="others_1_alive_yes" name="others_1_alive" value="Yes"  wire:model="others_1_alive">
                                <label for="others_1_alive_yes">Yes</label>&nbsp&nbsp&nbsp
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="others_1_alive_no" name="others_1_alive" value="No"  wire:model="others_1_alive">
                                <label for="others_1_alive_no">No</label><br>
                                <span class="text-danger">@error('others_1_alive'){{ $message }}@enderror</span>
                            </div>
                        </div>
    
                        <div class="single_item">
                            <div>
                                <label for="others_1_deceased_age">If deceased,  at what age? (In Years)</label><br>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="number" name="others_1_deceased_age" id="others_1_deceased_age"  wire:model="others_1_deceased_age">
                                <span class="text-danger">@error('others_1_deceased_age'){{ $message }}@enderror</span>
                            </div>
                            
                        </div>

                        <div class="single_item">
                            <div>
                                <p class="subsection_heading">Others 2</p>
                            </div>
                            
                        </div>

                        <div class="row_entry">
                            <div>
                                <label for="condition_others_2">Condition </label><br>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="condition_others_2" id="condition_others_2" wire:model="condition_others_2" >
                                <span class="text-danger">@error('condition_others_2'){{ $message }}@enderror</span>
                            </div>
                            <div>
                                <p>Living?</p>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="others_2_alive_yes" name="others_2_alive" value="Yes"  wire:model="others_2_alive">
                                <label for="others_2_alive_yes">Yes</label>&nbsp&nbsp&nbsp
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="others_2_alive_no" name="others_2_alive" value="No"  wire:model="others_2_alive">
                                <label for="others_2_alive_no">No</label><br>
                                <span class="text-danger">@error('others_2_alive'){{ $message }}@enderror</span>
                            </div>
                        </div>
    
                        <div class="single_item">
                            <div>
                                <label for="others_2_deceased_age">If deceased,  at what age? (In Years)</label><br>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="number" name="others_2_deceased_age" id="others_2_deceased_age"  wire:model="others_2_deceased_age">
                                <span class="text-danger">@error('others_2_deceased_age'){{ $message }}@enderror</span>
                            </div>
                            
                        </div>
    
                        
                    
                    
                    </div>
                </div>
            @endif
    
            
            @if ($currentStep == 2)
                <div class="step-two">
                    <div class="steps bg-secondary text-white">STEP FOUR</div>
                    <h4 class="sectionTitle" >SOCIAL HISTORY</h4>

                    <div class="row_entry">
                        <div>
                            <p>Do you currently consume alcohol? </p>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="consume_alcohol_yes" name="consume_alcohol" value="Yes"  wire:model="consume_alcohol">
                            <label for="consume_alcohol_yes">Yes</label>&nbsp&nbsp&nbsp
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="consume_alcohol_no" name="consume_alcohol" value="No"  wire:model="consume_alcohol">
                            <label for="consume_alcohol_no">No</label><br>
                            <span class="text-danger">@error('consume_alcohol'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="drinks_per_week">If yes, how many drinks per week?</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="number"  name="drinks_per_week" id="drinks_per_week"  wire:model="drinks_per_week">
                            <span class="text-danger">@error('drinks_per_week'){{ $message }}@enderror</span>
                        </div> 
                        
                    </div>
                    <div class="row_entry">
                        <div>
                            <p>Do you currently smoke?</p>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="currently_smoke_yes" name="currently_smoke" value="Yes"  wire:model="currently_smoke">
                            <label for="currently_smoke_yes">Yes</label>&nbsp&nbsp&nbsp
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="currently_smoke_no" name="currently_smoke" value="No"  wire:model="currently_smoke">
                            <label for="currently_smoke_no">No</label><br>
                            <span class="text-danger">@error('currently_smoke'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="cigarettes_per_day">If yes, How many cigarettes do you smoke per day? </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="number"  name="cigarettes_per_day" id="cigarettes_per_day"  wire:model="cigarettes_per_day">
                            <span class="text-danger">@error('cigarettes_per_day'){{ $message }}@enderror</span>
                        </div> 
                        
                    </div>
                    <div class="row_entry">
                        <div>
                            <p>Do you currently use any other drugs?  </p>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="use_any_other_drug_yes" name="use_any_other_drug" value="Yes"  wire:model="use_any_other_drug">
                            <label for="use_any_other_drug_yes">Yes</label>&nbsp&nbsp&nbsp
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="use_any_other_drug_no" name="use_any_other_drug" value="No"  wire:model="use_any_other_drug">
                            <label for="use_any_other_drug_no">No</label><br>
                            <span class="text-danger">@error('use_any_other_drug'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="any_other_drug">If yes, What other drugs do you take? </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="any_other_drug" id="any_other_drug"  wire:model="any_other_drug">
                            <span class="text-danger">@error('any_other_drug'){{ $message }}@enderror</span>
                        </div> 
                        
                    </div>
                    <div class="single_item">
                        <div>
                            <label for="any_other_drug_frequency">How often?</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="any_other_drug_frequency_daily" name="any_other_drug_frequency" value="Daily"  wire:model="any_other_drug_frequency">
                            <label for="any_other_drug_frequency_daily ">Daily </label>&nbsp&nbsp&nbsp
                             <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="any_other_drug_frequency_weekly" name="any_other_drug_frequency" value="Weekly"  wire:model="any_other_drug_frequency">
                            <label for="any_other_drug_frequency_weekly">Weekly</label>&nbsp&nbsp&nbsp
                             <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="any_other_drug_frequency_occasionally" name="any_other_drug_frequency" value="Occasionally"  wire:model="any_other_drug_frequency">
                            <label for="any_other_drug_frequency_occasionally">Occasionally</label>&nbsp&nbsp&nbsp
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="any_other_drug_frequency_rarely" name="any_other_drug_frequency" value="Rarely "  wire:model="any_other_drug_frequency">
                            <label for="any_other_drug_frequency_rarely">Rarely</label><br><br>
                            <span class="text-danger">@error('any_other_drug_frequency'){{ $message }}@enderror</span>
                        </div>
                        
                    </div>
                    <div class="row_entry">
                        <div>
                            <p>Do you drink caffeine? </p>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="drink_caffein_yes" name="drink_caffein" value="Yes"  wire:model="drink_caffein">
                            <label for="drink_caffein_yes">Yes</label>&nbsp&nbsp&nbsp
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="drink_caffein_no" name="drink_caffein" value="No"  wire:model="drink_caffein">
                            <label for="drink_caffein_no">No</label><br>
                            <span class="text-danger">@error('drink_caffein'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="caffein_cups_per_day">If yes, How many cups per day?  </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="number"  name="caffein_cups_per_day" id="caffein_cups_per_day"  wire:model="caffein_cups_per_day">
                            <span class="text-danger">@error('caffein_cups_per_day'){{ $message }}@enderror</span>
                        </div> 
                        
                    </div>
                    <div class="row_entry">
                        <div>
                            <p>Are you sexually active?</p>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="sexually_active_yes" name="sexually_active" value="Yes"  wire:model="sexually_active">
                            <label for="sexually_active_yes">Yes</label>&nbsp&nbsp&nbsp
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="sexually_active_no" name="sexually_active" value="No"  wire:model="sexually_active">
                            <label for="sexually_active_no">No</label><br>
                            <span class="text-danger">@error('sexually_active'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <p>Would you like to be checked for STIs? </p>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="like_checked_stis_yes" name="like_checked_stis" value="Yes"  wire:model="like_checked_stis">
                            <label for="like_checked_stis_yes">Yes</label>&nbsp&nbsp&nbsp
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="like_checked_stis_no" name="like_checked_stis" value="No"  wire:model="like_checked_stis">
                            <label for="like_checked_stis_no">No</label><br>
                            <span class="text-danger">@error('like_checked_stis'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <p>How frequently do you exercise? </p>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="excercise_frequency_daily" name="excercise_frequency" value="Daily"  wire:model="excercise_frequency">
                            <label for="excercise_frequency_daily ">Daily </label>&nbsp&nbsp&nbsp
                             <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="excercise_frequency_weekly" name="excercise_frequency" value="Weekly"  wire:model="excercise_frequency">
                            <label for="excercise_frequency_weekly">Weekly</label>&nbsp&nbsp&nbsp
                             <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="excercise_frequency_occasionally" name="excercise_frequency" value="Occasionally"  wire:model="excercise_frequency">
                            <label for="excercise_frequency_occasionally">Occasionally</label>&nbsp&nbsp&nbsp
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="excercise_frequency_rarely" name="excercise_frequency" value="Rarely "  wire:model="excercise_frequency">
                            <label for="excercise_frequency_rarely">Rarely</label><br><br>
                            <span class="text-danger">@error('excercise_frequency'){{ $message }}@enderror</span>
                        </div> 
                        
                    </div>
                    <div class="row_entry">
                        <div>
                            <p>Are you on a special diet? </p>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="on_special_diet_yes" name="on_special_diet" value="Yes"  wire:model="on_special_diet">
                            <label for="on_special_diet_yes">Yes</label>&nbsp&nbsp&nbsp
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="on_special_diet_no" name="on_special_diet" value="No"  wire:model="on_special_diet">
                            <label for="on_special_diet_no">No</label><br>
                            <span class="text-danger">@error('on_special_diet'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="special_diet_type">If yes, What diet?   </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="special_diet_type" id="special_diet_type"  wire:model="special_diet_type">
                            <span class="text-danger">@error('special_diet_type'){{ $message }}@enderror</span>
                        </div> 
                        
                    </div>
                    <div class="single_item">
                        <div>
                            <p class="subsection_heading">Complete the following if applicable</p>
                        </div>
                        
                    </div>
                    <div class="row_entry">
                        <div>
                            <p>Are you planning a pregnancy? </p>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="pregnancy_plan_yes" name="pregnancy_plan" value="Yes"  wire:model="pregnancy_plan">
                            <label for="pregnancy_plan_yes">Yes</label>&nbsp&nbsp&nbsp
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="pregnancy_plan_no" name="pregnancy_plan" value="No"  wire:model="pregnancy_plan">
                            <label for="pregnancy_plan_no">No</label><br><br>
                            <span class="text-danger">@error('pregnancy_plan'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <p>Are you pregnant now?</p>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="pregnant_now_yes" name="pregnant_now" value="Yes"  wire:model="pregnant_now">
                            <label for="pregnant_now_yes">Yes</label>&nbsp&nbsp&nbsp
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="pregnant_now_no" name="pregnant_now" value="No"  wire:model="pregnant_now">
                            <label for="pregnant_now_no">No</label><br><br>
                            <span class="text-danger">@error('pregnant_now'){{ $message }}@enderror</span>
                        </div> 
                        
                    </div>


                    <div class="row_entry">
                        <div>
                            <label for="contraception_in_use">What type of contraception do you currently use?  </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="contraception_in_use" id="contraception_in_use"  wire:model="contraception_in_use">
                            <span class="text-danger">@error('contraception_in_use'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="last_menstrual_cycle">When was your last menstrual cycle? </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="date"  name="last_menstrual_cycle" id="last_menstrual_cycle"  wire:model="last_menstrual_cycle">
                            <span class="text-danger">@error('last_menstrual_cycle'){{ $message }}@enderror</span>
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
