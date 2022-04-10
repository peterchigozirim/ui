<?php

namespace App\Http\Controllers;

// use App\Mail\EmailSender;

use App\Jobs\EmailJob;
use App\Jobs\EmailSender;
use App\Events\EmailEvent;
use App\Models\ReadyToSend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Session;

class SendEmailController extends Controller
{
    public function storeEmail(Request $request)
    {
        $request->validate([
            'email' => 'required'
        ]);
        $add = ReadyToSend::create([
            'email' => $request->email,
            'user_id' => $request->user()->id,
        ]);
        if ($add == true) {
            return response()->json([
                'code' => 200
            ]);
        }else{
            return response()->json([
                'code' => 500,
                'message' => 'Something went wrong',
            ]);
        }
    }
    public function fetchEmail(Request $request)
    {
       $fetch = ReadyToSend::where('user_id', $request->user()->id)->latest()->get();
       if ($fetch == true) {
           return response()->json([
               'code' => 200,
               'message' => $fetch
           ]);
       }
       else{
           return response()->json([
               'code' => 500,
                'message'=> 'No Email Found'
           ]);
       }
    }

    public function removeEmail(Request $request)
    {
        $delete = ReadyToSend::where(['id' => $request->id, 'user_id' => $request->user()->id])->delete();
        if ($delete == true) {
            return response()->json([
                'code' => 200,
                'message' => 'email remove'
            ]);
        }else {
            return response()->json([
                'code' => 500,
                'message' => 'Something went wrong'
            ]);
        }
    }

    public function sendEmail(Request $request)
    {
        $validator  = Validator::make($request->all(),[
            'message' => 'required',
            'subject' => 'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'code' => 500,
                'message' => $validator->errors()
            ]);
        }else{
            $fetch = ReadyToSend::where('user_id', $request->user()->id)->get('email');
            $emaillist = [];
            $i=0;

            // Fill the array element
            foreach($fetch as $fetcs){
                $emaillist[$i] = $fetcs->email;
                $i++;
            }
            
            if ($fetch == true) {
                $subject = $request->subject;
                $message = $request->message;
                // $send = EmailJob::dispatch($emaillist ,$subject, $message);
                event(new EmailEvent($emaillist, $subject, $message));
            }

        }
    }

    public function uploadFiles(Request $request)
    {
        
    }
}