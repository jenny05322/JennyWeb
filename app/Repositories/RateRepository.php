<?php

namespace App\Repositories;

use \DOMDocument;
use GuzzleHttp\Client;

class RateRepository
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

    public function getCurrentRates()
    {
        set_time_limit(0);

        $url = 'https://rate.bot.com.tw/xrt';

        // curl
        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, $url);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, false);
        $contents = curl_exec($curl_handle);
        if ($contents === false) {
            echo curl_error($curl_handle) . "<br>";
            echo curl_errno($curl_handle) . "<br>";
        }
        curl_close($curl_handle);

        $contents = str_replace("\r\n", '', $contents);

        // new DOMDocument
        $dom = new DOMDocument;
        libxml_use_internal_errors(true);
        $dom->loadHTML($contents);
        libxml_clear_errors();

        $trItems = $dom->getElementsByTagName('tr');
        $output = [];
        foreach ($trItems as $key => $trItem) {
            if (in_array($key, [0, 1])) {
                continue;
            }
            $trValue = array_values(array_unique(explode(' ', $trItem->nodeValue)));

            // 取得幣別
            preg_match('/([A-Z]{3})/', $trValue[2], $matches);
            $name = $matches[0];
            // 取得即期買入匯率
            if ($trValue[5] == '-') {
                $todayBuy = 0;
            } else {
                $todayBuy = $trValue[5];
            }

            if (isset($name) && isset($todayBuy)) {
                $output[$name] = $todayBuy;
            }
        }

        return $output;
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
