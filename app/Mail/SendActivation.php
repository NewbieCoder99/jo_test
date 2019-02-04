<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendActivation extends Mailable
{
  use Queueable, SerializesModels;

  public $params;
  /**
  * Create a new message instance.
  *
  * @return void
  */
  public function __construct($params)
  {
    $this->params = $params;
  }

  /**
  * Build the message.
  *
  * @return $this
  */
  public function build()
  {
    $this->params['title'] = 'Member Activation';
    return $this->subject($this->params['title'])
      ->view('webadmin.letters.activation', [
      'data' => $this->params
    ]);
  }
}
