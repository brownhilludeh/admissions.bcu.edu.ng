<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\UserMessage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function compose(Request $request)
    {
        return view('backend.message.create');
    }

    public function outbox()
    {
        $messages = Message::join("user_messages", "messages.id", "=", "user_messages.message_id")
            ->join("users", "user_messages.receiver_id", "=", "users.id")
            ->select('messages.*', 'users.email as receiver')
            ->where("sender_id", Auth::user()->id)
            ->orderBy("messages.id", "DESC")->paginate(10);
        return view('backend.message.outbox', compact('messages'));
    }

    public function inbox()
    {
        $messages = Message::join("user_messages", "messages.id", "=", "user_messages.message_id")
            ->join("users", "messages.sender_id", "=", "users.id")
            ->select('messages.*', 'users.email as sender', 'user_messages.read')
            ->where("receiver_id", Auth::user()->id)
            ->orderBy("messages.date", "Asc")->paginate(10);
        return view('backend.message.inbox', compact('messages'));
    }

    public function send(Request $request)
    {
        @ini_set('max_execution_time', 0);
        @set_time_limit(0);

        $validator = Validator::make($request->all(), [
            'user_type' => 'required',
            'user_id' => 'required_without:student_id',
            'student_id' => 'required_without:user_id',
            'subject' => 'required|max:191',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json(['result' => 'error', 'message' => $validator->errors()->all()]);
            } else {
                return redirect('message/compose')
                    ->withErrors($validator)
                    ->withInput();
            }
        }

        $message = new Message();
        $message->date = Carbon::now();
        // $message->date = date("Y-m-d H:m:s");
        $message->subject = strip_tags($request->input('subject'));
        $message->body = $request->input('body');
        $message->sender_id = Auth::user()->id;

        $message->save();

        if ($request->input('user_id') != "") {
            if ($request->input('user_id') == "all") {
                foreach ($request->input('users') as $user_id) {
                    if (Auth::user()->id == $user_id) {
                        continue;
                    }
                    $userMessage = new UserMessage();
                    $userMessage->message_id = $message->id;
                    $userMessage->receiver_id = $user_id;
                    $userMessage->save();
                }
            } else {
                if (Auth::user()->id != $request->input('user_id')) {
                    $userMessage = new UserMessage();
                    $userMessage->message_id = $message->id;
                    $userMessage->receiver_id = $request->input('user_id');
                    $userMessage->save();
                } else {
                    return redirect('message/compose')->with('error', __('Illegal Operation !'))->withInput();
                }
            }
        }


        if (!$request->ajax()) {
            return redirect('message/compose')->with('success', __('Message sent successfully'));
        } else {
            return response()->json(['result' => 'success', 'action' => 'store', 'message' => __('Message sent successfully'), 'data' => $message]);
        }
    }

    public function show_inbox(Request $request, $id)
    {
        $message = Message::select("messages.*")
        ->join("user_messages", "messages.id", "=", "user_messages.message_id")
        ->where('user_messages.receiver_id', '=', Auth::user()->id)
            ->where("messages.id", $id)->first();

        //Mark as Read
        $update_message = UserMessage::where("message_id", $id)
            ->where('user_messages.receiver_id', '=', Auth::user()->id)
            ->first();
        $update_message->read = "y";
        $update_message->save();

        if ($request->ajax()) {
            return view('backend.message.modal.view', compact('message', 'id'));
        }
    }

    public function show_outbox(Request $request, $id)
    {
        $message = Message::select("messages.*")
        ->join("user_messages", "messages.id", "=", "user_messages.message_id")
        ->where("messages.sender_id", Auth::user()->id)
            ->where("messages.id", $id)->first();

        if ($request->ajax()) {
            return view('backend.message.modal.view', compact('message', 'id'));
        }
    }
}
