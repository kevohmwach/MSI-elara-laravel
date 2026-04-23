@extends('layouts.app')

@section('content')
{{-- {{dd($drop_reason)}} --}}
<div class="wrapper wrapper_preconfigured">
    <div class="diag_create_container">
        <form action={{route('dropout_update',['dropout'=>$dropout->id])}} method="post" enctype="multipart/form-data" class="diaguct_create_form" >
            @csrf

            @method('PATCH')
            
            <div>
                <label  class="label">drop_reason</label>

                <input id="drop_reason" type="text"  class="form-control @error('drop_reason') is-invalid @enderror" name="drop_reason" value="{{ old('drop_reason') ?? $dropout->drop_reason }} " required autocomplete="drop_reason" autofocus>
                @error('drop_reason')
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