<?php

namespace App\Http\Controllers;

use App\Mail\sendmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class mailController extends Controller
{
    public function index($addr){
        
        return view('mails.index', [
            'addr' => $addr
            ]);
    }

    public function kirim(Request $request){
        $detail = [
            'isi' => $request->input('isi')  
        ];

        Mail::to($request->input('email'))->send(new sendmail($detail));

        session()->flash('succes', 'Balasan telah dikirim');

        // return "Email telah dikirim!";
        return to_route('message.index');
    }
}
