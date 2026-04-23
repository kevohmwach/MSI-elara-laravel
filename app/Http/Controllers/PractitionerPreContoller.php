<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PractitionerPre;
use Illuminate\Support\Facades\Auth;

class PractitionerPreContoller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        if(Auth::user()->role>0){
            $data = PractitionerPre::latest()->get();
            return view('practitioner.index', [
                'data' => $data,
            ]);
        }else{
            return redirect(route('home'));
        }
       
        
    }
    public function create(){
        if(Auth::user()->role>1){
            return view('practitioner.create');
        }else{
            return redirect(route('home'));
        }
       
    }

    public function store(){
        if(Auth::user()->role>1){
            $lastID=0;
            $lastEntry = PractitionerPre::latest()->limit(1)->get()->toArray();
            if($lastEntry){
                $lastID=$lastEntry[0]['id'];
            }

            $data= request()->validate([
                'pract_name' => 'required|string',
                'pract_mobile_phone' => 'required|string',
                'pract_email' => 'required|string',
                'pract_speciality' => 'required|string',
                'pract_title' => 'required|string',
                'pract_licence_no' => 'required|string',
                'pract_exp_years' => 'required|string',
            ]);

            $existing_data = PractitionerPre::where('pract_email',$data['pract_email'])->first();

            if(!$existing_data){
                auth()->user()->practitioner()->create([
                    'account_no' => "ELP-".str_pad(++$lastID, 4, '0', STR_PAD_LEFT),
                    'pract_name' => $data['pract_name'],
                    'pract_mobile_phone' => $data['pract_mobile_phone'],
                    'pract_email' => $data['pract_email'],
                    'pract_speciality' => $data['pract_speciality'],
                    'pract_title' => $data['pract_title'],
                    'pract_licence_no' => $data['pract_licence_no'],
                    'pract_exp_years' => $data['pract_exp_years'],
                ]);
            }
            return redirect(route('practitioner'));
        }else{
            return redirect(route('home'));
        }
        
    }

    public function edit(PractitionerPre $practitioner){
        if(Auth::user()->role>1){
            return view('practitioner.edit', ['practitioner' => $practitioner] );
        }else{
            return redirect(route('home'));
        }
       
    }

    public function update(PractitionerPre $practitioner){
        if(Auth::user()->role>1){
            $data= request()->validate([
                'pract_name' => 'required|string',
                'pract_mobile_phone' => 'required|numeric|digits:10',
                'pract_email' => 'required|string',
                'pract_speciality' => 'required|string',
                'pract_title' => 'required|string',
                'pract_licence_no' => 'required|string',
                'pract_exp_years' => 'required|string',
            ]);
     
            $practitioner->update($data);
            return redirect(route('practitioner'));
        }else{
            return redirect(route('home'));
        }
        
    }

    public function delete($id){

        
    }
}
