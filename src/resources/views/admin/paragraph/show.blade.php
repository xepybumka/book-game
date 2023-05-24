@extends('layouts.admin_layout')

@section('breadcrumbs', $title)

@section('content')
    @parent
    <h1>{{$title}}</h1>
@endsection
