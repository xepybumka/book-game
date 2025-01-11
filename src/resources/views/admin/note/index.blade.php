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
        <a class="btn bg-gradient-dark mb-0" href="{{ route('note.create') }}">
            <i class="material-icons text-sm">add</i>
            Добавить</a>
    </div>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th class="w-95">Текст</th>
            <th class="w-5"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($notes as $note)
            <tr>
                <td class="text-wrap">{{$note->text}}</td>
                <td>
                    <div class="btn-group btn-sm">
                        <form method="get" action="{{ route('note.show', ['id' => $note->id]) }}">
                            @csrf
                            <button type="submit" class="btn btn-facebook"><i class="far fa-eye"></i></button>
                        </form>
                        <form method="get" action="{{ route('note.edit', ['id' => $note->id]) }}">
                            @csrf
                            <button type="submit" class="btn btn-info"><i class="fas fa-edit"></i></button>
                        </form>
                        <form method="post" action="{{ route('note.destroy', ['id' => $note->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </div>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    {{$notes->links('core.vendor.pagination.bootstrap-5')}}
@endsection
