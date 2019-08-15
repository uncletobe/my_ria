@extends('front.layouts.master')

@section('title')
РИА Новости - события в Москве, России и мире: темы дня, фото, видео, инфографика, радио
@endsection

@section('content')

    @include('front.news.home.includes.main-news', ['mainArticles'])

    @include('front.news.home.includes.readable-news', ['readableArticles'])

    @include('front.news.home.includes.chess-board', ['chessBoard'])

    @include('front.news.home.includes.news-carousel', ['newsCarousel'])

    @include('front.news.home.includes.author-block', ['authorNews'])

@endsection
