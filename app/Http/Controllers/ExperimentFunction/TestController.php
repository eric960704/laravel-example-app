<?php

namespace App\Http\Controllers\ExperimentFunction;

use App\Http\Controllers\Controller;
use App\Jobs\ProcessPodcast;
use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\Api;

class TestController extends Controller
{
    public function testCreateQueue()
    {
        ProcessPodcast::dispatch()->delay(5);

        return 'done';
    }

    public function testTelegramBot()
    {
        $telegram = new Api(config('services.telegram-bot-api.token'));
        $response = $telegram->getMe();
        Telegram::sendMessage([
            'chat_id' => config('services.telegram_user_id'),
            'text' => '123',
        ]);

        return $response;
    }
}
