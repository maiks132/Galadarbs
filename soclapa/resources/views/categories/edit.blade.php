@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Edit Categorie</h1><br>
		{!! Form::open(['action'=> 'CategoriesController@store', 'method' => 'POST'])!!}
        @csrf
    		<div class="form-group">
    			{{Form::label('title', 'Title')}}
    			{{Form::text('title', $categorie->title, ['class' => 'form-control'])}}
    			<br>
  
                <h3>{{Form::label('categorie_image', 'Kategorijas attēls:')}}</h3>
                <br>
            
                <img id="postImg" src="/storage/categorie_image/noimage.jpg" style="width: 30%;"><br><br>
           
  
                {{Form::file('categorie_image', ['onchange' => 'previewUploadedFile()'])}}              
            
                    <br><br>

                {{Form::submit('Save', ['class' => 'btn btn-primary'])}}
            </div>
		{!! Form::close() !!}
    
</div>

    