@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Create Categorie</h1><br>
		{!! Form::open(['action'=> 'CategoriesController@store', 'method' => 'POST'])!!}
		@csrf
    		<div class="form-group">
    			{{Form::label('title', 'Title')}}
    			{{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
    			<br>
           
                {{Form::submit('Save', ['class' => 'btn btn-primary'])}}
            </div>    
		{!! Form::close() !!}            
</div>

    
@endsection