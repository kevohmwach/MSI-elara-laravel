<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InsurancePre;
use Illuminate\Support\Facades\Auth;

class InsurancePreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        if(Auth::user()->role>0){
            $data = InsurancePre::latest()->get();
            return view('insurance.index', [
                'data' => $data,
            ]);
        }else{
            return redirect(route('home'));
        }
       
        
    }
    public function create(){
        if(Auth::user()->role>1){
            return view('insurance.create');
        }else{
            return redirect(route('home'));
        }
        
    }

    public function store(){
        if(Auth::user()->role>1){
            $data= request()->validate([
                'insuarance_provider' => 'required|string',
            ]);
    
            $existing_data = InsurancePre::where('insuarance_provider',$data['insuarance_provider'])->first();
    
            if(!$existing_data){
                auth()->user()->insurance()->create([
                    'insuarance_provider' => $data['insuarance_provider'],
                ]);
            }
            return redirect(route('insurance'));
        }else{
            return redirect(route('home'));
        }
        
    }

    public function edit(InsurancePre $insurance){
        if(Auth::user()->role>1){
            return view('insurance.edit', ['insuarance_provider' => $insurance] );
        }else{
            return redirect(route('home'));
        }
       
    }

    public function update(InsurancePre $insurance){
        if(Auth::user()->role>1){
            $data= request()->validate([
                'insuarance_provider' => 'required|string',
            ]);
     
            $insurance->update($data);
            return redirect(route('insurance'));
        }else{
            return redirect(route('home'));
        }
       
    }

    public function delete($id){

        
    }
}
