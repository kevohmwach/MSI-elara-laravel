@extends('layouts.app')

<style>
    .download_link{
        color: white;
        font-weight: bold;
        text-decoration: none;
    }
    button{
        /* background-color: #6c757d; */
        background-color: #198754;
        color: white;
        /* padding: 10px 20px; */
        border-radius: 2px;
        border: 1px;
    }

    .wrapper-table{
        width: 80%;
        margin: auto;
        padding: 20px;
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

</style>

@section('content')

<div class="wrapper wrapper_practioner_dex">
    <div class="subsections_showblade" >
        <span class="pre_sectionTitle">Practitioners Pre-configured Options</span>
        @if(Auth::user()->role>1)
            <a href="{{route('practitioner_create')}}">
                <button <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="button" class="btn btn-md btn-primary" >Create</button>
            </a>
        @endif
    </div>
    <table  class="patients">
        <thead>
            <th>ACCOUNT</th>
            <th>NAME</th>
            <th>PHONE </th>
            <th>EMAIL</th>
            <th>SPECIALITY</th>
            <th>TITLE</th>
            <th>LICENSE</th>
            <th>EXPERIENCE YEARS</th>
            <th>ACTION</th>
        </thead>
        @foreach ($data as $item)
            <tr>
                <td>{{$item->account_no}}</td>
                <td>{{$item->pract_name}}</td>
                <td>{{$item->pract_mobile_phone}}</td>
                <td>{{$item->pract_email}}</td>
                <td>{{$item->pract_speciality}}</td>
                <td>{{$item->pract_title}}</td>
                <td>{{$item->pract_licence_no}}</td>
                <td>{{$item->pract_exp_years}}</td>
                <td>
                    <a href="{{route('practitioner_edit', ['practitioner'=>$item->id ] )}}" >Update</a>
                </td>
            </tr>
        @endforeach
    </table>
</div>

@endsection