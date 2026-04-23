@extends('layouts.app')

@section('content')
<div class="wrapper wrapper_preconfigured">
    <div class="diag_create_container">
        <form action={{route('userUpdate',['user'=>$user->id])}} method="post" enctype="multipart/form-data" class="diaguct_create_form" >
            @csrf

            @method('PATCH')
            
            <div>
                <input id="name" type="text"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name }} " required autocomplete="name" autofocus disabled>

                <input id="email" type="text"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email }} " required autocomplete="email" autofocus disabled>
                
                <label  class="label">Role</label><br>
                <select name="role" id="role" class="select">
                    <option value="">Select</option>
                    <option value="0" <?php if($user->role==0){echo 'selected';}  ?> >Disable</option>
                    <option value="1" <?php if($user->role==1){echo 'selected';}  ?> >Viewer</option>
                    <option value="2" <?php if($user->role==2){echo 'selected';}  ?> >Admin</option>
                    <option value="3" <?php if($user->role==3){echo 'selected';}  ?> >Super Admin</option>
                 
                </select>

                {{-- <input id="role" type="text"  class="form-control @error('role') is-invalid @enderror" name="role" value="{{ old('role') ?? $user->role }} " required autocomplete="role" autofocus> --}}
                @error('role')
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