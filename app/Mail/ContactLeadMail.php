<?php

namespace App\Mail;

use App\Models\Lead;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/**
 * Notifies the Websters inbox about a new contact-form lead.
 * Sent synchronously AFTER the lead is stored, so a mail outage
 * can never lose the lead (see contact component).
 */
class ContactLeadMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Lead $lead) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            from: config('mail.from.address', 'office@websters.at'),
            replyTo: [$this->lead->email],
            subject: 'Neue Kontaktanfrage: ' . mb_substr($this->lead->name, 0, 60),
        );
    }

    public function content(): Content
    {
        $lead = $this->lead;
        $html = '<h2>Neue Kontaktanfrage über websters.at</h2>'
            . '<p><strong>Name:</strong> ' . e($lead->name) . '</p>'
            . '<p><strong>E-Mail:</strong> ' . e($lead->email) . '</p>'
            . '<p><strong>Firma:</strong> ' . e($lead->company ?: '–') . '</p>'
            . '<p><strong>Nachricht:</strong><br>' . nl2br(e($lead->message ?: '–')) . '</p>'
            . '<p style="color:#888">Lead-ID ' . e((string) $lead->id) . ' · ' . e((string) $lead->created_at) . '</p>';

        return new Content(htmlString: $html);
    }
}
