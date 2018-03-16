@extends('layouts.app')

@section('content')

    <h1>栽培記録の新規作成ページ</h1>
     <div class="row">
        <div class="col-xs-12 col-sm-offset-2 col-sm-8 col-lg-offset-3 col-lg-6">
            {!! Form::model($history, ['route' => 'histories.store']) !!}
            
                <div class="form-group">
                    {!! Form::label('place2', '場所:') !!}
                    {!! Form::text('place2', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('crop', '作物:') !!}
                    {!! Form::text('crop', null, ['class' => 'form-control']) !!}
                </div>
                
	            <div class="form-group">
		<label class="control-label" for="place">高い高さのセレクトボックス</label>
		<select class="form-control input-lg" id="place" name="place">
			<option>選択肢１</option>
			<option>選択肢２</option>
			<option>選択肢３</option>
		</select>
	            </div>
                
                <div class="form-group">
                    {!! Form::label('cultivar', '品種:') !!}
                    {!! Form::text('cultivar', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('seedingday', '播種時期:') !!}
                    {!! Form::text('seedingday', null, ['class' => 'form-control']) !!}
                </div>
                
<div class="form-group" id="datepicker-default">
  <label class="col-sm-3 control-label">Default</label>
  <div class="col-sm-9 form-inline">
    <div class="input-group date">
      <input type="text" class="form-control" value="20170621">
      <div class="input-group-addon">
        <i class="fa fa-calendar"></i>
      </div>
    </div>
  </div>
</div>


                
                {!! Form::submit('追加', ['class' => 'btn btn-primary']) !!}
        
            {!! Form::close() !!}
        </div>
    </div>

@endsection
