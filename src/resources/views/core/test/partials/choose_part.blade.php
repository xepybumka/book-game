<div class="choose_wrapper">
    <div class="text_wrap">
        <table class="table table-striped">
            <div id="mainParagraphTransition">
                <thead>
                <tr>
                    <th></th>
                </tr>
                </thead>
                <tbody>
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
            </div>
        </table>
    </div>
</div>

<script>
    let onclickTransition = function (number) {
        new transitionHelper().goToParagraphNumber(number);
    }
</script>
