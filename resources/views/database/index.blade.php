@extends('layouts.app')

@section('content')
    <div class="container">
        <ul>
            @foreach($tables as $table)
                @if(config('database.default') == 'pgsql')
                    <li><a href="{{ route('table.index', $table->tablename) }}">{{ $table->tablename }}</li>
                @else
                    <li><a href="{{ route('table.index', $table->Tables_in_jenny_web) }}">{{ $table->Tables_in_jenny_web }}</li>
                @endif
            @endforeach
        </ul>
    </div>
@endsection
