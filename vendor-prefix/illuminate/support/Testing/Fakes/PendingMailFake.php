<?php
/**
 * @license MIT
 *
 * Modified by Vitalii Sili on 25-June-2025 using {@see https://github.com/BrianHenryIE/strauss}.
 */

namespace Archetype\Vendor\Illuminate\Support\Testing\Fakes;

use Archetype\Vendor\Illuminate\Contracts\Mail\Mailable;
use Illuminate\Mail\PendingMail;

class PendingMailFake extends PendingMail
{
    /**
     * Create a new instance.
     *
     * @param  \Archetype\Vendor\Illuminate\Support\Testing\Fakes\MailFake  $mailer
     */
    public function __construct($mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Send a new mailable message instance.
     *
     * @param  \Archetype\Vendor\Illuminate\Contracts\Mail\Mailable  $mailable
     * @return void
     */
    public function send(Mailable $mailable)
    {
        $this->mailer->send($this->fill($mailable));
    }

    /**
     * Send a new mailable message instance synchronously.
     *
     * @param  \Archetype\Vendor\Illuminate\Contracts\Mail\Mailable  $mailable
     * @return void
     */
    public function sendNow(Mailable $mailable)
    {
        $this->mailer->sendNow($this->fill($mailable));
    }

    /**
     * Push the given mailable onto the queue.
     *
     * @param  \Archetype\Vendor\Illuminate\Contracts\Mail\Mailable  $mailable
     * @return mixed
     */
    public function queue(Mailable $mailable)
    {
        return $this->mailer->queue($this->fill($mailable));
    }
}
