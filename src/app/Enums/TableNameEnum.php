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
    case Event = 'event';
    case EventType = 'event_type';
    case Character = 'character';
    case CharacterItem = 'character_item';
}
