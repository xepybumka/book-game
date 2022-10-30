<div id="tutorial" class="tutorial">
    <a href="javascript:void(0)" onclick="closeTutorial()">
        <img src="/icons/icons8-cancel.svg" width="50" height="50" alt="Меню">
    </a>
    <h3>{{$title}}</h3>
    @foreach($rules as $rule)
        @include('main.content.rule',['title'=>$rule['title'],'text'=>$rule['text']])
    @endforeach
</div>
