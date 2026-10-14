<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/**
 * Welcome mail for new newsletter subscribers (single opt-in confirmation).
 * Sent synchronously AFTER the entry is stored, so a mail outage can
 * never lose the signup or break the UX (see newsletter component).
 */
class NewsletterWelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public string $email) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            from: config('mail.from.address', 'office@websters.at'),
            subject: 'Danke für deine Anmeldung – Websters',
        );
    }

    public function content(): Content
    {
        $unsub = 'mailto:' . config('mail.from.address', 'office@websters.at')
            . '?subject=' . rawurlencode('Newsletter abmelden');
        $html = '<h2>Danke für deine Anmeldung!</h2>'
            . '<p>Du erhältst ab jetzt unregelmäßig Angebote und Neuigkeiten von Websters '
            . '(Webdesign, Software, IT-Consulting). Kein Spam – versprochen.</p>'
            . '<p>Abmelden jederzeit per Mail an '
            . '<a href="' . e($unsub) . '">' . e(config('mail.from.address', 'office@websters.at')) . '</a>.</p>'
            . '<p>Dein Websters-Team<br><a href="https://websters.at">websters.at</a></p>';

        return new Content(htmlString: $html);
    }
}
