function openNav() {
    document.getElementById("mySidebar").style.width = "20%";
    document.getElementById("button-show-sidebar").style.display = "none";
}

function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("button-show-sidebar").style.display = "block";
}

function showRules() {
    $("#content").fadeOut();
    $("#rules").fadeIn();
}

function closeRules() {
    $("#content").fadeIn();
    $("#rules").fadeOut();
}
