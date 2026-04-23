<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResponsePre;
use Illuminate\Support\Facades\Auth;

class ResponsePreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        if(Auth::user()->role>0){
            $data = ResponsePre::latest()->get();
            return view('response.index', [
                'data' => $data,
            ]);
        }else{
            return redirect(route('home'));
        }
      
        
    }
    public function create(){
        if(Auth::user()->role>1){
            return view('response.create');
        }else{
            return redirect(route('home'));
        }
        
    }

    public function store(){
        if(Auth::user()->role>1){
            $data= request()->validate([
                'patient_response' => 'required|string',
            ]);
    
            $existing_data = ResponsePre::where('patient_response',$data['patient_response'])->first();
    
            if(!$existing_data){
                auth()->user()->response()->create([
                    'patient_response' => $data['patient_response'],
                ]);
            }
            return redirect(route('response'));
        }else{
            return redirect(route('home'));
        }
        
    }

    public function edit(ResponsePre $response){
        if(Auth::user()->role>1){
            return view('response.edit', ['patient_response' => $response] );
        }else{
            return redirect(route('home'));
        }
        
    }

    public function update(ResponsePre $response){
        if(Auth::user()->role>1){
            $data= request()->validate([
                'patient_response' => 'required|string',
            ]);
     
            $response->update($data);
            return redirect(route('response'));
        }else{
            return redirect(route('home'));
        }
       
    }

    public function delete($id){

        
    }
}
