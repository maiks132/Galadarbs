@extends('layouts.app')

@section('content')
	<!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(/img/bg-img/breadcumb6.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-text text-center">
                        <h2>Labot recepti</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

<div class="blog-area section-padding-80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="/recepsuRaksti" class="btn btn-secondary"> Atpakaļ </a><br><br>
                
                {!! Form::open(['action'=> ['RecipesController@update', $recipe->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    @csrf

                    <div class="form-group">
                        <h3>{{Form::label('title', 'Nosaukums:')}}</h3>
                        {{Form::text('title', $recipe->title, ['class' => 'form-control'])}}
                    </div>

                    <div class="form-group">
                        <h3><label for="categorie_id">
                            Kategorija:
                        </label></h3>
                
                        <select class="form-control mb-30" id="categorie_id" name="cat">
                            @foreach($categories as $categorie)
                                @if($categorie->id == $recipe->categorie_id)
                                    <option value="{{$categorie->id}}" selected>
                                        {{$recipe->categorie->title}}
                                    </option>
                                @else
                                    <option value="{{$categorie->id}}">
                                        {{$categorie->title}}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
               
                    <div class="form-group"> 
                        <h3>{{Form::label('ing', 'Sastāvdaļas:')}}</h3>
                        {{Form::textarea('ing', $recipe->ingredients, ['id' => 'ingredient-ckeditor', 'class' => 'form-control',  'required'])}}<br>
                        <h3>{{Form::label('body', 'Apraksts:')}}</h3>
                        {{Form::textarea('body', $recipe->body, ['id' => 'article-ckeditor', 'class' => 'form-control'])}}	
                    </div>

                    <div class="form-group">
                        <h3>{{Form::label('recipe_image', 'Receptes attēls:')}}</h3><br>
                        <img id="postImg" src="/storage/recipe_image/{{$recipe->recipe_image}}" style="width: 30%;"><br><br>
                        {{Form::file('recipe_image', ['onchange' => 'previewUploadedFile()'])}}<br><br>
                        
                        {{Form::hidden('_method', 'PUT')}}
                        {{Form::submit('Saglabāt', ['class' => 'btn btn-secondary', 'name' => 'save'])}}
                        {{Form::hidden('_method', 'PUT')}}
                        {{Form::submit('Publicēt', ['class' => 'btn btn-success', 'name' => 'save'])}}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>


@endsection