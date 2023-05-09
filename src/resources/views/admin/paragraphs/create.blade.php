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

    <form method="POST" action="{{ route('paragraphs.create') }}">
        @csrf

        <div class="form-group">
            <label for="paragraph_number">Номер параграфа</label>
            <input type="text" class="form-control @error('position') is-invalid @enderror" id="position"
                   name="position" placeholder="12345">
            @error('position')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="paragraph_text">Example textarea</label>
            <textarea class="form-control @error('text') is-invalid @enderror" id="text" name="text" rows="3"
                      placeholder="Какой-то текст параграфа"></textarea>
            @error('text')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <!-- Equivalent to... -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <div class="mb-3">
            <button class="btn btn-success btn-submit">Добавить</button>
        </div>
    </form>
@endsection
