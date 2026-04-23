<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DiagnosisPre;
use Illuminate\Support\Facades\Auth;

class DiagnosisPreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        if(Auth::user()->role>0){
            $data = DiagnosisPre::latest()->get();
            return view('diagnosis.index', [
                'data' => $data,
            ]);

        }else{
            return redirect(route('home'));
        }
       
        
    }
    public function create(){
        if(Auth::user()->role>1){
            return view('diagnosis.create');
        }else{
            return redirect(route('home'));
        }
        
    }

    public function store(){
        if(Auth::user()->role>1){
            $data= request()->validate([
                'diagnosis' => 'required|string',
            ]);
    
            $existing_data = DiagnosisPre::where('diagnosis',$data['diagnosis'])->first();
    
            if(!$existing_data){
                auth()->user()->diagnosis()->create([
                    'diagnosis' => $data['diagnosis'],
                ]);
            }
            return redirect(route('diagnosis'));
        }else{
            return redirect(route('home'));
        }
       
    }

    public function edit(DiagnosisPre $diagnosis){
        if(Auth::user()->role>1){
            return view('diagnosis.edit', ['diagnosis' => $diagnosis] );
        }else{
            return redirect(route('home'));
        }
       
    }

    public function update(DiagnosisPre $diagnosis){
        if(Auth::user()->role>1){
            $data= request()->validate([
                'diagnosis' => 'required|string',
            ]);
     
            $diagnosis->update($data);
            return redirect(route('diagnosis'));
        }else{
            return redirect(route('home'));
        }
        
    }

    public function delete($id){

        
    }
}
