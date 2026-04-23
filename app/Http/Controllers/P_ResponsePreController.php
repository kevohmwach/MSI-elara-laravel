<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\P_ResponsePre;
use Illuminate\Support\Facades\Auth;

class P_responsePreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        if(Auth::user()->role>0){
            $data = P_responsePre::orderBy('question_no', 'asc')->get();
            return view('p_response.index', [
                'data' => $data,
            ]);
        }else{
            return redirect(route('home'));
        }
      
        
    }
    public function create(){
        if(Auth::user()->role>1){
            return view('p_response.create');
        }else{
            return redirect(route('home'));
        }
        
    }

    public function store(){
        if(Auth::user()->role>1){
            $data= request()->validate([
                'patient_response' => 'required|string',
                'question_no' => 'required|integer',
            ]);
    
            $existing_data = P_responsePre::where('patient_response',$data['patient_response'])->first();
    
            if(!$existing_data){
                auth()->user()->p_response()->create([
                    'patient_response' => $data['patient_response'],
                    'question_no' => $data['question_no'],
                ]);
                // dd("Inserted");
            }
            return redirect(route('p_response'));
        }else{
            return redirect(route('home'));
        }
        
    }

    public function edit($p_response){
        if(Auth::user()->role>1){
            // $data= request()->validate([
            //     'p_response' => 'required|integer',
            // ]);

            $p_response = P_responsePre::find($p_response);

            return view('p_response.edit', ['patient_response' => $p_response] );
        }else{
            return redirect(route('home'));
        }
        
    }

    public function update($p_response){
        if(Auth::user()->role>1){
            $p_response = P_responsePre::find($p_response);

            $data= request()->validate([
                'patient_response' => 'required|string',
                'question_no' => 'required|integer',
            ]);
     
            $p_response->update($data);
            return redirect(route('p_response'));
        }else{
            return redirect(route('home'));
        }
       
    }
}
