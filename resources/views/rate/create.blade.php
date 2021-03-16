@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>新增</h1>

        {!! Form::open(['route' => 'rate.store', 'class' => 'form-horizontal']) !!}
            <div class="form-group row">
                <label for="who" class="col-sm-2 col-form-label">誰的</label>
                <div class="col-sm-10">
                  {!! Form::select(
                        'who',
                        [
                            App\Rate::WHO_ME => '我',
                            App\Rate::WHO_MOTHER => '媽媽'
                        ],
                        null,
                        ['class' => 'form-control']
                    ) !!}
                </div>
            </div>
            <div class="form-group row">
                <label for="date" class="col-sm-2 col-form-label">交易日期</label>
                <div class="col-sm-10">
                    {!! Form::date('date', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row">
                <label for="currency" class="col-sm-2 col-form-label">幣別</label>
                <div class="col-sm-10">
                    {!! Form::select(
                        'currency',
                        $dollers,
                        null,
                        ['class' => 'form-control']
                    ) !!}
                </div>
            </div>
            <div class="form-group row">
                <label for="buy_or_sale" class="col-sm-2 col-form-label">買入/賣出</label>
                <div class="col-sm-10">
                  {!! Form::select(
                        'buy_or_sale',
                        [
                            App\Rate::BUY => '買入',
                            App\Rate::SALE => '賣出'
                        ],
                        null,
                        ['class' => 'form-control']
                    ) !!}
                </div>
            </div>
            <div class="form-group row">
                <label for="money" class="col-sm-2 col-form-label">交易金額</label>
                <div class="col-sm-10">
                  {!! Form::text('money', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row">
                <label for="rate" class="col-sm-2 col-form-label">交易匯率</label>
                <div class="col-sm-10">
                  {!! Form::text('rate', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row">
                <label for="money_TWD" class="col-sm-2 col-form-label">台幣金額</label>
                <div class="col-sm-10">
                  {!! Form::number('money_TWD', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    {!! Form::submit('送出', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection
