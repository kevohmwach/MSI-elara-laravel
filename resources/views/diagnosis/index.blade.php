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

<div class="wrapper">
    <div class="subsections_showblade" >
        <span class="pre_sectionTitle">Diagnosis preconfigured Options</span>
        @if(Auth::user()->role>1)
            <a href="{{route('diagnosis_create')}}">
                <button <?php if(Auth::user()->role<2){echo 'disabled';} ?> type="button" class="btn btn-md btn-primary" >Create</button>
            </a>
        @endif
    </div>
    <table  class="patients">
        <thead>
            <th>DIAGNOSIS NAME</th>
            <th>ACTION</th>
        </thead>
        @foreach ($data as $item)
            {{-- <div>{{$item->diagnosis}}</div> --}}
            <tr>
                <td>{{$item->diagnosis}}</td>
                <td>
                    <a href="{{route('diagnosis_edit', ['diagnosis'=>$item->id ] )}}" >Update</a>
                </td>
            </tr>
        @endforeach
    </table>
</div>

@endsection