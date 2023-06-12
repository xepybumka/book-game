@extends('layouts.main_layout')

@section('header')
    <div class="header__wrapper">
        <div class="top-menu">
            <div class="top-menu__arrow">
                <a class="top-menu__menu-arrow">
                    <img src="../images/svg/menu_arrow.svg" alt="arrow" class="top-menu__arrow-pic">
                </a>
            </div>
            <nav class="top-menu__nav">
                <ul class="top-menu__list">
                    <li class="top-menu__item">
                        <a href="#!" class="top-menu__link">Новая игра</a>
                    </li>
                    <li class="top-menu__item">
                        <a href="#!" class="top-menu__link">Загрузить</a>
                    </li>
                    <li class="top-menu__item">
                        <a href="#!" class="top-menu__link">Сохранить</a>
                    </li>
                    <li class="top-menu__item">
                        <a href="#!" class="top-menu__link">Правила</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection

@section('content')
    <div class="left_sidebar">
        <a class="sidebar__left_top_ungle"></a>
        <a class="sidebar__right_top_ungle"></a>

        <div class="left-sidebar__character-parameters">
            <ul class="sidebar-paramerers__list">
                <li class="sidebar-paramerers__item">
                    <span>Ловкость 12</span>
                </li>
                <li class="sidebar-paramerers__item">
                    <span>Сила 23</span>
                </li>
                <li class="sidebar-paramerers__item">
                    <span>Обаяние 10</span>
                </li>
                <li class="sidebar-paramerers__item">
                    <span>Сила мысли 9</span>
                </li>
            </ul>
        </div>
        <div class="sidebar__separator"></div>
        <div class="left-sidebar__character-pockets">
            <ul class="sidebar-paramerers__list">
                <li class="sidebar-paramerers__item">
                    <span>Деньги 64</span>
                </li>
                <li class="sidebar-paramerers__item">
                    <span>Еда 0</span>
                </li>
            </ul>
        </div>
        <div class="sidebar__separator"></div>
        <div class="left-sidebar__character-bag">
            <p>В заплечном мешке</p>
            <ul class="character-bag__list">
                <li class="character-bag__item">
                    <span>- Амулет -</span>
                </li>
                <li class="character-bag__item">
                    <span>- Дневник -</span>
                </li>
                <li class="character-bag__item">
                    <span>- Часы -</span>
                </li>
                <li class="character-bag__item">
                    <span>- Карта -</span>
                </li>
                <li class="character-bag__item">
                    <span>-</span>
                </li>
                <li class="character-bag__item">
                    <span>-</span>
                </li>
                <li class="character-bag__item">
                    <span>-</span>
                </li>
                <li class="character-bag__item">
                    <span>-</span>
                </li>
            </ul>
            </nav>
        </div>

        <a class="sidebar__right_bottom_ungle"></a>
        <a class="sidebar__left_bottom_ungle"></a>
    </div>

    <div class="right_sidebar">
        <a class="sidebar__left_top_ungle"></a>
        <a class="sidebar__right_top_ungle"></a>

        <div class="right_sidebar__weapon">
                <span>
                    Копье <span>+3</span>
                </span>
        </div>
        <div class="sidebar__separator"></div>
        <div class="right_sidebar__luck_pouch">
            <p>Удача</p>
            <div class="luck_pouch_container">
                <div class="luck_pouch_line">
                    <span class="luck_pouch_item ">1</span>
                    <span class="luck_pouch_item del-cross">2</span>
                    <span class="luck_pouch_item ">3</span>
                </div>
                <div class="luck_vertical_left_separator"></div>
                <div class="luck_horizontal_separator"></div>
                <div class="luck_vertical_right_separator"></div>
                <div class="luck_pouch_line">
                    <span class="luck_pouch_item del-cross">4</span>
                    <span class="luck_pouch_item">5</span>
                    <span class="luck_pouch_item">6</span>
                </div>
            </div>
        </div>
        <a class="sidebar__right_bottom_ungle"></a>
        <a class="sidebar__left_bottom_ungle"></a>
    </div>
@endsection
