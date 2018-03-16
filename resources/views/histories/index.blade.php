@extends('layouts.app')

@section('content')
    <h1>タスク一覧</h1>
    
    @if (count($histories) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>作物</th>
                    <th>品種</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($histories as $history)
                    <tr>
                        <td>{!! link_to_route('histories.show', $history->id, ['id' => $history->id]) !!}</td>
                        <td>{{ $history->crop }}</td>
                        <td>{{ $history->cultivar}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
{!! link_to_route('histories.create', '新規タスクの追加', null, ['class' => 'btn btn-primary']) !!}

<!-- {{ '<p style="color: red;">htmlentities 関数に通した場合</p>' }}-->
<!--{!! '<p style="color: red;">htmlentities 関数に通さなかった場合</p>' !!}-->

@endsection


