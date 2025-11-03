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

    <form method="post" action="{{ route('paragraph_transition.update',['id' => $paragraphTransition->id]) }}">
        @csrf
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="number">Номер параграфа, В КОТОРОМ расположен переход</label>
            <select class="form-control @error('paragraph_number') is-invalid @enderror" id="selectParagraphNumber" name="paragraph_number" required focus>
                <option value="" disabled selected>{{$paragraphTransition->paragraph_number}}</option>
                @foreach($paragraphs as $paragraph)
                    <option value="{{$paragraph->number}}">{{ $paragraph->number }}</option>
                @endforeach
            </select>
            <input type="text" class="visually-hidden" id="paragraph_number" name="paragraph_number" value="{{$paragraphTransition->paragraph_number}}">
            @error('paragraph_number')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="number">Номер параграфа, КУДА переходим </label>
            <select class="form-control @error('to_paragraph_number') is-invalid @enderror" id="selectToParagraphNumber" name="to_paragraph_number" required focus>
                <option value="" disabled selected>{{$paragraphTransition->to_paragraph_number}}</option>
                @foreach($paragraphs as $paragraph)
                    <option value="{{$paragraph->number}}">{{ $paragraph->number }}</option>
                @endforeach
            </select>
            <input type="text" class="visually-hidden" id="paragraph_number" name="paragraph_number" value="{{$paragraphTransition->to_paragraph_number}}">
            @error('to_paragraph_number')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="title">Текст перехода</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                   value="{{$paragraphTransition->title}}" name="title" placeholder="Текст перехода">
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
        new dropdownHelper().addDropdownOnChangeListener('selectParagraphNumber', 'paragraph_number');
        new dropdownHelper().addDropdownOnChangeListener('selectToParagraphNumber', 'to_paragraph_number');
    </script>
@endsection
