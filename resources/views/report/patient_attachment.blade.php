@extends('layouts.app')

<style>


</style>

@section('content')

<div class="wrapper wrapper-table reports">
    <div >
        <form action="{{route('patient_attachment_report')}}" method="get">
            <div class="record_filter_attachment">
                <div class="record_filter_attachment_field">
                    <div>
                        <label class="label" for="toDate">From</label>
                    </div>
                    <div>
                        <input class="input" type="date" name="fromDate" id="fromDate" value="{{$fromDate}}" required>
                    </div>
                </div>
                <div class="record_filter_attachment_field">
                    <div>
                        <label for="toDate">To</label>
                    </div>
                    <div>
                        <input type="date" name="toDate" id="toDate" value="{{$toDate}}" required>
                    </div>
                </div>
                <div class="record_filter_attachment_field_1">
                    <div>
                        <a href="#">
                            <button type="submit" class=" btn-primary search-button ">
                                Filter
                                {{-- <i class="fa fa-search" style="font-size:20px;color:white"></i> --}}
                            </button>
                        </a>
                    </div>
                </div>
              
            </div><br><br>
            <div class="record_filter_attachment_1">
                  <div>
                    <select name="searchField" id="searchField" class="patient_search_opton">
                        <option value="account_no">Account No</option>
                        {{-- <option value="name">Patient Name</option> --}}
                    </select>
                    
                    <input type="search" name="searchTerm" id="searchTerm" >
                    <a href="#">
                        <button type="submit" class=" btn-primary search-button ">
                            <i class="fa fa-search" style="font-size:20px;color:white"></i>
                        </button>
                    </a>
                </div>
                
            </div>

           
          

        </form>

    </div>

    <table class="records">
        {{-- <div class="record_filter">
            <form action="{{route('patient_attachment_report')}}" method="get">
                    <label for="toDate">From</label>&nbsp&nbsp&nbsp&nbsp
                    <input type="date" name="fromDate" id="fromDate" value="{{$fromDate}}" required>
                    
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

                    <label for="toDate">To</label>&nbsp&nbsp&nbsp&nbsp
                    <input type="date" name="toDate" id="toDate" value="{{$toDate}}" required>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                   
                    <a href="#">
                        <button type="submit" class=" btn-primary search-button ">
                            Filter
                        </button>
                    </a>
                        <select name="searchField" id="searchField" class="patient_search_opton">
                            <option value="account_no">Account No</option>
                            <option value="name">Patient Name</option>
                        </select>
                        
                        <input type="search" name="searchTerm" id="searchTerm" >
                        <a href="#">
                            <button type="submit" class=" btn-primary search-button ">
                                <i class="fa fa-search" style="font-size:20px;color:white"></i>
                            </button>
                        </a>
                   
            </form>
        </div> --}}
        {{-- <div>
            <button class="download_button">
                <a class="download_link" target="_blank"  href="{{route('download_patient_details_report', ['from' => $fromDate, 'to' => $toDate])}}" >Download</a>
            </button>
        </div> --}}
        <thead style="padding:5px">
            <th>Account_No</th>
            <th>Patient's_Name</th>

            <th>X-Ray</th>
            <th>CT-Scan</th>
            <th>Consent Form</th>

        </thead>
        <tbody>
            @if ($records)
                @foreach ($records as $record)
                    <tr>
                        <td>{{$record['account_no']}}</td>
                        <td>{{$record['name']}}</td>

                        <td>
                            <a class="link"  href="{{route('patient_attachment_showFile',['id'=>$record['id'], 'fileType'=>'X-ray'] )}}" target="_blank" >
                                {{$record['x_ray_file']}}
                            </a>
                           
                        </td>
                        <td>
                            <a class="link" href="{{route('patient_attachment_showFile',['id'=>$record['id'], 'fileType'=>'CT_Scan'] )}}" target="_blank" >
                                {{$record['ct_scan_file']}}
                            </a>
                           
                        </td>
                        <td>
                            <a class="link"  href="{{route('patient_attachment_showFile',['id'=>$record['id'], 'fileType'=>'Consent'] )}}" target="_blank" >
                                {{$record['patient_consent_file']}}
                            </a>
                           
                        </td>
                        {{-- <td</td>
                        <td></td> --}}

                        {{-- <td>{{$record['created_at']}}</td>
                        <td>{{$record['emergency_contact_name']}}</td>
                        <td>{{$record['emergency_contact_mobile']}}</td>
                        <td>{{$record['physician_1_name']}}</td>
                        <td>{{$record['physician_1_phone']}}</td>
                        <td>{{$record['physician_1_phone']}}</td> --}}
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
