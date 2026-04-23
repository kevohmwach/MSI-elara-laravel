@extends('layouts.app')

@section('content')

<div class="wrapper wrapper_preconfigured">
    <div class="diag_create_container">
        <form action={{route('p_response_store')}} method="post" enctype="multipart/form-data" class="diaguct_create_form" >
            @csrf
            
            <div>
                <label  class="label">patient_response</label>

                <input id="patient_response" type="text"  class="form-control @error('patient_response') is-invalid @enderror" name="patient_response" value="{{ old('patient_response') }}" required autocomplete="patient_response" autofocus>
                @error('patient_response')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label  class="label">Question No.</label>
                <input id="question_no" type="number"  class="form-control @error('question_no') is-invalid @enderror" name="question_no" value="{{ old('question_no') }}" required autocomplete="question_no" autofocus>
                    @error('question_no')
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