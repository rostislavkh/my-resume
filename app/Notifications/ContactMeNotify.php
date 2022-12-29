<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\Telegram\TelegramMessage;

class ContactMeNotify extends Notification
{
    use Queueable;

    public $chat_id;
    public $content;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($chat_id, $content)
    {
        $this->chat_id = $chat_id;
        $this->content = $content;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ["telegram"];
    }

    public function toTelegram($notifiable)
    {
        try {
            $statis_deads_orks = json_decode(file_get_contents('https://russianwarship.rip/api/v1/statistics/latest'), true);
        } catch (\Exception $e) {
            $statis_deads_orks = null;
        }

        $count_orks = '';

        if (isset($statis_deads_orks['data']) && isset($statis_deads_orks['data']['stats']) && isset($statis_deads_orks['data']['stats']['personnel_units'])) {
            $count_orks = $statis_deads_orks['data']['stats']['personnel_units'];
        }

        return TelegramMessage::create()
            ->to($this->chat_id)
            ->content("Привіт. На сайті з твоїм резюме залиши контакти:\n\n👇👇👇👇👇\n\n")
            ->line('✏ *Як звертатися -* `' . $this->content['name'] . '`')
            ->line('✉ *Email -* ' . $this->content['email'])
            ->line('📞 *Номер телефону -* `' . $this->content['phone_number'] . '`')
            ->line('')
            ->line('----------------------------Коментар--------------------------')
            ->line('')
            ->line($this->content['msg'])
            ->line('')
            ->line('---------------------------------------------------------------------')
            ->line('Станом на *сьогодні*, кількість дохлих орків становить 👉 *' . $count_orks . '* довбнів, які приперлися в україну!!! 🥳')
            ->line('')
            ->line('Слава ЗСУ та всім хто боронить Україну!!! 💪😎🇺🇦')
            ->button('Перейти до адмін панелі', route('platform.main'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    // public function toArray($notifiable)
    // {
    //     return [
    //         //
    //     ];
    // }
}
