<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\DataDonatur;
use App\Bank;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
   

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $list_donatur = DataDonatur::orderBy('created_at','desc')->paginate(1);
        foreach($list_donatur as $donat){
        $i = explode(' ',$donat->bank);
        }
        $t = Bank::where('nama', $i[0])->first();
        
        return $this->from('no-reply@berbagibahagia.org')->subject('Transfer Donasi Ke Rekening Berikut')->view('email_template',compact('list_donatur','t'));
        // from('no-reply@berbagibahagia.org')->subject('Transfer Donasi Ke Rekening Berikut')->view('email_template')->with('data', $this->data);
    }

  

}
