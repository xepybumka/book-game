@extends('main')

@section('header')
    @include('main.content.header')
@endsection

@section('sidebar')
    @include('main.content.sidebar')
@endsection

@section('content')
    @include('main.content.tutorial', ['title'=>$tutorialTitle, 'rules'=>$rules])
    @include('main.content.content', ['title'=>$contentTitle, 'text'=>$contentText])
@endsection

