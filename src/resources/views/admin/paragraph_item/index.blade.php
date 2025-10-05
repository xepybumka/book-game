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
        <a class="btn bg-gradient-dark mb-0" href="{{ route('paragraph_item.create') }}">
            <i class="material-icons text-sm">add</i>
            Добавить</a>
    </div>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th class="w-20">Номер параграфа, где находится предмет</th>
            <th class="w-20">Идентификатор предмета</th>
            <th class="w-55">Заголовок предмета в тексте</th>
            <th class="w-5"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($paragraphItems as $paragraphItem)
            <tr>
                <td class="text-wrap">{{$paragraphItem->paragraph_number}}</td>
                <td class="text-wrap">{{$paragraphItem->item_id}}</td>
                <td class="text-wrap">{{$paragraphItem->title}}</td>
                <td>
                    <div class="btn-group btn-sm">
                        <form method="get"
                              action="{{ route('paragraph_item.show', ['id'=>$paragraphItem->id]) }}">
                            @csrf
                            <button type="submit" class="btn btn-facebook"><i class="far fa-eye">show</i></button>
                        </form>
                        <form method="get"
                              action="{{ route('paragraph_item.edit', ['id'=>$paragraphItem->id]) }}">
                            @csrf
                            <button type="submit" class="btn btn-info"><i class="fas fa-edit">edit</i></button>
                        </form>
                        <form method="post"
                              action="{{ route('paragraph_item.destroy', ['id'=>$paragraphItem->id]) }}">
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
    {{$paragraphItems->links('core.vendor.pagination.bootstrap-5')}}
@endsection
