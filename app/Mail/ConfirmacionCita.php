<?php

namespace App\Mail;

use App\Models\Cita;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ConfirmacionCita extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * La instancia de la cita.
     *
     * @var Cita
     */
    public $cita;

    /**
     * Crear una nueva instancia de mensaje.
     */
    public function __construct(Cita $cita)
    {
        $this->cita = $cita;
    }

    /**
     * Obtener el sobre del mensaje (Envelope).
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '✨ Tu Cita en AppSalon está Agendada — Confirmación',
        );
    }

    /**
     * Obtener la definición del contenido del mensaje (Content).
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.confirmacion-cita',
        );
    }

    /**
     * Obtener los adjuntos del mensaje.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
