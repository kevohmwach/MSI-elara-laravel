<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class PrivelegeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        if(Auth::user()->role>2){
            $users = User::latest()->get();

            return view('user.index',[
                'users' => $users,
            ]);

        }else{
            return redirect(route('home'));
        }
       
    }

    public function edit(User $user){

        if(Auth::user()->role>2){
            return view('user.edit',[
                'user' => $user,
            ]);
        }else{
            return redirect(route('home'));
        }
    }
    public function update(User $user){
        if(Auth::user()->role>2){
            $data= request()->validate([
                'role' => 'required|int',
            ]);
            $user->role = $data['role'];
            $user->save();
            return redirect(route('users'));
        }else{
            return redirect(route('home'));
        }

        

    }


}
