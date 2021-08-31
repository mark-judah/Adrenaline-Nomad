<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::orderBy('created_at', 'desc')->paginate(20);
        return view('layouts.messages', ['messages' => $messages]);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $message = new Message();
        $message->name=$request->input('name');
        $message->email=$request->input('email');
        $message->subject=$request->input('subject');
        $message->message=$request->input('message');
        $message->save();
        return redirect('/contact')->with('message', 'Message sent succesfuly. You will be contacted shortly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function show(Messages $messages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function edit(Messages $messages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Messages $messages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function destroy(Messages $messages)
    {
        //
    }

    public function contactPost(Request $request){
        Mail::send('email', [
                'name' => $request->get('sender_name'),
                'email' => $request->get('sender_email'),
                function ($message) {
                        $message->from('markmaina333@gmail.com');
                        $message->to($request->get('sender_email'), $request->get('sender_name'))
                                ->subject($request->get('subject'));
        });

        return back()->with('success', 'Email Sent');

    }
}
