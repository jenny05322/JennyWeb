<?php

use LINE\LINEBot;
use App\LineUser;
use App\Maze\Maze;
use App\WebhookLog;
use App\Maze\MazeBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot\MessageBuilder\ImageMessageBuilder;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\LINEBot\MessageBuilder\StickerMessageBuilder;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('lineBotWebhook', function (Request $request) {
    // LOG
    WebhookLog::create([
        'content' => json_encode($request->all()),
    ]);

    // 參數
    $replyToken = $request->events[0]['replyToken'];
    $userId = $request->events[0]['source']['userId'];
    $targetType = $request->events[0]['source']['type'];
    $targetId = $request->events[0]['source'][$targetType . 'Id'];
    $message = $request->events[0]['message'];

    // 建立機器人
    $httpClient = new CurlHTTPClient(env('LINE_BOT_CHANNEL_TOKEN'));
    $bot = new LINEBot($httpClient, ['channelSecret' => env('LINE_BOT_CHANNEL_SECRET')]);

    // 取得 user
    $response = $bot->getProfile($userId);
    if ($response->isSucceeded()) {
        $profile = $response->getJSONDecodedBody();

        $lineUser = LineUser::find($userId);
        if ($lineUser) {
            $lineUser->update([
                'userId'        => $profile['userId'],
                'displayName'   => isset($profile['displayName']) ? $profile['displayName'] : '',
                'pictureUrl'    => isset($profile['pictureUrl']) ? $profile['pictureUrl'] : '',
                'statusMessage' => isset($profile['statusMessage']) ? $profile['statusMessage'] : '',
            ]);
        } else {
            LineUser::create([
                'userId'        => $profile['userId'],
                'displayName'   => isset($profile['displayName']) ? $profile['displayName'] : '',
                'pictureUrl'    => isset($profile['pictureUrl']) ? $profile['pictureUrl'] : '',
                'statusMessage' => isset($profile['statusMessage']) ? $profile['statusMessage'] : '',
            ]);
        }
    }

    // if ($message['type'] == 'text') {
    //     $text = $message['text'];
    //     if ($text == '丹丹機器人 -h') {
    //         $replyMessageText = "歡迎使用丹丹機器人\n\n指令說明：\nmaze:create {寬} {高}：產生寬 * 高大小的迷宮\nmaze:show：顯示迷宮\nmaze:showAnswer：顯示迷宮（含答案）\nmaze:close：結束迷宮";

    //         $textMessageBuilder = new TextMessageBuilder($replyMessageText);
    //         $response = $bot->replyMessage($replyToken, $textMessageBuilder);
    //     } elseif (substr($text, 0, 11) == 'maze:create') {
    //         $textAry = explode(' ', $text);
    //         $width = $textAry[1];
    //         $height = $textAry[2];

    //         $maze = Maze::where('targetType', $targetType)
    //                     ->where('targetId', $targetId)
    //                     ->first();
    //         if ($maze) {
    //             $replyMessageText = "已存在一個迷宮，結束遊戲，才能開新的";
    //         } else {
    //             if ($width * $height > 100) {
    //                 $replyMessageText = "迷宮太大了，寬 * 高要小於 100";
    //             } else {
    //                 // 產生迷宮
    //                 $MazeBuilder = new MazeBuilder();
    //                 $MazeBuilder->set($width, $height);
    //                 $MazeBuilder->create();
    //                 $mazeData = $MazeBuilder->get();

    //                 // 存入迷宮資料庫
    //                 Maze::create([
    //                     'targetType' => $targetType,
    //                     'targetId'   => $targetId,
    //                     'width'      => $width,
    //                     'height'     => $height,
    //                     'mazeData'   => serialize($mazeData),
    //                 ]);

    //                 $replyMessageText = "迷宮建立成功";
    //             }
    //         }

    //         // 回復訊息
    //         $textMessageBuilder = new TextMessageBuilder($replyMessageText);
    //         $response = $bot->replyMessage($replyToken, $textMessageBuilder);
    //     } elseif ($text == 'maze:5*5') {
    //         $maze = Maze::where('targetType', $targetType)
    //                     ->where('targetId', $targetId)
    //                     ->first();
    //         if ($maze) {
    //             $replyMessageText = "已存在一個迷宮，結束遊戲，才能開新的";
    //         } else {
    //             // 產生迷宮
    //             $MazeBuilder = new MazeBuilder();
    //             $MazeBuilder->set(5, 5);
    //             $MazeBuilder->create();
    //             $mazeData = $MazeBuilder->get();

    //             // 存入迷宮資料庫
    //             Maze::create([
    //                 'targetType' => $targetType,
    //                 'targetId'   => $targetId,
    //                 'width'      => 5,
    //                 'height'     => 5,
    //                 'mazeData'   => serialize($mazeData),
    //             ]);

    //             $replyMessageText = "迷宮建立成功";
    //         }

    //         // 回復訊息
    //         $textMessageBuilder = new TextMessageBuilder($replyMessageText);
    //         $response = $bot->replyMessage($replyToken, $textMessageBuilder);
    //     } elseif ($text == 'maze:show' || $text == 'maze:showAnswer') {
    //         $maze = Maze::where('targetType', $targetType)
    //                 ->where('targetId', $targetId)
    //                 ->first();
    //         if ($maze) {
    //             $imageMessageBuilder = new ImageMessageBuilder(
    //                 route('maze.show', [$targetType, $targetId, 0, ($text == 'maze:showAnswer') ? 1 : 0, time()]),
    //                 route('maze.show', [$targetType, $targetId, 1, ($text == 'maze:showAnswer') ? 1 : 0, time()])
    //             );
    //             $response = $bot->replyMessage($replyToken, $imageMessageBuilder);
    //         } else {
    //             $textMessageBuilder = new TextMessageBuilder("目前沒有迷宮喔！");
    //             $response = $bot->replyMessage($replyToken, $textMessageBuilder);
    //         }
    //     } elseif ($text == 'maze:close') {
    //         $maze = Maze::where('targetType', $targetType)
    //                 ->where('targetId', $targetId)
    //                 ->delete();

    //         $textMessageBuilder = new TextMessageBuilder('迷宮刪除成功');
    //         $response = $bot->replyMessage($replyToken, $textMessageBuilder);
    //     } elseif (in_array(strtolower($text), ['w', 'a', 's', 'd'])) {
    //         $maze = Maze::where('targetType', $targetType)
    //                 ->where('targetId', $targetId)
    //                 ->first();

    //         if ($maze) {
    //             $mazeData = unserialize($maze->mazeData);
    //             $newLocation = $maze->location;

    //             if (strtolower($text) == 'w' && in_array($mazeData[$maze->location], [1,3,5,7,9,11,13,15,16])) {
    //                 $direction = '上';
    //                 $newLocation = $maze->location - $maze->width;
    //             } elseif (strtolower($text) == 'a' && in_array($mazeData[$maze->location], [8,9,10,11,12,13,14,15,16])) {
    //                 $direction = '左';
    //                 $newLocation = $maze->location - 1;
    //             } elseif (strtolower($text) == 's' && in_array($mazeData[$maze->location], [4,5,6,7,12,13,14,15,16])) {
    //                 $direction = '下';
    //                 $newLocation = $maze->location + $maze->width;
    //             } elseif (strtolower($text) == 'd' && in_array($mazeData[$maze->location], [2,3,6,7,10,11,14,15,16])) {
    //                 $direction = '右';
    //                 $newLocation = $maze->location + 1;
    //             } else {
    //                 $textMessageBuilder = new TextMessageBuilder('此路不通');
    //             }

    //             if ($newLocation == ($maze->width * $maze->height - 1)) {
    //                 $textMessageBuilder = new TextMessageBuilder('恭喜你到達終點啦！');
    //                 $maze->delete();
    //             } elseif ($newLocation != $maze->location) {
    //                 $maze->update([
    //                     'location' => $newLocation,
    //                 ]);

    //                 $textMessageBuilder = new TextMessageBuilder("你往{$direction}走了一步，現在位置：$newLocation");
    //             }

    //             $response = $bot->replyMessage($replyToken, $textMessageBuilder);
    //         }
    //     }
    // }

    // 訊息
    // $textMessageBuilder = new TextMessageBuilder('愛你喔！');
    // $stickerMessageBuilder = new StickerMessageBuilder(2, 141);

    // 回應，只能一個
    // $response = $bot->replyMessage($replyToken, $textMessageBuilder);

    // 主動發訊息
    // $response = $bot->pushMessage($userId, $stickerMessageBuilder);

    echo 'success';
});
