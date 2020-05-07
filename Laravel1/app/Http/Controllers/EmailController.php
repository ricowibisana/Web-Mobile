<?php

namespace App\Http\Controllers;

use App\Mail\DummyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function send(){
        Mail::to("rico@mail.com")->send(new DummyEmail());

        if (Auth::check()){
            return redirect('/')->with('result', 'Email Berhasil Dikirim');
        }else{
            return "Email Berhasil Dikirim";
        }
    }
}