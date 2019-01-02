@extends('layouts.app')

@section('content')

<!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img bg-overlay"style="background-image: url(/img/bg-img/breadcumb2.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-text text-center">
                        <h2>Blogs</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/raksti">Blogs</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$post->title}}</li>
        </ol>
    </nav>

    <div class="receipe-post-area" style="padding-top: 20px;">

        <!-- Receipe Slider -->
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <img src="/storage/cover_image/{{$post->cover_image}}" alt=""/>
                        
                    <!-- Receipe Content Area -->
                    <div class="receipe-content-area mb-30">
                        <div class="receipe-headline my-5">
                            <span>{{date('d',strtotime($post->created_at))}}
                                {{date('M',strtotime($post->created_at))}}
                                {{date('Y',strtotime($post->created_at))}}
                            </span>
                            <h2>{{$post->title}}</h2>
                        </div>
            
                        <!-- Post -->      
                        <p>{!!$post->body!!}</p>
                        <hr>
                        <lable>Raksta autors: </lable>
                        <span>{{$post->user->name}}</span>
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
                            <h6>Paziņojumi:</h6>

                            <!-- Form -->
                            <div class="newsletter-form bg-img bg-overlay" style="background-image: url(img/bg-img/bg1.jpg);">
                                <form action="#" method="post">
                                    @csrf
                                    <input type="email" name="email" placeholder="Subscribe to newsletter">
                                    <button type="submit" class="btn delicious-btn w-100">Subscribe</button>
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

        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-heading text-left">
                        <h3>Atstājiet komentāru</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="contact-form-area">
                        <form action="#" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Vārds"/>
                                </div>
                                <div class="col-12">
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn delicious-btn mt-30 mb-30" type="submit">Apstiprināt</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
            

<!-- <a href="/posts" class="btn btn-default">Go Back</a>
	<h1>{{$post->title}}</h1>
	<img style="width: 60%" src="/storage/cover_image/{{$post->cover_image}}"><br><br>
		<div>
			{!!$post->body!!}
		</div>
		<hr>
		<small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
		<hr>
		@if(!Auth::guest())
			@if(Auth::user()->id==$post->user_id)
				<a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
				{!!Form::open(['action'=> ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
				{{Form::hidden('_method', 'DELETE')}}
				{{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
				{!!Form::close()!!}
			@endif
		@endif -->
@endsection