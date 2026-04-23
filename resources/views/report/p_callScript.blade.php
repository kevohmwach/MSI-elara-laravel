@extends('layouts.app')

@section('content')

<div class="wrapper wrapper-table reports">
    <div style="overflow-x: auto;">
        {{-- {{dd($records)}} --}}

        <table class="records">
            <div class="record_filter">
                <form action="{{route('call_script_report')}}" method="get">
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
                    <a class="download_link" target="_blank"  href="{{route('download_call_script_report', ['from' => $fromDate, 'to' => $toDate])}}" >Download</a>
                </button>
            </div>
            <thead style="padding:5px">
                <th>Account_No</th>
                <th>Patient's_Name</th>

                <th>Are_you_walking_or_exercising_like_usual? Do you have any difficulty with activities or notice yourself getting short of breath since your last infusion?</th>
                
                <th>When_you_re_moving_around_the_house_or_going about your day, does your heart race or pound? Are your legs and feet more swollen than usual?</th>
                
                <th>How_are_you_feeling_day_to_day?_Are_you_running a fever or feeling like you might be coming down with a cold or flu?</th>
                
                <th>When_you_bump_into_things_or_get_small_cuts, are you bruising easier or bleeding more than before?</th>
                
                <th>How_are_your_meals_going?_Are_you_eating like you normally do, or are you having trouble with nausea or your appetite?</th>

                <th>Are_you_able_to_do_your_usual_daily_routine - things like housework, shopping, or hobbies? How's your energy for getting things done?</th>
                <th>Are_you_ready_for_your_next_Enhertu_infusion as scheduled? Have you needed to contact your doctor or go anywhere for medical care since your last infusion?</th>
                <th>TELL_PATIENT_TO_CALL_DOCTOR_TODAY_OR_GO_TO_ER</th>
                <th>routine_monitoring</th>
                
                <th>red_flags_call_medical_team_now</th>
                <th>NORMAL_ENHERTU_EFFECTS_ROUTINE_FOLLOW_UP</th>
                <th>patient_understanding_Quick_staff_notes</th>
                <th>action_needed</th>



            </thead>
            <tbody>
                @if ($records)
                    @foreach ($records as $record)
                        <tr>
                            <td>{{$record['account_no']}}</td>
                            <td>{{$record['name']}}</td>
                         

                            
                            <td>{{$record['patient_response_1']}}</td>
                            
                            <td>{{$record['patient_response_2']}}</td>
                            
                            <td>{{$record['patient_response_3']}}</td>
                            
                            <td>{{$record['patient_response_4']}}</td>
                            
                            <td>{{$record['patient_response_5']}}</td>
                            <td>{{$record['patient_response_6']}}</td>
                            <td>{{$record['patient_response_7']}}</td>

                            <td>{{$record['call_doctor_or_er_response']}}</td>
                            <td>{{$record['routine_monitoring_response']}}</td>
                            <td>{{$record['red_flags_response']}}</td>
                            <td>{{$record['enhertu_effects_response']}}</td>
                            <td>{{$record['patient_understanding_response']}}</td>
                            <td>{{$record['action_needed_response']}}</td>
                            
                            

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
