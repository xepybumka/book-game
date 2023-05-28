@extends('layouts.admin_layout')

@section('breadcrumbs', $title)

@section('content')
    <h1>{{$title}}</h1>

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
    @endif
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="col-6 mb-2">
        <a class="btn bg-gradient-dark mb-0" href="{{ route('paragraph.create') }}">
            <i class="material-icons text-sm">add</i>
            Добавить</a>
    </div>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th class="w-5">Номер</th>
            <th class="w-90">Текст</th>
            <th class="w-5"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($paragraphs as $paragraph)
            <tr>
                <td>{{$paragraph['position']}}</td>
                <td class="text-wrap">{{$paragraph['text']}}</td>
                <td>
                    <div class="btn-group btn-sm">
                        <form method="get" action="{{ route('paragraph.show', ['id'=>$paragraph['id']]) }}">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-facebook"><i class="far fa-eye"></i></button>
                        </form>
                        <form method="get" action="{{ route('paragraph.edit', ['id'=>$paragraph['id']]) }}">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-info"><i class="fas fa-edit"></i></button>
                        </form>
                        <form method="get" action="{{ route('paragraph.destroy', ['id'=>$paragraph['id']]) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </div>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    {{$paragraphs->links('vendor.pagination.bootstrap-5')}}
@endsection
