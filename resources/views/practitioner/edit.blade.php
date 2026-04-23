@extends('layouts.app')

@section('content')
{{-- {{dd($diagnosis)}} --}}
<div class="wrapper wrapper_preconfigured">
    <div class="diag_create_container ">
        <form action={{route('practitioner_update',['practitioner'=>$practitioner->id])}} method="post" enctype="multipart/form-data" class="diaguct_create_form" >
            @csrf

            @method('PATCH')
            
            <div class="preconfigure_options">
                <label  class="label">Practioner Name</label>

                <input id="pract_name" type="text"  class="form-control @error('pract_name') is-invalid @enderror <br><br>" name="pract_name" value="{{ old('pract_name') ?? $practitioner->pract_name }}" required autocomplete="pract_name" autofocus>
                @error('pract_name')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                @enderror <br><br>
               
                
            </div>
            <div class="preconfigure_options">
                <label  class="label">Practitioner Mobile Phone</label>

                <input id="pract_mobile_phone" type="number"  class="form-control @error('pract_mobile_phone') is-invalid @enderror <br><br>" name="pract_mobile_phone" value="{{ old('pract_mobile_phone') ?? $practitioner->pract_mobile_phone }}" required autocomplete="pract_mobile_phone" autofocus>
                @error('pract_mobile_phone')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                @enderror <br><br>
            </div>
            <div class="preconfigure_options">
                <label  class="label">Practioner Email</label>

                <input id="pract_email" type="email"  class="form-control @error('pract_email') is-invalid @enderror <br><br>" name="pract_email" value="{{ old('pract_email')  ?? $practitioner->pract_email}}" required autocomplete="pract_email" autofocus>
                @error('pract_email')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                @enderror <br><br>
            </div>
            <div class="preconfigure_options">
                <label  class="label">Practioner Speciality</label>

                <input id="pract_speciality" type="text"  class="form-control @error('pract_speciality') is-invalid @enderror <br><br>" name="pract_speciality" value="{{ old('pract_speciality') ?? $practitioner->pract_speciality }}" required autocomplete="pract_speciality" autofocus>
                @error('pract_speciality')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                @enderror <br><br>
            </div>
            <div class="preconfigure_options">
                <label  class="label">Practioner Title</label>

                <input id="pract_title" type="text"  class="form-control @error('pract_title') is-invalid @enderror <br><br>" name="pract_title" value="{{ old('pract_title') ?? $practitioner->pract_title }}" required autocomplete="pract_title" autofocus>
                @error('pract_title')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                @enderror <br><br>
            </div>
            <div class="preconfigure_options">
                <label  class="label">Practioner License No.</label>

                <input id="pract_licence_no" type="text"  class="form-control @error('pract_licence_no') is-invalid @enderror <br><br>" name="pract_licence_no" value="{{ old('pract_licence_no') ?? $practitioner->pract_licence_no }}" required autocomplete="pract_licence_no" autofocus>
                @error('pract_licence_no')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                @enderror <br><br>
            </div>
            <div class="preconfigure_options">
                <label  class="label">Practioner Years of Experience</label>

                <input id="pract_exp_years" type="number"  class="form-control @error('pract_exp_years') is-invalid @enderror <br><br>" name="pract_exp_years" value="{{ old('pract_exp_years') ?? $practitioner->pract_exp_years }}" required autocomplete="pract_exp_years" autofocus>
                @error('pract_exp_years')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                @enderror <br><br>
            </div>
            

            <div class="diag-create-button preconfigure_options">
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </div>
            
            
        </form>
    </div>
</div>

@endsection