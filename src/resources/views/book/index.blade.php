@extends('layouts.main_layout')

@section('header')
    <div class="header__wrapper">
        @include('book.partials.top_menu')
    </div>
@endsection

@section('content')
    <div class="content_wrap">
        @include('book.partials.left_sidebar')
        <div class="text_and_chooses_wrap">
            @include('book.partials.text_part')
            @include('book.partials.choose_part')
        </div>
        @include('book.partials.right_sidebar')
    </div>
@endsection
