<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function home(){
        return view('HMM.home');
    }

    public function dashboard(){
        return "dashboard";
    }

    public function hmm(){
        return redirect()->route('hmm.academic.index');
    }

    public function attendance(){
        return "attendance";
    }

    public function exam(){
        return "exam";
    }
    public function payment(){
        return redirect()->route('payment.description.index');
    }

    public function setting(){
        return "setting";
    }
}
