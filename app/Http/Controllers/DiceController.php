<?php

namespace App\Http\Controllers;

use Image;
use Storage;

class DiceController extends Controller
{
    public function merge($dices, $previewImage, $timestamp)
    {
        $imageWidhtUnit = strlen($dices);
        $diceAry = str_split($dices);


        $img = Image::canvas(125 * $imageWidhtUnit, 125, '#ffffff');

        foreach ($diceAry as $key => $dice) {
            $img->insert(storage_path('app/images/' . $dice . '.png'), 'top-left', $key * 125, 0);
        }

        if ($previewImage) {
            $img->resize(240, 240);
        }

        return $img->response('jpg');
    }
}
