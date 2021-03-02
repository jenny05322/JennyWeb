@extends('layouts.app')

@section('content')
    <div class="container" style="padding: 0 15px;">
        <h1>外匯資訊</h1>

        <div class="border mb-3">
            <div class="row p-3">
                <div class="col-4">
                    <div class="text-secondary">持有外匯市值</div>
                    <span class="font-weight-bold" style="font-size: 24px;">${{ number_format($currencyRates->sum('currentValue')) }}</span>
                </div>
                <div class="col-4">
                    <div class="text-secondary">已實現損益</div>
                    <div class="font-weight-bold @if ($currencyRates->sum('realized_profit') >= 0) text-danger @else text-success @endif" style="font-size: 24px;">
                        @if ($currencyRates->sum('realized_profit') >= 0)
                            <i class="fas fa-caret-up"></i>
                        @else
                            <i class="fas fa-caret-down"></i>
                        @endif
                        {{ number_format(abs($currencyRates->sum('realized_profit'))) }}
                    </div>
                </div>
                <div class="col-4">
                    <div class="text-secondary">未實現損益</div>
                    <div class="font-weight-bold @if ($currencyRates->sum('unrealized_profit') >= 0) text-danger @else text-success @endif" style="font-size: 24px;">
                        @if ($currencyRates->sum('unrealized_profit') >= 0)
                            <i class="fas fa-caret-up"></i>
                        @else
                            <i class="fas fa-caret-down"></i>
                        @endif
                        {{ number_format(abs($currencyRates->sum('unrealized_profit'))) }}
                    </div>
                </div>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>幣別</th>
                    <th class="text-right">目前匯率</th>
                    <th class="text-right">持有金額</th>
                    <th class="text-right">持有匯率均價</th>
                    <th class="text-right">市值</th>
                    <th class="text-right">已實現損益</th>
                    <th class="text-right">未實現損益</th>
                    <th class="text-right">交易筆數</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($currencyRates as $currency => $rates)
                    <tr class="table-secondary">
                        <td class="bg-light currency-detail" data-toggle="collapse" href="#{{ $currency }}-detail"><i class="fas fa-chevron-down"></i><i class="fas fa-chevron-up d-none"></i></td>
                        <td class="bg-light">
                            <a href="https://rate.bot.com.tw/xrt/quote/l6m/{{ $currency }}" target="_blank">{{ $dollers[$currency] }} ({{ $currency }})</a>
                        </td>
                        <td class="bg-light text-right">
                            @if ($currentRates[$currency] - $rates['avgRate'] > 0)
                                <span class="text-danger"><i class="fas fa-caret-up"></i> {{ $currentRates[$currency] }}</span>
                            @elseif ($currentRates[$currency] - $rates['avgRate'] < 0)
                                <span class="text-success"><i class="fas fa-caret-down"></i> {{ $currentRates[$currency] }}</span>
                            @else
                                {{ $currentRates[$currency] }}
                            @endif
                        </td>
                        <td class="bg-light text-right">
                            {{ number_format($rates['total'], 2) }}
                        </td>
                        <td class="bg-light text-right">
                            {{ number_format($rates['avgRate'], 3) }}
                        </td>
                        <td class="bg-light text-right">
                            {{ number_format($rates['currentValue']) }}
                        </td>
                        <td class="bg-light text-right">
                            @if ($rates['realized_profit'] > 0)
                                <span class="text-danger"><i class="fas fa-caret-up"></i> {{ number_format($rates['realized_profit']) }}</span>
                            @elseif ($rates['realized_profit'] < 0)
                                <span class="text-success"><i class="fas fa-caret-down"></i> {{ number_format(abs($rates['realized_profit'])) }}</span>
                            @else
                                {{ number_format($rates['realized_profit']) }}
                            @endif
                        </td>
                        <td class="bg-light text-right">
                            @if ($rates['unrealized_profit'] > 0)
                                <span class="text-danger"><i class="fas fa-caret-up"></i> {{ number_format($rates['unrealized_profit']) }}</span>
                            @elseif ($rates['unrealized_profit'] < 0)
                                <span class="text-success"><i class="fas fa-caret-down"></i> {{ number_format(abs($rates['unrealized_profit'])) }}</span>
                            @else
                                {{ number_format($rates['unrealized_profit']) }}
                            @endif
                        </td>
                        <td class="bg-light text-right">{{ $rates['rates']->count() }} 筆</td>
                    </tr>
                    <tr class="collapse" id="{{ $currency }}-detail">
                        <td colspan="9">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>交易日期</th>
                                        <th>買入/賣出</th>
                                        <th class="text-right">交易金額</th>
                                        <th class="text-right">交易匯率</th>
                                        <th class="text-right">台幣金額</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rates['rates'] as $rate)
                                        <tr>
                                            <td>{{ $rate->date }}</td>
                                            <td>
                                                @if ($rate->buy_or_sale == App\Rate::BUY)
                                                    買入
                                                @else
                                                    賣出
                                                @endif
                                            </td>
                                            <td class="text-right">{{ number_format($rate->money, 2) }}</td>
                                            <td class="text-right">{{ number_format($rate->rate, 3) }}</td>
                                            <td class="text-right">{{ $rate->money_TWD }}</td>
                                            <td class="text-right">
                                                {!! Form::open(['route' => ['rate.destroy', $rate->id], 'method' => 'delete', 'class' => 'form-horizontal']) !!}
                                                    <button class="btn btn-link" type="submit"><i class="far fa-trash-alt"></i></button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="9">
                            查無資料。
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@push('script')
    <script type="text/javascript">
        $(function () {
            $('.currency-detail').click(function () {
                $(this).find('i').toggleClass('d-none');
            });
        });
    </script>
@endpush
