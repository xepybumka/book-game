<header class="mb-1 w-80 mt-1">
    <nav class="navbar navbar-toggleable-md navbar-light pt-0 pb-0">
        <div class="btn-group-justified px-1 mt-1" role="toolbar">
            <div id="menu-button">
                <div class="btn-group px-2">
                    <div id="open-menu-button">
                        <button class="menu-button" type="button" onclick="showMenu()">
                            <img src="/icons/icons8-menu.svg" width="50" height="50" alt="Меню">
                        </button>
                    </div>
                    <div id="menu-hidden-buttons" class="menu-hidden-buttons hidden">
                        <button class="menu-button" type="button" onclick="closeMenu()">
                            <img src="/icons/icons8-cancel.svg" width="50" height="50" alt="Меню">
                        </button>
                        <button type="button" class="menu-button" onclick="redirectTo('{{url("new_game")}}');">
                            <img src="/icons/icons8-news.svg" width="50" height="50" alt="Новая игра">
                        </button>
                        <button type="button" class="menu-button">
                            <img src="/icons/icons8-edit.svg" width="50" height="50" alt="Сохранить">
                        </button>
                        <button type="button" class="menu-button">
                            <img src="/icons/icons8-image-file.svg" width="50" height="50" alt="Загрузить">
                        </button>
                        @if($showTutorialButton)
                            <button type="button" class="menu-button" onclick="showTutorial()">
                                <img src="/icons/icons8-bookmark.svg" width="50" height="50" alt="Правила">
                            </button>
                        @endif
                        @if($showHomeButton)
                            <button type="button" class="menu-button" onclick="redirectTo('{{url("/")}}');">
                                <img src="/icons/icons8-external-link.svg" width="50" height="50" alt="На главную страницу">
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
