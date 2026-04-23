<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InsurancePre;
use Illuminate\Support\Facades\Auth;

class FacilityController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        if(Auth::user()->role>0){
            $data = Facility::latest()->get();
            return view('facility.index', [
                'data' => $data,
            ]);
        }else{
            return redirect(route('home'));
        }
      
        
    }
    public function create(){
        if(Auth::user()->role>1){
            return view('facility.create');
        }else{
            return redirect(route('home'));
        }
       
    }

    public function store(){
        if(Auth::user()->role>1){
            $data= request()->validate([
                'facility' => 'required|string',
            ]);
    
            $existing_data = Facility::where('facility',$data['facility'])->first();
    
            if(!$existing_data){
                auth()->user()->facility()->create([
                    'facility' => $data['facility'],
                ]);
            }
            return redirect(route('facility'));
        }else{
            return redirect(route('home'));
        }
       
    }

    public function edit(Facility $facility){
        if(Auth::user()->role>1){
            return view('facility.edit', ['facility' => $facility] );
        }else{
            return redirect(route('home'));
        }
       
    }

    public function update(Facility $facility){
        if(Auth::user()->role>1){
            $data= request()->validate([
                'facility' => 'required|string',
            ]);
     
            $facility->update($data);
            return redirect(route('facility'));
        }else{
            return redirect(route('home'));
        }
       
    }

    public function delete($id){

        
    }
}
