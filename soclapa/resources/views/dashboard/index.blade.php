@extends('layouts.app')

@section('content')
<!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(/img/bg-img/breadcumb9.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-text text-center">
                        <h2>Lietotāja {{ Auth::user()->name }} profils</h2>
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

                <div class="card">
                    <div class="card-header">
                        <div class="classynav">
                            <ul>
                                <li><a href="/profils">Profils</a></li>
                                <li><a href="/blogaRaksti">Bloga raksti</a></li>
                                <li><a href="/recepsuRaksti">Receptes</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="container">
                            {!! Form::open(['action'=> ['DashboardController@update', Auth::user()->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12 col-lg-4">   
                                        <h5>{{Form::label('profile_image', 'Lietotāja bilde:')}}</h5><br> 
                                        <img id="profileImg" src="/storage/profile_image/{{Auth::user()->profile_image}}" style="border-radius: 50%; width: 50%;">
                                        {{Form::file('profile_image', ['onchange' => 'previewFile()'])}}
                                    </div>

                                    <div class="form-group col-12 col-lg-8">
                                        <div class="form-group">
                                            <h5>{{Form::label('name', 'Lietotāja vārds:')}}</h5>
                                            {{Form::text('name', Auth::user()->name, ['class' => 'form-control', 'placeholder' => 'name'])}}<br>
                                        </div>

                                        <div class="form-group">
                                            <h5>{{Form::label('password', 'Esošā parole:')}}</h5>
                                            {{Form::text('password','', ['class' => 'form-control'])}}
                                            <br>
                                            <h5>{{Form::label('password', 'Jaunā parole:')}}</h5>
                                            {{Form::text('password', '', ['class' => 'form-control'])}}
                                            <br>
                                            <h5>{{Form::label('password', 'Atkārtot jauno paroli:')}}</h5>
                                            {{Form::text('password','', ['class' => 'form-control'])}}
                                            <br>
                                        </div>
     
                                        {{Form::hidden('_method', 'POST')}}
                                        {{Form::submit('Saglabāt', ['class' => 'btn btn-success', 'name' => 'save'])}}
        
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
