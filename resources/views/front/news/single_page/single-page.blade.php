@extends('front.layouts.master')

@section('title')
    {{ $article->article_title }}
@endsection

@section('styles')
    <link rel="stylesheet" href="/plugins/owlcarousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/plugins/owlcarousel/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/plugins/fancybox-3.5.7/css/jquery.fancybox.min.css">
@endsection

@section('svg')
    @include('front.news.single_page.includes.svg')
@endsection

@section('header')
    @include('front.layouts.header-secondary')
@endsection

@section('content')

<div class="main-content nt container">
    <div class="row justify-content-center d-flex">
        <div class="col-xl-12 col-md-12 page">
            
            @include('front.layouts.page-hat')

            @include('front.news.single_page.includes.article',
            [
            'article',
            'comments',
            'tags'
            ])

            @include('front.news.single_page.includes.recommend-carousel', ['recommendCarousel'])

            <div class="article__sharebar">
                <a href="" class="auth-facebook" title="">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="auth-vk" title="">
                    <i class="fab fa-vk"></i>
                </a>
                <a href="" class="auth-ok" title="">
                    <i class="fab fa-odnoklassniki"></i>
                </a>
                <a href="" class="auth-more" title="">
                    <i class="fas fa-ellipsis-h"></i>
                </a>
            </div>

        </div>
    </div>
</div>        

@endsection

@section('utilites')
    @include('front.news.single_page.includes.as-tape')
@endsection

@section('scripts')
    <script src="/plugins/owlcarousel/js/owl.carousel.min.js"></script>
    <script src="/plugins/fancybox-3.5.7/js/jquery.fancybox.min.js"></script>
@endsection