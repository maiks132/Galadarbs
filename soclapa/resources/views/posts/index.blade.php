@extends('layouts.app')

@section('content')
 <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb2.jpg);">
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

    <!-- ##### Blog Area Start ##### -->
    <div class="blog-area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="row">
                        @if(count($posts)>0)
                            @foreach($posts as $post)
                                
                                <!-- Single Blog Area -->
                                <div class="single-blog-area mb-80 col-lg-4">
                                    <!-- Thumbnail -->
                                    <div class="blog-thumbnail">
                                        <a href="/raksti/{{$post->id}}">
                                            <img src="/storage/cover_image/{{$post->cover_image}}" alt="" style="width: 100%;">
                                        </a><br>
                                    </div>

                                    <!-- Content -->
                                    <div class="blog-content">
                                        <a href="/raksti/{{$post->id}}" class="post-title">
                                            <h6>{{$post->title}}</h6>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                            {{$posts->links()}}
                        @else
                            <p>Nav ierakstu!</p>
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
                            <h6>Paziņojumi:</h6>

                        <!-- Form -->
                            <div class="newsletter-form bg-img bg-overlay" style="background-image: url(img/bg-img/bg1.jpg);">
                                <form action="#" method="post">
                                    @csrf
                                    <input type="email" name="email" placeholder="Subscribe to newsletter"/>
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
    </div>
    <!-- ##### Blog Area End ##### -->
	<!-- <h1>Posts</h1>
	@if(count($posts)>0)
		@foreach($posts as $post)
		
			<div class="well">
				<div class="row">
					<div class="col-md-4 col-sm-4">
						<img style="width: 100%" src="/storage/cover_image/{{$post->cover_image}}">
					</div>
					<div class="col-md-4 col-sm-4">
						<h3><a href="/posts/{{$post->id}}"> {{$post->title}}</a></h3>
						<small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
					</div>
				</div>
				
		
			</div>
			

		@endforeach

		{{$posts->links()}}

	@else
		<p>No posts found</p>

	@endif -->
    
@endsection