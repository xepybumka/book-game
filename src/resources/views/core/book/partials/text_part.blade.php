<div class="text_part">
    <div class="text_part__text">
        @if(\App\Enums\ParagraphTypeEnum::isText($paragraph->type->value))
            <p id="mainParagraphText"><?=$paragraph->text?></p>
        @else
            <?=$paragraph->text?>
        @endif
    </div>
</div>
