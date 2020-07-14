<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class EmailNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    //  protected $msg;
    //  protected $user;
    public function __construct()
    {
        //
        // $this->msg = $msg;
        // $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'slack', TelegramChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // return (new MailMessage)->error()->subject('Error Mail')
        //             ->greeting('Hello')
        //             ->line('The introduction to the notification.')
        //             ->action('Notification Action', url('/'))
        //             ->line('Thank you for using our application!');

        // return (new MailMessage)->view('email.email-notification');

        return (new MailMessage)->greeting('Hello')
                                ->line('Welcome my friend welcome.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'msg'=>$this->msg,
        ];
    }

    // public function toDatabase(){
    //     return [
    //         'msg'=>$this->msg,
    //     ];
    // }


    public function toBroadCast($notifiable){
        return new BroadcastMessage([
            'msg'=>$this->msg,
        ]);
    }

    // public function broadcastType()
    // {
    //     return 'broadcast.message';
    // }


    public function toSlack($notifiable){
        // return (new SlackMessage)
        //         ->image('https://homepages.cae.wisc.edu/~ece533/images/airplane.png')
        //         ->content('This will display the Laravel logo next to the message');
        $url = '';
        return (new SlackMessage)
                ->success()
                ->content('Whoops! Something went wrong.');
                // ->attachment(function ($attachment) use ($url) {
                //     $attachment->title('Exception: File Not Found', $url)
                //                ->content('File [background.jpg] was *not found*.')
                //                ->markdown(['text']);
                
    }

    public function toTelegram($notifiable){
        
        return TelegramMessage::create()->to('1221842359')->content('Welcome my friend welcome');
    }
}
