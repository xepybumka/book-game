<div id="tutorial" class="tutorial">
    <a href="javascript:void(0)" onclick="closeTutorial()">
        <img src="/icons/icons8-cancel.svg" width="50" height="50" alt="Меню">
    </a>
    <h3>{{$title}}</h3>
    @foreach($content as $paragraph)
        <h4 class="text-center">{{$paragraph['title']}}</h4>
        <p class="text-center">{{$paragraph['text']}}</p>
    @endforeach
</div>
