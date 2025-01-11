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
        <a class="btn bg-gradient-dark mb-0" href="{{ route('weapon.create') }}">
            <i class="material-icons text-sm">add</i>
            &nbsp;&nbsp; Добавить</a>
    </div>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Название</th>
            <th>Сила оружия</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($weapons as $weapon)
            <tr>
                <td class="w-5">{{$weapon->id}}</td>
                <td class="w-30 text-wrap">{{$weapon->name}}</td>
                <td class="w-50 text-wrap">{{$weapon->power}}</td>
                <td class="w-5">
                    <div class="btn-group">
                        <form method="get" action="{{ route('weapon.show', ['id' => $weapon->id]) }}">
                            @csrf
                            <button type="submit" class="btn btn-facebook"><i class="far fa-eye"></i></button>
                        </form>
                        <form method="get" action="{{ route('weapon.edit', ['id' => $weapon->id]) }}">
                            @csrf
                            <button type="submit" class="btn btn-info"><i class="fas fa-edit"></i></button>
                        </form>
                        <form method="post" action="{{ route('weapon.destroy', ['id' => $weapon->id]) }}">
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

    {{$weapons->links('core.vendor.pagination.bootstrap-5')}}
@endsection

