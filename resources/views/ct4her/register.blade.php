@extends('layouts.app')

@section('content')

<div class="wrapper">

    <div >
        @livewire('ct4her-form',[$insurance_data, $dropout_data, $patient_data, $physician_data])
    </div>

</div>

@endsection