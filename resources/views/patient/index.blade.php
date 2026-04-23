@extends('layouts.app')

<style>
    .download_link{
        color: white;
        font-weight: bold;
        text-decoration: none;
    }
    button{
        background-color: #2b3a80;
        color: white;
        /* padding: 10px 20px; */
        border-radius: 2px;
        border: 1px;
    }

    .wrapper-table{
        width: 80%;
        margin: auto;
        padding: 20px;
        padding-top: 0px;
    }

    .patients {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        .patients td, .patients th {
        border: 1px solid #ddd;
        padding: 8px;
        }

        .patients tr:nth-child(even){background-color: #f2f2f2;}

        .patients tr:hover {background-color: #ddd;}

        .patients th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #6c757d;
        color: white;
        }
        .record_filter{
            display: flex;
            padding: 10px;
            /* border: 1px solid green; */
            align-items: center;
        }
        .search-button{
            box-sizing: border-box;
            border-radius: 5px;
            padding: 13px;
            border-left: none;

        }

</style>

@section('content')

{{-- <div>
    search
</div> --}}

<div class="wrapper wrapper-table">
    {{-- <button>
        <a class="download_link"  href="{{route('patient_download')}}" >Download</a>
    </button> --}}
    
    <table class="patients">
        <div class="record_filter">
            <form action="{{route('patient_search')}}" method="get">
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
        </div>
        <thead style="padding:5px">
            <th>Account No.</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Phone No</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($patients as $patient)
                <tr>
                    <td>{{$patient['account_no']}}</td>
                    <td>{{$patient['fname']}}</td>
                    <td>{{$patient['lname']}}</td>
                    <td>{{$patient['gender']}}</td>
                    <td>{{$patient['email']}}</td>
                    <td>{{$patient['mobile_contact']}}</td>
                    <td>
                        <a class="link" href="{{route('updatePatient', ['id'=>$patient['id'] ] )}}" >Update</a>
                        {{-- <a href="{{route('showCancer', ['id'=>$patient['id'] ] )}}" >View</a> --}}
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination-div">
        {{$patients->links('pagination::bootstrap-4')}}
    </div>
</div>


@endsection
