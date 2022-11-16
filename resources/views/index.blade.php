@extends('main')

@section('header')
    @include('main.content.header', ['showTutorialButton'=>$showTutorialButton, 'showHomeButton' =>$showHomeButton])
@endsection

@section('sidebar')
    @include('main.content.sidebar')
@endsection

@section('content')
    @include('main.content.content', ['title'=>$contentTitle, 'text'=>$contentText])
@endsection

