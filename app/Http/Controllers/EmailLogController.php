<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use App\Models\EmailLog;
use App\Utilities\OverRider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emailLogs = EmailLog::join("users", "email_logs.sender_id", "=", "users.id")
            ->select('email_logs.*', 'users.last_name as sender')
            ->orderBy("email_logs.id", "DESC")
            ->get();
        return view('backend.email.index', compact('emailLogs'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.email.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        @ini_set('max_execution_time', 0);
        @set_time_limit(0);

        // OverRider::load("Settings");

        $this->validate($request, [
            'subject' => 'required',
            'body' => 'required',
            'user_id' => 'required_without:student_id',
            'student_id' => 'required_without:user_id',
        ]);

        $subject = $request->input("subject");
        $body = $request->input("body");

        if ($request->input('user_id') != "") {
            if ($request->input('user_id') == "all") {
                foreach ($request->input('users') as $receiver_email) {
                    if (Auth::user()->email == $receiver_email || $receiver_email == "") {
                        //continue;
                    }
                    //Send Email
                    $mail  = new \stdClass();
                    $mail->subject = $subject;
                    $mail->message = $body;
                    Mail::to($receiver_email)->send(new SendEmail($mail));


                    $log = new EmailLog();
                    $log->receiver_email = $receiver_email;
                    $log->subject = $subject;
                    $log->message = $body;
                    $log->sender_id = Auth::user()->id;
                    $log->save();
                }
            } else {
                if (Auth::user()->email != $request->input('user_id') || $request->input('user_id') != "") {
                    //Send Email
                    $mail  = new \stdClass();
                    $mail->subject = $subject;
                    $mail->message = $body;
                    Mail::to($request->input('user_id'))->send(new SendEmail($mail));

                    $log = new EmailLog();
                    $log->receiver_email = $request->input('user_id');
                    $log->subject = $subject;
                    $log->message = $body;
                    $log->sender_id = Auth::user()->id;
                    $log->save();
                } else {
                    return redirect()->back()->with('error', __('Invalid mobile number Or Illegal Operation !'))->withInput();
                }
            }
        }

        if ($request->input('student_id') != "") {
            if ($request->input('student_id') == "all") {
                foreach ($request->input('users') as $receiver_email) {
                    if (Auth::user()->email == $receiver_email || $receiver_email == "") {
                        continue;
                    }
                    //Send Email
                    $mail  = new \stdClass();
                    $mail->subject = $subject;
                    $mail->message = $body;
                    Mail::to($receiver_email)->send(new SendEmail($mail));

                    $log = new EmailLog();
                    $log->receiver_email = $receiver_email;
                    $log->subject = $subject;
                    $log->message = $body;
                    $log->sender_id = Auth::user()->id;
                    $log->save();
                }
            } else {
                if (Auth::user()->email != $request->input('student_id') || $request->input('student_id') != "") {

                    //Send Email
                    $mail  = new \stdClass();
                    $mail->subject = $subject;
                    $mail->message = $body;
                    Mail::to($request->input('student_id'))->send(new SendEmail($mail));

                    $log = new EmailLog();
                    $log->receiver_email = $request->input('student_id');
                    $log->subject = $subject;
                    $log->message = $body;
                    $log->sender_id = Auth::user()->id;
                    $log->save();
                } else {
                    return redirect('message/compose')->with('error', __('Invalid mobile number Or Illegal Operation !'))->withInput();
                }
            }
        }

        return redirect()->back()->with('success', __('Email Sent Successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, EmailLog $emailLog)
    {
        if ($request->ajax()) {
            return view('backend.email.modal.view', compact('email_log'));
        }
        return view('backend.email.view', compact('emailLog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmailLog $emailLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmailLog $emailLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmailLog $emailLog)
    {
        //
    }
}
