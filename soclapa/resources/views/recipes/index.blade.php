@extends('layouts.app')

@section('content')
 <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-text text-center">
                        <h2>Receptes</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Blog Area Start ##### -->
    <!--kategoriju navigācija -->
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#catnav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="catnav">
                <div class="navbar-nav">
                    <ul class="navbar-nav mr-auto">
                        @foreach($categories as $categorie)
                            <li class="nav-item">
                                <div class="categories" style="margin: 2px;">
                                    <a class="nav-item nav-link" href="{{ url('/kategorijas/'.str_slug($categorie->title))}}" style="padding: 10px;">
                                        {{$categorie->title}}
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>     
                </div>
            </div>
        </nav>
    </div>

    <!--kategoriju navigācijas beigas -->
    
    <div class="blog-area" style="padding-top: 20px;">
        <div class="container">
            <div class="row">

                <div class="col-12 col-lg-8">
                    <div class="blog-posts-area">   
                        @if(count($recipes)>0)
                            @foreach($recipes as $recipe)

                                <!-- Single Blog Area -->
                                <div class="single-blog-area mb-80">
                                    <!-- Thumbnail -->
                                    <div class="blog-thumbnail">
                                        <a href="/receptes/{{$recipe->title}}">                  
                                            <img src="/storage/recipe_image/{{$recipe->recipe_image}}" alt="">
                                        </a>                                        
            
                                        <!-- Post Date -->
                                        <div class="post-date">
                                            <a href="/receptes/{{$recipe->id}}">
                                                <span>{{date('d',strtotime($recipe->created_at))}}</span>
                                                {{date('M',strtotime($recipe->created_at))}}<br>
                                                {{date('Y',strtotime($recipe->created_at))}}
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Content -->
                                    <div class="blog-content">
                                        <a href="/recipes/{{$recipe->id}}" class="recipe-title">
                                            <h2>{{$recipe->title}}</h2>
                                        </a>
                                        <div class="meta-data">
                                            Autors: {{$recipe->user->name}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{$recipes->links()}}
                        @else
                            <p>Nav recepšu!</p>
                        @endif
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="blog-sidebar-area">

                        <!-- Widget -->
                        <div class="single-widget mb-80">
                            <h6>Arhīvs</h6>
                            <ul class="list">
                                <li><a href="#">Marts 2018</a></li>
                                <li><a href="#">Februāris 2018</a></li>
                                <li><a href="#">Janvāris 2018</a></li>
                                <li><a href="#">Decembris 2017</a></li>
                                <li><a href="#">Novembris 2017</a></li>
                            </ul>
                        </div>

                        <!-- Widget -->
                        <div class="single-widget mb-80">
                            <h6>Kategorijas:</h6>
                            <ul class="list">
                                @foreach($categories as $categorie)
                                    <li><a class="nav-item nav-link" href="/kategorijas/{{$categorie->title}}">
                                    {{$categorie->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Widget -->
                        <div class="single-widget mb-80">
                            <h6>Paziņojumi:</h6>

                            <!-- Form -->
                            <div class="newsletter-form bg-img bg-overlay" style="background-image: url(img/bg-img/bg1.jpg);">
                                <form action="#" method="post">
                                    @csrf
                                    <input type="email" name="email" placeholder="Subscribe to newsletter"/>
                                    <button type="submit" class="btn delicious-btn w-100">
                                        Subscribe
                                    </button>
                                </form>

                                <p>Fusce nec ante vitae lacus aliquet vulputate. Donec sceleri sque accumsan molestie. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia.</p>
                            </div>
                        </div>

                        <!-- Widget -->
                        <div class="single-widget mb-80">
                            <div class="quote-area text-center">
                                <span>"</span>
                                <h4>Nothing is better than going home to family and eating good food and relaxing</h4>
                                <p>John Smith</p>
                                <div class="date-comments d-flex justify-content-between">
                                    <div class="date">January 04, 2018</div>
                                    <div class="comments">2 Comments</div>
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    
@endsection