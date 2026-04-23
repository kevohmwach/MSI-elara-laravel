@extends('layouts.app')

<style>


</style>

@section('content')

<div class="wrapper wrapper-table reports">

    <table class="records">
        <div class="record_filter">
            <form action="{{route('patient_details_report')}}" method="get">
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
                <a class="download_link" target="_blank"  href="{{route('download_patient_details_report', ['from' => $fromDate, 'to' => $toDate])}}" >Download</a>
            </button>
        </div>
        <thead style="padding:5px">
            <th>Account_No</th>
            <th>Patient's_Name</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Phone No</th>
            <th>Created</th>
            <th>Emergency Contact</th>
            <th>Emergency Phone</th>
            <th>Physician</th>
            <th>Physician Phone</th>
            <th>Speciality</th>
        </thead>
        <tbody>
            @if ($records)
                @foreach ($records as $record)
                    <tr>
                        <td>{{$record['account_no']}}</td>
                        <td>{{$record['name']}}</td>
                        {{-- <td>{{$record['lname']}}</td> --}}
                        <td>{{$record['gender']}}</td>
                        <td>{{$record['email']}}</td>
                        <td>{{$record['mobile_contact']}}</td>
                        <td>{{$record['created_at']}}</td>
                        <td>{{$record['emergency_contact_name']}}</td>
                        <td>{{$record['emergency_contact_mobile']}}</td>
                        <td>{{$record['physician_1_name']}}</td>
                        <td>{{$record['physician_1_phone']}}</td>
                        <td>{{$record['physician_1_phone']}}</td>
                    </tr>
                @endforeach
                
            @else
                <tr>No records found</tr>
            @endif
            
        </tbody>
    </table>
    {{-- <div class="pagination-div">
        {{$records->links('pagination::bootstrap-4')}}
    </div> --}}
</div>


@endsection
