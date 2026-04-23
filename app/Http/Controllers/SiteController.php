<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataCollection;

class SiteController extends Controller
{
    public function index() { 
        return view ('site.index');
    }

    public function store(){
        //dd(request()->all());

        $data= request()->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'age' => 'required',
            //'email' => 'required',
            'county' => 'required',
            'gender' => 'required',
        ]);

        DataCollection::create([
            'surv_fname' => $data['fname'],
            'surv_lname' => $data['lname'],
            'surv_email' => $data['email'],
            'surv_age' => $data['age'],
            'surv_gender' => $data['gender'],
            'surv_county' => $data['county'],
           

        ]);

        //dd($data);
        return redirect('/');
    }

    public function results(){
        $data = DataCollection::latest()->get()->toArray();
        //$promotion = DataCollection::where('surv_fname', '<>', 0)->limit(3)->get()->toArray();
        //dd($data);
        return view('site.results', [
            'results' => $data,
            //'promotions' => $promotion,
        ]);
        
    }

    public function download(){
        $data = DataCollection::latest()->get()->toArray();
        return view('site.download', [
            'results' => $data,
        ]);
        
    }
}
