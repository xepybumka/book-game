<div class="choose_wrapper">
    <div class="choose_wrapper__text">
        <table class="table table-striped" id="mainParagraphTransitionTable">
            <thead>
            <tr><th></th></tr>
            </thead>
            <tbody id="mainParagraphTransition">
            <!-- сюда будут подставляться кнопки -->
            @foreach($paragraph->transitions as $transition)
                <tr>
                    <td class="w-100">
                        <div class="choose_wrapper__button">
                            <button class="btn" onclick="onclickTransition({{$transition->to_paragraph_number}})">
                                {{$transition->title}}
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    let onclickTransition = function (number) {
        goToParagraphNumber(number);
    }
</script>
