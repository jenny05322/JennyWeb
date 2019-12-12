@extends('layouts.app')

@section('content')
<div class="container-fluid" style="padding: 0 15px;">
    <h1>股票資訊</h1>

    @foreach ($output as $dollerName => $priceInfo)
        @if ($priceInfo['buyOrSale'] == 'buy')
            聽說今天 <strong>{{ $dollerName }}</strong> 是六個月內最高價：{{ $priceInfo['price'] }}，不賣嗎？<br>
        @elseif ($priceInfo['buyOrSale'] == 'sale')
            聽說今天 <strong>{{ $dollerName }}</strong> 是六個月內最低價：{{ $priceInfo['price'] }}，不賣嗎？<br>
        @endif
    @endforeach

</div>
@endsection
