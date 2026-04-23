@extends('layouts.app')

@section('content')

<div class="wrapper wrapper-table reports">
    <div style="overflow-x: auto;">
        {{-- {{dd($records)}} --}}

        <table class="records">
            <div class="record_filter">
                <form action="{{route('social_history_report')}}" method="get">
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
                    <a class="download_link" target="_blank"  href="{{route('download_social_history_report', ['from' => $fromDate, 'to' => $toDate])}}" >Download</a>
                </button>
            </div>
            <thead style="padding:5px">
                <th>Account_No</th>
                <th>Patient's_Name</th>

                <th>Mother's_Condition</th>
                <th>Mother_alive?</th>
                <th>Mother_deceased_age</th>
                <th>Father's_Condition</th>
                <th>Father_Alive?</th>
                <th>Father_deceased_age</th>
                <th>Sibling_1_Condition</th>
                <th>Sibling_1_alive</th>
                <th>Sibling_1_deceased_age</th>
                <th>Sibling_2_Condition</th>
                <th>Sibling_2_alive?</th>
                <th>Sibling_2_deceased_age</th>
                <th>Others_1_Condition</th>
                <th>Others_1_alive?</th>
                <th>Others_1_deceased_age</th>
                <th>Others_2_Condition</th>
                <th>Others_2_Alive?</th>
                <th>Others_2_deceased_age</th>
                <th>Consume_alcohol</th>
                <th>Drinks_per_week</th>
                <th>Currently_smoke</th>
                <th>Cigarettes_per_day</th>
                <th>Use_any_other_drug?</th>
                <th>Any_other_drug</th>
                <th>Any_other_drug_frequency</th>
                <th>Drink_caffein?</th>
                <th>Caffein_cups_per_day</th>
                <th>Sexually_active</th>
                <th>Would_like_be_checked_STIS?</th>
                <th>Excercise_frequency</th>
                <th>On_special_diet</th>
                <th>Special_diet_type</th>
                <th>Pregnancy_plan</th>
                <th>Pregnant_now</th>
                <th>Contraception_in_use</th>

            </thead>
            <tbody>
                @if ($records)
                    @foreach ($records as $record)
                        <tr>
                            <td>{{$record['account_no']}}</td>
                            <td>{{$record['name']}}</td>
                         

                            <td>{{$record['condition_mother']}}</td>
                            <td>{{$record['mother_alive']}}</td>
                            <td>{{$record['mother_deceased_age']}}</td>
                            <td>{{$record['condition_father']}}</td>
                            <td>{{$record['father_alive']}}</td>
                            <td>{{$record['father_deceased_age']}}</td>
                            <td>{{$record['condition_sibling_1']}}</td>
                            <td>{{$record['sibling_1_alive']}}</td>
                            <td>{{$record['sibling_1_deceased_age']}}</td>
                            <td>{{$record['condition_sibling_2']}}</td>
                            <td>{{$record['sibling_2_alive']}}</td>
                            <td>{{$record['sibling_2_deceased_age']}}</td>
                            <td>{{$record['condition_others_1']}}</td>
                            <td>{{$record['others_1_alive']}}</td>
                            <td>{{$record['others_1_deceased_age']}}</td>
                            <td>{{$record['condition_others_2']}}</td>
                            <td>{{$record['others_2_alive']}}</td>
                            <td>{{$record['others_2_deceased_age']}}</td>
                            <td>{{$record['consume_alcohol']}}</td>
                            <td>{{$record['drinks_per_week']}}</td>
                            <td>{{$record['currently_smoke']}}</td>
                            <td>{{$record['cigarettes_per_day']}}</td>
                            <td>{{$record['use_any_other_drug']}}</td>
                            <td>{{$record['any_other_drug']}}</td>
                            <td>{{$record['any_other_drug_frequency']}}</td>
                            <td>{{$record['drink_caffein']}}</td>
                            <td>{{$record['caffein_cups_per_day']}}</td>
                            <td>{{$record['sexually_active']}}</td>
                            <td>{{$record['like_checked_stis']}}</td>
                            <td>{{$record['excercise_frequency']}}</td>
                            <td>{{$record['on_special_diet']}}</td>
                            <td>{{$record['special_diet_type']}}</td>
                            <td>{{$record['pregnancy_plan']}}</td>
                            <td>{{$record['pregnant_now']}}</td>
                            <td>{{$record['contraception_in_use']}}</td>

                            

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
