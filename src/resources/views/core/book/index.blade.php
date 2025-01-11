@extends('layouts.main_layout')

@section('header')
    <div class="header__wrapper">
        @include('core.book.partials.top_menu')
    </div>
@endsection

@section('content')
    <div class="content_wrap">
        @include('core.book.partials.left_sidebar')
        <div class="text_and_chooses_wrap">
            @include('core.book.partials.text_part')
            @include('core.book.partials.choose_part')
        </div>
        @include('core.book.partials.right_sidebar')
    </div>
@endsection
