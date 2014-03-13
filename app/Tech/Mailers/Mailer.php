<?php namespace Tech\Mailers;

use Mail;
use Log;

abstract class Mailer {

    public function sendTo($recipient, $subject, $view, $data = [])
    {
        Mail::queue($view, $data, function($message) use ($recipient, $subject)
        {
            $message->to($recipient['email'])->subject($subject);
        });

        Log::info("Mail [$subject] SENT to" . $recipient['email'] . 'with data = ');
    }
}

