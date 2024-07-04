/* Opening modals */
function modal1_Open() {
    document.getElementById("modal_1").classList.remove("disNone");
    document.getElementById("modal_2").classList.add("disNone");
    document.getElementById("modal_1").style.transition = "500ms ease-in";
    document.getElementById("modal_2").style.transition = "500ms ease-in";
    document.getElementById("base").style.opacity = "0%";
    document.getElementById("base").style.top = "-1000";
    document.getElementById("base").style.transition = "200ms ease-in";
}

function modal2_Open() {
    document.getElementById("modal_1").classList.add("disNone");
    document.getElementById("modal_2").classList.remove("disNone");
    document.getElementById("modal_1").style.transition = "500ms ease-in";
    document.getElementById("modal_2").style.transition = "500ms ease-in";
    document.getElementById("base").style.opacity = "0%";
    document.getElementById("base").style.top = "-1000";
    document.getElementById("base").style.transition = "200ms ease-in";
}

/* Closing all modals */
function modals_Close() {
    document.getElementById("modal_1").classList.add("disNone");
    document.getElementById("modal_2").classList.add("disNone");
    document.getElementById("modal_1").style.transition = "500ms ease-in";
    document.getElementById("modal_2").style.transition = "500ms ease-in";
    document.getElementById("base").style.opacity = "100%";
    document.getElementById("base").style.top = "0";
    document.getElementById("base").style.transition = "200ms ease-in";
}

