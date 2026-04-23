<div>
    <form wire:submit.prevent="{{$method}}" >
    {{-- <form wire:submit.prevent="register" > --}}
        @csrf
    
        <div class="form_title">
            <h3><u>CT4HER Program Enrollment Form For Physicians, Pharmacists, and Facilities</u></h3>
        </div>
        
        <div class="form_wrapper">
             @if ($currentStep == 1)
                <div class="step-two">
                    <div class="steps bg-secondary text-white">STEP FIVE</div>
                    <h4 class="sectionTitle" >Adverse Events and Dropouts </h4>

                    <div class="row_entry">
                        <div>
                            <p>Adverse Drug Reactions (ADR)</p>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="adverse_drug_reaction_yes" name="adverse_drug_reaction" value="Yes"  wire:model="adverse_drug_reaction">
                            <label for="adverse_drug_reaction_yes">Yes</label>&nbsp&nbsp&nbsp
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="adverse_drug_reaction_no" name="adverse_drug_reaction" value="No"  wire:model="adverse_drug_reaction">
                            <label for="adverse_drug_reaction_no">No</label><br>
                            <span class="text-danger">@error('adverse_drug_reaction'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <p>ADR Details</p>
                                <textarea <?php if(Auth::user()->role<2){echo 'disabled';} ?> <?php if(Auth::user()->role<2){echo 'disabled';} ?> name="adr_details" id="adr_details" cols="45" rows="2"  
                                    wire:model="adr_details">
                                </textarea>
                                <span class="text-danger">@error('adr_details'){{ $message }}@enderror</span>
                        </div> 
                        
                    </div>
                    <div class="row_entry">
                        <div>
                            <p>Dropouts</p>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="dropouts_yes" name="dropouts" value="Yes"  wire:model="dropouts">
                            <label for="dropouts_yes">Yes</label>&nbsp&nbsp&nbsp
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="dropouts_no" name="dropouts" value="No"  wire:model="dropouts">
                            <label for="dropouts_no">No</label><br>
                            <span class="text-danger">@error('dropouts'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="dropout_reason">Reason for Dropout</label><br>
                            {{-- {{dd($dropout_data)}} --}}
                            <select <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="dropout_reason" id="dropout_reason"  wire:model="dropout_reason">
                                <option value="Select">Select</option>
                                    @foreach ($dropout_data as $dropout)
                                        <option value="{{$dropout->drop_reason}}">{{$dropout->drop_reason}}</option>
                                    @endforeach
                            </select>
                            @if(Auth::user()->role>1)
                                <a href="{{route('dropout_create')}}">
                                    <button <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="button" class="btn btn-md btn-success" >+ Add</button>
                                </a>
                                @endif
                            
                            <span class="text-danger">@error('dropout_reason'){{ $message }}@enderror</span>
                        </div>
                        
                    </div>
                    {{-- <div class="single_item">
                        <div >
                            <label for="other_dropout_reasons">If Other Dropout Reasons, Specify</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="other_dropout_reasons" id="other_dropout_reasons"  wire:model="other_dropout_reasons">
                            <span class="text-danger">@error('other_dropout_reasons'){{ $message }}@enderror</span>
                        </div>
                        
                    </div> --}}
                    <div class="row_entry">
                        <div>
                            <label for="mental_health">Mental Health Status</label><br>
                            <select <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="mental_health" id="mental_health"  wire:model="mental_health">
                                <option value="Select">Select</option>
                                <option value="Stable">Stable</option>
                                <option value="Requires Support">Requires Support</option>
                                <option value="Others">Others</option>
                            </select>
                            <span class="text-danger">@error('mental_health'){{ $message }}@enderror</span>
                        </div>
                        <div >
                            <label for="other_mental_health">If Other Mental Health Status, Specify</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="other_mental_health" id="other_mental_health"  wire:model="other_mental_health">
                            <span class="text-danger">@error('other_mental_health'){{ $message }}@enderror</span>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <div class="action-buttons d-flex justify-content-between bg-white pt-2 pb-2">

            @if ($currentStep == 1)
                    <div></div>
            @endif
    
            {{-- @if ($currentStep >1 && $currentStep <=5)
                <button type="button" class="btn btn-md btn-secondary" wire:click="decreaseStep()">Previous</button>
            @endif
            
            @if ($currentStep <5)
                <button type="button" class="btn btn-md btn-success" wire:click="increaseStep()">Next</button>
            @endif --}}
            
            @if ($currentStep == 1)
                <button  <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="submit" class="btn btn-md btn-primary">Submit</button>
            @endif
        </div>
    </form>

</div>
