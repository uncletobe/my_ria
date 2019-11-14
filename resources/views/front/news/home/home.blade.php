@extends('front.layouts.master')

@section('title')
РИА Новости - события в Москве, России и мире: темы дня, фото, видео, инфографика, радио
@endsection

@section('styles')
	<link rel="stylesheet" href={{ asset("plugins/owlcarousel/css/owl.carousel.min.css") }}>
    <link rel="stylesheet" href={{ asset("plugins/owlcarousel/css/owl.theme.default.min.css") }}>
@endsection

@section('header')
	@include('front.layouts.header-main')
@endsection

@section('content')

    <div class="main-content container">
        @include('front.news.home.includes.main-news', ['mainArticles'])

        @include('front.news.home.includes.readable-news', ['readableArticles'])

        @include('front.news.home.includes.chess-board', ['chessBoard'])

        @include('front.news.home.includes.news-carousel', ['newsCarousel'])

        @include('front.news.home.includes.author-block', ['authorNews'])
    </div>

@endsection

@section('footer')
	<div class="footer container-fluid">
		@include('front.layouts.footer')
	</div>	
@endsection

@section('scripts')
	<script src={{ asset("plugins/owlcarousel/js/owl.carousel.min.js") }}></script>
@endsection