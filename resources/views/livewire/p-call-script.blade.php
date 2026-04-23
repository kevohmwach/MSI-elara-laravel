<div>
    <form  wire:submit.prevent={{$method}}>
        @csrf
    
        <div class="form_title">
            <h3><u>Patient Call Script for Enhertu Monitoring Program</u></h3>
        </div>
        
        <div class="form_wrapper">
            @if ($currentStep == 1)
                <div class="step-one">
                    <div class="steps  bg-secondary text-white">STEP 1/3</div>
                    {{-- <h4 class="sectionTitle" >Introduction </h4> --}}
                    <div class="personal_info">
    
                        <div class="single_item">
                            <div>
                                <p class="subsection_heading">Introduction (30 Seconds):</p>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <p>Caller: Hi {{$patient_name}}, this is [Caller’s Name] from your care team. I am calling to see how you're feeling since your last Enhertu infusion. This takes about 4 minutes.
                                    Is now a good time? </p>
                            </div>
                        </div>

                        <div class="single_item">
                            <div>
                                <p class="subsection_heading">SAFETY CHECK QUESTIONS</p>
                            </div>
                        </div>
                        
                       
                        <div class="single_item">
                            <div>
                                <label for="script_question_1">1. BREATING AND ACTIVITY CHECK</label><br>
                                <p>Are you walking or exercising like usual? Do you have any difficulty with activities or notice yourself getting short of breath since your last infusion?</p>
                                
                                <p>[Looking for: Lung inflammation - most serious Enhertu side effect]</p>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <label for="patient_response_1">{{$patient_name}} : [Response]</label><br>
                                <select <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="patient_response_1" id="patient_response_1"  wire:model="patient_response_1">
                                    <option value="">Select</option>
                                    @foreach ($response_data as $response_)
                                        @if ($response_->question_no ==1)
                                            <option value="{{$response_->patient_response}}">{{$response_->patient_response}}</option>
                                        @endif
                                            @endforeach
                                </select>

                                {{-- <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="patient_response_1" id="patient_response_1"  wire:model="patient_response_1"> --}}
                                <span class="text-danger">@error('patient_response_1'){{ $message }}@enderror</span>
                                @if(Auth::user()->role>1)
                                    <a href="{{route('p_response_create')}}">
                                        <button <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="button" class="btn btn-md btn-success" >+ Add</button>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <label for="script_question_2">2. HEART & DAILY MOVEMENT</label><br>
                               <p>When you re moving around the house or going about your day, does your heart race or pound? Are your legs and feet more swollen than usual?</p>
                                <p>[Looking for: Heart problems from Enhertu]</p>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <label for="patient_response_2">{{$patient_name}} : [Response]</label><br>
                                <select <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="patient_response_2" id="patient_response_2"  wire:model="patient_response_2">
                                    <option value="">Select</option>
                                    @foreach ($response_data as $response_)
                                        @if ($response_->question_no ==2)
                                            <option value="{{$response_->patient_response}}">{{$response_->patient_response}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                {{-- <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="patient_response_2" id="patient_response_2"  wire:model="patient_response_2"> --}}
                                <span class="text-danger">@error('patient_response_2'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <label for="script_question_3">3. DAILY ENERGY & FEELING SICK</label><br>
                                <p>How are you feeling day to day? Are you running a fever or feeling like you might be coming down with a cold or flu?</p>
                                <p>[Looking for: Low immune system/infection risk]</p>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <label for="patient_response_3">{{$patient_name}} : [Response]</label><br>
                                <select <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="patient_response_3" id="patient_response_3"  wire:model="patient_response_3">
                                    <option value="">Select</option>
                                    @foreach ($response_data as $response_)
                                        @if ($response_->question_no ==3)
                                            <option value="{{$response_->patient_response}}">{{$response_->patient_response}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                {{-- <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="patient_response_3" id="patient_response_3"  wire:model="patient_response_3"> --}}
                                <span class="text-danger">@error('patient_response_3'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <label for="script_question_4">4. BUMPS & CUTS HEALING</label><br>
                               <p>When you bump into things or get small cuts, are you bruising easier or bleeding more than before?</p>
                               <p>[Looking for: Low blood counts]</p>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <label for="patient_response_4">{{$patient_name}} : [Response]</label><br>
                                <select <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="patient_response_4" id="patient_response_4"  wire:model="patient_response_4">
                                    <option value="">Select</option>
                                    @foreach ($response_data as $response_)
                                        @if ($response_->question_no ==4)
                                            <option value="{{$response_->patient_response}}">{{$response_->patient_response}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                {{-- <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="patient_response_4" id="patient_response_4"  wire:model="patient_response_4"> --}}
                                <span class="text-danger">@error('patient_response_4'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <label for="script_question_5">5. EATING & MEALS</label><br>
                                <p>How are your meals going? Are you eating like you normally do, or are you having trouble with nausea or your appetite?</p>
                                <p>[Looking for: Common digestive side effects]</p>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <label for="patient_response_5">{{$patient_name}} : [Response]</label><br>

                                <select <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="patient_response_5" id="patient_response_5"  wire:model="patient_response_5">
                                    <option value="">Select</option>
                                    @foreach ($response_data as $response_)
                                        @if ($response_->question_no ==5)
                                            <option value="{{$response_->patient_response}}">{{$response_->patient_response}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                
                                {{-- <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="patient_response_5" id="patient_response_5"  wire:model="patient_response_5"> --}}
                                <span class="text-danger">@error('patient_response_5'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <label for="script_question_6">6. DAILY ROUTINE & ACTIVITIES (20 seconds)</label><br>
                                <p>Are you able to do your usual daily routine - things like housework, shopping, or hobbies? How's your energy for getting things done?</p>
                                <p>[Looking for: Treatment fatigue impact]</p>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <label for="patient_response_6">{{$patient_name}} : [Response]</label><br>

                                <select <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="patient_response_6" id="patient_response_6"  wire:model="patient_response_6">
                                    <option value="">Select</option>
                                    @foreach ($response_data as $response_)
                                        @if ($response_->question_no ==6)
                                            <option value="{{$response_->patient_response}}">{{$response_->patient_response}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                
                                {{-- <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="patient_response_6" id="patient_response_6"  wire:model="patient_response_6"> --}}
                                <span class="text-danger">@error('patient_response_6'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <label for="script_question_7">7. TAKING MEDICINE & DOCTOR CONTACT</label><br>
                                <p>Are you ready for your next Enhertu infusion as scheduled? Have you needed to contact your doctor or go anywhere for medical care since your last infusion?</p>
                                <p>[Looking for: Treatment readiness and medical events]</p>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <label for="patient_response_7">{{$patient_name}} : [Response]</label><br>

                                <select <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="patient_response_7" id="patient_response_7"  wire:model="patient_response_7">
                                    <option value="">Select</option>
                                    @foreach ($response_data as $response_)
                                        @if ($response_->question_no ==7)
                                            <option value="{{$response_->patient_response}}">{{$response_->patient_response}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                
                                {{-- <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="patient_response_7" id="patient_response_7"  wire:model="patient_response_7"> --}}
                                <span class="text-danger">@error('patient_response_7'){{ $message }}@enderror</span>
                            </div>
                        </div>








                        
                        
                    </div>
                </div>
            @endif
    
            @if ($currentStep == 2)
                <div class="step-two">
                    <div class="steps bg-secondary text-white">STEP 2/3</div>
                    <h4 class="sectionTitle" >IMMEDIATE ACTION NEEDED</h4>



                    <div class="single_item">
                        <div>
                            <br><label for="call_doctor_or_er">TELL PATIENT TO CALL DOCTOR TODAY OR GO TO ER:</label><br>
                        </div>
                    </div>
                    <div class="single_item">
                        <div>
                            <label for="call_doctor_or_er_response">{{$patient_name}} : [Response]</label><br>

                            <select <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="call_doctor_or_er_response" id="call_doctor_or_er_response"  wire:model="call_doctor_or_er_response">
                                <option value="">Select</option>
                                <option value="Activity/Breathing: Can't do normal activities due to shortness of breath or Chest pain with movement">
                                    Activity/Breathing: Can't do normal activities due to shortness of breath or Chest pain with movement
                                </option>
                                <option value="Heart: 'Feel faint or dizzy' or 'Severe leg/ankle swelling'">
                                    Heart: "Feel faint or dizzy"; or "Severe leg/ankle swelling"
                                </option>
                                <option value="Feeling Sick: 'Fever over 100 degrees'; or 'Feel very ill'">
                                    Feeling Sick: 'Fever over 100 degrees'; or 'Feel very ill'
                                </option>
                                <option value="Bleeding: 'Heavy bleeding that won't stop' or 'Bruising all over body'">
                                    Bleeding: 'Heavy bleeding that won't stop' or 'Bruising all over body'
                                </option>
                                <option value="">
                                    Overall: 'Can barely function' or 'Something feels very wrong'
                                </option>
                            </select>
                            
                            {{-- <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="call_doctor_or_er_response" id="call_doctor_or_er_response"  wire:model="call_doctor_or_er_response"> --}}
                            <span class="text-danger">@error('call_doctor_or_er_response'){{ $message }}@enderror</span>
                        </div>
                    </div>

                    <div class="single_item">
                        <div>
                            <br><label for="routine_monitoring">ROUTINE MONITORING:</label><br><br>
                        </div>
                    </div>
                    <div class="single_item">
                        <div>
                            <label for="routine_monitoring_response">{{$patient_name}} : [Response]</label><br>

                            <select <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="routine_monitoring_response" id="routine_monitoring_response"  wire:model="routine_monitoring_response">
                                <option value="">Select</option>
                                <option value="Mild nausea, tiredness, or eating less">Mild nausea, tiredness, or eating less</option>
                                <option value="Minor activity limitations">Minor activity limitations</option>
                                <option value="Questions about managing side effects">Questions about managing side effects</option>
                            </select>
                            
                            {{-- <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="routine_monitoring_response" id="routine_monitoring_response"  wire:model="routine_monitoring_response"> --}}
                            <span class="text-danger">@error('routine_monitoring_response'){{ $message }}@enderror</span>
                        </div>
                    </div>
                    <div class="single_item">
                        <div>
                            <br><label for="closing_call">CLOSING THE CALL (30 seconds)</label><br><br>
                            <p>If the patient is managing well: 'It sounds like you're handling the Enhertu infusions well
                                and staying active. We'll see you for your next scheduled infusion, and call if anything
                                changes with how you're feeling.'
                            </p>
                            <p>
                                If a patient has concerning symptoms: 'Some of what you're telling me about your daily
                                activities and how you're feeling sounds like it needs medical attention. You should call
                                your cancer doctor today, and we may need to discuss your next infusion timing.'
                            </p>
                            <p>
                                Always end with: 'Remember - if you can't do your normal activities because you can't
                                breathe, have chest pain, fever over 100, or feel much worse, don't wait. Get medical
                                help right away. I'll call to check on how you're doing before your next infusion.'
                            </p>
                        </div>
                    </div>

                    

                    
                </div>
            @endif
            @if ($currentStep == 3)
                <div class="step-two">
                    <div class="steps bg-secondary text-white">STEP 3/3</div>
                    <h4 class="sectionTitle" >Quick staff notes </h4>

                    <div class="single_item">
                        <div>
                            <br><label for="red_flags">RED FLAGS - CALL MEDICAL TEAM NOW:</label><br><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="checkbox" name="breathing_problems" id="breathing_problems" value="Activity limited by breathing problems/shortness of breath"  wire:model="red_flags_response">
                            <label for="breathing_problems"> Activity limited by breathing problems/shortness of breath</label><br>
                            
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="checkbox" name="Fever" id="Fever" value="Fever ≥100°F or feels very sick/flu-like"  wire:model="red_flags_response">
                            <label for="Fever">Fever ≥100°F or feels very sick/flu-like</label><br>

                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="checkbox" name="dizziness" id="dizziness" value="Heart racing with dizziness or severe swelling"  wire:model="red_flags_response">
                            <label for="dizziness">Heart racing with dizziness or severe swelling</label><br>

                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="checkbox" name="bleeding" id="bleeding" value="Heavy bleeding or widespread easy bruising"  wire:model="red_flags_response">
                            <label for="bleeding">Heavy bleeding or widespread easy bruising</label><br>

                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="checkbox" name="daily_activities" id="daily_activities" value="Unable to do basic daily activities"  wire:model="red_flags_response">
                            <label for="daily_activities">Unable to do basic daily activities</label><br>

                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="checkbox" name="urgent_care" id="urgent_care" value="Went to ER/urgent care"  wire:model="red_flags_response">
                            <label for="urgent_care">Went to ER/urgent care</label><br>
                            
                            <span class="text-danger">@error('red_flags_response'){{ $message }}@enderror</span>
                        </div>
                    </div>
                   

                    <div class="single_item">
                        <div>
                            <br><label for="enhertu_effects">NORMAL ENHERTU EFFECTS - ROUTINE FOLLOW-UP:</label><br><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="checkbox" name="mild_fatigue" id="mild_fatigue" value="Mild fatigue with activity"  wire:model="enhertu_effects_response">
                            <label for="mild_fatigue"> Mild fatigue with activity</label><br>
                            
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="checkbox" name="nausea" id="nausea" value="Some nausea/appetite changes"  wire:model="enhertu_effects_response">
                            <label for="nausea">Some nausea/appetite changes</label><br>

                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="checkbox" name="rest" id="rest" value="Needs more rest than usual"  wire:model="enhertu_effects_response">
                            <label for="rest">Needs more rest than usual</label><br>

                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="checkbox" name="daily_routine" id="daily_routine" value="Managing daily routine with modifications"  wire:model="enhertu_effects_response">
                            <label for="daily_routine">Managing daily routine with modifications</label><br>

                            <span class="text-danger">@error('enhertu_effects_response'){{ $message }}@enderror</span>
                        </div>
                    </div>
                    

                    <div class="single_item">
                        <div>
                            <br><label for="patient_understanding">PATIENT UNDERSTANDING:</label><br><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="checkbox" name="immediate_medical" id="immediate_medical" value="Knows when to seek immediate medical care"  wire:model="patient_understanding_response">
                            <label for="immediate_medical"> Knows when to seek immediate medical care</label><br>
                            
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="checkbox" name="scheduled_infusion" id="scheduled_infusion" value="Ready for next scheduled infusion (every 21 days)"  wire:model="patient_understanding_response">
                            <label for="scheduled_infusion">Ready for next scheduled infusion (every 21 days)</label><br>

                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="checkbox" name="activity_tolerance" id="activity_tolerance" value="Able to describe activity tolerance since last infusion"  wire:model="patient_understanding_response">
                            <label for="activity_tolerance">Able to describe activity tolerance since last infusion</label><br>

                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="checkbox" name="upcoming_infusion" id="upcoming_infusion" value="Next check-in scheduled before upcoming infusion"  wire:model="patient_understanding_response">
                            <label for="upcoming_infusion">Next check-in scheduled before upcoming infusion</label><br>

                            <span class="text-danger">@error('patient_understanding_response'){{ $message }}@enderror</span>
                        </div>
                    </div>

                     <div class="single_item">
                        <div>
                            <br><label for="action_needed_response">Action needed:</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="action_needed_response" id="action_needed_response"  wire:model="action_needed_response">
                            <span class="text-danger">@error('action_needed_response'){{ $message }}@enderror</span>
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

            @if ($currentStep!=3)
                <button  <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="submit" class="btn btn-md btn-primary">Save draft</button>
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