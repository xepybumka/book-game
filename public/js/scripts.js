function openNav() {
    document.getElementById("mySidebar").style.width = "20%";
    document.getElementById("button-show-sidebar").style.display = "none";
}

function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("button-show-sidebar").style.display = "block";
}

function showTutorial() {
    $("#content").fadeOut();
    $("#tutorial").fadeIn();
}

function closeTutorial() {
    $("#content").fadeIn();
    $("#tutorial").fadeOut();
}

function showMenu(){
    $('.menu-hidden-buttons').removeClass('hidden').addClass('active');
    document.getElementById("open-menu-button").style.opacity = '0';
}

function closeMenu(){
    $('.menu-hidden-buttons').removeClass('active');
    document.getElementById("open-menu-button").style.opacity = '1';
}
