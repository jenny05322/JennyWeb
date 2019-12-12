@extends('layouts.app')

@section('content')
<div class="container-fluid" style="padding: 0 15px;">
    <h1>鍛鑰者</h1>

    <div style="margin-bottom: 15px;">
        @foreach ($decks as $deck)
            <a class="btn @if (url()->full() == route('keyforge.index', ['deck' => $deck])) btn-primary @else btn-secondary @endif" href="{{ route('keyforge.index', ['deck' => $deck]) }}" >
                {{ $deck }}
            </a>
        @endforeach
    </div>

    @if (isset($handCards))
        <div class="row" style="margin: 0;">
            @foreach ($handCards as $handCard)
                <div class="col-sm-6 col-md-4 col-lg-2" style="padding: 0;">
                    <img src="{{ $handCard }}" class="img-fluid">
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
