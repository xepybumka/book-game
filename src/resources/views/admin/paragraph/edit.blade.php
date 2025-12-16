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

    <form method="post" action="{{ route('paragraph.update',['id' => $paragraph->id]) }}">
        @csrf
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="number">Номер параграфа</label>
            <input type="text" class="form-control @error('number') is-invalid @enderror" id="number"
                   value="{{$paragraph->number}}" name="number" placeholder="12345">
            @error('number')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="type">Тип параграфа</label>
            <select class="form-control @error('type') is-invalid @enderror" id="selectParagraphType" name="type" required focus>
                <option value="" disabled selected>{{\App\Enums\ParagraphTypeEnum::from($paragraph->type->value)->name}}</option>
                @foreach($types as $type)
                    <option value="{{$type->value}}">{{$type->name}}</option>
                @endforeach
            </select>
            <input type="text" class="visually-hidden" id="type" name="type" value="{{$paragraph->type->value}}">
            @error('type')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="text">Какой-то текст заметки</label>
            <textarea class="form-control @error('text') is-invalid @enderror" id="text" name="text" rows="3"
                      placeholder="Какой-то текст параграфа">{{$paragraph->text}}</textarea>
            @error('text')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <div class="mb-3">
            <button class="btn btn-success btn-submit">Обновить</button>
        </div>
    </form>
@endsection

@section('script-module')
    @vite('resources/js/dropdown-helper.js')
    <script type="module">
        window.dropdownHelper.addDropdownOnChangeListener('selectParagraphType', 'type');
    </script>
@endsection
