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

    <form method="POST" action="{{ route('paragraph_item.create') }}">
        @csrf
        <div class="form-group">
            <label for="number">Номер параграфа, в котором расположен предмет</label>
            <select class="form-control @error('paragraph_number') is-invalid @enderror" id="selectParagraphNumber" name="paragraph_number" required focus>
                <option value="" disabled selected>Выберите параграф</option>
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
            <label for="number">Идентификатор предмета</label>
            <select class="form-control @error('item_id') is-invalid @enderror" id="selectItemId" name="item_id" required focus>
                <option value="" disabled selected>Выберите предмет</option>
                @foreach($items as $item)
                    <option value="{{$item->id}}">(id:{{$item->id}})</option>
                @endforeach
            </select>
            <input type="text" class="visually-hidden" id="item_id" name="item_id">
            @error('item_id')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="title">Заголовок предмета в тексте</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                   name="title" placeholder="Непонятная херобора">
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
        const selectItemDropdownHelper = new dropdownHelper('selectItemId', 'item_id');

        selectParagraphDropdownHelper.addDropdownOnChangeListener()
        selectItemDropdownHelper.addDropdownOnChangeListener()
    </script>
@endsection
