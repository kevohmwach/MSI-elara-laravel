<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DropoutPre;
use Illuminate\Support\Facades\Auth;

class DropoutPreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        if(Auth::user()->role>0){
            $data = DropoutPre::latest()->get();
            return view('dropout.index', [
                'data' => $data,
            ]);
        }else{
            return redirect(route('home'));
        }
      
        
    }
    public function create(){
        if(Auth::user()->role>1){
            return view('dropout.create');
        }else{
            return redirect(route('home'));
        }
        
    }

    public function store(){
        if(Auth::user()->role>1){
            $data= request()->validate([
                'drop_reason' => 'required|string',
            ]);
    
            $existing_data = DropoutPre::where('drop_reason',$data['drop_reason'])->first();
    
            if(!$existing_data){
                auth()->user()->dropout()->create([
                    'drop_reason' => $data['drop_reason'],
                ]);
            }
            return redirect(route('dropout'));
        }else{
            return redirect(route('home'));
        }
      
    }

    public function edit(DropoutPre $dropout){
        if(Auth::user()->role>1){
            return view('dropout.edit', ['dropout' => $dropout] );
        }else{
            return redirect(route('home'));
        }
       
    }

    public function update(DropoutPre $dropout){
        if(Auth::user()->role>1){
            $data= request()->validate([
                'drop_reason' => 'required|string',
            ]);
     
            $dropout->update($data);
            return redirect(route('dropout'));
        }else{
            return redirect(route('home'));
        }
       
    }

    public function delete($id){

        
    }
}
