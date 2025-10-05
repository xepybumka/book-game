<?php

namespace App\Enums;
enum TableNameEnum: string
{
    case Enemy = 'enemy';
    case Item = 'item';
    case Note = 'note';
    case Paragraph = 'paragraph';
    case Weapon = 'weapon';
    case ParagraphTransition = 'paragraph_transition';
    case ParagraphItem = 'paragraph_item';
}
