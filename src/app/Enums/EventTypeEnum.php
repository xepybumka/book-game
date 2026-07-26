<?php

namespace App\Enums;

enum EventTypeEnum: int
{
    case Trade = 1; // Торговля ?  воздействие
    case Battle = 2; // Сражение
    case Luck = 3; // Проверка удачи ? воздействие
    case EndOfDay = 4; // Смена дня ? воздействие
    case LevelUp = 5; // Получение уровня ?  воздействие + доп параграф + возврат на ключевой параграф
    case Hungry = 7; // Голод
    case TakeItem = 8; // Подбор предмета
    case Influence = 9; //  воздействие
    case Note = 10; // Занесение в заметку
    case Death = 11; // Смерть
    case CheckParameters = 12; // Проверка параметров
    case Game = 13; // Мини игра (игра на кубиках)
}
