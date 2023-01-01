<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\ContactMeNotify;
use App\Notifications\NewRequest;
use Illuminate\Support\Facades\Notification;
use NotificationChannels\Telegram\TelegramUpdates;
use App\Http\Requests\ContactMe as RequestsContactMe;
use App\Models\ContactMe as ModelsContactMe;
use Exception;

class ContactMe extends Controller
{
    public function sendMessage (RequestsContactMe $request) {
        try {
            $user = User::find(1);

            Notification::send($user, new NewRequest());

            ModelsContactMe::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone ? $request->phone : 'Без телефону',
                'msg' => $request->msg ? $request->msg : 'Без тексту'
            ]);

            // $updates = TelegramUpdates::create()
            //     // (Optional). Get's the latest update. NOTE: All previous updates will be forgotten using this method.
            //     // ->latest()

            //     // (Optional). Limit to 2 updates (By default, updates starting with the earliest unconfirmed update are returned).
            //     ->limit(2)

            //     // (Optional). Add more params to the request.
            //     ->options([
            //         'timeout' => 0,
            //     ])
            //     ->get();

            // if ($updates['ok']) {
            //     foreach ($updates['result'] as $update) {
            //         Notification::send($user, new ContactMeNotify($update['message']['chat']['id'], [
            //             'name' => $request->name,
            //             'email' => $request->email,
            //             'phone_number' => $request->phone ? $request->phone : 'Без телефону',
            //             'msg' => $request->msg ? $request->msg : 'Без тексту'
            //         ]));
            //     }
            // }

            Notification::send($user, new ContactMeNotify(config('app.my_telegram_id'), [
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone ? $request->phone : 'Без телефону',
                'msg' => $request->msg ? $request->msg : 'Без тексту'
            ]));
        } catch (Exception $e) {
            return response()->json(false);
        }

        return response()->json(true);
    }
}
