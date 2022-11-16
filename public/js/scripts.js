function openNav() {
    document.getElementById("mySidebar").style.width = "20%";
    document.getElementById("header-show-sidebar-button").style.display = "none";
}

function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("header-show-sidebar-button").style.display = "block";
}

function showTutorial() {
    $("#content").fadeOut();
    $("#tutorial").fadeIn();
    closeMenu();
}

function closeTutorial() {
    $("#content").fadeIn();
    $("#tutorial").fadeOut();
}

function showMenu() {
    $('.header__menu-hidden-buttons').removeClass('hidden').addClass('active');
    document.getElementById("open-menu-button").style.opacity = '0';
}

function closeMenu() {
    $('.header__menu-hidden-buttons').removeClass('active');
    setTimeout("document.getElementById('open-menu-button').style.opacity = '1';", 300);
}

function redirectTo(url) {
    window.location.href = url;
}
