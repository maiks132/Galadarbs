@extends('layouts.app')

@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(/storage/categorie_image/{{$recipe->categorie->categorie_image}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-text text-center">
                        <h2>{{$recipe->categorie->title}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/receptes">Receptes</a></li>
            <li class="breadcrumb-item"><a href="/kategorijas/{{$recipe->categorie->title}}">{{$recipe->categorie->title}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$recipe->title}}</li>
        </ol>
    </nav>

    <div class="receipe-post-area">

        <!-- Receipe Slider -->
        <div class="container">
            <div class="row">          
                <div class="col-12 col-lg-6">
                    <div class="receipe-slider owl-carousel">
                        <img src="/storage/recipe_image/{{$recipe->recipe_image}}" alt=""/>   
                    </div>
                </div>
        
                <!-- Receipe Content Area -->
                <div class="receipe-content-area col-12 col-lg-6">
                    <div class="receipe-headline">
                        <span>{{date('d',strtotime($recipe->created_at))}}
                        {{date('M',strtotime($recipe->created_at))}}
                        {{date('Y',strtotime($recipe->created_at))}}</span>
                        <h2>{{$recipe->title}}</h2>
                            <!-- <div class="receipe-duration">
                                <h6>Prep: 15 mins</h6>
                                <h6>Cook: 30 mins</h6>
                                <h6>Yields: 8 Servings</h6>
                            </div> -->
                    </div>
                   

                    <!-- <div class="col-12 col-md-4">
                        <div class="receipe-ratings text-right my-5">
                            <div class="ratings">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>
                            <a href="#" class="btn delicious-btn">For Begginers</a>
                        </div>
                    </div>
                </div> -->

                    
                    <!-- Ingredients -->
                    <div class="ingredients">
                        <h4><lable>Sastāvdaļas:</lable></h4>
                        {!!$recipe->ingredients!!}
                    </div>
                </div>
                        
                <!-- Single Preparation Step -->
                <div class="receptes col-lg-8">
                    <h4><lable>Recepte:</lable></h4><br>
                    {!!$recipe->body!!}
                    <hr>
                    Lai labi garšo!<br><br>
                    <lable>Receptes autors: </lable>
                    <span>{{$recipe->user->name}}</span>
                </div>
            </div><br><br>

            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-left">
                        <h3>Atstājiet komentāru</h3>
                    </div>
                </div>

                <div class="col-12">
                    <div class="contact-form-area">
                        <form action="#" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Vārds"/>
                            </div>
                                <div class="col-12">
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Komentārs"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn delicious-btn mt-30" type="submit">Apstiprināt</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

 


    
@endsection