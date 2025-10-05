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

    <form method="post" action="{{ route('paragraph_item.update',['id' => $paragraphItem->id]) }}">
        @csrf
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="number">Номер параграфа, В КОТОРОМ находится предмет переход</label>
            <input type="text" class="form-control @error('paragraph_number') is-invalid @enderror" id="paragraph_number"
                   value="{{$paragraphItem->paragraph_number}}" name="paragraph_number" placeholder="22">
            @error('paragraph_number')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="number">Идентификатор предмета</label>
            <input type="text" class="form-control @error('item_id') is-invalid @enderror" id="item_id"
                   value="{{$paragraphItem->item_id}}" name="item_id" placeholder="Какая-то херобора">
            @error('to_paragraph_number')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="title">Текст перехода</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                   value="{{$paragraphItem->title}}" name="title" placeholder="Текст перехода">
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <div class="mb-3">
            <button class="btn btn-success btn-submit">Обновить</button>
        </div>
    </form>
@endsection
