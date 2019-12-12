@extends('layouts.app')

@section('content')
    <div class="container">
        {!! Form::open(['route' => 'vendor.random', 'class' => 'text-center', 'style' => 'margin-bottom: 50px;']) !!}
            {!! Form::submit('今天吃什麼？', ['class' => 'btn btn-lg btn-primary']) !!}
        {!! Form::close() !!}

        <hr>

        @if(isset($vendor))
            <div>
                <div>今天我們吃：</div>
                <div>
                    <a href="{{ route('vendor.show', $vendor->id) }}" class="btn btn-secondary btn-lg btn-block">{{ $vendor->name }}</a>
                </div>
            </div>
        @else
            <div>
                查無店家資料，請先 <a class="btn btn-xs btn-primary" href="{{ route('vendor.create') }}">新增</a> 店家！
            </div>
        @endif
    </div>
@endsection
