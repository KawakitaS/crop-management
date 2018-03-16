@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
<h1>栽培ID: {{ $history->id }} の詳細ページ</h1>

<table class="table table-bordered">
        <tr>
        <th>id</th>
        <td>{{ $history->id }}</td>
        </tr>
        <tr>
            <th>場所</th>
            <td>{{ $history->place}}</td>
        </tr>
        <tr>
            <th>作物</th>
            <td>{{ $history->crop}}</td>
        </tr>
        <tr>
            <th>品種</th>
            <td>{{ $history->cultivar}}</td>
        </tr>
        <tr>
            <th>播種時期</th>
            <td>{{ date('Y年m月d日',  strtotime($history->seedingday)) }}</td>
        </tr>
</table>

{!! link_to_route('histories.edit', 'この栽培履歴の編集', ['id' => $history->id], ['class' => 'btn btn-default']) !!}
{!! Form::model($history, ['route' => ['histories.destroy', $history->id], 'method' => 'delete']) !!}
{!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}


@endsection
