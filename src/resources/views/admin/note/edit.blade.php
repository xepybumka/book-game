@extends('layouts.admin_layout')

@section('breadcrumbs', $title)

@section('content')
    <h1>{{$title}}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ошибка!</strong>
            С некотороми полями возникли проблемы.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('note.update',['id' => $note->id]) }}">
        @csrf
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="text">Какой-то текст заметки</label>
            <textarea class="form-control @error('text') is-invalid @enderror" id="text" name="text" rows="3"
                      placeholder="Какой-то текст параграфа">{{$note->text}}</textarea>
            @error('text')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <div class="mb-3">
            <button class="btn btn-success btn-submit">Обновить</button>
        </div>
    </form>
@endsection
