<?php

namespace App\Repositories;

use \DOMDocument;

class StockRepository
{
    private $dollers = [
        'USD' => '美元',
        'HKD' => '港幣',
        'GBP' => '英鎊',
        'AUD' => '澳幣',
        'CAD' => '加拿大幣',
        'SGD' => '新加坡',
        'CHF' => '瑞士法郎',
        'JPY' => '日圓',
        'EUR' => '歐元',
        'NZD' => '紐幣',
        'ZAR' => '南非幣',
        'SEK' => '瑞典克朗幣',
        'CNY' => '人民幣',
    ];

    public function getDollers()
    {
        return collect($this->dollers);
    }

    public function getSixMonthPrice($doller)
    {
        $url = 'https://rate.bot.com.tw/xrt/quote/l6m/' . $doller;
        $contents = file_get_contents($url);

        $dom = new DOMDocument;
        libxml_use_internal_errors(true);
        $dom->loadHTML($contents);
        libxml_clear_errors();

        $trItems = $dom->getElementsByTagName('tr');

        $data = [];
        foreach ($trItems as $key => $trItem) {
            if (in_array($key, [0, 1])) {
                continue;
            }
            foreach ($trItem->childNodes as $key2 => $tdItem) {
                if ($key2 == 1) {
                    $currentDate = $tdItem->nodeValue;
                } elseif ($key2 == 9) {
                    $data[$currentDate]['buy'] = $tdItem->nodeValue;
                } elseif ($key2 == 11) {
                    $data[$currentDate]['sale'] = $tdItem->nodeValue;
                }
            }
        }

        return collect($data);
    }
}
