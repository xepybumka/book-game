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

    <form method="post" action="{{ route('enemy.update',['id' => $enemy->id]) }}">
        @csrf
        {{ method_field('PUT') }}

        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                   value="{{$enemy->name}}" name="name" placeholder="Название противника">
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="power">Сила </label>
            <input class="form-control @error('power') is-invalid @enderror" id="power"
                   value="{{$enemy->power}}" name="power" placeholder="123">
            @error('power')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="attack_power">Сила атаки</label>
            <input class="form-control @error('attack_power') is-invalid @enderror" id="attack_power"
                   value="{{$enemy->attack_power}}" name="attack_power" placeholder="123">
            @error('attack_power')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="enemy_attack_type">Тип атаки</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm" id="enemy_attack_type" name="enemy_attack_type">
                @foreach ($attack_types as $type)
                    <option value="{{$type->value}}" @selected($type->value == $enemy->enemy_attack_type)>{{$type->name}}</option>
                @endforeach
            </select>
            @error('enemy_attack_type')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <div class="mb-3">
            <button class="btn btn-success btn-submit">Обновить</button>
        </div>
    </form>
@endsection
