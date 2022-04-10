<?php

namespace App\Jobs;

use App\Events\EmailEvent;
use App\Mail\EmailSender;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class EmailJob implements ShouldQueue
{

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $email;
    public $sub;
    public $msg;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $sub, $msg)
    {   
        $this->email = $email;
        $this->sub = $sub;
        $this->msg = $msg;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {   
        return Mail::to($this->email)->send(new EmailSender($this->sub, $this->msg));
    }
}
