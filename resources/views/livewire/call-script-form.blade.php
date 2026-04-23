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
                                <p class="subsection_heading">Introduction</p>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <p>Caller: Hi {{$patient_name}}, it’s [Caller’s Name] from Elara Health. Just checking in to see how you’re 
                                    doing with your Enhertu treatment. Got a few minutes to chat?</p>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <label for="patient_response_salutation">{{$patient_name}} : [Response]</label><br>
                                
                                <select <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="patient_response_salutation" id="patient_response_salutation"  wire:model="patient_response_salutation">
                                    <option value="">Select</option>
                                    @foreach ($response_data as $response_)
                                        <option value="{{$response_->patient_response}}">{{$response_->patient_response}}</option>
                                    @endforeach
                                </select>
                                @if(Auth::user()->role>1)
                                    <a href="{{route('response_create')}}">
                                        <button <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="button" class="btn btn-md btn-success" >+ Add</button>
                                    </a>
                                @endif

                                

                                {{-- <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="patient_response_salutation" id="patient_response_salutation"  wire:model="patient_response_salutation"> --}}
                                <span class="text-danger">@error('patient_response_salutation'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <p class="subsection_heading">If the patient is busy:</p>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <p>Caller: No worries! When’s a better time for me to call back?</p>
                            </div>
                        </div>

                        <div class="single_item">
                            <div>
                                <label for="patient_response_busy">{{$patient_name}} : [Response]</label><br>
                                <select <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="patient_response_busy" id="patient_response_busy"  wire:model="patient_response_busy">
                                    <option value="">Select</option>
                                    @foreach ($response_data as $response_)
                                        <option value="{{$response_->patient_response}}">{{$response_->patient_response}}</option>
                                    @endforeach
                                </select>

                                {{-- <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="patient_response_busy" id="patient_response_busy"  wire:model="patient_response_busy"> --}}
                                <span class="text-danger">@error('patient_response_busy'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <p>Caller: Perfect, I’ll call you back then. Take care!</p>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <p class="subsection_heading">If the patient is available</p>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <p>Caller: Great, let’s dive in. This’ll be quick!</p>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <p class="subsection_heading">Main Questions:</p>
                            </div>
                        </div>
                        {{-- <div class="single_item">
                            <div>
                                <p>Caller: First off, how have you been feeling since starting Enhertu? Anything new or different?</p>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <label for="patient_response_feel_after">{{$patient_name}} : [Response]</label><br>
                                <input <?php// if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="patient_response_feel_after" id="patient_response_feel_after"  wire:model="patient_response_feel_after">
                                <span class="text-danger">@error('patient_response_feel_after'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <p>Caller: Got it. Any side effects you’ve noticed? Things like nausea, fatigue, or anything else?</p>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <label for="patient_response_side_effect">{{$patient_name}} : [Response]</label><br>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="patient_response_side_effect" id="patient_response_side_effect"  wire:model="patient_response_side_effect">
                                <span class="text-danger">@error('patient_response_side_effect'){{ $message }}@enderror</span>
                            </div>
                        </div> --}}
                       
                        <div class="single_item">
                            <div>
                                <label for="script_question_1">Main Questions</label><br>
                                <select disabled <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="script_question_1" id="script_question_1"  wire:model="script_question_1">
                                    <option value="Select">Select</option>
                                    <option value="First off, how have you been feeling since starting Enhertu? Anything new or different?">First off, how have you been feeling since starting Enhertu? Anything new or different?</option>
                                    <option value="Any side effects you’ve noticed? Things like nausea, fatigue, or anything else?">Any side effects you’ve noticed? Things like nausea, fatigue, or anything else?</option>
                                    <option value="Specifically, have you had any trouble with breathing, coughing, or feeling short of breath?">Specifically, have you had any trouble with breathing, coughing, or feeling short of breath?</option>
                                    <option value="If yes: How severe would you say it is? Mild, moderate, or really bothering you?">If yes: How severe would you say it is? Mild, moderate, or really bothering you?</option>
                                    <option value="Have you talked to your doctor about any of these symptoms?">Have you talked to your doctor about any of these symptoms?</option>
                                </select>
                                <span class="text-danger">@error('script_question_1'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <label for="patient_response_1">{{$patient_name}} : [Response]</label><br>
                                <select <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="patient_response_1" id="patient_response_1"  wire:model="patient_response_1">
                                    <option value="">Select</option>
                                    @foreach ($response_data as $response_)
                                        <option value="{{$response_->patient_response}}">{{$response_->patient_response}}</option>
                                    @endforeach
                                </select>

                                {{-- <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="patient_response_1" id="patient_response_1"  wire:model="patient_response_1"> --}}
                                <span class="text-danger">@error('patient_response_1'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <label for="script_question_2">Main Questions</label><br>
                                <select disabled <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="script_question_2" id="script_question_2"  wire:model="script_question_2">
                                    <option value="Select">Select</option>
                                    <option value="First off, how have you been feeling since starting Enhertu? Anything new or different?">First off, how have you been feeling since starting Enhertu? Anything new or different?</option>
                                    <option value="Any side effects you’ve noticed? Things like nausea, fatigue, or anything else?">Any side effects you’ve noticed? Things like nausea, fatigue, or anything else?</option>
                                    <option value="Specifically, have you had any trouble with breathing, coughing, or feeling short of breath?">Specifically, have you had any trouble with breathing, coughing, or feeling short of breath?</option>
                                    <option value="If yes: How severe would you say it is? Mild, moderate, or really bothering you?">If yes: How severe would you say it is? Mild, moderate, or really bothering you?</option>
                                    <option value="Have you talked to your doctor about any of these symptoms?">Have you talked to your doctor about any of these symptoms?</option>
                                </select>
                                <span class="text-danger">@error('script_question_2'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <label for="patient_response_2">{{$patient_name}} : [Response]</label><br>
                                <select <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="patient_response_2" id="patient_response_2"  wire:model="patient_response_2">
                                    <option value="">Select</option>
                                    @foreach ($response_data as $response_)
                                        <option value="{{$response_->patient_response}}">{{$response_->patient_response}}</option>
                                    @endforeach
                                </select>
                                {{-- <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="patient_response_2" id="patient_response_2"  wire:model="patient_response_2"> --}}
                                <span class="text-danger">@error('patient_response_2'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <label for="script_question_3">Main Questions</label><br>
                                <select disabled <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="script_question_3" id="script_question_3"  wire:model="script_question_3">
                                    <option value="Select">Select</option>
                                    <option value="First off, how have you been feeling since starting Enhertu? Anything new or different?">First off, how have you been feeling since starting Enhertu? Anything new or different?</option>
                                    <option value="Any side effects you’ve noticed? Things like nausea, fatigue, or anything else?">Any side effects you’ve noticed? Things like nausea, fatigue, or anything else?</option>
                                    <option value="Specifically, have you had any trouble with breathing, coughing, or feeling short of breath?">Specifically, have you had any trouble with breathing, coughing, or feeling short of breath?</option>
                                    <option value="If yes: How severe would you say it is? Mild, moderate, or really bothering you?">If yes: How severe would you say it is? Mild, moderate, or really bothering you?</option>
                                    <option value="Have you talked to your doctor about any of these symptoms?">Have you talked to your doctor about any of these symptoms?</option>
                                </select>
                                <span class="text-danger">@error('script_question_3'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <label for="patient_response_3">{{$patient_name}} : [Response]</label><br>
                                <select <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="patient_response_3" id="patient_response_3"  wire:model="patient_response_3">
                                    <option value="">Select</option>
                                    @foreach ($response_data as $response_)
                                        <option value="{{$response_->patient_response}}">{{$response_->patient_response}}</option>
                                    @endforeach
                                </select>
                                {{-- <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="patient_response_3" id="patient_response_3"  wire:model="patient_response_3"> --}}
                                <span class="text-danger">@error('patient_response_3'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <label for="script_question_4">Main Questions</label><br>
                                <select disabled <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="script_question_4" id="script_question_4"  wire:model="script_question_4">
                                    <option value="Select">Select</option>
                                    <option value="First off, how have you been feeling since starting Enhertu? Anything new or different?">First off, how have you been feeling since starting Enhertu? Anything new or different?</option>
                                    <option value="Any side effects you’ve noticed? Things like nausea, fatigue, or anything else?">Any side effects you’ve noticed? Things like nausea, fatigue, or anything else?</option>
                                    <option value="Specifically, have you had any trouble with breathing, coughing, or feeling short of breath?">Specifically, have you had any trouble with breathing, coughing, or feeling short of breath?</option>
                                    <option value="If yes: How severe would you say it is? Mild, moderate, or really bothering you?">If yes: How severe would you say it is? Mild, moderate, or really bothering you?</option>
                                    <option value="Have you talked to your doctor about any of these symptoms?">Have you talked to your doctor about any of these symptoms?</option>
                                </select>
                                <span class="text-danger">@error('script_question_4'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <label for="patient_response_4">{{$patient_name}} : [Response]</label><br>
                                <select <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="patient_response_4" id="patient_response_4"  wire:model="patient_response_4">
                                    <option value="">Select</option>
                                    @foreach ($response_data as $response_)
                                        <option value="{{$response_->patient_response}}">{{$response_->patient_response}}</option>
                                    @endforeach
                                </select>
                                {{-- <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="patient_response_4" id="patient_response_4"  wire:model="patient_response_4"> --}}
                                <span class="text-danger">@error('patient_response_4'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <label for="script_question_5">Main Questions</label><br>
                                <select disabled <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="script_question_5" id="script_question_5"  wire:model="script_question_5">
                                    <option value="Select">Select</option>
                                    <option value="First off, how have you been feeling since starting Enhertu? Anything new or different?">First off, how have you been feeling since starting Enhertu? Anything new or different?</option>
                                    <option value="Any side effects you’ve noticed? Things like nausea, fatigue, or anything else?">Any side effects you’ve noticed? Things like nausea, fatigue, or anything else?</option>
                                    <option value="Specifically, have you had any trouble with breathing, coughing, or feeling short of breath?">Specifically, have you had any trouble with breathing, coughing, or feeling short of breath?</option>
                                    <option value="If yes: How severe would you say it is? Mild, moderate, or really bothering you?">If yes: How severe would you say it is? Mild, moderate, or really bothering you?</option>
                                    <option value="Have you talked to your doctor about any of these symptoms?">Have you talked to your doctor about any of these symptoms?</option>
                                </select>
                                <span class="text-danger">@error('script_question_5'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <label for="patient_response_5">{{$patient_name}} : [Response]</label><br>

                                <select <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="patient_response_5" id="patient_response_5"  wire:model="patient_response_5">
                                    <option value="">Select</option>
                                    @foreach ($response_data as $response_)
                                        <option value="{{$response_->patient_response}}">{{$response_->patient_response}}</option>
                                    @endforeach
                                </select>
                                
                                {{-- <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="patient_response_5" id="patient_response_5"  wire:model="patient_response_5"> --}}
                                <span class="text-danger">@error('patient_response_5'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <p class="subsection_heading">Wrap-up</p>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <p>Caller: Thanks for sharing all that! If anything comes up especially breathing issues—let your doctor know right away. 
                                    And feel free to reach out to us if you have any questions or need support.</p>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <label for="patient_response_wrap_advice">{{$patient_name}} : [Response]</label><br>
                                <select <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="patient_response_wrap_advice" id="patient_response_wrap_advice"  wire:model="patient_response_wrap_advice">
                                    <option value="">Select</option>
                                    @foreach ($response_data as $response_)
                                        <option value="{{$response_->patient_response}}">{{$response_->patient_response}}</option>
                                    @endforeach
                                </select>

                                {{-- <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="patient_response_wrap_advice" id="patient_response_wrap_advice"  wire:model="patient_response_wrap_advice"> --}}
                                <span class="text-danger">@error('patient_response_wrap_advice'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <p>Caller: We’ll check in again soon. Take care, and have a great day!</p>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <label for="patient_response_wrap_bye">{{$patient_name}} : [Response]</label><br>
                                <select <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="patient_response_wrap_bye" id="patient_response_wrap_bye"  wire:model="patient_response_wrap_bye">
                                    <option value="">Select</option>
                                    @foreach ($response_data as $response_)
                                        <option value="{{$response_->patient_response}}">{{$response_->patient_response}}</option>
                                    @endforeach
                                </select>
                                {{-- <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="patient_response_wrap_bye" id="patient_response_wrap_bye"  wire:model="patient_response_wrap_bye"> --}}
                                <span class="text-danger">@error('patient_response_wrap_bye'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="single_item">
                            <div>
                                <p>Caller: Bye for now!</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
    
            @if ($currentStep == 2)
                <div class="step-two">
                    <div class="steps bg-secondary text-white">STEP 2/3</div>
                    <h4 class="sectionTitle" >Weekly Check-In Call Script</h4>

                    <div class="single_item">
                        <div>
                            <label for="weekly_check_in_quiz_1">Weekly Check-in Questions</label><br>
                            <select disabled <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="weekly_check_in_quiz_1" id="weekly_check_in_quiz_1"  wire:model="weekly_check_in_quiz_1">
                                <option value="Select">Select</option>
                                <option value="How have you been feeling since our last call? Any changes in how you’re feeling overall?">How have you been feeling since our last call? Any changes in how you’re feeling overall?</option>
                                <option value="Are you still taking Enhertu as prescribed? Any issues with the medication?">Are you still taking Enhertu as prescribed? Any issues with the medication?</option>
                                <option value="Have you noticed any new or worsening side effects this week? Things like nausea, fatigue, or anything else?">Have you noticed any new or worsening side effects this week? Things like nausea, fatigue, or anything else?</option>
                                <option value="Specifically, have you had any trouble with breathing, coughing, or feeling short of breath? We’re keeping a close eye on those symptoms">Specifically, have you had any trouble with breathing, coughing, or feeling short of breath? We’re keeping a close eye on those symptoms</option>
                                <option value="If yes: How severe would you say it is? Mild, moderate, or really bothering you?">If yes: How severe would you say it is? Mild, moderate, or really bothering you?</option>
                                <option value="Have you had any recent visits with your doctor or healthcare provider? Any changes to your treatment plan?">Have you had any recent visits with your doctor or healthcare provider? Any changes to your treatment plan?</option>
                                <option value="How’s your quality of life been this week? Any challenges or improvements you’d like to share?">How’s your quality of life been this week? Any challenges or improvements you’d like to share?</option>
                            </select>
                            <span class="text-danger">@error('weekly_check_in_quiz_1'){{ $message }}@enderror</span>
                        </div>
                    </div>
                    <div class="single_item">
                        <div>
                            <label for="weekly_check_in_response_1">{{$patient_name}} : [Response]</label><br>
                            
                            <select <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="weekly_check_in_response_1" id="weekly_check_in_response_1"  wire:model="weekly_check_in_response_1">
                                <option value="">Select</option>
                                @foreach ($response_data as $response_)
                                    <option value="{{$response_->patient_response}}">{{$response_->patient_response}}</option>
                                @endforeach
                            </select>

                            @if(Auth::user()->role>1)
                                <a href="{{route('response_create')}}">
                                    <button <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="button" class="btn btn-md btn-success" >+ Add</button>
                                </a>
                            @endif
                            {{-- <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="weekly_check_in_response_1" id="weekly_check_in_response_1"  wire:model="weekly_check_in_response_1"> --}}
                            <span class="text-danger">@error('weekly_check_in_response_1'){{ $message }}@enderror</span>
                        </div>
                    </div>
                    
                    <div class="single_item">
                        <div>
                            <label for="weekly_check_in_quiz_2">Weekly Check-in Questions</label><br>
                            <select disabled <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="weekly_check_in_quiz_2" id="weekly_check_in_quiz_2"  wire:model="weekly_check_in_quiz_2">
                                <option value="Select">Select</option>
                                <option value="How have you been feeling since our last call? Any changes in how you’re feeling overall?">How have you been feeling since our last call? Any changes in how you’re feeling overall?</option>
                                <option value="Are you still taking Enhertu as prescribed? Any issues with the medication?">Are you still taking Enhertu as prescribed? Any issues with the medication?</option>
                                <option value="Have you noticed any new or worsening side effects this week? Things like nausea, fatigue, or anything else?">Have you noticed any new or worsening side effects this week? Things like nausea, fatigue, or anything else?</option>
                                <option value="Specifically, have you had any trouble with breathing, coughing, or feeling short of breath? We’re keeping a close eye on those symptoms">Specifically, have you had any trouble with breathing, coughing, or feeling short of breath? We’re keeping a close eye on those symptoms</option>
                                <option value="If yes: How severe would you say it is? Mild, moderate, or really bothering you?">If yes: How severe would you say it is? Mild, moderate, or really bothering you?</option>
                                <option value="Have you had any recent visits with your doctor or healthcare provider? Any changes to your treatment plan?">Have you had any recent visits with your doctor or healthcare provider? Any changes to your treatment plan?</option>
                                <option value="How’s your quality of life been this week? Any challenges or improvements you’d like to share?">How’s your quality of life been this week? Any challenges or improvements you’d like to share?</option>
                            </select>
                            <span class="text-danger">@error('weekly_check_in_quiz_2'){{ $message }}@enderror</span>
                        </div>
                    </div>
                    <div class="single_item">
                        <div>
                            <label for="weekly_check_in_response_2">{{$patient_name}} : [Response]</label><br>
                            <select <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="weekly_check_in_response_2" id="weekly_check_in_response_2"  wire:model="weekly_check_in_response_2">
                                <option value="">Select</option>
                                @foreach ($response_data as $response_)
                                    <option value="{{$response_->patient_response}}">{{$response_->patient_response}}</option>
                                @endforeach
                            </select>
                            {{-- <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="weekly_check_in_response_2" id="weekly_check_in_response_2"  wire:model="weekly_check_in_response_2"> --}}
                            <span class="text-danger">@error('weekly_check_in_response_2'){{ $message }}@enderror</span>
                        </div>
                    </div>
                    
                    <div class="single_item">
                        <div>
                            <label for="weekly_check_in_quiz_3">Weekly Check-in Questions</label><br>
                            <select disabled <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="weekly_check_in_quiz_3" id="weekly_check_in_quiz_3"  wire:model="weekly_check_in_quiz_3">
                                <option value="Select">Select</option>
                                <option value="How have you been feeling since our last call? Any changes in how you’re feeling overall?">How have you been feeling since our last call? Any changes in how you’re feeling overall?</option>
                                <option value="Are you still taking Enhertu as prescribed? Any issues with the medication?">Are you still taking Enhertu as prescribed? Any issues with the medication?</option>
                                <option value="Have you noticed any new or worsening side effects this week? Things like nausea, fatigue, or anything else?">Have you noticed any new or worsening side effects this week? Things like nausea, fatigue, or anything else?</option>
                                <option value="Specifically, have you had any trouble with breathing, coughing, or feeling short of breath? We’re keeping a close eye on those symptoms">Specifically, have you had any trouble with breathing, coughing, or feeling short of breath? We’re keeping a close eye on those symptoms</option>
                                <option value="If yes: How severe would you say it is? Mild, moderate, or really bothering you?">If yes: How severe would you say it is? Mild, moderate, or really bothering you?</option>
                                <option value="Have you had any recent visits with your doctor or healthcare provider? Any changes to your treatment plan?">Have you had any recent visits with your doctor or healthcare provider? Any changes to your treatment plan?</option>
                                <option value="How’s your quality of life been this week? Any challenges or improvements you’d like to share?">How’s your quality of life been this week? Any challenges or improvements you’d like to share?</option>
                            </select>
                            <span class="text-danger">@error('weekly_check_in_quiz_3'){{ $message }}@enderror</span>
                        </div>
                    </div>
                    <div class="single_item">
                        <div>
                            <label for="weekly_check_in_response_3">{{$patient_name}} : [Response]</label><br>
                            <select <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="weekly_check_in_response_3" id="weekly_check_in_response_3"  wire:model="weekly_check_in_response_3">
                                <option value="">Select</option>
                                @foreach ($response_data as $response_)
                                    <option value="{{$response_->patient_response}}">{{$response_->patient_response}}</option>
                                @endforeach
                            </select>
                            {{-- <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="weekly_check_in_response_3" id="weekly_check_in_response_3"  wire:model="weekly_check_in_response_3"> --}}
                            <span class="text-danger">@error('weekly_check_in_response_3'){{ $message }}@enderror</span>
                        </div>
                    </div>
                 
                    <div class="single_item">
                        <div>
                            <label for="weekly_check_in_quiz_4">Weekly Check-in Questions</label><br>
                            <select disabled <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="weekly_check_in_quiz_4" id="weekly_check_in_quiz_4"  wire:model="weekly_check_in_quiz_4">
                                <option value="Select">Select</option>
                                <option value="How have you been feeling since our last call? Any changes in how you’re feeling overall?">How have you been feeling since our last call? Any changes in how you’re feeling overall?</option>
                                <option value="Are you still taking Enhertu as prescribed? Any issues with the medication?">Are you still taking Enhertu as prescribed? Any issues with the medication?</option>
                                <option value="Have you noticed any new or worsening side effects this week? Things like nausea, fatigue, or anything else?">Have you noticed any new or worsening side effects this week? Things like nausea, fatigue, or anything else?</option>
                                <option value="Specifically, have you had any trouble with breathing, coughing, or feeling short of breath? We’re keeping a close eye on those symptoms">Specifically, have you had any trouble with breathing, coughing, or feeling short of breath? We’re keeping a close eye on those symptoms</option>
                                <option value="If yes: How severe would you say it is? Mild, moderate, or really bothering you?">If yes: How severe would you say it is? Mild, moderate, or really bothering you?</option>
                                <option value="Have you had any recent visits with your doctor or healthcare provider? Any changes to your treatment plan?">Have you had any recent visits with your doctor or healthcare provider? Any changes to your treatment plan?</option>
                                <option value="How’s your quality of life been this week? Any challenges or improvements you’d like to share?">How’s your quality of life been this week? Any challenges or improvements you’d like to share?</option>
                            </select>
                            <span class="text-danger">@error('weekly_check_in_quiz_4'){{ $message }}@enderror</span>
                        </div>
                    </div>
                    <div class="single_item">
                        <div>
                            <label for="weekly_check_in_response_4">{{$patient_name}} : [Response]</label><br>
                            <select <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="weekly_check_in_response_4" id="weekly_check_in_response_4"  wire:model="weekly_check_in_response_4">
                                <option value="">Select</option>
                                @foreach ($response_data as $response_)
                                    <option value="{{$response_->patient_response}}">{{$response_->patient_response}}</option>
                                @endforeach
                            </select>
                            {{-- <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="weekly_check_in_response_4" id="weekly_check_in_response_4"  wire:model="weekly_check_in_response_4"> --}}
                            <span class="text-danger">@error('weekly_check_in_response_4'){{ $message }}@enderror</span>
                        </div>
                    </div>
                 
                    <div class="single_item">
                        <div>
                            <label for="weekly_check_in_quiz_5">Weekly Check-in Questions</label><br>
                            <select disabled <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="weekly_check_in_quiz_5" id="weekly_check_in_quiz_5"  wire:model="weekly_check_in_quiz_5">
                                <option value="Select">Select</option>
                                <option value="How have you been feeling since our last call? Any changes in how you’re feeling overall?">How have you been feeling since our last call? Any changes in how you’re feeling overall?</option>
                                <option value="Are you still taking Enhertu as prescribed? Any issues with the medication?">Are you still taking Enhertu as prescribed? Any issues with the medication?</option>
                                <option value="Have you noticed any new or worsening side effects this week? Things like nausea, fatigue, or anything else?">Have you noticed any new or worsening side effects this week? Things like nausea, fatigue, or anything else?</option>
                                <option value="Specifically, have you had any trouble with breathing, coughing, or feeling short of breath? We’re keeping a close eye on those symptoms">Specifically, have you had any trouble with breathing, coughing, or feeling short of breath? We’re keeping a close eye on those symptoms</option>
                                <option value="If yes: How severe would you say it is? Mild, moderate, or really bothering you?">If yes: How severe would you say it is? Mild, moderate, or really bothering you?</option>
                                <option value="Have you had any recent visits with your doctor or healthcare provider? Any changes to your treatment plan?">Have you had any recent visits with your doctor or healthcare provider? Any changes to your treatment plan?</option>
                                <option value="How’s your quality of life been this week? Any challenges or improvements you’d like to share?">How’s your quality of life been this week? Any challenges or improvements you’d like to share?</option>
                            </select>
                            <span class="text-danger">@error('weekly_check_in_quiz_5'){{ $message }}@enderror</span>
                        </div>
                    </div>
                    <div class="single_item">
                        <div>
                            <label for="weekly_check_in_response_5">{{$patient_name}} : [Response]</label><br>
                            <select <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="weekly_check_in_response_5" id="weekly_check_in_response_5"  wire:model="weekly_check_in_response_5">
                                <option value="">Select</option>
                                @foreach ($response_data as $response_)
                                    <option value="{{$response_->patient_response}}">{{$response_->patient_response}}</option>
                                @endforeach
                            </select>
                            
                            {{-- <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="weekly_check_in_response_5" id="weekly_check_in_response_5"  wire:model="weekly_check_in_response_5"> --}}
                            <span class="text-danger">@error('weekly_check_in_response_5'){{ $message }}@enderror</span>
                        </div>
                    </div>
                 
                    <div class="single_item">
                        <div>
                            <label for="weekly_check_in_quiz_6">Weekly Check-in Questions</label><br>
                            <select disabled <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="weekly_check_in_quiz_6" id="weekly_check_in_quiz_6"  wire:model="weekly_check_in_quiz_6">
                                <option value="Select">Select</option>
                                <option value="How have you been feeling since our last call? Any changes in how you’re feeling overall?">How have you been feeling since our last call? Any changes in how you’re feeling overall?</option>
                                <option value="Are you still taking Enhertu as prescribed? Any issues with the medication?">Are you still taking Enhertu as prescribed? Any issues with the medication?</option>
                                <option value="Have you noticed any new or worsening side effects this week? Things like nausea, fatigue, or anything else?">Have you noticed any new or worsening side effects this week? Things like nausea, fatigue, or anything else?</option>
                                <option value="Specifically, have you had any trouble with breathing, coughing, or feeling short of breath? We’re keeping a close eye on those symptoms">Specifically, have you had any trouble with breathing, coughing, or feeling short of breath? We’re keeping a close eye on those symptoms</option>
                                <option value="If yes: How severe would you say it is? Mild, moderate, or really bothering you?">If yes: How severe would you say it is? Mild, moderate, or really bothering you?</option>
                                <option value="Have you had any recent visits with your doctor or healthcare provider? Any changes to your treatment plan?">Have you had any recent visits with your doctor or healthcare provider? Any changes to your treatment plan?</option>
                                <option value="How’s your quality of life been this week? Any challenges or improvements you’d like to share?">How’s your quality of life been this week? Any challenges or improvements you’d like to share?</option>
                            </select>
                            <span class="text-danger">@error('weekly_check_in_quiz_6'){{ $message }}@enderror</span>
                        </div>
                    </div>
                    <div class="single_item">
                        <div>
                            <label for="weekly_check_in_response_6">{{$patient_name}} : [Response]</label><br>
                            <select <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="weekly_check_in_response_6" id="weekly_check_in_response_6"  wire:model="weekly_check_in_response_6">
                                <option value="">Select</option>
                                @foreach ($response_data as $response_)
                                    <option value="{{$response_->patient_response}}">{{$response_->patient_response}}</option>
                                @endforeach
                            </select>
                            {{-- <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="weekly_check_in_response_6" id="weekly_check_in_response_6"  wire:model="weekly_check_in_response_6"> --}}
                            <span class="text-danger">@error('weekly_check_in_response_6'){{ $message }}@enderror</span>
                        </div>
                    </div>
                 
                    <div class="single_item">
                        <div>
                            <label for="weekly_check_in_quiz_7">Weekly Check-in Questions</label><br>
                            <select disabled <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="weekly_check_in_quiz_7" id="weekly_check_in_quiz_7"  wire:model="weekly_check_in_quiz_7">
                                <option value="Select">Select</option>
                                <option value="How have you been feeling since our last call? Any changes in how you’re feeling overall?">How have you been feeling since our last call? Any changes in how you’re feeling overall?</option>
                                <option value="Are you still taking Enhertu as prescribed? Any issues with the medication?">Are you still taking Enhertu as prescribed? Any issues with the medication?</option>
                                <option value="Have you noticed any new or worsening side effects this week? Things like nausea, fatigue, or anything else?">Have you noticed any new or worsening side effects this week? Things like nausea, fatigue, or anything else?</option>
                                <option value="Specifically, have you had any trouble with breathing, coughing, or feeling short of breath? We’re keeping a close eye on those symptoms">Specifically, have you had any trouble with breathing, coughing, or feeling short of breath? We’re keeping a close eye on those symptoms</option>
                                <option value="If yes: How severe would you say it is? Mild, moderate, or really bothering you?">If yes: How severe would you say it is? Mild, moderate, or really bothering you?</option>
                                <option value="Have you had any recent visits with your doctor or healthcare provider? Any changes to your treatment plan?">Have you had any recent visits with your doctor or healthcare provider? Any changes to your treatment plan?</option>
                                <option value="How’s your quality of life been this week? Any challenges or improvements you’d like to share?">How’s your quality of life been this week? Any challenges or improvements you’d like to share?</option>
                            </select>
                            <span class="text-danger">@error('weekly_check_in_quiz_7'){{ $message }}@enderror</span>
                        </div>
                    </div>
                    <div class="single_item">
                        <div>
                            <label for="weekly_check_in_response_7">{{$patient_name}} : [Response]</label><br>
                            <select <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="weekly_check_in_response_7" id="weekly_check_in_response_7"  wire:model="weekly_check_in_response_7">
                                <option value="">Select</option>
                                @foreach ($response_data as $response_)
                                    <option value="{{$response_->patient_response}}">{{$response_->patient_response}}</option>
                                @endforeach
                            </select>
                            {{-- <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="weekly_check_in_response_7" id="weekly_check_in_response_7"  wire:model="weekly_check_in_response_7"> --}}
                            
                            <span class="text-danger">@error('weekly_check_in_response_7'){{ $message }}@enderror</span>
                        </div>
                    </div>
                </div>
            @endif
            @if ($currentStep == 3)
                <div class="step-two">
                    <div class="steps bg-secondary text-white">STEP 3/3</div>
                    <h4 class="sectionTitle" >Wrap-Up </h4>

                    <div class="single_item">
                        <div>
                            <p>Caller: Thanks for sharing all that! If anything comes up especially breathing issues—let your doctor know right away. 
                                And feel free to reach out to us if you have any questions or need support.</p>
                        </div>
                    </div>
                    <div class="single_item">
                        <div>
                            <label for="patient_response_wrap_advice_weekly">{{$patient_name}} : [Response]</label><br>
                            <select <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="patient_response_wrap_advice_weekly" id="patient_response_wrap_advice_weekly"  wire:model="patient_response_wrap_advice_weekly">
                                <option value="">Select</option>
                                @foreach ($response_data as $response_)
                                    <option value="{{$response_->patient_response}}">{{$response_->patient_response}}</option>
                                @endforeach
                            </select>
                            @if(Auth::user()->role>1)
                                <a href="{{route('response_create')}}">
                                    <button <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="button" class="btn btn-md btn-success" >+ Add</button>
                                </a>
                            @endif
                            {{-- <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="patient_response_wrap_advice_weekly" id="patient_response_wrap_advice_weekly"  wire:model="patient_response_wrap_advice_weekly"> --}}
                            <span class="text-danger">@error('patient_response_wrap_advice_weekly'){{ $message }}@enderror</span>
                        </div>
                    </div>
                    <div class="single_item">
                        <div>
                            <p>Caller: We’ll check in again next week. Take care, and have a great day!</p>
                        </div>
                    </div>
                    <div class="single_item">
                        <div>
                            <label for="patient_response_wrap_bye_weekly">{{$patient_name}} : [Response]</label><br>
                            <select <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="patient_response_wrap_bye_weekly" id="patient_response_wrap_bye_weekly"  wire:model="patient_response_wrap_bye_weekly">
                                <option value="">Select</option>
                                @foreach ($response_data as $response_)
                                    <option value="{{$response_->patient_response}}">{{$response_->patient_response}}</option>
                                @endforeach
                            </select>
                            {{-- <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="patient_response_wrap_bye_weekly" id="patient_response_wrap_bye_weekly"  wire:model="patient_response_wrap_bye_weekly"> --}}
                            <span class="text-danger">@error('patient_response_wrap_bye_weekly'){{ $message }}@enderror</span>
                        </div>
                    </div>
                    <div class="single_item">
                        <div>
                            <p>Caller: Bye for now!</p>
                        </div>
                    </div>

                    <div class="single_item">
                        <div>
                            <p class="subsection_heading">Caller Notes</p>
                        </div>
                    </div>
                    <div class="single_item">
                        <div>
                            <ul>
                                <li>All calls must be recorded and named with the pt.code, date of call, and call number
                                    <code> ie EAE26:25:001/25-02-25/01</code></li>
                                <li>Keep it conversational but focused on key points.</li>
                                <li>If the patient mentions severe symptoms, especially related to breathing, escalate immediately!</li>
                                <li>Document all responses clearly and follow up if needed.</li>
                            </ul>
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