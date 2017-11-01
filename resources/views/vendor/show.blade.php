@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>{{ $vendor->name }}</h1>
        </div>
        <div class="row">
            <label for="phone" class="col-xs-2 control-label">電話</label>
            <div class="col-xs-10">
                <a href="tel:{{ $vendor->phone }}">{{ $vendor->phone }}</a>
            </div>
        </div>
        <div class="row">
            <label for="address" class="col-xs-2 control-label">地址</label>
            <div class="col-xs-10">
                {{ $vendor->address }}
            </div>
        </div>
        @if($vendor->address)
            <iframe style="border: none; width: 100%; height: 80vw;" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBkomHH5zF8NSzAAmZIMKwqndJKPYlAlV0&q={!! $vendor->address !!}" allowfullscreen></iframe>
        @endif
        <div class="row">
            <label for="web" class="col-xs-2 control-label">網站</label>
            <div class="col-xs-10"><a target="_blank" href="{{ $vendor->web }}">{{ $vendor->web }}</a></div>
        </div>
        <div class="row">
            <label for="note" class="col-xs-2 control-label">備註</label>
            <div class="col-xs-10">{!! nl2br($vendor->note) !!}</div>
        </div>
    </div>
@endsection
