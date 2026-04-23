@extends('layouts.app')

@section('content')
{{-- {{dd($insuarance_provider)}} --}}
<div class="wrapper wrapper_preconfigured">
    <div class="diag_create_container">
        <form action={{route('insurance_update',['insurance'=>$insuarance_provider->id])}} method="post" enctype="multipart/form-data" class="diaguct_create_form" >
            @csrf

            @method('PATCH')
            
            <div>
                <label  class="label">insuarance_provider</label>

                <input id="insuarance_provider" type="text"  class="form-control @error('insuarance_provider') is-invalid @enderror" name="insuarance_provider" value="{{ old('insuarance_provider') ?? $insuarance_provider->insuarance_provider }} " required autocomplete="insuarance_provider" autofocus>
                @error('insuarance_provider')
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