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

                    <div class="card-body col-12">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="/raksti/create"  class="btn delicious-btn">
                            Izveidot bloga ierakstu 
                        </a>

                        <h3 style="padding: 10px;">
                            Jūsu ieraksti blogā:
                        </h3>
                    
                            @if(count($posts)>0)
                                <table class="table table-striped col-12">
                                    <tr>
                                        <th> Nosaukums un statuss</th>
                                        <th></th>
                                    </tr>

                                    @foreach($posts as $post)
                                        <tr class="col-12">
                                            <td class="row">
                                                <div class="col-lg-4 col-xs-12"> 
                                                    {{$post->title}}<br>
                                                    @if ($post->published === 1)
                                                        <span class="badge badge-success">Publicēts</span>
                                                    @else
                                                        <span class="badge badge-secondary">Nav publicēts</span>
                                                    @endif                         
                                                    <span class="badge badge-info">
                                                        Pēdējās izmaiņas: {{$post->updated_at}}
                                                    </span>
                                                </div>
                        
                                                <div class= "btn-group col-lg-8 col-xs-12 ">
                                                    {!!Form::open(['action'=> ['PostsController@destroy', $post->id], 'method' => 'POST'])!!}
                                                        @csrf
                                                        <a href="/raksti/{{$post->id}}/edit" class="btn btn-primary">Labot</a>
                                                        {{Form::hidden('_method', 'DELETE')}}
                                                        {{Form::submit('Dzēst', ['class' => 'btn btn-danger'])}}
                                                    {!!Form::close()!!}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            {{$posts->links()}}
                        @else
                            <p>Jums nav bloga ierakstu!</p>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
