@extends('layouts.app')

@section('content')

<div class="wrapper wrapper-table reports">
    <div style="overflow-x: auto;">
        {{-- {{dd($records)}} --}}

        <table class="records">
            <div class="record_filter">
                <form action="{{route('ct4her_report')}}" method="get">
                    <label for="toDate">From</label>&nbsp&nbsp&nbsp&nbsp
                    <input type="date" name="fromDate" id="fromDate" value="{{$fromDate}}" required>
                        
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

                        <label for="toDate">To</label>&nbsp&nbsp&nbsp&nbsp
                        <input type="date" name="toDate" id="toDate" value="{{$toDate}}" required>
                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    
                        <a href="#">
                            <button type="submit" class=" btn-primary search-button ">
                                Filter
                                {{-- <i class="fa fa-search" style="font-size:20px;color:white"></i> --}}
                            </button>
                        </a>
                </form>
            </div>
            <div>
                <button class="download_button">
                    <a class="download_link" target="_blank"  href="{{route('download_ct4her_report', ['from' => $fromDate, 'to' => $toDate])}}" >Download</a>
                </button>
            </div>
            <thead style="padding:5px">
                {{-- <th>Account No</th> --}}
                <th>Facility_Name</th>
                <th>Facility_email_address</th>
                <th>Facility_contact_person</th>
                <th>Facility_contact_person_phone</th>
                <th>Facility_contact_person_email_address</th>
                <th>Facility_type</th>
                <th>Other_facility_type</th>
                <th>Physician_Name</th>
                <th>Physician_Phone</th>
                <th>Physician_Speciality</th>
                <th>Patient's_Account</th>
                {{-- <th>Patient's_Name</th> --}}
                <th>Breast_cancer_confirmed?</th>
                <th>Diagnosis_date</th>
                <th>Cancer_stage</th>
                <th>Tumor_burden</th>
                <th>Biomarkers_initiation</th>
                <th>Chemotherapy?</th>
                <th>Chemo_details</th>
                <th>Surgery?</th>
                <th>Surgery_details</th>
                <th>Post_treatment?</th>
                <th>Post_treatment_details</th>
                <th>Enhertu_duration</th>
                <th>Liver_function</th>
                <th>Renal_function</th>
                <th>Cardiac_function</th>
                <th>Lab_report_attached?</th>
                <th>Key_findings_lab</th>
                <th>Lab_report_file</th>
                <th>Hr_ct_scan_attached</th>
                <th>Key_findings_hr_ct_scan</th>
                <th>Hr_ct_scan_file</th>
                <th>Price_ct_scan</th>
                <th>Insuarance_provider</th>
                <th>Insuarance_level</th>
                <th>Insuarance_policy_no</th>
                <th>Insuarance_cover_details</th>
                <th>Ct_scan_coverage</th>
                <th>Lab_coverage</th>
                <th>Cost_of_care_estimate</th>
                <th>Consent_file</th>
                <th>Comments_concerns</th>



            </thead>
            <tbody>
                @if ($records)
                    @foreach ($records as $record)
                        <tr>
                            {{-- <td>{{$record['account_no']}}</td> --}}
                            <td>{{$record['facility_name']}}</td>
                         

                            <td>{{$record['facility_email_address']}}</td>
                            <td>{{$record['facility_contact_person']}}</td>
                            <td>{{$record['facility_contact_person_phone']}}</td>
                            <td>{{$record['facility_contact_person_email_address']}}</td>
                            <td>{{$record['facility_type']}}</td>
                            <td>{{$record['other_facility_type']}}</td>
                            <td>{{$record['physician_name']}}</td>
                            <td>{{$record['physician_phone']}}</td>
                            <td>{{$record['physician_speciality']}}</td>
                            <td>{{$record['patient_account']}}</td>
                            {{-- <td>{{$record['patient_name']}}</td> --}}
                            <td>{{$record['breast_cancer_confirmed']}}</td>
                            <td>{{$record['diagnosis_date']}}</td>
                            <td>{{$record['cancer_stage']}}</td>
                            <td>{{$record['tumor_burden']}}</td>
                            <td>{{$record['biomarkers_initiation']}}</td>
                            <td>{{$record['chemotherapy']}}</td>
                            <td>{{$record['chemo_details']}}</td>
                            <td>{{$record['surgery']}}</td>
                            <td>{{$record['surgery_details']}}</td>
                            <td>{{$record['post_treatment']}}</td>
                            <td>{{$record['post_treatment_details']}}</td>
                            <td>{{$record['enhertu_duration']}}</td>
                            <td>{{$record['liver_function']}}</td>
                            <td>{{$record['renal_function']}}</td>
                            <td>{{$record['cardiac_function']}}</td>
                            <td>{{$record['lab_report_attached']}}</td>
                            <td>{{$record['key_findings_lab']}}</td>
                            <td>{{$record['lab_report_file']}}</td>
                            <td>{{$record['hr_ct_scan_attached']}}</td>
                            <td>{{$record['key_findings_hr_ct_scan']}}</td>
                            <td>{{$record['hr_ct_scan_file']}}</td>
                            <td>{{$record['price_ct_scan']}}</td>
                            <td>{{$record['insuarance_provider']}}</td>
                            <td>{{$record['insuarance_level']}}</td>
                            <td>{{$record['insuarance_policy_no']}}</td>
                            <td>{{$record['insuarance_cover_details']}}</td>
                            <td>{{$record['ct_scan_coverage']}}</td>
                            <td>{{$record['lab_coverage']}}</td>
                            <td>{{$record['cost_of_care_estimate']}}</td>
                            <td>{{$record['consent_file']}}</td>
                            <td>{{$record['comments_concerns']}}</td>
                            
                            

                        </tr>
                    @endforeach
                    
                @else
                    <tr>No records found</tr>
                @endif
                
            </tbody>
        </table>
    </div>
    {{-- <div class="pagination-div">
        {{$records->links('pagination::bootstrap-4')}}
    </div> --}}
</div>

@endsection
