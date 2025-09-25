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
        <a class="btn bg-gradient-dark mb-0" href="{{ route('transition.create') }}">
            <i class="material-icons text-sm">add</i>
            Добавить</a>
    </div>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th class="w-20">Номер параграфа (откуда)</th>
            <th class="w-20">Номер параграфа (куда)</th>
            <th class="w-55">Текст перехода (как будет в тексте)</th>
            <th class="w-5"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($transitions as $transition)
            <tr>
                <td class="text-wrap">{{$transition->paragraph_number}}</td>
                <td class="text-wrap">{{$transition->to_paragraph_number}}</td>
                <td class="text-wrap">{{$transition->title}}</td>
                <td>
                    <div class="btn-group btn-sm">
                        <form method="get" action="{{ route('transition.show', ['id'=>$transition->id]) }}">
                            @csrf
                            <button type="submit" class="btn btn-facebook"><i class="far fa-eye">show</i></button>
                        </form>
                        <form method="get" action="{{ route('transition.edit', ['id'=>$transition->id]) }}">
                            @csrf
                            <button type="submit" class="btn btn-info"><i class="fas fa-edit">edit</i></button>
                        </form>
                        <form method="post" action="{{ route('transition.destroy', ['id'=>$transition->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt">delete</i></button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$transitions->links('core.vendor.pagination.bootstrap-5')}}
@endsection
