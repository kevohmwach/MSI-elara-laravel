@extends('layouts.app')

@section('content')

<div class="wrapper wrapper-table reports">
    <div style="overflow-x: auto;">

        <table class="records">
            <div class="record_filter">
                <form action="{{route('dose_n_sig_report')}}" method="get">
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
                    <a class="download_link" target="_blank"  href="{{route('download_dose_n_sig_report', ['from' => $fromDate, 'to' => $toDate])}}" >Download</a>
                </button>
            </div>
            <thead style="padding:5px">
                <th>Account_No</th>
                <th>Patient's_Name</th>

                <th>dose_n_sig_1</th>
                <th>quantity_1</th>
                <th>units_1</th>
                <th>administration_1</th>
                <th>frequency_1</th>
                <th>tabs_freq_1</th>
                <th>medication_1</th>
                <th>syrup_freq_1</th>

                <th>dose_n_sig_2</th>
                <th>quantity_2</th>
                <th>units_2</th>
                <th>administration_2</th>
                <th>frequency_2</th>
                <th>tabs_freq_2</th>
                <th>medication_2</th>
                <th>syrup_freq_2</th>

                <th>dose_n_sig_3</th>
                <th>quantity_3</th>
                <th>units_3</th>
                <th>administration_3</th>
                <th>frequency_3</th>
                <th>tabs_freq_3</th>
                <th>medication_3</th>
                <th>syrup_freq_3</th>

                <th>dose_n_sig_4</th>
                <th>quantity_4</th>
                <th>units_4</th>
                <th>administration_4</th>
                <th>frequency_4</th>
                <th>tabs_freq_4</th>
                <th>medication_4</th>
                <th>syrup_freq_4</th>

            </thead>
            <tbody>
                @if ($records)
                    @foreach ($records as $record)
                        <tr>
                            <td>{{$record['account_no']}}</td>
                            <td>{{$record['name']}}</td>
                            {{-- <td>{{$record['email']}}</td>
                            <td>{{$record['mobile_contact']}}</td> --}}

                            <td>{{$record['dose_n_sig_1']}}</td>
                            <td>{{$record['dose_n_sig_1_quantity']}}</td>
                            <td>{{$record['dose_n_sig_1_units']}}</td>
                            <td>{{$record['dose_n_sig_1_administration']}}</td>
                            <td>{{$record['dose_n_sig_1_frequency']}}</td>
                            <td>{{$record['dose_n_sig_1_tabs_freq']}}</td>
                            <td>{{$record['dose_n_sig_1_medication']}}</td>
                            <td</td>

                            <td>{{$record['dose_n_sig_2']}}</td>
                            <td>{{$record['dose_n_sig_2_quantity']}}</td>
                            <td>{{$record['dose_n_sig_2_units']}}</td>
                            <td>{{$record['dose_n_sig_2_administration']}}</td>
                            <td>{{$record['dose_n_sig_2_frequency']}}</td>
                            <td>{{$record['dose_n_sig_2_tabs_freq']}}</td>
                            <td>{{$record['dose_n_sig_2_medication']}}</td>
                            <td</td>

                            <td>{{$record['dose_n_sig_3']}}</td>
                            <td>{{$record['dose_n_sig_3_quantity']}}</td>
                            <td>{{$record['dose_n_sig_3_units']}}</td>
                            <td>{{$record['dose_n_sig_3_administration']}}</td>
                            <td>{{$record['dose_n_sig_3_frequency']}}</td>
                            <td>{{$record['dose_n_sig_3_tabs_freq']}}</td>
                            <td>{{$record['dose_n_sig_3_medication']}}</td>
                            <td</td>

                            {{-- @if($record['dose_n_sig_4']) --}}
                                <td>{{$record['dose_n_sig_4']}}</td>
                                <td>{{$record['dose_n_sig_4_quantity']}}</td>
                                <td>{{$record['dose_n_sig_4_units']}}</td>
                                <td>{{$record['dose_n_sig_4_administration']}}</td>
                                <td>{{$record['dose_n_sig_4_frequency']}}</td>
                                <td>{{$record['dose_n_sig_4_tabs_freq']}}</td>
                                <td>{{$record['dose_n_sig_4_medication']}}</td>
                                <td</td>
                            {{-- @endif --}}
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
