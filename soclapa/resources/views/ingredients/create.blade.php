@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Create Ingredients</h1><br>
		{!! Form::open(['action'=> 'IngredientsController@store', 'method' => 'POST'])!!}
		@csrf
    		<div class="form-group">
    			{{Form::label('title', 'Title')}}
    			{{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
    			<br>
            </div>
            {{Form::submit('Save', ['class' => 'btn btn-primary'])}}
		{!! Form::close() !!}  
</div>
    
@endsection