<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewLoanApplication extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $loan;
    public $memberName;

    /**
     * Create a new notification instance.
     */
    public function __construct($loan, $memberName)
    {
        $this->loan = $loan;
        $this->memberName = $memberName;
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
        return [
            'title' => 'Pengajuan Pinjaman Baru',
            'message' => $this->memberName . ' telah mengajukan pinjaman sebesar Rp ' . number_format($this->loan->amount, 0, ',', '.'),
            'loan_id' => $this->loan->id,
            'url' => route('admin.loans.index')
        ];
    }
}
