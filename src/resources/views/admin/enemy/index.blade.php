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

    <div class="col-6 mb-2">
        <a class="btn bg-gradient-dark mb-0" href="{{ route('enemy.create') }}">
            <i class="material-icons text-sm">add</i>
            Добавить
        </a>
    </div>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Название</th>
            <th>Сила</th>
            <th>Сила атаки</th>
            <th>Тип атаки</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($enemies as $enemy)
            <tr>
                <td class="w-5">{{$enemy->id}}</td>
                <td class="w-30 text-wrap">{{$enemy->name}}</td>
                <td class="w-20 text-wrap">{{$enemy->power}}</td>
                <td class="w-20 text-wrap">{{$enemy->attack_power}}</td>
                <td class="w-20 text-wrap">{{$enemy->enemy_attack_type}}</td>
                <td class="w-5">
                    <div class="btn-group">
                        <form method="get" action="{{ route('enemy.show', ['id'=>$enemy->id]) }}">
                            @csrf
                            <button type="submit" class="btn btn-facebook"><i class="far fa-eye"></i></button>
                        </form>
                        <form method="get" action="{{ route('enemy.edit', ['id'=>$enemy->id]) }}">
                            @csrf
                            <button type="submit" class="btn btn-info"><i class="fas fa-edit"></i></button>
                        </form>
                        <form method="post" action="{{ route('enemy.destroy', ['id'=>$enemy->id]) }}">
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
    {{$enemies->links('vendor.pagination.bootstrap-5')}}
@endsection

