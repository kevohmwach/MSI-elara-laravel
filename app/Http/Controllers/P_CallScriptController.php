<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\P_CallScript;
use App\Models\Patient;
use App\Models\P_ResponsePre;
use App\Models\PractitionerPre;
use Illuminate\Support\Facades\Auth;

class P_CallScriptController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function callScript($id,$acc_no){
        if(Auth::user()->role>0){
            $data = Patient::find($id);
            $response_data = P_ResponsePre::latest()->get();
            $physician_data = PractitionerPre::find($data->physician_id_1);

            if($data->account_no == $acc_no){
                //check whether user has Social History details set
                $callScriptData = P_CallScript::where('patient_id', $id)->first();
                if($callScriptData){
                    $method = 'update';
                }else{
                    $method = 'register';
                }
                
            }else{
                echo 'invalid user';
            }
            return view('p_callscript.callscript', [
                'method'=> $method,
                'patientdata' => $data,
                'response_data' => $response_data,
                'physician_data' => $physician_data,
            ]);

        }else{
            return redirect(route('home'));
        }
        
        
    }
}
