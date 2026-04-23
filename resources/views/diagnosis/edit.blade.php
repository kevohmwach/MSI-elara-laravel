@extends('layouts.app')

@section('content')
{{-- {{dd($diagnosis)}} --}}
<div class="wrapper wrapper_preconfigured">
    <div class="diag_create_container">
        <form action={{route('diagnosis_update',['diagnosis'=>$diagnosis->id])}} method="post" enctype="multipart/form-data" class="diaguct_create_form" >
            @csrf

            @method('PATCH')
            
            <div>
                <label  class="label">Diagnosis</label>

                <input id="diagnosis" type="text"  class="form-control @error('diagnosis') is-invalid @enderror" name="diagnosis" value="{{ old('diagnosis') ?? $diagnosis->diagnosis }} " required autocomplete="diagnosis" autofocus>
                @error('diagnosis')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

           

            <div class="diag-create-button">
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </div>
            
            
        </form>
    </div>
</div>

@endsection