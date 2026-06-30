<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InstallmentStatusUpdated extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $installment;
    public $status;

    /**
     * Create a new notification instance.
     */
    public function __construct($installment, $status)
    {
        $this->installment = $installment;
        $this->status = $status; // 'paid' or 'rejected'
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
        $statusText = $this->status === 'paid' ? 'disetujui' : 'ditolak';
        $totalPayment = $this->installment->amount_principal + $this->installment->amount_interest;
        return [
            'title' => 'Status Pembayaran Cicilan Diperbarui',
            'message' => 'Pembayaran cicilan Anda sebesar Rp ' . number_format($totalPayment, 0, ',', '.') . ' telah ' . $statusText . '.',
            'installment_id' => $this->installment->id,
            'url' => route('loans.show', $this->installment->loan_id)
        ];
    }
}
