@extends('layouts.app')

@section('content')
 <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <div class="hero-slides owl-carousel">
	
            <!-- Single Hero Slide -->
            @foreach($recipes as $recipe)
                <div class="single-hero-slide bg-img" style="background-image: url(/storage/recipe_image/{{$recipe->recipe_image}});">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                                <div class="hero-slides-content" data-animation="fadeInUp" data-delay="100ms">
                                    <h2 data-animation="fadeInUp" data-delay="300ms">{{$recipe->title}}</h2>
                                    <p data-animation="fadeInUp" data-delay="700ms">{!!substr(strip_tags($recipe->body), 0, 150)!!}...</p>
                                    <a href="/receptes/{{$recipe->id}}" class="btn delicious-btn" data-animation="fadeInUp" data-delay="1000ms">Redzēt recepti</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Top Catagory Area Start ##### -->
    <section class="top-catagory-area section-padding-80-0">
        <div class="container">
            <div class="row">
                <!-- Top Catagory Area -->
                @foreach($randoms as $random)
                    <div class="col-12 col-lg-6">
                        <div class="single-top-catagory">
                            <img src="/storage/recipe_image/{{$random->recipe_image}}" alt=""/>
                            <!-- Content -->
                            <div class="top-cta-content">
                                <h3>{{$random->title}}</h3>
                                <h6>Vienkārši un garšīgi</h6>
                                <a href="/receptes/{{$random->id}}" class="btn delicious-btn">Skatīt recepti</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ##### Top Catagory Area End ##### -->

    <!-- ##### Best Receipe Area Start ##### -->
    <section class="best-receipe-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>Labi padomi un idejas</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Best Receipe Area -->
                @foreach ($posts as $post)
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-best-receipe-area mb-30">
                            <a href="/raksti/{{$post->id}}">
                                <img src="/storage/cover_image/{{$post->cover_image}}" alt=""/>
                            </a>

                            <div class="receipe-content">
                                <a href="/raksti/{{$post->id}}">
                                    <h5>{{$post->title}}</h5>
                                </a>
                            <!-- <div class="ratings">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div> -->
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ##### Best Receipe Area End ##### -->

    <!-- ##### CTA Area Start ##### -->
    <!-- <section class="cta-area bg-img bg-overlay" style="background-image: url(img/bg-img/bg4.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12"> -->
                    <!-- Cta Content -->
                    <!-- <div class="cta-content text-center">
                        <h2>Gluten Free Receipies</h2>
                        <p>Fusce nec ante vitae lacus aliquet vulputate. Donec scelerisque accumsan molestie. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras sed accumsan neque. Ut vulputate, lectus vel aliquam congue, risus leo elementum nibh</p>
                        <a href="#" class="btn delicious-btn">Discover all the receipies</a>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- ##### CTA Area End ##### -->

    <!-- ##### Small Receipe Area Start ##### -->
    <section class="small-receipe-area section-padding-80-0">
        <div class="container">
            <div class="row">

                <!-- Small Receipe Area -->
                @foreach($receptes as $recepte)
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-small-receipe-area d-flex">
                            <!-- Receipe Thumb -->
                            <div class="receipe-thumb">
                                <a href="/recepte/{{$recepte->id}}">
                                    <img src="/storage/recipe_image/{{$recepte->recipe_image}}" alt="">
                                </a>
                            </div>

                            <!-- Receipe Content -->
                            <div class="receipe-content">
                                <span>{{date('F', strtotime($recepte->created_at))}} 
                                    {{date('d', strtotime($recepte->created_at))}} 
                                    {{date('Y', strtotime($recepte->created_at))}}
                                </span>
                                <a href="/recepte/{{$recepte->id}}">
                                    <h5>{{$recepte->title}}</h5>
                                </a>
                            <!-- <div class="ratings">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>
                            <p>2 Comments</p> -->
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ##### Small Receipe Area End ##### -->

    <!-- ##### Quote Subscribe Area Start ##### -->
    <section class="quote-subscribe-adds">
        <div class="container">
            <div class="row align-items-end">
                
                <!-- Quote -->
                <div class="col-12 col-lg-4">
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

                <!-- Newsletter -->
                <div class="col-12 col-lg-4">
                    <div class="newsletter-area">
                        <h4>Subscribe to our newsletter</h4>
                        
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
                </div>

                <!-- Adds -->
                <div class="col-12 col-lg-4">
                    <div class="delicious-add">
                        <img src="img/bg-img/add.png" alt=""/>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Quote Subscribe Area End ##### -->

@endsection