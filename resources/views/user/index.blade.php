@extends('layouts.app')

@section('content')

    <div class="wrapper">
        <table class="records">
            <thead>
                <th>User</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>
                            <a class="link" href="{{route('userEdit',['user'=>$user->id])}}">Update</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>






@endsection