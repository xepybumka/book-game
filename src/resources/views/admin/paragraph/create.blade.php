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

    <form method="POST" action="{{ route('paragraph.create') }}">
        @csrf

        <div class="form-group">
            <label for="number">Номер параграфа</label>
            <input type="text" class="form-control @error('number') is-invalid @enderror" id="number" name="number" placeholder="12345">
            @error('number')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <select class="form-control @error('type') is-invalid @enderror" id="selectParagraphType" name="type" required focus>
            <option value="" disabled selected>Выберите тип параграфа</option>
            @foreach($types as $type)
                <option value="{{$type->value}}">{{ $type->name }}</option>
            @endforeach
        </select>
        <div class="form-group">
            <label for="text">Example textarea</label>
            <textarea class="form-control @error('text') is-invalid @enderror" id="text" name="text" rows="3"
                      placeholder="Какой-то текст параграфа"></textarea>
            @error('text')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <!-- Equivalent to... -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <div class="mb-3">
            <button class="btn btn-success btn-submit">Добавить</button>
        </div>
    </form>
@endsection

@section('script-module')
    @vite('resources/js/dropdown-helper.js')
    <script type="module">
        window.dropdownHelper.addDropdownOnChangeListener('selectParagraphType', 'type');
    </script>
@endsection
