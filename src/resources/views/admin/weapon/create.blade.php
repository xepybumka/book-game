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

    <form method="POST" action="{{ route('weapon.create') }}">
        @csrf

        <div class="form-group">
            <label for="paragraph_number">Наименование оружия</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                   name="name" placeholder="Название оружия">
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="paragraph_number">Сила оружия</label>
            <input type="number" class="form-control @error('power') is-invalid @enderror" id="power"
                   name="power" placeholder="Сила оружия">
            @error('power')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <div class="mb-3">
            <button class="btn btn-success btn-submit">Добавить</button>
        </div>
    </form>
@endsection
