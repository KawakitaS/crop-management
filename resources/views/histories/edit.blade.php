@extends('layouts.app')
@section('content')
    <h1>栽培ID: {{$history->id}} の編集ページ</h1>
    <div class="row">
        <div class="col-xs-6">
            {!! Form::model($history, ['route' => ['histories.update', $history->id], 'method' => 'put']) !!}

                <div class="form-group">
                    <label class="control-label" for="place">場所</label>
                    <select class="form-control" id="place" name="place">
                        <option>広島県</option>
                        <option>岡山県</option>
                        <option>山口県</option>
                    </select>
	            </div>
                
                <div class="form-group">
                    <label class="control-label" for="place">作物</label>
                    <select class="form-control" id="crop" name="crop">
                        <option>水稲</option>
                        <option>小麦</option>
                        <option>大豆</option>
                    </select>
	            </div>
                <div class="form-group">
                    {!! Form::label('cultivar', '品種:') !!}
                    {!! Form::text('cultivar', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label class="control-label" for="seedingday">播種日</label>
                    <input type="date" id="seedingday" name="seedingday">
	            </div>
                {!! Form::submit('更新', ['class' => 'btn btn-default']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
