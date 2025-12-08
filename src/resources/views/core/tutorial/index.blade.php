@extends('layouts.main_layout')

@section('header')
    <div class="header__wrapper">
        @include('core.book.partials.top_menu')
    </div>
@endsection

@section('content')
    <div class="content_wrap">
        @include('core.book.partials.left_sidebar')
        <div class="text_and_chooses_wrap">
            @include('core.book.partials.text_part')
            @include('core.book.partials.choose_part')
        </div>
        @include('core.book.partials.right_sidebar')
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        const goToParagraphNumber = function (number) {
            getParagraphContent(number);
        }

        const getParagraphContent = function (number) {
            $.ajax({
                url: '/get_paragraph/' + number,
                type: "get",
                data: {},
                success: function (data) {
                    replaceParagraphContent(data);
                }
            });
        }

        const replaceParagraphContent = function (data) {
            setParagraphContent(data.paragraph);
            setTransitionContent(data.transitions);
        }

        const setParagraphContent = function (paragraph) {
            let mainParagraphTextId = 'mainParagraphText';
            $(`#${mainParagraphTextId}`).text(paragraph.text);
        }

        const setTransitionContent = function (transitions) {
            const tbody = document.getElementById('mainParagraphTransition');
            tbody.innerHTML = ''; // очищаем

            transitions.forEach(transition => {
                const tr = document.createElement('tr');
                const td = document.createElement('td');
                td.className = 'w-100';

                const div = document.createElement('div');
                div.className = 'choose_wrapper__button';

                const button = document.createElement('button');
                button.className = 'btn';
                button.textContent = transition.title;
                button.addEventListener('click', () => onclickTransition(transition.to_paragraph_number));

                div.appendChild(button);
                td.appendChild(div);
                tr.appendChild(td);
                tbody.appendChild(tr);
            });
        }
    </script>
@endsection
