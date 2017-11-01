@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>編輯</h1>
        </div>

        {!! Form::model($vendor, ['route' => ['vendor.update', $vendor->id], 'method' => 'put', 'class' => 'form-horizontal']) !!}
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">店家名稱</label>
                <div class="col-sm-10">
                  {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <label for="phone" class="col-sm-2 control-label">電話</label>
                <div class="col-sm-10">
                  {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <label for="address" class="col-sm-2 control-label">地址</label>
                <div class="col-sm-10">
                  {!! Form::text('address', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <label for="web" class="col-sm-2 control-label">網站</label>
                <div class="col-sm-10">
                  {!! Form::text('web', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <label for="note" class="col-sm-2 control-label">備註</label>
                <div class="col-sm-10">
                  {!! Form::textarea('note', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    {!! Form::submit('送出', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection
