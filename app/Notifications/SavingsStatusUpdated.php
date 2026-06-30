<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SavingsStatusUpdated extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $transaction;
    public $status;

    /**
     * Create a new notification instance.
     */
    public function __construct($transaction, $status)
    {
        $this->transaction = $transaction;
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
            'title' => 'Status Setoran Diperbarui',
            'message' => 'Setoran simpanan ' . $this->transaction->type . ' Anda sebesar Rp ' . number_format($this->transaction->amount, 0, ',', '.') . ' telah ' . $statusText . '.',
            'transaction_id' => $this->transaction->id,
            'url' => route('savings.index')
        ];
    }
}
