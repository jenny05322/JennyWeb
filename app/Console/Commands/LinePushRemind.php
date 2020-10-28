<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use LINE\LINEBot;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;

class LinePushRemind extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'line:push-remind';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remind to clock in / out.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $httpClient = new CurlHTTPClient(env('LINE_BOT_CHANNEL_TOKEN'));
        $bot = new LINEBot($httpClient, ['channelSecret' => env('LINE_BOT_CHANNEL_SECRET')]);

        $textMessageBuilder = new TextMessageBuilder('test');
        $response = $bot->pushMessage('Cf08f81a0da6b777c6e5c2b25d6721083', $textMessageBuilder);

        dd($response->getHTTPStatus() . ' ' . $response->getRawBody());
    }
}
