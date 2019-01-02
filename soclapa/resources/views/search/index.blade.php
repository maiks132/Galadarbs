@extends('layouts.app')

@section('content')
 <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb11.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-text text-center">
                        <h2>Meklēšanas rezultāti</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    

    
    <div class="blog-area section-padding-80">
        <div class="container">
            <div class="row">
                
                <div class="col-12 col-lg-8">
                    @if(count($data))  
                    
                        <!-- Single Blog Area -->
                        <div class="single-blog-area mb-80">
                        
                            <!-- Thumbnail -->
                            @foreach($data as $search)
                                <div class="row" style="margin-bottom: 20px;">
                                    <div class="blog-thumbnail col-lg-5">
                                        <a href="/receptes/{{$search->id}}">                  
                                         <img src="/storage/recipe_image/{{$search->recipe_image}}" alt="" style="width: 100%;"></a> 
                                         <a href="/receptes/{{$search->id}}" class="btn delicious-btn" style="margin-top: 10px;">Lasīt vairāk</a>
                                    </div>
        
                                    <!-- Content -->
                                    <div class="blog-content col-lg-6">
                                        <a href="/receptes/{{$search->id}}" class="search-title">
                                        <h6>{{$search->title}}</h6></a>          
                                        {{date('d',strtotime($search->created_at))}}
                                        {{date('M',strtotime($search->created_at))}}
                                        {{date('Y',strtotime($search->created_at))}}                    
                                    
                                        <div class="meta-data">by <a href="#">{{$search->user->name}}</a></div>
                                            {!!substr(strip_tags($search->body), 0, 250)!!}...
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p>Nav rezultāta!</p>
                    @endif
                </div>

                <div class="col-12 col-lg-4">
                    <div class="blog-sidebar-area">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    
@endsection