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
            <label for="number">Номер параграфа, в котором расположен предмет</label>
            <select class="form-control @error('paragraph_number') is-invalid @enderror" id="selectParagraphNumber" name="paragraph_number" required focus>
                <option value="" disabled selected>{{$paragraphItem->paragraph_number}}</option>
                @foreach($paragraphs as $paragraph)
                    <option value="{{$paragraph->number}}">{{ $paragraph->number }}</option>
                @endforeach
            </select>
            <input type="text" class="visually-hidden" id="paragraph_number" name="paragraph_number" value="{{$paragraphItem->paragraph_number}}">
            @error('paragraph_number')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="number">Идентификатор предмета</label>
            <select class="form-control @error('item_id') is-invalid @enderror" id="selectItemId" name="item_id" required focus>
                <option value="" disabled selected>{{$paragraphItem->item_id}}</option>
                @foreach($items as $item)
                    <option value="{{$item->id}}">{{$item->name}} (id:{{$item->id}})</option>
                @endforeach
            </select>
            <input type="text" class="visually-hidden" id="item_id" name="item_id" value="{{$paragraphItem->item_id}}">
            @error('item_id')
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

@section('scripts')
    <script type="text/javascript">
        new dropdownHelper('selectParagraphNumber', 'paragraph_number').addDropdownOnChangeListener();
        new dropdownHelper('selectItemId', 'item_id').addDropdownOnChangeListener();
    </script>
@endsection
