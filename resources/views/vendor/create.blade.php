@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>新增</h1>

        {!! Form::open(['route' => 'vendor.store', 'class' => 'form-horizontal']) !!}
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">店家名稱</label>
                <div class="col-sm-10">
                  {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row">
                <label for="phone" class="col-sm-2 col-form-label">電話</label>
                <div class="col-sm-10">
                  {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row">
                <label for="address" class="col-sm-2 col-form-label">地址</label>
                <div class="col-sm-10">
                  {!! Form::text('address', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row">
                <label for="web" class="col-sm-2 col-form-label">網站</label>
                <div class="col-sm-10">
                  {!! Form::text('web', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row">
                <label for="note" class="col-sm-2 col-form-label">備註</label>
                <div class="col-sm-10">
                  {!! Form::textarea('note', null, ['class' => 'form-control']) !!}
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
