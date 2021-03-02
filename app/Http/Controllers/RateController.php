<?php

namespace App\Http\Controllers;

use App\Rate;
use App\Repositories\RateRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RateController extends Controller
{
    protected $rateRepository;

    public function __construct(RateRepository $repository)
    {
        $this->rateRepository = $repository;
    }

    public function index(Request $request)
    {
        $currentRates = $this->rateRepository->getCurrentRates();
        $currencyRates = Rate::orderBy('date')->get()->groupBy('currency')->map(function ($rates, $currency) use ($currentRates) {
            $realized_profit = $rates->sum('realized_profit');
            $total = 0;
            $totalTWD = 0;
            foreach ($rates as $rate) {
                if ($rate->buy_or_sale == Rate::BUY) {
                    $total += $rate->money;
                    $totalTWD += $rate->money_TWD;
                } else {
                    $total -= $rate->money;
                    $totalTWD -= $rate->money_TWD;
                }
            }
            $totalTWD += $realized_profit;
            if ($total) {
                $avgRate = $totalTWD / $total;
            } else {
                $avgRate = 0;
            }
            $unrealized_profit = ($currentRates[$currency] * $total) - ($avgRate * $total);

            return [
                'realized_profit'   => $realized_profit,
                'unrealized_profit' => $unrealized_profit,
                'currentValue'      => $total * $currentRates[$currency],
                'total'             => $total,
                'totalTWD'          => $totalTWD,
                'avgRate'           => $avgRate,
                'rates'             => $rates,
            ];
        });

        return view('rate.index', [
            'currentRates'  => $currentRates,
            'currencyRates' => $currencyRates,
            'dollers'       => $this->rateRepository->getDollers()
        ]);
    }

    public function create()
    {
        return view('rate.create', [
            'dollers' => $this->rateRepository->getDollers()
        ]);
    }

    public function store(Request $request)
    {
        if (!$request->money) {
            $request['money'] = 0;
        }
        if (!$request->rate) {
            $request['rate'] = 0;
        }
        if (!$request->money_TWD) {
            $request['money_TWD'] = 0;
        }

        if ($request->buy_or_sale == Rate::SALE) {
            $rates = Rate::where('currency', $request->currency)->get();

            $total = 0;
            $totalTWD = 0;
            foreach ($rates as $rate) {
                if ($rate->buy_or_sale == Rate::BUY) {
                    $total += $rate->money;
                    $totalTWD += $rate->money_TWD;
                } else {
                    $total -= $rate->money;
                    $totalTWD -= $rate->money_TWD;
                }
            }
            $avgRate = $totalTWD / $total;

            $request['realized_profit'] = floor($request->money_TWD - ($avgRate * $request->money));
        }

        Rate::create($request->all());

        return redirect()->route('rate.index');
    }

    public function destroy(Rate $rate)
    {
        $rate->delete();

        return redirect()->route('rate.index');
    }
}
