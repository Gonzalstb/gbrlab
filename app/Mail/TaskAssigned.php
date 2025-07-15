<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Task;
use App\Models\User;

class TaskAssigned extends Mailable
{
    use Queueable, SerializesModels;

    public $task;
    public $assigner;

    /**
     * Create a new message instance.
     */
    public function __construct(Task $task, User $assigner)
    {
        $this->task = $task;
        $this->assigner = $assigner;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Task Assigned',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.tasks.assigned',
        );
    }

    public function build(): self
    {
        return $this->markdown('emails.tasks.assigned')
            ->subject(__('Nueva tarea asignada: ') . $this->task->title)
            ->with([
                'task' => $this->task,
                'assigner' => $this->assigner,
            ]);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
