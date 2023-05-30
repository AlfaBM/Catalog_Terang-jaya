<?php

namespace App\Http\Controllers;

use App\Models\message;
use App\Rules\GmailValidation;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ms = message::latest();
        
        if($request->input('search')){
            $ms->where('nama', 'LIKE', '%' . $request->input('search') . '%')
                ->orWhere('body', 'LIKE', '%' . $request->input('search') . '%');
        }

        // if($request->input('day')){
        //     dd($request->input('day'));
        //     $day = $request->input('day');
        //     $halo = message::whereDay('created_at', '=', $day)->get();
        //     dd($halo);
        // }


        return view('message.index', [
            'message' => $ms->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img('math')]);
    }

    public function store(Request $request)
    {
        $message = new message;

        $request->validate([
            'nama' => 'regex:/^[a-zA-Z_]+( [a-zA-Z_]+)*$/',
            'email' => [new GmailValidation()],
            'phone' => 'max:16',
            'g-recaptcha-response' => 'required|recaptchav3:pesan,0.5',
            'captcha' => 'required|captcha'
        ]);

        $hp = '+62' . substr(trim($request->input('phone')), 1);
        
        $message->nama = $request->input('nama');
        $message->phone = $hp;
        $message->email = $request->input('email');
        $message->body = $request->input('Message');
        $message->read = false;
        $message->save();
        
        return to_route('contact');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = message::find($id);
        $message->read = true;
        $message->save();
        return view('message.show', [
            'message' => $message
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }

    public function deletecek(Request $request)
    {
        $ids = $request->cek;

        message::whereIn('_id', $ids)->delete();

        return to_route('message.index');
    }

    public function send(Request $request){
        $isi = $request->input('isi');

        return to_route('mail.index');
    }
}
