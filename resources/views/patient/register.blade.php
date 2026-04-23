@extends('layouts.app')

@section('content')
<div class="wrapper">
    @livewire('multi-step-form',[$practitioner_data])
    
</div>

@endsection
