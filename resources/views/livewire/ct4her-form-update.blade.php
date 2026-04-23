<div>
    <form  wire:submit.prevent="update">
        @csrf
    
        <div class="form_title">
            <h3><u>CT4HER Program Enrollment Form For Physicians, Pharmacists, and Facilities</u></h3>
        </div>
        
        <div class="form_wrapper">
            @if ($currentStep == 1)
                <div class="step-one">
                    <div class="steps  bg-secondary text-white">STEP ONE</div>
                    <h4 class="sectionTitle" >Facility Information </h4>
                    <div class="personal_info">
    
                        <div class="row_entry">
                            <div>
                                <label for="facility_name">Facility Name</label><br>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="facility_name" id="facility_name" wire:model="facility_name" >
                                <span class="text-danger">@error('facility_name'){{ $message }}@enderror</span>
                            </div>
                            <div>
                                <label for="facility_email_address">Facility Email Address</label><br>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="facility_email_address" id="facility_email_address"  wire:model="facility_email_address">
                                <span class="text-danger">@error('facility_email_address'){{ $message }}@enderror</span>
                            </div>
                        </div>
    
                        <div class="row_entry">
                            <div>
                                <label for="facility_contact_person">Contact Person</label><br>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="facility_contact_person" id="facility_contact_person"  wire:model="facility_contact_person">
                                <span class="text-danger">@error('facility_contact_person'){{ $message }}@enderror</span>
                            </div>
                            <div>
                                <label for="facility_contact_person_phone">Contact Person Phone Number</label><br>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="facility_contact_person_phone" id="facility_contact_person_phone"  wire:model="facility_contact_person_phone">
                                <span class="text-danger">@error('facility_contact_person_phone'){{ $message }}@enderror</span>
                            </div>
                        </div>
    
                        <div class="row_entry">
                            <div>
                                <label for="facility_contact_person_email_address">Contact Person Email Address</label><br>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="facility_contact_person_email_address" id="facility_contact_person_email_address"  wire:model="facility_contact_person_email_address">
                                <span class="text-danger">@error('facility_contact_person_email_address'){{ $message }}@enderror</span>
                            </div>
                            <div>
                                <p>Facility Type </p>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="facility_type_hospital" name="facility_type" value="Hospital"  wire:model="facility_type">
                                <label for="facility_type_hospital">Hospital</label>&nbsp&nbsp&nbsp
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="facility_type_clinic" name="facility_type" value="Clinic"  wire:model="facility_type">
                                <label for="facility_type_clinic">Clinic</label>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="facility_type_diagnostic_enter" name="facility_type" value="Diagnostic Center"  wire:model="facility_type">
                                <label for="facility_type_diagnostic_enter">Diagnostic Center</label>&nbsp&nbsp&nbsp
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="facility_type_pharmacy" name="facility_type" value="Pharmacy"  wire:model="facility_type">
                                <label for="facility_type_pharmacy">Pharmacy</label><br>
                                <span class="text-danger">@error('facility_type'){{ $message }}@enderror</span>
                            </div> 
                            
                        </div>
                        <div class="row_entry">
                            <div>
                                <label for="other_facility_type">Other Facilty Type (Specify)</label><br>
                                <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="other_facility_type" id="other_facility_type"  wire:model="other_facility_type">
                                <span class="text-danger">@error('other_facility_type'){{ $message }}@enderror</span>
                            </div>
                            
                        </div>
                    
                    </div>
                </div>
            @endif
    
            @if ($currentStep == 2)
                <div class="step-two">
                    <div class="steps bg-secondary text-white">STEP TWO</div>
                    <h4 class="sectionTitle" >Physician/Pharmacist Information  </h4>

                    <div class="row_entry">
                        <div >
                            <label for="physician_id">Physician</label><br>

                            <select <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="physician_id" id="physician_id"  wire:model="physician_id">
                                <option value="">Select</option>
                                @foreach ($physician_data as $physician_1)
                                <option value="{{$physician_1->id}}">{{$physician_1->pract_name}}</option>
                                @endforeach
                            </select>
                            @if(Auth::user()->role>1)
                                <a href="{{route('practitioner_create')}}">
                                    <button <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="button" class="btn btn-md btn-success" >+ Add</button>
                                </a>
                            @endif
                           

                            <span class="text-danger">@error('physician_id'){{ $message }}@enderror</span>
                        </div>
                    </div>
                
                    {{-- <div class="row_entry">

                        <div>
                            <label for="physician_name">Physician/Pharmacist Name</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="physician_name" id="physician_name"  wire:model="physician_name">
                            <span class="text-danger">@error('physician_name'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <p>Title/Role </p>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="physician_title_oncologist" name="physician_title" value="Oncologist"  wire:model="physician_title">
                            <label for="physician_title_oncologist">Oncologist</label>&nbsp&nbsp&nbsp
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="physician_title_general_practioner" name="physician_title" value="General Practioner"  wire:model="physician_title">
                            <label for="physician_title_general_practioner">General Practioner</label>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="physician_title_pharmacist" name="physician_title" value="Pharmacist"  wire:model="physician_title">
                            <label for="physician_title_pharmacist">Pharmacy</label><br>
                            <span class="text-danger">@error('physician_title'){{ $message }}@enderror</span>
                        </div> 
                    </div>
                    <div class="row_entry">
                        <div>
                            <label for="other_physician_title">Other Title (Specify) </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="other_physician_title" id="other_physician_title"  wire:model="other_physician_title">
                            <span class="text-danger">@error('other_physician_title'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="physician_license_no">License Number</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text" name="physician_license_no" id="physician_license_no"  wire:model="physician_license_no">
                            <span class="text-danger">@error('physician_license_no'){{ $message }}@enderror</span>
                        </div> 
                    </div>
                    <div class="row_entry">
                        <div>
                            <label for="physician_phone">Physician Phone</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="physician_phone" id="physician_phone"  wire:model="physician_phone">
                            <span class="text-danger">@error('physician_phone'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="physician_email">Physician Email</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="email" name="physician_email" id="physician_email"  wire:model="physician_email">
                            <span class="text-danger">@error('physician_email'){{ $message }}@enderror</span>
                        </div> 
                    </div>
                    <div class="row_entry">
                        <div>
                            <label for="physician_expr_years">Years of experience</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="number"  name="physician_expr_years" id="physician_expr_years"  wire:model="physician_expr_years">
                            <span class="text-danger">@error('physician_expr_years'){{ $message }}@enderror</span>
                        </div> 
                    </div> --}}
                
                </div>
            @endif
            @if ($currentStep == 3)
                <div class="step-two">
                    <div class="steps bg-secondary text-white">STEP THREE</div>
                    <h4 class="sectionTitle" >Patient Medical Information </h4>

                    
                    <div class="row_entry">
                        <div >
                            <label for="patient_id">Patient</label><br>

                            <select <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="patient_id" id="patient_id"  wire:model="patient_id">
                                <option value="">Select</option>
                                @foreach ($patient_data as $patient_)
                                <option value="{{$patient_->id}}">{{$patient_->account_no." - ".$patient_->fname." ".$patient_->lname}}</option>
                                @endforeach
                            </select>
                            @if(Auth::user()->role>1)
                                <a href="{{route('patient_register')}}">
                                    <button <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="button" class="btn btn-md btn-success" >+ Add</button>
                                </a>
                            @endif
                           

                            <span class="text-danger">@error('patient_id'){{ $message }}@enderror</span>
                        </div>
                    </div>
                    
                    {{-- <div class="row_entry">
                        <div>
                            <label for="patient_name">Patient Name</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="patient_name" id="patient_name"  wire:model="patient_name">
                            <span class="text-danger">@error('patient_name'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="patient_unique_id">Patient ID (Unique Identifier) </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="patient_unique_id" id="patient_unique_id"  wire:model="patient_unique_id">
                            <span class="text-danger">@error('patient_unique_id'){{ $message }}@enderror</span>
                        </div> 
                        
                        
                    </div>
                    <div class="row_entry">
                        <div>
                            <label for="patient_birth_date">Date of Birth </label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="date"  name="patient_birth_date" id="patient_birth_date"  wire:model="patient_birth_date">
                            <span class="text-danger">@error('patient_birth_date'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label class="non_textInputs" for="patient_gender">Gender</label><br>

                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="patient_gender1" name="patient_gender" value="Male"  wire:model="patient_gender">
                            <label for="patient_gender1">Male</label>&nbsp&nbsp&nbsp
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="patient_gender2" name="patient_gender" value="Female"  wire:model="patient_gender">
                            <label for="patient_gender2">Female</label>&nbsp&nbsp&nbsp
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="patient_gender3" name="patient_gender" value="Other"  wire:model="patient_gender">
                            <label for="patient_gender3">Other</label><br>
                            <span class="text-danger">@error('patient_gender'){{ $message }}@enderror</span>
                            
                        </div>
                        
                    </div> --}}

                    <div class="single_item">
                        <div>
                            <p class="subsection_heading">Diagnosis</p>
                        </div>
                        
                    </div>
                    <div class="row_entry">
                        <div>
                            <p>HER2-Positive Breast Cancer Confirmation?</p>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="breast_cancer_confirmed_yes" name="breast_cancer_confirmed" value="Yes"  wire:model="breast_cancer_confirmed">
                            <label for="breast_cancer_confirmed_yes">Yes</label>&nbsp&nbsp&nbsp
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="breast_cancer_confirmed_no" name="breast_cancer_confirmed" value="No"  wire:model="breast_cancer_confirmed">
                            <label for="breast_cancer_confirmed_no">No</label><br>
                            <span class="text-danger">@error('breast_cancer_confirmed'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="diagnosis_date">Date of Diagnosis</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="date"  name="diagnosis_date" id="diagnosis_date"  wire:model="diagnosis_date">
                            <span class="text-danger">@error('diagnosis_date'){{ $message }}@enderror</span>
                        </div> 
                        
                    </div>
                    <div class="row_entry">
                        <div>
                            <label for="cancer_stage">Stage of Cancer</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="cancer_stage" id="cancer_stage"  wire:model="cancer_stage">
                            <span class="text-danger">@error('cancer_stage'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="tumor_burden">Tumor Burden</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="tumor_burden" id="tumor_burden"  wire:model="tumor_burden">
                            <span class="text-danger">@error('tumor_burden'){{ $message }}@enderror</span>
                        </div> 
                        
                    </div>
                    <div class="row_entry">
                        <div>
                            <label for="biomarkers_initiation">Biomarkers at Treatment Initiation</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="biomarkers_initiation" id="biomarkers_initiation"  wire:model="biomarkers_initiation">
                            <span class="text-danger">@error('biomarkers_initiation'){{ $message }}@enderror</span>
                        </div> 
                       
                    </div>
                    <div class="single_item">
                        <div>
                            <p class="subsection_heading">Current Treatment Plan</p>
                        </div>
                    </div>

                    <div class="row_entry">
                        <div>
                            <p>Chemotherapy?</p>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="chemotherapy_yes" name="chemotherapy" value="Yes"  wire:model="chemotherapy">
                            <label for="chemotherapy_yes">Yes</label>&nbsp&nbsp&nbsp
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="chemotherapy_no" name="chemotherapy" value="No"  wire:model="chemotherapy">
                            <label for="chemotherapy_no">No</label><br>
                            <span class="text-danger">@error('chemotherapy'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <p>Chemotherapy Details</p>
                                <textarea <?php if(Auth::user()->role<2){echo 'disabled';} ?> name="chemo_details" id="chemo_details" cols="45" rows="2"  
                                    wire:model="chemo_details">
                                </textarea>
                            <span class="text-danger">@error('chemo_details'){{ $message }}@enderror</span>
                        </div> 
                    </div>
                    <div class="row_entry">
                        <div>
                            <p>Surgery?</p>
                            <select <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="surgery" id="surgery"  wire:model="surgery">
                                <option value="">Select</option>
                                <option value="Breast surgery">Breast surgery</option>
                                <option value="Head surgery">Head surgery</option>
                                <option value="Leg surgery">Leg surgery</option>
                                <option value="Prostrate surgery">Prostrate surgery</option>
                                <option value="Stomach surgery">Stomach surgery</option>
                            </select>
                            <span class="text-danger">@error('surgery'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <p>Surgery Details</p>
                                <textarea <?php if(Auth::user()->role<2){echo 'disabled';} ?> name="surgery_details" id="surgery_details" cols="45" rows="2"  
                                    wire:model="surgery_details">
                                </textarea>
                            <span class="text-danger">@error('surgery_details'){{ $message }}@enderror</span>
                        </div> 
                    </div>
                    <div class="row_entry">
                        <div>
                            <p>Post-Treatment Care?</p>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="post_treatment_yes" name="post_treatment" value="Yes"  wire:model="post_treatment">
                            <label for="post_treatment_yes">Yes</label>&nbsp&nbsp&nbsp
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="post_treatment_no" name="post_treatment" value="No"  wire:model="post_treatment">
                            <label for="post_treatment_no">No</label><br>
                            <span class="text-danger">@error('post_treatment'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <p>Post-Treatment Care Details</p>
                                <textarea <?php if(Auth::user()->role<2){echo 'disabled';} ?> name="post_treatment_details" id="post_treatment_details" cols="45" rows="2"  
                                    wire:model="post_treatment_details">
                                </textarea>
                            <span class="text-danger">@error('post_treatment_details'){{ $message }}@enderror</span>
                        </div> 
                    </div>
                    <div class="row_entry">
                        <div>
                            <label for="enhertu_duration">Enhertu Duration</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="enhertu_duration" id="enhertu_duration"  wire:model="enhertu_duration">
                            <span class="text-danger">@error('enhertu_duration'){{ $message }}@enderror</span>
                        </div> 
                    </div>

                    <div class="single_item">
                        <div>
                            <p class="subsection_heading">Organ Function Status</p>
                        </div>
                    </div>
                    <div class="row_entry">
                        <div>
                            <label for="liver_function">Liver Function</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="liver_function" id="liver_function"  wire:model="liver_function">
                            <span class="text-danger">@error('liver_function'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <label for="renal_function">Renal Function</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="renal_function" id="renal_function"  wire:model="renal_function">
                            <span class="text-danger">@error('renal_function'){{ $message }}@enderror</span>
                        </div> 
                    </div>
                    <div class="row_entry">
                        <div>
                            <label for="cardiac_function">Cardiac Function</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="cardiac_function" id="cardiac_function"  wire:model="cardiac_function">
                            <span class="text-danger">@error('cardiac_function'){{ $message }}@enderror</span>
                        </div> 
                    </div>
                    <div class="single_item">
                        <div>
                            <p class="subsection_heading">Current Labs</p>
                        </div>
                    </div>
                    <div class="row_entry">
                        <div>
                            <p>Full Lab Report Attached?</p>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="lab_report_attached_yes" name="lab_report_attached" value="Yes"  wire:model="lab_report_attached">
                            <label for="lab_report_attached_yes">Yes</label>&nbsp&nbsp&nbsp
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="lab_report_attached_no" name="lab_report_attached" value="No"  wire:model="lab_report_attached">
                            <label for="lab_report_attached_no">No</label><br>
                            <span class="text-danger">@error('lab_report_attached'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <p>Key Findings</p>
                                <textarea <?php if(Auth::user()->role<2){echo 'disabled';} ?> name="key_findings_lab" id="key_findings_lab" cols="45" rows="2"  
                                    wire:model="key_findings_lab">
                                </textarea>
                                <span class="text-danger">@error('key_findings_lab'){{ $message }}@enderror</span>
                        </div> 
                        
                    </div>
                    <div class="row_entry">
                        <div>
                            <label for="lab_report_file">Attach Lab report as pdf</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="file"  name="lab_report_file" id="lab_report_file"  wire:model="lab_report_file">
                            <span class="text-danger">@error('lab_report_file'){{ $message }}@enderror</span>
                        </div>
                    </div>
                    <div class="single_item">
                        <div>
                            <br>
                            <p class="subsection_heading">Current CT Scan and Report</p>
                        </div>
                    </div>
                    <div class="row_entry">
                        <div>
                            <p>HR-CT Scan Attached?</p>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="hr_ct_scan_attached_yes" name="hr_ct_scan_attached" value="Yes"  wire:model="hr_ct_scan_attached">
                            <label for="hr_ct_scan_attached_yes">Yes</label>&nbsp&nbsp&nbsp
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="hr_ct_scan_attached_no" name="hr_ct_scan_attached" value="No"  wire:model="hr_ct_scan_attached">
                            <label for="hr_ct_scan_attached_no">No</label><br>
                            <span class="text-danger">@error('hr_ct_scan_attached'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <p>Key Findings</p>
                                <textarea <?php if(Auth::user()->role<2){echo 'disabled';} ?> name="key_findings_hr_ct_scan" id="key_findings_hr_ct_scan" cols="45" rows="2"  
                                    wire:model="key_findings_hr_ct_scan">
                                </textarea>
                                <span class="text-danger">@error('key_findings_hr_ct_scan'){{ $message }}@enderror</span>
                        </div> 
                        
                    </div>
                    <div class="row_entry">
                        <div>
                            <label for="hr_ct_scan_file">Attach HR-CT Scan as pdf</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="file"  name="hr_ct_scan_file" id="hr_ct_scan_file"  wire:model="hr_ct_scan_file">
                            <span class="text-danger">@error('hr_ct_scan_file'){{ $message }}@enderror</span>
                        </div>
                        <div>
                            <label for="price_ct_scan">Cash Price for HR-CT Scan</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="number"  name="price_ct_scan" id="price_ct_scan"  wire:model="price_ct_scan">
                            <span class="text-danger">@error('price_ct_scan'){{ $message }}@enderror</span>
                        </div>
                    </div>
                 
                
                </div>
            @endif
            @if ($currentStep == 4)
                <div class="step-two">
                    <div class="steps bg-secondary text-white">STEP FOUR</div>
                    <h4 class="sectionTitle" >Insurance and Cost Coverage</h4>
                    <div class="single_item">
                        <div>
                            <br>
                            <p class="subsection_heading">Insurance Information</p>
                        </div>
                    </div>
                    <div class="row_entry">
                        <div >
                            <label for="insuarance_provider">Provider</label><br>

                            <select <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="insuarance_provider" id="insuarance_provider"  wire:model="insuarance_provider">
                                <option value="">Select</option>
                                @foreach ($insurance_data as $insurance_data)
                                <option value="{{$insurance_data->insuarance_provider}}">{{$insurance_data->insuarance_provider}}</option>
                                @endforeach
                            </select>
                            @if(Auth::user()->role>1)
                                <a href="{{route('insurance_create')}}">
                                    <button <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="button" class="btn btn-md btn-success" >+ Add</button>
                                </a>
                            @endif
                           

                            {{-- <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="insuarance_provider" id="insuarance_provider"  wire:model="insuarance_provider"> --}}
                            <span class="text-danger">@error('insuarance_provider'){{ $message }}@enderror</span>
                        </div>
                        <div >
                            <label for="insuarance_policy_no">Policy Number</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="insuarance_policy_no" id="insuarance_policy_no"  wire:model="insuarance_policy_no">
                            <span class="text-danger">@error('insuarance_policy_no'){{ $message }}@enderror</span>
                        </div>
                    </div>
                    
                    <div class="row_entry">
                        <div>
                            <p>Coverage Details</p>
                            <textarea <?php if(Auth::user()->role<2){echo 'disabled';} ?> name="insuarance_cover_details" id="insuarance_cover_details" cols="30" rows="3"  
                                wire:model="insuarance_cover_details">
                            </textarea>
                            <span class="text-danger">@error('insuarance_cover_details'){{ $message }}@enderror</span>
                        </div>
                        <div >
                            <label for="insuarance_level">Insuarance Holder level</label><br>

                            <select <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="insuarance_level" id="insuarance_level"  wire:model="insuarance_level">
                                <option value="">Select</option> 
                                <option value="Primary">Primary</option> 
                                <option value="Secondary">Secondary</option> 
                            </select>

                            <span class="text-danger">@error('insuarance_level'){{ $message }}@enderror</span>
                        </div>
                    </div>
                    <div class="single_item">
                        <div>
                            <br>
                            <p class="subsection_heading">AstraZeneca + Elara Coverage</p>
                        </div>
                    </div>
                    <div class="row_entry">
                        <div>
                            <p>CT Scan Coverage</p>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="ct_scan_coverage_full" name="ct_scan_coverage" value="Fully Covered"  wire:model="ct_scan_coverage">
                            <label for="ct_scan_coverage_full">Fully Covered</label>&nbsp&nbsp&nbsp
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="ct_scan_coverage_partial" name="ct_scan_coverage" value="Partially Covered"  wire:model="ct_scan_coverage">
                            <label for="ct_scan_coverage_partial">Partially Covered</label>&nbsp&nbsp&nbsp
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="ct_scan_coverage_no" name="ct_scan_coverage" value="Not Covered"  wire:model="ct_scan_coverage">
                            <label for="ct_scan_coverage_no">Not Covered</label><br><br>
                            <span class="text-danger">@error('ct_scan_coverage'){{ $message }}@enderror</span>
                        </div> 
                        <div>
                            <p>Lab Coverage</p>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="lab_coverage_full" name="lab_coverage" value="Fully Covered"  wire:model="lab_coverage">
                            <label for="lab_coverage_full">Fully Covered</label>&nbsp&nbsp&nbsp
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="lab_coverage_partial" name="lab_coverage" value="Partially Covered"  wire:model="lab_coverage">
                            <label for="lab_coverage_partial">Partially Covered</label>&nbsp&nbsp&nbsp
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="radio" id="lab_coverage_no" name="lab_coverage" value="Not Covered"  wire:model="lab_coverage">
                            <label for="lab_coverage_no">Not Covered</label><br><br>
                            <span class="text-danger">@error('lab_coverage'){{ $message }}@enderror</span>
                        </div> 
                    </div>
                    <div class="row_entry">
                        <div >
                            <label for="cost_of_care_estimate">Cost-of-Care Estimate</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="cost_of_care_estimate" id="cost_of_care_estimate"  wire:model="cost_of_care_estimate">
                            <span class="text-danger">@error('cost_of_care_estimate'){{ $message }}@enderror</span>
                        </div>
                        
                    </div>
                </div>
            @endif
            {{-- @if ($currentStep == 5)
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
                                <textarea <?php if(Auth::user()->role<2){echo 'disabled';} ?> name="adr_details" id="adr_details" cols="45" rows="2"  
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
                            <select <?php if(Auth::user()->role<2){echo 'disabled';} ?> class="dropdown" name="dropout_reason" id="dropout_reason"  wire:model="dropout_reason">
                                <option value="Select">Select</option>
                                    @foreach ($dropout_data as $dropout_data)
                                        <option value="{{$dropout_data->drop_reason}}">{{$dropout_data->drop_reason}}</option>
                                    @endforeach
                            </select>
                            <a href="{{route('dropout_create')}}">
                                <button type="button" class="btn btn-md btn-success" >+ Add</button>
                            </a>
                            <span class="text-danger">@error('dropout_reason'){{ $message }}@enderror</span>
                        </div>
                        
                    </div>
                    <div class="single_item">
                        <div >
                            <label for="other_dropout_reasons">If Other Dropout Reasons, Specify</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="text"  name="other_dropout_reasons" id="other_dropout_reasons"  wire:model="other_dropout_reasons">
                            <span class="text-danger">@error('other_dropout_reasons'){{ $message }}@enderror</span>
                        </div>
                        
                    </div>
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
                    <div class="single_item">
                        <div >
                            <p>******************Section 6 Left out to clarify it's usage ************** (Consent Signing)</p>
                        </div>
                        
                    </div>
                </div>
            @endif --}}
            @if ($currentStep == 5)
                <div class="step-two">
                    <div class="steps bg-secondary text-white">STEP SIX</div>
                    <h4 class="sectionTitle" >Additional Notes </h4>

                    <div class="single_item">
                        {{-- <div >
                            <p>******************Section 6 Left out to clarify it's usage ************** (Consent Signing)</p>
                        </div> --}}
                        <div>
                            <label for="consent_file">Attach Signed Consent form as pdf</label><br>
                            <input <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="file"  name="consent_file" id="consent_file"  wire:model="consent_file">
                            <span class="text-danger">@error('consent_file'){{ $message }}@enderror</span>
                        </div>
                        
                    </div>

                    <div class="single_item">
                        <div>
                            <p>Comments/Concerns</p>
                                <textarea <?php if(Auth::user()->role<2){echo 'disabled';} ?> name="comments_concerns" id="comments_concerns" cols="100" rows="5"  
                                    wire:model="comments_concerns">
                                </textarea>
                                <span class="text-danger">@error('comments_concerns'){{ $message }}@enderror</span>
                        </div> 
                    </div>
                    <div class="single_item">
                        <div>
                            Thank you for enrolling in the CT4HER program!<br>
                            For questions or support, please contact:<br>  
                            Elara Health Innovations Ltd.<br> 
                            Email:drlucasnyabero@gmail.com<br> 
                            Phone: +254-712-070879<br>  
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
    
            @if ($currentStep >1 && $currentStep <=5)
                <button type="button" class="btn btn-md btn-secondary" wire:click="decreaseStep()">Previous</button>
            @endif
            
            @if ($currentStep <5)
                <button type="button" class="btn btn-md btn-success" wire:click="increaseStep()">Next</button>
            @endif
            
            @if ($currentStep == 5)
                <button  <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="submit" class="btn btn-md btn-primary">Submit</button>
            @endif
        </div>
    
    
    </form>
</div>