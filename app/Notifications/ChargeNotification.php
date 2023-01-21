<?php

namespace App\Notifications;

    use App\Models\Payment;
    use App\Models\User;
    use Illuminate\Bus\Queueable;
    use Illuminate\Notifications\Messages\MailMessage;
    use Illuminate\Notifications\Notification;

    class ChargeNotification extends Notification
    {
        use Queueable;

        private $payment;

        /**
         * Create a new notification instance.
         *
         * @return void
         */
        public function __construct(Payment $payment)
        {
            $this->payment = $payment;
        }

        /**
         * Get the notification's delivery channels.
         *
         * @param  mixed  $notifiable
         * @return array
         */
        public function via(mixed $notifiable): array
        {
            return ['mail'];
        }

        /**
         * Get the mail representation of the notification.
         *
         * @param  mixed  $notifiable
         * @return MailMessage
         */
        public function toMail(mixed $notifiable): MailMessage
        {
            return (new MailMessage)
                ->subject('Payment notification.')
                ->salutation('Hello'.$this->payment->user->name)
                ->line('Your payment of'.$this->payment->getFormattedSubtotal(). 'have been successfully received')
                ->line('Thank you for using our application!');
        }

        /**
         * Get the array representation of the notification.
         *
         * @param  mixed  $notifiable
         * @return array
         */
        public function toArray(mixed $notifiable): array
        {
            return [
                //
            ];
        }
    }
