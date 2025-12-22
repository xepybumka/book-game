<div class="text_part">
    <div class="text_part__text">
        <div id="mainParagraphText">
            @if(\App\Enums\ParagraphTypeEnum::isText($paragraph->type->value))
                <p><?=$paragraph->text?></p>
            @else
                <?=$paragraph->text?>
            @endif
        </div>
    </div>
</div>
