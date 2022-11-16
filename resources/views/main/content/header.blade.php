<header class="mb-1 mt-1">
    <nav class="navbar navbar-toggleable-md navbar-light pt-0 pb-0">
        <div class="btn-group-justified px-1 mt-1" role="toolbar">
            <div id="menu-button">
                <div class="btn-group px-2">
                    <button id="open-menu-button" data-title="Меню" class="header__menu-button" type="button"
                            onclick="showMenu()">
                        <img src="/icons/icons8-menu.svg" width="50" height="50">
                    </button>
                    <div id="menu-hidden-buttons" class="header__menu-hidden-buttons hidden">
                        <button class="header__menu-button" data-title="Свернуть меню" type="button"
                                onclick="closeMenu()">
                            <img src="/icons/icons8-cancel.svg" width="50" height="50">
                        </button>
                        <button id="header-menu-new-game-button" data-title="Новая игра" type="button"
                                class="header__menu-button" onclick="redirectTo('{{url("new_game")}}');">
                            <img src="/icons/icons8-news.svg" width="50" height="50">
                        </button>
                        <button id="header-menu-save-button" type="button" data-title="Сохранить"
                                class="header__menu-button">
                            <img src="/icons/icons8-edit.svg" width="50" height="50">
                        </button>
                        <button id="header-menu-load-button" type="button" data-title="Загрузить"
                                class="header__menu-button">
                            <img src="/icons/icons8-image-file.svg" width="50" height="50">
                        </button>
                        @if($showTutorialButton)
                            <button id="header-menu-tutorial-button" type="button" data-title="Правила"
                                    class="header__menu-button" onclick="showTutorial()">
                                <img src="/icons/icons8-bookmark.svg" width="50" height="50">
                            </button>
                        @endif
                        @if($showHomeButton)
                            <button id="header-menu-home-button" type="button" data-title="На главную страницу"
                                    class="header__menu-button" onclick="redirectTo('{{url("/")}}');">
                                <img src="/icons/icons8-external-link.svg" width="50" height="50">
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @if($showSidebarButton)
            <div class="header__sidebar-button">
                <button id="header-show-sidebar-button" class="header__menu-button" data-title="О персонаже"
                        onclick="openNav()">
                    <img src="/icons/icons8-about.svg" width="50" height="50">
                </button>
            </div>
        @endif
    </nav>
</header>
