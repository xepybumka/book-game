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

    <form method="POST" action="{{ route('paragraph_transition.create') }}">
        @csrf
        <div class="form-group">
            <label for="number">Номер параграфа, В КОТОРОМ расположен переход</label>
            <select class="form-control @error('paragraph_number') is-invalid @enderror" id="selectParagraphNumber" name="paragraph_number" required focus>
                <option value="" disabled selected>Выберите параграф ОТКУДА</option>
                @foreach($paragraphs as $paragraph)
                    <option value="{{$paragraph->number}}">{{ $paragraph->number }}</option>
                @endforeach
            </select>
            <input type="text" class="visually-hidden" id="paragraph_number" name="paragraph_number">
            @error('paragraph_number')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="number">Номер параграфа, КУДА переходим </label>
            <select class="form-control @error('to_paragraph_number') is-invalid @enderror" id="selectToParagraphNumber" name="to_paragraph_number" required focus>
                <option value="" disabled selected>Выберите параграф КУДА</option>
                @foreach($paragraphs as $paragraph)
                    <option value="{{$paragraph->number}}">{{ $paragraph->number }}</option>
                @endforeach
            </select>
            <input type="text" class="visually-hidden" id="to_paragraph_number" name="to_paragraph_number">
            @error('to_paragraph_number')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="title">Текст перехода</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                   name="title" placeholder="Текст перехода">
            @error('name')
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

@section('scripts')
    <script type="text/javascript">
        const selectParagraphDropdownHelper = new dropdownHelper('selectParagraphNumber', 'paragraph_number');
        const selectParagraphToDropdownHelper = new dropdownHelper('selectToParagraphNumber', 'to_paragraph_number');

        selectParagraphDropdownHelper.addDropdownOnChangeListener()
        selectParagraphToDropdownHelper.addDropdownOnChangeListener()
    </script>
@endsection

