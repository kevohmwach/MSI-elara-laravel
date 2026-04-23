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

                <th>Patient_response_salutation</th>
                <th>Patient_response_busy</th>
                <th>Script_question_1</th>
                <th>Patient_response_1</th>
                <th>Script_question_2</th>
                <th>Patient_response_2</th>
                <th>Script_question_3</th>
                <th>Patient_response_3</th>
                <th>Script_question_4</th>
                <th>Patient_response_4</th>
                <th>Script_question_5</th>
                <th>Patient_response_5</th>
                <th>Patient_response_wrap_advice</th>
                <th>Patient_response_wrap_bye</th>
                <th>Weekly_check_in_quiz_1</th>
                <th>Weekly_check_in_response_1</th>
                <th>Weekly_check_in_quiz_2</th>
                <th>Weekly_check_in_response_2</th>
                <th>Weekly_check_in_quiz_3</th>
                <th>Weekly_check_in_response_3</th>
                <th>Weekly_check_in_quiz_4</th>
                <th>Weekly_check_in_response_4</th>
                <th>Weekly_check_in_quiz_5</th>
                <th>Weekly_check_in_response_5</th>
                <th>Weekly_check_in_quiz_6</th>
                <th>Weekly_check_in_response_6</th>
                <th>Weekly_check_in_quiz_7</th>
                <th>Weekly_check_in_response_7</th>
                <th>Patient_response_wrap_advice_weekly</th>
                <th>Patient_response_wrap_bye_weekly</th>



            </thead>
            <tbody>
                @if ($records)
                    @foreach ($records as $record)
                        <tr>
                            <td>{{$record['account_no']}}</td>
                            <td>{{$record['name']}}</td>
                         

                            <td>{{$record['patient_response_salutation']}}</td>
                            <td>{{$record['patient_response_busy']}}</td>
                            <td>{{$record['script_question_1']}}</td>
                            <td>{{$record['patient_response_1']}}</td>
                            <td>{{$record['script_question_2']}}</td>
                            <td>{{$record['patient_response_2']}}</td>
                            <td>{{$record['script_question_3']}}</td>
                            <td>{{$record['patient_response_3']}}</td>
                            <td>{{$record['script_question_4']}}</td>
                            <td>{{$record['patient_response_4']}}</td>
                            <td>{{$record['script_question_5']}}</td>
                            <td>{{$record['patient_response_5']}}</td>
                            <td>{{$record['patient_response_wrap_advice']}}</td>
                            <td>{{$record['patient_response_wrap_bye']}}</td>
                            <td>{{$record['weekly_check_in_quiz_1']}}</td>
                            <td>{{$record['weekly_check_in_response_1']}}</td>
                            <td>{{$record['weekly_check_in_quiz_2']}}</td>
                            <td>{{$record['weekly_check_in_response_2']}}</td>
                            <td>{{$record['weekly_check_in_quiz_3']}}</td>
                            <td>{{$record['weekly_check_in_response_3']}}</td>
                            <td>{{$record['weekly_check_in_quiz_4']}}</td>
                            <td>{{$record['weekly_check_in_response_4']}}</td>
                            <td>{{$record['weekly_check_in_quiz_5']}}</td>
                            <td>{{$record['weekly_check_in_response_5']}}</td>
                            <td>{{$record['weekly_check_in_quiz_6']}}</td>
                            <td>{{$record['weekly_check_in_response_6']}}</td>
                            <td>{{$record['weekly_check_in_quiz_7']}}</td>
                            <td>{{$record['weekly_check_in_response_7']}}</td>
                            <td>{{$record['patient_response_wrap_advice_weekly']}}</td>
                            <td>{{$record['patient_response_wrap_bye_weekly']}}</td>
                            
                            

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
