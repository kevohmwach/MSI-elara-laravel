@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">{{ __('Dashboard') }}</div> --}}

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}<br><br><br>

                    @if(Auth::user()->role>1)
                        <table class="records">
                            <thead>
                                <th>Templates</th>
                                {{-- <th>Action</th> --}}
                            </thead>
                            <tbody>
                                <tr>
                                    {{-- <td>Practitioner</td> --}}
                                    <td>
                                        <a class="link" href="{{route('practitioner')}}">Practitioner</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <a class="link" href="{{route('diagnosis')}}">Diagnosis</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="link" href="{{route('dropout')}}">Dropout reasons</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="link" href="{{route('insurance')}}">Insurance Providers</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="link" href="{{route('p_response')}}">Patient's Response</a>
                                    </td>
                                </tr>
                                @if(Auth::user()->role>2)
                                    <tr>
                                        <td>
                                            <a class="link" href="{{route('users')}}">Users</a>
                                        </td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
