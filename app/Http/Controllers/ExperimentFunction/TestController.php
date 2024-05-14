<?php

namespace App\Http\Controllers\ExperimentFunction;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExperimentFunction\TestRequest;
use App\Jobs\ProcessPodcast;
use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\Api;
use Illuminate\Support\Facades\Http;
use WebSocket\Client;
use WebSocket\Middleware\CloseHandler;
use WebSocket\Middleware\PingResponder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function getWeather(Request $request)
    {
        $url = config('centralWeather.api.url');
        $url = $url . '?Authorization=' . config('centralWeather.api.authorization') . '&limit=' . $request->limit . '&locationName=' . urlencode($request->location);
        $response = Http::get($url);

        return $response->json();
    }

    public function connectBinanceWebsocket()
    {   
        $client = new Client("wss://ws-api.binance.com:443/ws-api/v3");

        $client->addMiddleware(new CloseHandler())->addMiddleware(new PingResponder());
        # send json message to server
        $client->text('{
            "id": "922bcc6e-9de8-440d-9e84-7c80933a8d0d",
            "method": "ping"
          }');
        
        $message = $client->receive();

        return $message;
    }

    public function testStorage(TestRequest $request)
    {
        $file = $request->file('image');

        $contents = file_get_contents($file->path());

        Storage::put('images/image1.png', $contents);
        
        return 'done';
    }
}
