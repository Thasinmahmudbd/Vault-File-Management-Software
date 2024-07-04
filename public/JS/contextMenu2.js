var menu = document.querySelector(".context-menu");
var menuState = 0;
var contextMenuActive = "block";

// Method to turn on fullscreen of current window
function fullscreen() {
    document.documentElement.requestFullscreen();
}

// Event Listener for window ContextMenu Event - When Right Click is clicked
document.addEventListener("contextmenu", function (ev) {
    event.preventDefault();
    toggleMenuOn();
    positionMenu(ev);
});

// Turns the custom context menu on.
function toggleMenuOn() {
    if (menuState !== 1) {
        menuState = 1;
        menu.classList.add(contextMenuActive);
    }
}

// Turns the custom context menu off.
function toggleMenuOff() {
    if (menuState !== 0) {
        menuState = 0;
        menu.classList.remove(contextMenuActive);
    }
}

// Get the position of the right click in window and returns the X and Y coordinates
function getPosition(e) {
    var posx = 0;
    var posy = 0;

    if (!e) var e = window.ev;

    if (e.pageX || e.pageY) {
        posx = e.pageX;
        posy = e.pageY;
    } else if (e.clientX || e.clientY) {
        posx =
            e.clientX +
            document.body.scrollLeft +
            document.documentElement.scrollLeft;
        posy =
            e.clientY + document.body.scrollTop + document.documentElement.scrollTop;
    }

    return {
        x: posx,
        y: posy
    };
}

// Position the Context Menu in right position.
function positionMenu(e) {
    let clickCoords = getPosition(e);
    let clickCoordsX = clickCoords.x;
    let clickCoordsY = clickCoords.y;

    let menuWidth = menu.offsetWidth + 4;
    let menuHeight = menu.offsetHeight + 4;

    let windowWidth = window.innerWidth;
    let windowHeight = window.innerHeight;

    if (windowWidth - clickCoordsX < menuWidth) {
        menu.style.left = windowWidth - menuWidth + "px";
    } else {
        menu.style.left = clickCoordsX + "px";
    }

    if (windowHeight - clickCoordsY < menuHeight) {
        menu.style.top = windowHeight - menuHeight + "px";
    } else {
        menu.style.top = clickCoordsY + "px";
    }
}

// Event Listener for Close Context Menu when outside of menu clicked
document.addEventListener("click", (e) => {
    var button = e.which || e.button;
    if (button === 1) {
        toggleMenuOff();
    }
});

// Close Context Menu on Esc key press
window.onkeyup = function (e) {
    if (e.keyCode === 27) {
        toggleMenuOff();
    }
}