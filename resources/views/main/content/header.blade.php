<header class="mb-1 mt-1">
    <nav class="navbar navbar-toggleable-md navbar-light pt-0 pb-0">
        <div class="btn-group-justified px-1 mt-1" role="toolbar">
            <div id="menu-button">
                <div class="btn-group px-2">
                    <div id="open-menu-button">
                        <button class="header__menu-button" type="button" onclick="showMenu()">
                            <img src="/icons/icons8-menu.svg" width="50" height="50" alt="Меню">
                        </button>
                    </div>
                    <div id="menu-hidden-buttons" class="header__menu-hidden-buttons hidden">
                        <button class="header__menu-button" type="button" onclick="closeMenu()">
                            <img src="/icons/icons8-cancel.svg" width="50" height="50" alt="Меню">
                        </button>
                        <button id="header-menu-new-game-button" type="button" class="header__menu-button" onclick="redirectTo('{{url("new_game")}}');">
                            <img src="/icons/icons8-news.svg" width="50" height="50" alt="Новая игра">
                        </button>
                        <button id="header-menu-save-button" type="button" class="header__menu-button">
                            <img src="/icons/icons8-edit.svg" width="50" height="50" alt="Сохранить">
                        </button>
                        <button id="header-menu-load-button" type="button" class="header__menu-button">
                            <img src="/icons/icons8-image-file.svg" width="50" height="50" alt="Загрузить">
                        </button>
                        @if($showTutorialButton)
                            <button id="header-menu-tutorial-button" type="button" class="header__menu-button" onclick="showTutorial()">
                                <img src="/icons/icons8-bookmark.svg" width="50" height="50" alt="Правила">
                            </button>
                        @endif
                        @if($showHomeButton)
                            <button id="header-menu-home-button" type="button" class="header__menu-button" onclick="redirectTo('{{url("/")}}');">
                                <img src="/icons/icons8-external-link.svg" width="50" height="50" alt="На главную страницу">
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @if($showSidebarButton)
            <div class="header__sidebar-button">
                <button id="header-show-sidebar-button" class="header__menu-button" onclick="openNav()">
                    <img src="/icons/icons8-about.svg" width="50" height="50" alt="О персонаже">
                </button>
            </div>
        @endif
    </nav>
</header>
