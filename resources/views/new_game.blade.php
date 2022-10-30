@extends('main')

@section('header')
    @include('main.content.header', ['showTutorialButton'=>false, 'showHomeButton' =>true])
@endsection

@section('sidebar')

@endsection

@section('content')
    <div id="content" class="content mb-5">
        <h3 class="text-center">{{$title}}</h3>
        <div id="page" class="text-center page-text">
            @foreach($rules as $rule)
                @include('main.content.rule',['title'=>$rule['title'],'text'=>$rule['text']])
            @endforeach
        </div>
        <div class="text-center page-text mt-5 border">
            <p class="mt-3">
                Я внимательно прочел(ла) все правила и готов(а) начать приключение!
            </p>
            <button class="menu-button" type="button" onclick="redirectTo('{{url("create_character")}}');">
                <img src="/icons/icons8-tick-box.svg" width="50" height="50" alt="Меню">
            </button>
        </div>
    </div>
@endsection
