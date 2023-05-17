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
        <a class="btn bg-gradient-dark mb-0" href="{{ route('paragraphs.create') }}">
            <i class="material-icons text-sm">add</i>
            &nbsp;&nbsp; Добавить</a>
    </div>
    <div class="card mb-2">
        <ul class="list-group">
            @foreach ($paragraphs as $paragraph)

                <li class="list-group-item border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
                    <div class="flex-column">
                        <h6 class="mb-3 text-sm">№: {{$paragraph['position']}}</h6>
                    </div>
                    <div class=" flex-column  text-center"><p
                            class="fw-light text-wrap">{{$paragraph['text']}}</p></div>
                    <div class="ms-auto text-end">
                        <form method="get" action="{{ route('paragraphs.edit', ['id'=>$paragraph['id']]) }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="submit" class="btn btn-warning" value="Редактировать">
                            </div>
                        </form>
                        <form method="post" action="{{ route('paragraphs.destroy', ['id'=>$paragraph['id']]) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <div class="form-group">
                                <input type="submit" class="btn btn-danger" value="Удалить">
                            </div>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    {{$paragraphs->links('vendor.pagination.bootstrap-5')}}
@endsection

