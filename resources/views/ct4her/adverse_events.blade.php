@extends('layouts.patient_update')
{{-- @extends('layouts.app') --}}

@section('content')

<div class="form_layout">
    <div class="logo_n_name">
        <div class="logo-image_container">
            <a  href="{{ url('/') }}">
                <div class="logo_sizer" >
                    <img class="logo_image" src="{{asset('assets/images/elara_logo.png')}}" width="100%" height="100%" alt="Logo">
                </div>
            </a>
        </div>

        <div class="app_name">
            <a  class="links" href="{{ url('/') }}">
                Elara Health innovations
            </a>
        </div>
    </div>

    <div class="form_navbar">
        <a href="{{route('ct4her_update', ['ct4herid'=>$ct4herdata->id, 'patient'=>$patientdata->id] )}}">Ct4her</a>
        <a href="{{route('ct4her_adverse_events', ['ct4herid'=>$ct4herdata->id,'patient'=>$patientdata->id] )}}">Adverse</a>
        <a href="{{route('report')}}">Reports</a>

        <div class="dropdown_div">
            <button class="record_dropbtn" onclick="view_records()">Records
                {{-- <i onclick="view_records()" class="fa fa-caret-down"></i> --}}
            </button>
            <div class="dropdown-content" id="record_Dropdown">
                <a href="{{route('patient')}}">Patients</a>
                <a href="{{route('ct4her')}}">Facility/Physicians</a>
            </div>
        </div> 

        <div class="dropdown_div">
            <button class="form_dropbtn" onclick="update_patient()">Forms 
              {{-- <i onclick="update_patient()" class="fa fa-caret-down"></i> --}}
            </button>
            <div class="dropdown-content" id="form_Dropdown">
              <a href="{{route('patient_register')}}">Patient Intake</a>
              <a href="{{route('ct4her_register')}}">Facility/Physicians</a>
            </div>
        </div> 
        {{-- <div class="dropdown_div">
            <button class="form_dropbtn" onclick="update_patient()">Forms 
              <i onclick="update_patient()" class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content" id="form_Dropdown">
              <a href="{{route('ct4her_update', ['ct4herid'=>$ct4herdata->id, 'patient'=>$patientdata->id] )}}">CT4HER Form</a>
              <a href="{{route('ct4her_adverse_events', ['ct4herid'=>$ct4herdata->id,'patient'=>$patientdata->id] )}}">Adverse Events</a>
            </div>
          </div>  --}}
        <div class="dropdown_div">
          <button class="acc_dropbtn" onclick="account()">Account 
            {{-- <i onclick="account()" class="fa fa-caret-down"></i> --}}
          </button>
          <div class="dropdown-content dropdown-content-account" id="acc_Dropdown">
            <a href="{{route('logout')}}">Log out</a>
          </div>
        </div> 
      </div>

</div>

<div class="wrapper-updateblade">

    <div class="patient_details">
        <div class="subsection_heading">Patient's Details<br> {{$patientdata->account_no}}<br><br></div>
        <div class="patient_details_values">
            <b>Created</b><br>
            {{date_format($patientdata->created_at, 'd-m-Y')}}
        </div>
        <div class="patient_details_values">
            <b>Updated</b><br>
            {{date_format($patientdata->updated_at, 'd-m-Y')}}
        </div>

        <div class="patient_details_values">
            <b>Name:</b><br>
            {{$patientdata->fname." ".$patientdata->lname}}
        </div>
        <div class="patient_details_values">
            <b>Contact:</b><br>
            {{$patientdata->mobile_contact}}
        </div>
        <div class="patient_details_values">
            <b>Physician Name:</b><br>
            {{$physiciandata->pract_name}}
        </div>
        <div class="patient_details_values">
            <b>Physician Contact:</b><br>
            {{$physiciandata->pract_mobile_phone}}
        </div>
    </div>

    {{-- <div class="forms_updateblade">

        <div class="form_buttons_update">
            <button type="button" class="btn btn-md btn-success">
                <a class="links" href="{{route('ct4her_update', ['ct4herid'=>$ct4herdata->id,'patient'=>$patientdata->id] )}}">CT4HER Form</a>
            </button>
            
        </div>
        <div class="form_buttons_update">
            <button type="button" class="btn btn-md btn-success">
                <a class="links" href="{{route('ct4her_adverse_events', ['ct4herid'=>$ct4herdata->id,'patient'=>$patientdata->id] )}}">Adverse Events</a>
            </button>    
        </div>
    </div> --}}
    
    <div class="ct4her_info_updateform">
        @livewire('adverse-events-form', [$dropout_data,$method, $ct4herdata, $patientdata, $physiciandata] )
        {{-- @livewire('adverse-events-form', [$ct4herdata->id,$insurance_data, $dropout_data, $physician_data] ) --}}
    </div>

</div>

@endsection