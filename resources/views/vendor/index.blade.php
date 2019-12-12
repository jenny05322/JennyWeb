@extends('layouts.app')

@section('content')
<div class="container">
    <h1>管理</h1>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>店家名稱</th>
                    <th>電話</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($vendors as $vendor)
                    <tr>
                        <td><a href="{{ route('vendor.show', $vendor->id) }}">{{ $vendor->name }}</a></td>
                        <td>{{ $vendor->phone }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('vendor.edit', $vendor->id) }}">編輯</a>

                        </td>
                        <td>
                            {!! Form::open(['route' => ['vendor.destroy', $vendor->id], 'method' => 'delete', 'class' => 'form-horizontal']) !!}
                                {!! Form::submit('刪除', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
