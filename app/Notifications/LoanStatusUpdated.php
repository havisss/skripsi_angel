<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LoanStatusUpdated extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $loan;
    public $status;

    /**
     * Create a new notification instance.
     */
    public function __construct($loan, $status)
    {
        $this->loan = $loan;
        $this->status = $status; // 'approved' or 'rejected'
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        $statusText = $this->status === 'approved' ? 'disetujui' : 'ditolak';
        return [
            'title' => 'Status Pinjaman Diperbarui',
            'message' => 'Pengajuan pinjaman Anda sebesar Rp ' . number_format($this->loan->amount, 0, ',', '.') . ' telah ' . $statusText . '.',
            'loan_id' => $this->loan->id,
            'url' => route('dashboard')
        ];
    }
}
