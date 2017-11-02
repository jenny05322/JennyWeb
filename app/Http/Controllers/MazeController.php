<?php

namespace App\Http\Controllers;

use Image;
use Storage;
use App\Maze\Maze;
use App\Maze\Answer;

class MazeController extends Controller
{
    private $img;
    private $path;
    private $showAnswer;

    public function show($targetType, $targetId, $previewImage, $showAnswer, $timestamp)
    {
        // init
        $this->showAnswer = $showAnswer;

        $maze = Maze::where('targetType', $targetType)
                    ->where('targetId', $targetId)
                    ->first();
        if ($maze) {
            $this->img = Image::canvas($maze->width * 35, $maze->height * 35, '#f5f5f5');
            $mazeData = unserialize($maze->mazeData);

            if ($this->showAnswer) {
                $answer = new Answer();
                $answer->set($maze->width, $maze->height, $mazeData);
                $this->path = $answer->search(0, $maze->width * $maze->height - 1);
            }

            for ($i = 0; $i < $maze->height; $i++) {
                for ($j = 0; $j < $maze->width; $j++) {
                    $block = $i * $maze->width + $j;
                    $cell = $mazeData[$block];
                    $this->drawBlock($block, $cell, $j * 35, $i * 35);
                }
            }

            $this->img->circle(25, 17.5 + ($maze->location % 5 * 35), 17.5 + (floor($maze->location / 5) * 35), function ($draw) {
                $draw->border(5, 'ff0000');
            });

            if ($previewImage) {
                $this->img->resize(240, 240);
            }

            return $this->img->response('jpg');
        }
    }

    public function drawBlock($block, $cell, $x, $y)
    {
        $this->img->text($block, 14 + $x, 20 + $y, function ($font) use ($block) {
            if ($this->showAnswer && in_array($block, $this->path)) {
                $font->color('#ff000');
            } else {
                $font->color('#00000');
            }
        });

        // 牆壁
        // 上
        if (in_array($cell, [2,4,6,8,10,12,14])) {
            $this->img->rectangle(0 + $x, 0 + $y, 35 + $x, 5 + $y, function ($draw) {
                $draw->background('#93a69d');
                $draw->border(1, '#626a65');
            });
        }

        // 左
        if (in_array($cell, [1,2,3,4,5,6,7])) {
            $this->img->rectangle(0 + $x, 0 + $y, 5 + $x, 35 + $y, function ($draw) {
                $draw->background('#93a69d');
                $draw->border(1, '#626a65');
            });
        }

        // 下
        if (in_array($cell, [1,2,3,8,9,10,11])) {
            $this->img->rectangle(0 + $x, 35 + $y, 35 + $x, 30 + $y, function ($draw) {
                $draw->background('#93a69d');
                $draw->border(1, '#626a65');
            });
        }

        // 右
        if (in_array($cell, [1,4,5,8,9,12,13])) {
            $this->img->rectangle(30 + $x, 0 + $y, 35 + $x, 35 + $y, function ($draw) {
                $draw->background('#93a69d');
                $draw->border(1, '#626a65');
            });
        }

        // 牆角
        // 左上
        if (in_array($cell, [9,11,13,15])) {
            $this->img->rectangle(0 + $x, 0 + $y, 5 + $x, 5 + $y, function ($draw) {
                $draw->background('#93a69d');
                $draw->border(1, '#626a65');
            });
        }

        // 左下
        if (in_array($cell, [12,13,14,15])) {
            $this->img->rectangle(0 + $x, 30 + $y, 5 + $x, 35 + $y, function ($draw) {
                $draw->background('#93a69d');
                $draw->border(1, '#626a65');
            });
        }

        // 右下
        if (in_array($cell, [6,7,14,15])) {
            $this->img->rectangle(30 + $x, 30 + $y, 35 + $x, 35 + $y, function ($draw) {
                $draw->background('#93a69d');
                $draw->border(1, '#626a65');
            });
        }

        // 右上
        if (in_array($cell, [3,7,11,15])) {
            $this->img->rectangle(30 + $x, 0 + $y, 35 + $x, 5 + $y, function ($draw) {
                $draw->background('#93a69d');
                $draw->border(1, '#626a65');
            });
        }
    }
}
