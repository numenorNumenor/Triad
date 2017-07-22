<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Session;

class MessagesController extends Controller
{

  public function allMessages() {

    $messages = Message::orderBy('id', 'desc')->get();

    return view('messages.index')->withMessages($messages);
  }

  public function storeMessages(Request $request) {
    $this->validate($request,[
      'name' => 'required|max:255',
      'subject' => 'required|max:255',
      'message' => 'required'
    ]);

    $message = new Message;

    $message->name = $request->name;
    $message->subject = $request->subject;
    $message->message = $request->message;

    $message->save();

    Session::flash('success', 'Thank you for your message, We will email you as soon as possible.');

    return redirect()->route('home');
  }

  public function showMessage($id) {
    $message = Message::find($id);

    return view('messages.show')->withMessage($message);
  }

  public function deleteMessage($id) {
    $message = Message::find($id);

    $message->delete();

    Session::flash('success', 'Your message was successfully deleted !');

    return redirect()->route('all.messages');
  }
}
