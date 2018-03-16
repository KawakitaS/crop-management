@extends('layouts.app')

@section('content')
    @if (Auth::check())
{!! link_to_route('histories.create', '新規記録の作成', null, ['class' => 'btn btn-primary']) !!}
{!! link_to_route('prediction.form', '播種日以降の気象データを確認', null, ['class' => 'btn btn-primary']) !!}

    @if (count($histories) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>栽培ID</th>
                    <th>Place</th>
                    <th>Crop</th>
                    <th>Cultivar</th>
                    <th>Seeding day</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($histories as $history)
                    <tr>
                        <td>{!! link_to_route('histories.show', $history->id, ['id' => $history->id]) !!}</td>
                        <td>{{ $history->place }}</td>
                        <td>{{ $history->crop }}</td>
                        <td>{{ $history->cultivar }}</td>
                        <td>{{ date('Y年m月d日',  strtotime($history->seedingday)) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
     {!! $histories->render() !!}

    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Crop Management</h1>
                {!! link_to_route('signup.get', 'Sign up now!', null, ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection
