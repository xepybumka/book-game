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
        <a class="btn bg-gradient-dark mb-0" href="{{ route('paragraph_transition.create') }}">
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
        @foreach ($paragraphTransitions as $paragraphTransition)
            <tr>
                <td class="text-wrap">{{$paragraphTransition->paragraph_number}}</td>
                <td class="text-wrap">{{$paragraphTransition->to_paragraph_number}}</td>
                <td class="text-wrap">{{$paragraphTransition->title}}</td>
                <td>
                    <div class="btn-group btn-sm">
                        <form method="get" action="{{ route('paragraph_transition.show', ['id'=>$paragraphTransition->id]) }}">
                            @csrf
                            <button type="submit" class="btn btn-facebook"><i class="far fa-eye">show</i></button>
                        </form>
                        <form method="get" action="{{ route('paragraph_transition.edit', ['id'=>$paragraphTransition->id]) }}">
                            @csrf
                            <button type="submit" class="btn btn-info"><i class="fas fa-edit">edit</i></button>
                        </form>
                        <form method="post" action="{{ route('paragraph_transition.destroy', ['id'=>$paragraphTransition->id]) }}">
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
    {{$paragraphTransitions->links('core.vendor.pagination.bootstrap-5')}}
@endsection
