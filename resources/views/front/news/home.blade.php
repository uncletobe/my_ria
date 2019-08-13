@extends('front.layouts.master')

@section('title')
РИА Новости - события в Москве, России и мире: темы дня, фото, видео, инфографика, радио
@endsection

@section('header')
    @include('front.layouts.header-main')
@endsection

@section('content')

    @include('front.news.includes.main-news', ['mainArticles'])

    @include('front.news.includes.readable-news', ['readableArticles'])

    @include('front.news.includes.chess-board', ['chessBoard'])

    @include('front.news.includes.news-carousel', ['newsCarousel'])

    @include('front.news.includes.author-block', ['authorNews'])

@endsection
