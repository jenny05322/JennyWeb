<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Repositories\StockRepository;

class StockController extends Controller
{
    protected $stockRepository;

    public function __construct(StockRepository $repository)
    {
        $this->stockRepository = $repository;
    }

    public function index(Request $request)
    {
        $dollers = $this->stockRepository->getDollers();

        $output = [];
        foreach ($dollers as $doller => $dollerName) {
            $sixMonthPrices = $this->stockRepository->getSixMonthPrice($doller);
            $nowDate = Carbon::now()->format('Y/m/d');
            // $nowDate = '2019/10/24';

            $todayBuy = $sixMonthPrices->get($nowDate)['buy'];
            $todaySale = $sixMonthPrices->get($nowDate)['sale'];
            $todayBuyIsBig = true;
            $todaySaleIsSmall = true;
            $sixMonthPrices->each(function ($price, $date) use ($todayBuy, $todaySale, &$todayBuyIsBig, &$todaySaleIsSmall) {
                if ($price['buy'] > $todayBuy) {
                    $todayBuyIsBig = false;
                }

                if ($price['sale'] < $todaySale) {
                    $todaySaleIsSmall = false;
                }
            });

            if ($todayBuyIsBig) {
                // echo '聽說今天 <strong>' . $dollerName . '</strong> 是六個月內最高價：' . $todayBuy . '，不賣嗎？<br>';
                $output[$dollerName] = [
                    'buyOrSale' => 'buy',
                    'price'     => $todayBuy,
                ];
            }

            if ($todaySaleIsSmall) {
                // echo '聽說今天 <strong>' . $dollerName . '</strong> 是六個月內最低價：' . $todaySale . '，不買嗎？<br>';
                $output[$dollerName] = [
                    'buyOrSale' => 'sale',
                    'price'     => $todaySale,
                ];
            }
        }

        return view('stock.index', compact('output'));
    }
}
