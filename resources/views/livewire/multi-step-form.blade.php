<form  wire:submit.prevent="register">
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
                <h4 class="sectionTitle" >PATIENT DETAILS</h4>
                <div class="personal_info">

                    <div class="row_entry">
                        <div>
                            <label for="fname">First Name</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="fname" id="fname" wire:model="fname" >
                            <span class="text-danger">@error('fname'){{ $message }}@enderror</span>
                        </div>
                        <div>
                            <label for="lname">Last Name</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="lname" id="lname"  wire:model="lname">
                            <span class="text-danger">@error('lname'){{ $message }}@enderror</span>
                        </div>
                    </div>

                    <div class="row_entry">
                        <div>
                            <label for="birth_date">Date of birth</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="date" name="birth_date" id="birth_date"  wire:model="birth_date">
                            <span class="text-danger">@error('birth_date'){{ $message }}@enderror</span>
                        </div>
                        <div>
                            <label class="non_textInputs" for="gender">Gender</label><br>

                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="gender1" name="gender" value="Male"  wire:model="gender">
                            <label for="gender1">Male</label>&nbsp&nbsp&nbsp
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="gender2" name="gender" value="Female"  wire:model="gender">
                            <label for="gender2">Female</label>&nbsp&nbsp&nbsp
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="gender3" name="gender" value="Other"  wire:model="gender">
                            <label for="gender3">Other</label><br>
                            <span class="text-danger">@error('gender'){{ $message }}@enderror</span>
                            
                        </div>
                    </div>

                    <div class="row_entry">
                        <div>
                            <label for="address">Address</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="address" id="address"  wire:model="address">
                            <span class="text-danger">@error('address'){{ $message }}@enderror</span>
                        </div>
                        <div>
                            <label for="address_code">Code</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="address_code" id="address_code"  wire:model="address_code">
                            <span class="text-danger">@error('address_code'){{ $message }}@enderror</span>
                        </div>
                        
                    </div>
                    
                    <div class="row_entry">
                        <div>
                            <label for="physical_address">Physical Address</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="physical_address" id="physical_address"  wire:model="physical_address">
                            <span class="text-danger">@error('physical_address'){{ $message }}@enderror</span>
                        </div>
                        {{-- <div>
                            <label for="address_code">Code</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="address_code" id="address_code"  wire:model="address_code">
                            <span class="text-danger">@error('address_code'){{ $message }}@enderror</span>
                        </div> --}}
                        
                    </div>
                    <div class="row_entry">
                        <div>
                            <label for="county">County</label><br>
                            <select class="dropdown" name="county" id="county"  wire:model="county">
                                <option value="">Select</option>
                                <option value="Baringo">Baringo</option>
                                <option value="Bomet">Bomet</option>
                                <option value="Bungoma">Bungoma</option>
                                <option value="Busia">Busia</option>
                                <option value="Elgeyo-Marakwet">Elgeyo-Marakwet</option>
                                <option value="Embu">Embu</option>
                                <option value="Garissa">Garissa</option>
                                <option value="Homa Bay">Homa Bay</option>
                                <option value="Isiolo">Isiolo</option>
                                <option value="Kajiado">Kajiado</option>
                                <option value="Kakamega">Kakamega</option>
                                <option value="Kericho">Kericho</option>
                                <option value="Kiambu">Kiambu</option>
                                <option value="Kilifi">Kilifi</option>
                                <option value="Kirinyaga">Kirinyaga</option>
                                <option value="Kisii">Kisii</option>
                                <option value="Kisumu">Kisumu</option>
                                <option value="Kitui">Kitui</option>
                                <option value="Kwale">Kwale</option>
                                <option value="Laikipia">Laikipia</option>
                                <option value="Lamu">Lamu</option>
                                <option value="Machakos">Machakos</option>
                                <option value="Makueni">Makueni</option>
                                <option value="Mandera">Mandera</option>
                                <option value="Marsabit">Marsabit</option>
                                <option value="Meru">Meru</option>
                                <option value="Migori">Migori</option>
                                <option value="Mombasa">Mombasa</option>
                                <option value="Murang'a">Murang"a</option>
                                <option value="Nairobi City">Nairobi City</option>
                                <option value="Nakuru">Nakuru</option>
                                <option value="Nandi">Nandi</option>
                                <option value="Narok">Narok</option>
                                <option value="Nyamira">Nyamira</option>
                                <option value="Nyandarua">Nyandarua</option>
                                <option value="Nyeri">Nyeri</option>
                                <option value="Samburu">Samburu</option>
                                <option value="Siaya">Siaya</option>
                                <option value="Taita Taveta">Taita Taveta</option>
                                <option value="Tana River">Tana River</option>
                                <option value="Tharaka-Nithi">Tharaka-Nithi</option>
                                <option value="Trans Nzoia">Trans Nzoia</option>
                                <option value="Turkana">Turkana</option>
                                <option value="Uasin Gishu">Uasin Gishu</option>
                                <option value="Vihiga">Vihiga</option>
                                <option value="Wajir">Wajir</option>
                                <option value="West Pokot">West Pokot</option>
                            </select>
                            <span class="text-danger">@error('county'){{ $message }}@enderror</span>
                        </div>

                        <div>
                            <label for="mobile_contact">Mobile Phone</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="number" name="mobile_contact" id="mobile_contact"  wire:model="mobile_contact">
                            <span class="text-danger">@error('mobile_contact'){{ $message }}@enderror</span>
                        </div>
                        
                    </div>
                    <div class="row_entry">
                        <div>
                            <label for="alt_contact">Alternative Contact</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="number" name="alt_contact" id="alt_contact"  wire:model="alt_contact">
                            <span class="text-danger">@error('alt_contact'){{ $message }}@enderror</span>
                        </div>
                        <div>
                            <label for="id_no">ID NO.</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="number" name="id_no" id="id_no"  wire:model="id_no">
                            <span class="text-danger">@error('id_no'){{ $message }}@enderror</span>
                        </div>
                    </div>
                    <div class="row_entry">
                        <div>
                            <label for="email">Email Address</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="email" name="email" id="email"  wire:model="email">
                            <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="ethinicity">Ethinicity/Race</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="ethinicity" id="ethinicity"  wire:model="ethinicity">
                            <span class="text-danger">@error('ethinicity'){{ $message }}@enderror</span>
                        </div>
                    </div>
                    <div class="row_entry">
                        <div>
                            <label for="weight">Weight in Kgs</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="number" step="any" name="weight" id="weight"  wire:model="weight">
                            <span class="text-danger">@error('weight'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="height">Height in Mtrs</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="number" step="any" name="height" id="height"  wire:model="height">
                            <span class="text-danger">@error('height'){{ $message }}@enderror</span>
                        </div> 
                    </div>
                    <div class="row_entry">
                        <div>
                            <p>Primary Language</p>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="checkbox" name="english" id="english" value="English"  wire:model="language">
                            <label for="english"> English</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="checkbox" name="swahili" id="swahili" value="Swahili"  wire:model="language">
                            <label for="swahili">Swahili</label><br>
                            <span class="text-danger">@error('language'){{ $message }}@enderror</span>
                            
                        </div> 
                        <div>
                            <label for="other_language"> Other Language</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="other_language" id="other_language"  wire:model="other_language" >
                            <span class="text-danger">@error('other_language'){{ $message }}@enderror</span>
                        </div> 
                    </div>
                    <div class="single_item">
                        <div>
                            <label class="non_textInputs" for="marital">Marital Status</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="single" name="marital" value="Single"  wire:model="marital">
                            <label for="single">Single</label>&nbsp&nbsp&nbsp
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="married" name="marital" value="Married"  wire:model="marital">
                            <label for="married">Married</label>&nbsp&nbsp&nbsp
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="divorced" name="marital" value="Divorced"  wire:model="marital">
                            <label for="divorced">Divorced</label>&nbsp&nbsp&nbsp
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="seperated" name="marital" value="seperated"  wire:model="marital">
                            <label for="seperated">Seperated</label>&nbsp&nbsp&nbsp
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="widowed" name="marital" value="windowed"  wire:model="marital">
                            <label for="widowed">Widowed</label>&nbsp&nbsp&nbsp <br>
                            <span class="text-danger">@error('marital'){{ $message }}@enderror</span>
                        </div> 
                    </div>
                    <div class="row_entry">
                        <div>
                            <label for="spouse_name">Spouse Name</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="spouse_name" id="spouse_name"  wire:model="spouse_name">
                            <span class="text-danger">@error('spouse_name'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="spouse_phone">Spouse Phone No.</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="number" name="spouse_phone" id="spouse_phone"  wire:model="spouse_phone">
                            <span class="text-danger">@error('spouse_phone'){{ $message }}@enderror</span>
                        </div> 
                    </div>
                
                
                </div>
            </div>
        @endif

        @if ($currentStep == 2)
            <div class="step-two">
                <div class="steps bg-secondary text-white">STEP TWO</div>
                <h4 class="sectionTitle" >EMERGENCY CONTACT</h4>
            
                <div class="single_item">
                    <div>
                        <label for="emergency_contact_name">Emergency Contact Name</label><br>
                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="emergency_contact_name" id="emergency_contact_name"  wire:model="emergency_contact_name">
                        <span class="text-danger">@error('emergency_contact_name'){{ $message }}@enderror</span>
                    </div> 
                </div>
                <div class="row_entry">
                    <div>
                        <label for="emergency_contact_rel">Emergency Contact Relationship</label><br>
                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="emergency_contact_rel" id="emergency_contact_rel"  wire:model="emergency_contact_rel">
                        <span class="text-danger">@error('emergency_contact_rel'){{ $message }}@enderror</span>
                    </div> 
                    <div>
                        <label for="emergency_contact_email">Emergency Contact Email</label><br>
                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="email" name="emergency_contact_email" id="emergency_contact_email"  wire:model="emergency_contact_email">
                        <span class="text-danger">@error('emergency_contact_email'){{ $message }}@enderror</span>
                    </div> 
                </div>
                <div class="row_entry">
                    <div>
                        <label for="emergency_contact_mobile">Emergency Contact Phone</label><br>
                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="number"  name="emergency_contact_mobile" id="emergency_contact_mobile"  wire:model="emergency_contact_mobile">
                        <span class="text-danger">@error('emergency_contact_mobile'){{ $message }}@enderror</span>
                    </div> 
                    <div>
                        <label for="emergency_contact_alt_mobile">Emergency Contact Alternative Mobile</label><br>
                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="number" name="emergency_contact_alt_mobile" id="emergency_contact_alt_mobile"  wire:model="emergency_contact_alt_mobile">
                        <span class="text-danger">@error('emergency_contact_alt_mobile'){{ $message }}@enderror</span>
                    </div> 
                </div>
                <div class="row_entry">
                    <div>
                        <label for="emergency_contact_mobile">Physician 1</label><br>
                        <select class="dropdown" name="physician_id_1" id="physician_id_1"  wire:model="physician_id_1">
                            <option value="">Select</option>
                                @foreach ($practitioner_data as $practitioner_)
                                    <option value="{{$practitioner_->id}}">{{$practitioner_->pract_name}}</option>
                                @endforeach
                        </select>
                        @if(Auth::user()->role>1)
                            <a href="{{route('practitioner_create')}}">
                                <button <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="button" class="btn btn-md btn-success" >+ Add</button>
                            </a>
                        @endif
                       
                        <span class="text-danger">@error('physician_id_1'){{ $message }}@enderror</span>
                    </div> 
                    <div>
                        <label for="emergency_contact_mobile">Physician 2</label><br>
                        <select class="dropdown" name="physician_id_2" id="physician_id_2"  wire:model="physician_id_2">
                            <option value="">Select</option>
                                @foreach ($practitioner_data as $practitioner_)
                                    <option value="{{$practitioner_->id}}">{{$practitioner_->pract_name}}</option>
                                @endforeach
                        </select>
                        <span class="text-danger">@error('physician_id_2'){{ $message }}@enderror</span>
                    </div> 
                   

                </div>
                <div class="row_entry">
                    <div>
                        <label for="emergency_contact_mobile">Pharmacist 1</label><br>
                        <select class="dropdown" name="pharmacist_id_1" id="pharmacist_id_1"  wire:model="pharmacist_id_1">
                            <option value="">Select</option>
                                @foreach ($practitioner_data as $practitioner_)
                                    <option value="{{$practitioner_->id}}">{{$practitioner_->pract_name}}</option>
                                @endforeach
                        </select>
                     
                        <span class="text-danger">@error('pharmacist_id_1'){{ $message }}@enderror</span>
                    </div> 
                    <div>
                        <label for="emergency_contact_mobile">Pharmacist 2</label><br>
                        <select class="dropdown" name="pharmacist_id_2" id="pharmacist_id_2"  wire:model="pharmacist_id_2">
                            <option value="">Select</option>
                                @foreach ($practitioner_data as $practitioner_)
                                    <option value="{{$practitioner_->id}}">{{$practitioner_->pract_name}}</option>
                                @endforeach
                        </select>
                        <span class="text-danger">@error('pharmacist_id_2'){{ $message }}@enderror</span>
                    </div> 

                </div>
                <div class="row_entry">
                    <div>
                        <label for="ct_scan_file">Attach HR-CT Scan as pdf</label><br>
                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="file"  name="ct_scan_file" id="ct_scan_file"  wire:model="ct_scan_file">
                        <span class="text-danger">@error('ct_scan_file'){{ $message }}@enderror</span>
                    </div>
                    <div>
                        <label for="x_ray_file">Attach X-RAY as pdf</label><br>
                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="file"  name="x_ray_file" id="x_ray_file"  wire:model="x_ray_file">
                        <span class="text-danger">@error('x_ray_file'){{ $message }}@enderror</span>
                    </div>
                </div>
                <div class="row_entry">
                    <div>
                        <label for="patient_consent_file">Attach Patient's Consent form as pdf</label><br>
                        <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="file"  name="patient_consent_file" id="patient_consent_file"  wire:model="patient_consent_file">
                        <span class="text-danger">@error('patient_consent_file'){{ $message }}@enderror</span>
                    </div>
                </div>
            </div>
        @endif

        @if ($currentStep == 3)
                <div class="step-two">
                    <div class="steps bg-secondary text-white">STEP THREE</div>
                    <h4 class="sectionTitle" >MEDICATION (RX and OTC)</h4>

                    <div class="single_item">
                        <div>
                            <p>List the medications you are currently taking including the dosage: </p>
                        </div> 
                        
                    </div>

                    <div class="row_entry">
                        <div>
                            <label for="dose_n_sig_1">Name</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="dose_n_sig_1" id="dose_n_sig_1"  wire:model="dose_n_sig_1">
                            <span class="text-danger">@error('dose_n_sig_1'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="dose_n_sig_1_medication">Dose </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="dose_n_sig_1_medication" id="dose_n_sig_1_medication"  wire:model="dose_n_sig_1_medication">
                            <span class="text-danger">@error('dose_n_sig_1_medication'){{ $message }}@enderror</span>
                        </div> 
                    </div>

                    <div class="row_entry dose_n_sig">
                        <div>
                            <label for="dose_n_sig_1_quantity">Quantity </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="number"  name="dose_n_sig_1_quantity" id="dose_n_sig_1_quantity"  wire:model="dose_n_sig_1_quantity">
                            <span class="text-danger">@error('dose_n_sig_1_quantity'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="dose_n_sig_1_units">Units </label><br>
                            <select class="dropdown" name="dose_n_sig_1_units" id="dose_n_sig_1_units"  wire:model="dose_n_sig_1_units">
                                <option value="">Select</option>
                                <option value="Mcg">Mcg</option>
                                <option value="Mg">Mg</option>
                                <option value="G">G</option>
                                <option value="IU">IU</option>
                            </select>
                            <span class="text-danger">@error('dose_n_sig_1_units'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="dose_n_sig_1_administration">Administration </label><br>
                            {{-- <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="dose_n_sig_1_administration" id="dose_n_sig_1_administration"  wire:model="dose_n_sig_1_administration"> --}}
                            <select class="dropdown" name="dose_n_sig_1_administration" id="dose_n_sig_1_administration"  wire:model="dose_n_sig_1_administration">
                                <option value="">Select</option>
                                <option value="Oral">Oral</option>
                                <option value="Injection">Injection</option>
                            </select>
                            <span class="text-danger">@error('dose_n_sig_1_administration'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="dose_n_sig_1_frequency">Frequency </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="dose_n_sig_1_frequency" id="dose_n_sig_1_frequency"  wire:model="dose_n_sig_1_frequency">
                            <span class="text-danger">@error('dose_n_sig_1_frequency'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="dose_n_sig_1_tabs_freq">Dosage-Tabs/Syrup </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="dose_n_sig_1_tabs_freq" id="dose_n_sig_1_tabs_freq"  wire:model="dose_n_sig_1_tabs_freq">
                            <span class="text-danger">@error('dose_n_sig_1_tabs_freq'){{ $message }}@enderror</span>
                        </div> 
                    </div>

                    <div class="row_entry">
                        <div>
                            <label for="dose_n_sig_2">Name </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="dose_n_sig_2" id="dose_n_sig_2"  wire:model="dose_n_sig_2">
                            <span class="text-danger">@error('dose_n_sig_2'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="dose_n_sig_2_medication">Dose </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="dose_n_sig_2_medication" id="dose_n_sig_2_medication"  wire:model="dose_n_sig_2_medication">
                            <span class="text-danger">@error('dose_n_sig_2_medication'){{ $message }}@enderror</span>
                        </div> 
                    </div>
                    <div class="row_entry dose_n_sig">
                        <div>
                            <label for="dose_n_sig_2_quantity">Quantity </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="number"  name="dose_n_sig_2_quantity" id="dose_n_sig_2_quantity"  wire:model="dose_n_sig_2_quantity">
                            <span class="text-danger">@error('dose_n_sig_2_quantity'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="dose_n_sig_2_units">Units </label><br>
                            <select class="dropdown" name="dose_n_sig_2_units" id="dose_n_sig_2_units"  wire:model="dose_n_sig_2_units">
                                <option value="">Select</option>
                                <option value="Mcg">Mcg</option>
                                <option value="Mg">Mg</option>
                                <option value="G">G</option>
                                <option value="IU">IU</option>
                            </select>
                            <span class="text-danger">@error('dose_n_sig_2_units'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="dose_n_sig_2_administration">Administration </label><br>
                            {{-- <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="dose_n_sig_2_administration" id="dose_n_sig_2_administration"  wire:model="dose_n_sig_2_administration"> --}}
                            <select class="dropdown" name="dose_n_sig_2_administration" id="dose_n_sig_2_administration"  wire:model="dose_n_sig_2_administration">
                                <option value="">Select</option>
                                <option value="Oral">Oral</option>
                                <option value="Injection">Injection</option>
                            </select>
                            <span class="text-danger">@error('dose_n_sig_2_administration'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="dose_n_sig_2_frequency">Frequency </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="dose_n_sig_2_frequency" id="dose_n_sig_2_frequency"  wire:model="dose_n_sig_2_frequency">
                            <span class="text-danger">@error('dose_n_sig_2_frequency'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="dose_n_sig_2_tabs_freq">Dosage-Tabs/Syrup </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="dose_n_sig_2_tabs_freq" id="dose_n_sig_2_tabs_freq"  wire:model="dose_n_sig_2_tabs_freq">
                            <span class="text-danger">@error('dose_n_sig_2_tabs_freq'){{ $message }}@enderror</span>
                        </div> 
                    </div>
                    <div class="row_entry">
                        <div>
                            <label for="dose_n_sig_3">Name </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="dose_n_sig_3" id="dose_n_sig_3"  wire:model="dose_n_sig_3">
                            <span class="text-danger">@error('dose_n_sig_3'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="dose_n_sig_3_medication">Dose </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="dose_n_sig_3_medication" id="dose_n_sig_3_medication"  wire:model="dose_n_sig_3_medication">
                            <span class="text-danger">@error('dose_n_sig_3_medication'){{ $message }}@enderror</span>
                        </div> 
                    </div>
                    <div class="row_entry dose_n_sig">
                        <div>
                            <label for="dose_n_sig_3_quantity">Quantity </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="number"  name="dose_n_sig_3_quantity" id="dose_n_sig_3_quantity"  wire:model="dose_n_sig_3_quantity">
                            <span class="text-danger">@error('dose_n_sig_3_quantity'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="dose_n_sig_3_units">Units </label><br>
                            <select class="dropdown" name="dose_n_sig_3_units" id="dose_n_sig_3_units"  wire:model="dose_n_sig_3_units">
                                <option value="">Select</option>
                                <option value="Mcg">Mcg</option>
                                <option value="Mg">Mg</option>
                                <option value="G">G</option>
                                <option value="IU">IU</option>
                            </select>
                            <span class="text-danger">@error('dose_n_sig_3_units'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="dose_n_sig_3_administration">Administration </label><br>
                            {{-- <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="dose_n_sig_3_administration" id="dose_n_sig_3_administration"  wire:model="dose_n_sig_3_administration"> --}}
                            <select class="dropdown" name="dose_n_sig_3_administration" id="dose_n_sig_3_administration"  wire:model="dose_n_sig_3_administration">
                                <option value="">Select</option>
                                <option value="Oral">Oral</option>
                                <option value="Injection">Injection</option>
                            </select>
                            <span class="text-danger">@error('dose_n_sig_3_administration'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="dose_n_sig_3_frequency">Frequency </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="dose_n_sig_3_frequency" id="dose_n_sig_3_frequency"  wire:model="dose_n_sig_3_frequency">
                            <span class="text-danger">@error('dose_n_sig_3_frequency'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="dose_n_sig_3_tabs_freq">Dosage-Tabs/Syrup </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="dose_n_sig_3_tabs_freq" id="dose_n_sig_3_tabs_freq"  wire:model="dose_n_sig_3_tabs_freq">
                            <span class="text-danger">@error('dose_n_sig_3_tabs_freq'){{ $message }}@enderror</span>
                        </div> 
                    </div>
                    <div class="row_entry">
                        <div>
                            <label for="dose_n_sig_4">Name </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="dose_n_sig_4" id="dose_n_sig_4"  wire:model="dose_n_sig_4">
                            <span class="text-danger">@error('dose_n_sig_4'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="dose_n_sig_4_medication">Dose </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="dose_n_sig_4_medication" id="dose_n_sig_4_medication"  wire:model="dose_n_sig_4_medication">
                            <span class="text-danger">@error('dose_n_sig_4_medication'){{ $message }}@enderror</span>
                        </div> 
                    </div>
                    <div class="row_entry dose_n_sig">
                        <div>
                            <label for="dose_n_sig_4_quantity">Quantity </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="number"  name="dose_n_sig_4_quantity" id="dose_n_sig_4_quantity"  wire:model="dose_n_sig_4_quantity">
                            <span class="text-danger">@error('dose_n_sig_4_quantity'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="dose_n_sig_4_units">Units </label><br>
                            <select class="dropdown" name="dose_n_sig_4_units" id="dose_n_sig_4_units"  wire:model="dose_n_sig_4_units">
                                <option value="">Select</option>
                                <option value="Mcg">Mcg</option>
                                <option value="Mg">Mg</option>
                                <option value="G">G</option>
                                <option value="IU">IU</option>
                            </select>
                            <span class="text-danger">@error('dose_n_sig_4_units'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="dose_n_sig_4_administration">Administration </label><br>
                            {{-- <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="dose_n_sig_4_administration" id="dose_n_sig_4_administration"  wire:model="dose_n_sig_4_administration"> --}}
                            <select class="dropdown" name="dose_n_sig_4_administration" id="dose_n_sig_4_administration"  wire:model="dose_n_sig_4_administration">
                                <option value="">Select</option>
                                <option value="Oral">Oral</option>
                                <option value="Injection">Injection</option>
                            </select>
                            <span class="text-danger">@error('dose_n_sig_4_administration'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="dose_n_sig_4_frequency">Frequency </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="dose_n_sig_4_frequency" id="dose_n_sig_4_frequency"  wire:model="dose_n_sig_4_frequency">
                            <span class="text-danger">@error('dose_n_sig_4_frequency'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="dose_n_sig_4_tabs_freq">Dosage-Tabs/Syrup </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="dose_n_sig_4_tabs_freq" id="dose_n_sig_4_tabs_freq"  wire:model="dose_n_sig_4_tabs_freq">
                            <span class="text-danger">@error('dose_n_sig_4_tabs_freq'){{ $message }}@enderror</span>
                        </div> 
                    </div>
                
                </div>
            @endif


        {{-- ------------------Buttons------------------------- --}}

        
    </div>

    <div class="action-buttons d-flex justify-content-between bg-white pt-2 pb-2">

        {{-- <button type="button" class="btn btn-md btn-secondary">Previous</button>
        <button type="button" class="btn btn-md btn-primary" >Next</button>
        <button  <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="submit" class="btn btn-md btn-success" >Submit</button> --}}

        @if ($currentStep == 1)
                <div></div>
        @endif

        @if ($currentStep >1 )
            <button type="button" class="btn btn-md btn-secondary" wire:click="decreaseStep()">Previous</button>
        @endif
        
        @if ($currentStep < 4 )
            <button type="button" class="btn btn-md btn-success" wire:click="increaseStep()">Next</button>
        @endif
        
        @if ($currentStep == 4)
            <button  <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="submit" class="btn btn-md btn-primary">Submit</button>
        @endif
    </div>

</form>