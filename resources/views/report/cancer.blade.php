@extends('layouts.app')

@section('content')

<div class="wrapper wrapper-table reports">
    <div style="overflow-x: auto;">
        {{-- {{dd($records)}} --}}

        <table class="records">
            <div class="record_filter">
                <form action="{{route('cancer_report')}}" method="get">
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
                    <a class="download_link" target="_blank"  href="{{route('download_cancer_report', ['from' => $fromDate, 'to' => $toDate])}}" >Download</a>
                </button>
            </div>
            <thead style="padding:5px">
                <th>Account_No</th>
                <th>Patient's_Name</th>

                <th>Current_diagnosis</th>
                <th>Diagnosis_date</th>
                <th>Last_name</th>
                <th>Had_surgery?</th>
                <th>Surgery_date</th>
                <th>Surgeon_name</th>
                <th>Surgeon_phone</th>
                <th>What_surgery</th>
                <th>Surgery_recovered?</th>
                <th>Surgery_complication?</th>
                <th>Surgery_complication_explain</th>
                <th>Had_radiation?</th>
                <th>Radiation_date</th>
                <th>Radiologist_name</th>
                <th>Radiologist_phone</th>
                <th>Radiation_treatment</th>
                <th>Radiation_recovered</th>
                <th>Radiation_complications</th>
                <th>Radiation_complication_explain</th>
                <th>Primary_physician_name</th>
                <th>Primary_physician_contact</th>
                <th>Oncologist_name</th>
                <th>Oncologist_phone</th>
                <th>Physician_1_name</th>
                <th>Physician_1_speciality</th>
                <th>Physician_2_name</th>
                <th>Physician_2_speciality</th>
                <th>Physician_3_name</th>
                <th>Physician_3_speciality</th>
                <th>Physician_4_name</th>
                <th>Physician_4_speciality</th>
                <th>Allergy_1</th>
                <th>Allergy_1_reaction</th>
                <th>Allergy_2</th>
                <th>Allergy_2_reaction</th>
                <th>Allergy_3</th>
                <th>Allergy_3_reaction</th>
                <th>Allergy_4</th>
                <th>Allergy_4_reaction</th>
                <th>Primary_worry</th>
                <th>Issue_began</th>
                <th>In_pain</th>
                <th>Pain_location</th>
                <th>Pain_treatment</th>
                <th>Pain_treatment_change</th>
                <th>Pain_begin_trend</th>
                <th>Pain_occurence</th>
                <th>Pain_worst</th>
                <th>Curr_symptoms</th>
                <th>Pain_descr</th>
                <th>Other_health_concerns</th>


            </thead>
            <tbody>
                @if ($records)
                    @foreach ($records as $record)
                        <tr>
                            <td>{{$record['account_no']}}</td>
                            <td>{{$record['name']}}</td>
                         

                            <td>{{$record['current_diagnosis']}}</td>
                            <td>{{$record['diagnosis_date']}}</td>
                            <td>{{$record['last_name']}}</td>
                            <td>{{$record['had_surgery']}}</td>
                            <td>{{$record['surgery_date']}}</td>
                            <td>{{$record['surgeon_name']}}</td>
                            <td>{{$record['surgeon_phone']}}</td>
                            <td>{{$record['what_surgery']}}</td>
                            <td>{{$record['surgery_recovered']}}</td>
                            <td>{{$record['surgery_complication']}}</td>
                            <td>{{$record['surgery_complication_explain']}}</td>
                            <td>{{$record['had_radiation']}}</td>
                            <td>{{$record['radiation_date']}}</td>
                            <td>{{$record['radiologist_name']}}</td>
                            <td>{{$record['radiologist_phone']}}</td>
                            <td>{{$record['radiation_treatment']}}</td>
                            <td>{{$record['radiation_recovered']}}</td>
                            <td>{{$record['radiation_complications']}}</td>
                            <td>{{$record['radiation_complication_explain']}}</td>
                            <td>{{$record['primary_physician_name']}}</td>
                            <td>{{$record['primary_physician_contact']}}</td>
                            <td>{{$record['oncologist_name']}}</td>
                            <td>{{$record['oncologist_phone']}}</td>
                            <td>{{$record['physician_1_name']}}</td>
                            <td>{{$record['physician_1_speciality']}}</td>
                            <td>{{$record['physician_2_name']}}</td>
                            <td>{{$record['physician_2_speciality']}}</td>
                            <td>{{$record['physician_3_name']}}</td>
                            <td>{{$record['physician_3_speciality']}}</td>
                            <td>{{$record['physician_4_name']}}</td>
                            <td>{{$record['physician_4_speciality']}}</td>
                            <td>{{$record['allergy_1']}}</td>
                            <td>{{$record['allergy_1_reaction']}}</td>
                            <td>{{$record['allergy_2']}}</td>
                            <td>{{$record['allergy_2_reaction']}}</td>
                            <td>{{$record['allergy_3']}}</td>
                            <td>{{$record['allergy_3_reaction']}}</td>
                            <td>{{$record['allergy_4']}}</td>
                            <td>{{$record['allergy_4_reaction']}}</td>
                            <td>{{$record['primary_worry']}}</td>
                            <td>{{$record['issue_began']}}</td>
                            <td>{{$record['in_pain']}}</td>
                            <td>{{$record['pain_location']}}</td>
                            <td>{{$record['pain_treatment']}}</td>
                            <td>{{$record['pain_treatment_change']}}</td>
                            <td>{{$record['pain_begin_trend']}}</td>
                            <td>{{$record['pain_occurence']}}</td>
                            <td>{{$record['pain_worst']}}</td>
                            <td>{{$record['curr_symptoms']}}</td>
                            <td>{{$record['pain_descr']}}</td>
                            <td>{{$record['other_health_concerns']}}</td>
                            

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
