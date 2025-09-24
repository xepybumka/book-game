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
        <a class="btn bg-gradient-dark mb-0" href="{{ route('item.create') }}">
            <i class="material-icons text-sm">add</i>
            Добавить
        </a>
    </div>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Название</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($items as $item)
            <tr>
                <td class="w-5">{{$item->id}}</td>
                <td class="w-90 text-wrap">{{$item->name}}</td>
                <td class="w-5">
                    <div class="btn-group">
                        <form method="get" action="{{ route('item.show', ['id' => $item->id]) }}">
                            @csrf
                            <button type="submit" class="btn btn-facebook"><i class="far fa-eye">show</i></button>
                        </form>
                        <form method="get" action="{{ route('item.edit', ['id' => $item->id]) }}">
                            @csrf
                            <button type="submit" class="btn btn-info"><i class="fas fa-edit">edit</i></button>
                        </form>
                        <form method="post" action="{{ route('item.destroy', ['id' => $item->id]) }}">
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
    {{$items->links('core.vendor.pagination.bootstrap-5')}}
@endsection

