@extends('layouts.admin_layout')

@section('breadcrumbs', $title)

@section('content')
    <h1>{{$title}}</h1>

    <div class="col-6 mb-2">
        <a class="btn bg-gradient-dark mb-0" href="{{ route('paragraphs.create') }}">
            <i class="material-icons text-sm">add</i>
            &nbsp;&nbsp; Добавить</a>
    </div>
    @include('admin.paragraphs.parts.pagination')

    <div class="card mb-2">
        <ul class="list-group">
            @foreach ($paragraphs as $paragraph)

                <li class="list-group-item border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                    <div class="flex-column">
                        <h6 class="mb-3 text-sm">№: {{$paragraph['position']}}</h6>
                    </div>
                    <div class=" flex-column  text-center"><p
                            class="fw-light text-wrap">{{$paragraph['text']}}</p></div>
                    <div class="ms-auto text-end">
                        <a class="btn btn-link text-danger text-gradient px-3 mb-0"
                           href="{{ route('paragraphs.destroy', ['id'=>$paragraph['id']]) }}">
                            <i class="material-icons text-sm me-2">delete</i>Delete</a>
                        <a class="btn btn-link text-dark px-3 mb-0"
                           href="{{ route('paragraphs.edit', ['id'=>$paragraph['id']]) }}">
                            <i class="material-icons text-sm me-2">edit</i>Edit</a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>


    @include('admin.paragraphs.parts.pagination')
@endsection

