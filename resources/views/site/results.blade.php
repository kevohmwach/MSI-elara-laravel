@extends('layouts.app')

<style>
    a{
        text-decoration: none;
        color: white
    }
    button{
        background-color: rgb(226, 165, 165);
        color: white;
        padding: 10px 20px;
        border-radius: 2px;
        border: 1px;
    }

    .wrapper-table{
        width: 80%;
        margin: auto;
        padding: 20px;
    }

    .results {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        .results td, .results th {
        border: 1px solid #ddd;
        padding: 8px;
        }

        .results tr:nth-child(even){background-color: #f2f2f2;}

        .results tr:hover {background-color: #ddd;}

        .results th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
        }


</style>

@section('content')

<div class="wrapper-table">
    <button>
        <a style="text-decoration: none" href="{{route('download')}}" >Download</a>
    </button>
    
    <table class="results">
        <thead style="padding:5px">
            <th style="padding:10px">First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Age</th>
            <th>County</th>
        </thead>
        <tbody>
            {{-- dd({{$results}}) --}}
            @foreach ($results as $result)
                <tr>
                    <td>{{$result['surv_fname']}}</td>
                    <td>{{$result['surv_lname']}}</td>
                    <td>{{$result['surv_gender']}}</td>
                    <td>{{$result['surv_age']}}</td>
                    <td>{{$result['surv_county']}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
