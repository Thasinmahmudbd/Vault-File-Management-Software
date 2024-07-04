// Open menu  
    var x = null;
    var y = null;
    var winWidth = null;
    var winHeight = null;

    //document.addEventListener('mousemove', onMouseUpdate, false);
    //document.addEventListener('mouseenter', onMouseUpdate, false);
    document.addEventListener('contextmenu', onMouseUpdate, false);
        
    function onMouseUpdate(e) {
        x = e.pageX;
        y = e.pageY;
        winWidth = window.innerWidth;
        winHeight = window.innerHeight;
        console.log(x, y, winWidth, winHeight);
        e.preventDefault();
        menu = document.getElementById("popupR");
        menu.style.display="grid";

        menu.style.top=y + "px";
        menu.style.left=x + "px";
        if(x>winWidth-150){
            menu.style.left=x-135 + "px";
        }
        if(y>winHeight-230){
            menu.style.top=y-200 + "px";
        }
        if(y<60){
            menu.style.top=60 + "px";
        }   
    }

// Close menu
    function closeMenu() {
        menu = document.getElementById("popupR");
        menu.style.display="none";
    }

// Theme change 
    function themeChange() {
        var mode = document.querySelector('.themeMode');

        let theme;

        if(mode.classList.contains("LightMode")){
            mode.classList.remove("LightMode");
            mode.classList.add("DarkMode");
            theme = "dark";
        }else{
            mode.classList.add("LightMode");
            mode.classList.remove("DarkMode");
            theme = "light";
        }

        localStorage.setItem("ModeTheme", JSON.stringify(theme));
    } 

    let restoreTheme = JSON.parse(localStorage.getItem("ModeTheme"));
    var mode = document.querySelector('.themeMode');

    if(restoreTheme === "light"){
        mode.classList.add("LightMode");
        mode.classList.remove("DarkMode");
    }else{
        mode.classList.add("DarkMode");
        mode.classList.remove("LightMode");
    }

// View change
function grid_view() {
    document.getElementById("view_type").classList.add("folderContainer");
    document.getElementById("view_type").classList.remove("folderContainerList");
    document.getElementById("view_type").style.transition = "500ms ease-in";
}

function list_view() {
    document.getElementById("view_type").classList.remove("folderContainer");
    document.getElementById("view_type").classList.add("folderContainerList");
    document.getElementById("view_type").style.transition = "500ms ease-in";
}



// // Opening folder options

// // Get all folder anchor elements
// const folderAnchors = document.querySelectorAll('.folder');

// // Get all option menu elements
// const optionMenus = document.querySelectorAll('.option_menu');

// // Function to close all option menus
// function closeAllOptionMenus() {
//     optionMenus.forEach(menu => {
//         menu.style.display = 'none';
//     });
// }

// // Function to toggle the visibility of the option menu for a folder
// function toggleOptionMenu(event) {
//     // Close all other option menus
//     closeAllOptionMenus();

//     // Get the corresponding option menu for the clicked folder
//     const optionMenu = event.currentTarget.nextElementSibling;

//     // Toggle the display of the option menu
//     optionMenu.style.display = optionMenu.style.display === 'grid' ? 'none' : 'grid';
// }

// // Add click event listeners to folder anchors
// folderAnchors.forEach(anchor => {
//     anchor.addEventListener('click', toggleOptionMenu);
// });

// // Function to handle closing the option menu when close menu button is clicked
// function closeFolderOption(event) {
//     // Close all option menus
//     closeAllOptionMenus();
// }

// // Add click event listener to close menu buttons
// const closeMenuButtons = document.querySelectorAll('.option_menu a[href="#"]');
// closeMenuButtons.forEach(button => {
//     button.addEventListener('click', closeFolderOption);
// });


// Get all folder anchor elements
const folderAnchors = document.querySelectorAll('.folder');

// Get all option menu elements
const optionMenus = document.querySelectorAll('.option_menu');

// Function to close all option menus
function closeAllOptionMenus() {
    optionMenus.forEach(menu => {
        menu.style.display = 'none';
    });
}

// Function to toggle the visibility of the option menu for a folder
function toggleOptionMenu(event) {
    // Close all other option menus
    closeAllOptionMenus();

    // Get the corresponding option menu for the clicked folder
    const optionMenu = event.currentTarget.nextElementSibling;

    // Calculate the optimal position for the option menu
    var mouseClickX = event.clientX;
    var mouseClickY = event.clientY;
    var mouseX = 35;
    var mouseY = 20;

    //x = e.pageX;
    //y = e.pageY;
    var winWidth = window.innerWidth;
    var winHeight = window.innerHeight;
    console.log("Start: " +mouseX, mouseY, mouseClickX, mouseClickY, winWidth, winHeight);
    //e.preventDefault();
    //menu = document.getElementById("popupR");
    // menu.style.display="grid";
        
    // menu.style.top=y + "px";
    // menu.style.left=x + "px";
    // if(x>winWidth-150){
    //     menu.style.left=x-135 + "px";
    // }
    // if(y>winHeight-230){
    //     menu.style.top=y-200 + "px";
    // }
    // if(y<60){
    //     menu.style.top=60 + "px";
    // }   

    // Set the position of the option menu
    optionMenu.style.display = 'grid';
    optionMenu.style.left = mouseX + 'px';
    optionMenu.style.top = mouseY + 'px';
    if(mouseClickX>winWidth-150){
        optionMenu.style.left=mouseX-125 + "px";
    }
    if(mouseClickY>winHeight-100){
        optionMenu.style.top=mouseY-105 + "px";
    }
    /*if(mouseY<60){
        optionMenu.style.top=60 + "px";
    }*/ 
    console.log("End: " +mouseX, mouseY, winWidth, winHeight);
}

// Function to handle closing the option menu when close menu button is clicked
function closeFolderOption(event) {
    // Close all option menus
    closeAllOptionMenus();
}

// Add click event listeners to folder anchors
folderAnchors.forEach(anchor => {
    anchor.addEventListener('click', toggleOptionMenu);
});

// Add click event listener to close menu buttons
const closeMenuButtons = document.querySelectorAll('.option_menu a[href="#"]');
closeMenuButtons.forEach(button => {
    button.addEventListener('click', closeFolderOption);
});



// Mob nav

/* Opening MobNav Search */
function MobNavOpen() {
    document.getElementById("MobNav").style.top = "60px";
    document.getElementById("ham").classList.add("disNone");
    document.getElementById("cross").classList.remove("disNone");
}

/* Closing MobNav Search */
function MobNavClose() {
    document.getElementById("MobNav").style.top = "-1000px";
    document.getElementById("cross").classList.add("disNone");
    document.getElementById("ham").classList.remove("disNone");
}



