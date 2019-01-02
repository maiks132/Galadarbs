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
                        <a href="/receptes/create"  class="btn delicious-btn">
                            Izveidot recepti 
                        </a>
                        <h3 style="padding: 10px;">
                            Jūsu recepšu saraksts:
                        </h3>

                        @if(count($recipes)>0)
                            <table class="table table-striped col-12">
                                <tr>
                                    <th> Nosaukums un statuss</th>
                                    <th></th>
                                </tr>
                                
                                @foreach($recipes as $recipe)
                                    <tr class="col-12">
                                        <td class="row">
                                            <div class="col-lg-4 col-xs-12"> 
                                                {{$recipe->title}}<br>

                                                @if ($recipe->published === 1)
                                                    <span class="badge badge-success">Publicēts</span>
                                                @else
                                                    <span class="badge badge-secondary">Nav publicēts</span>
                                                @endif
                                                <span class="badge badge-info">Pēdējās izmaiņas: {{$recipe->updated_at}}</span>
                                            </div>
                        
                                            <div class= "btn-group col-lg-8 col-xs-12 ">
                                                {!!Form::open(['action'=> ['RecipesController@destroy', $recipe->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                                @csrf
                                                    <a href="/receptes/{{$recipe->id}}/edit" class="btn btn-primary">
                                                        Labot
                                                    </a>
                                                    {{Form::hidden('_method', 'DELETE')}}
                                                    {{Form::submit('Dzēst', ['class' => 'btn btn-danger'])}}
                                                {!!Form::close()!!}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            {{$recipes->links()}}
                        @else
                            <p>Jums nav recepšu ierakstu!</p>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
