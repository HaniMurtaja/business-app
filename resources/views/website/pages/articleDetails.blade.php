@extends('layout.siteLayout')

@section('title')
@endsection

@section('css')
@endsection

@section('content')


    <!-- Blog Details Hero Begin -->
    <section class="blog-hero spad" style="margin-top: 35px;">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-9 text-center">
                    <div class="blog__hero__text">
                        <h2> {{ @$article->title }} </h2>
                        <ul>
                            <li> {{ @$article->created_at }} </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12">
                    <div class="blog__details__pic">
                        <img src="{{ @$article->image }}" alt="">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="blog__details__content">
                        <!--<div class="blog__details__share">-->
                        <!--    <span>share</span>-->
                        <!--    <ul>-->
                        <!--        <li><a href="#"><i class="fa fa-facebook"></i></a></li>-->
                        <!--        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>-->
                        <!--        <li><a href="#" class="youtube"><i class="fa fa-youtube-play"></i></a></li>-->
                        <!--        <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>-->
                        <!--    </ul>-->
                        <!--</div>-->
                        <div class="blog__details__text" style="color:black;">
                            <p> {!! @$article->details !!} </p>
                        </div>
            
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->
    

@endsection
  