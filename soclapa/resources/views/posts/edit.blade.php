@extends('layouts.app')

@section('content')
	<!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(/img/bg-img/breadcumb6.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-text text-center">
                        <h2>Labot rakstu</h2>
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
                <a href="/blogaRaksti" class="btn btn-secondary"> Atpakaļ </a><br><br>

                {!! Form::open(['action'=> ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    @csrf

                    <div class="form-group">
                        <h3>{{Form::label('title', 'Raksta nosaukums:')}}</h3>
                        {{Form::text('title', $post->title, ['class' => 'form-control'])}}<br>
                    </div>

                    <div class="form-group"> 
                        <h3>{{Form::label('body', 'Raksta saturs:')}}</h3>
                        {{Form::textarea('body', $post->body, ['id' => 'article-ckeditor', 'class' => 'form-control'])}}	
                    </div>

                    <div class="form-group">
                        <h3>{{Form::label('cover_image', 'Raksta attēls:')}}</h3><br>
                        <img id="postImg" src="/storage/cover_image/{{$post->cover_image}}" style="width: 30%;"/><br><br>
                        {{Form::file('cover_image', ['onchange' => 'previewUploadedFile()'])}}<br><br>
            
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