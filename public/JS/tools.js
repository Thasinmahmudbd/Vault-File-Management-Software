// DRAG-ABLE MODALS --- CodeChange

// Get the modal
var modal = document.getElementById('CodeChange');
    
// Variable for storing the offset
var offsetX, offsetY;

// Function to handle mouse down event
function handleMouseDown(event) {
    event.preventDefault();
    offsetX = event.clientX - modal.getBoundingClientRect().left;
    offsetY = event.clientY - modal.getBoundingClientRect().top;
    document.addEventListener('mousemove', handleMouseMove);
    document.addEventListener('mouseup', handleMouseUp);
}

// Function to handle mouse move event
function handleMouseMove(event) {
    modal.style.left = (event.clientX - offsetX+163) + 'px';
    modal.style.top = (event.clientY - offsetY+113) + 'px';
}

// Function to handle mouse up event
function handleMouseUp(event) {
    document.removeEventListener('mousemove', handleMouseMove);
    document.removeEventListener('mouseup', handleMouseUp);
}

// Add event listener for mouse down event on the modal title box
modal.querySelector('.titleBox').addEventListener('mousedown', handleMouseDown);


// DRAG-ABLE MODALS --- IntensiveSearch

// Get the modal
var modal2 = document.getElementById('IntensiveSearch');
    
// Variable for storing the offset
var offsetX2, offsetY2;

// Function to handle mouse down event
function handleMouseDown2(event) {
    event.preventDefault();
    offsetX2 = event.clientX - modal2.getBoundingClientRect().left;
    offsetY2 = event.clientY - modal2.getBoundingClientRect().top;
    document.addEventListener('mousemove', handleMouseMove2);
    document.addEventListener('mouseup', handleMouseUp2);
}

// Function to handle mouse move event
function handleMouseMove2(event) {
    modal2.style.left = (event.clientX - offsetX2+203) + 'px';
    modal2.style.top = (event.clientY - offsetY2+40) + 'px';
}

// Function to handle mouse up event
function handleMouseUp2(event) {
    document.removeEventListener('mousemove', handleMouseMove2);
    document.removeEventListener('mouseup', handleMouseUp2);
}

// Add event listener for mouse down event on the modal2 title box
modal2.querySelector('.titleBox').addEventListener('mousedown', handleMouseDown2);


// DRAG-ABLE MODALS --- RecycleBin

// Get the modal
var modal3 = document.getElementById('RecycleBin');
    
// Variable for storing the offset
var offsetX3, offsetY3;

// Function to handle mouse down event
function handleMouseDown3(event) {
    event.preventDefault();
    offsetX3 = event.clientX - modal3.getBoundingClientRect().left;
    offsetY3 = event.clientY - modal3.getBoundingClientRect().top;
    document.addEventListener('mousemove', handleMouseMove3);
    document.addEventListener('mouseup', handleMouseUp3);
}

// Function to handle mouse move event
function handleMouseMove3(event) {
    modal3.style.left = (event.clientX - offsetX3+205) + 'px';
    modal3.style.top = (event.clientY - offsetY3+153) + 'px';
}

// Function to handle mouse up event
function handleMouseUp3(event) {
    document.removeEventListener('mousemove', handleMouseMove3);
    document.removeEventListener('mouseup', handleMouseUp3);
}

// Add event listener for mouse down event on the modal2 title box
modal3.querySelector('.titleBox').addEventListener('mousedown', handleMouseDown3);



// DRAG-ABLE MODALS --- AccReq

// Get the modal
var modal4 = document.getElementById('AccReq');
    
// Variable for storing the offset
var offsetX4, offsetY4;

// Function to handle mouse down event
function handleMouseDown4(event) {
    event.preventDefault();
    offsetX4 = event.clientX - modal4.getBoundingClientRect().left;
    offsetY4 = event.clientY - modal4.getBoundingClientRect().top;
    document.addEventListener('mousemove', handleMouseMove4);
    document.addEventListener('mouseup', handleMouseUp4);
}

// Function to handle mouse move event
function handleMouseMove4(event) {
    modal4.style.left = (event.clientX - offsetX4+206) + 'px';
    modal4.style.top = (event.clientY - offsetY4+134) + 'px';
}

// Function to handle mouse up event
function handleMouseUp4(event) {
    document.removeEventListener('mousemove', handleMouseMove4);
    document.removeEventListener('mouseup', handleMouseUp4);
}

// Add event listener for mouse down event on the modal2 title box
modal4.querySelector('.titleBox').addEventListener('mousedown', handleMouseDown4);



// DRAG-ABLE MODALS --- ManPermission

// Get the modal
var modal5 = document.getElementById('ManPermission');
    
// Variable for storing the offset
var offsetX5, offsetY5;

// Function to handle mouse down event
function handleMouseDown5(event) {
    event.preventDefault();
    offsetX5 = event.clientX - modal5.getBoundingClientRect().left;
    offsetY5 = event.clientY - modal5.getBoundingClientRect().top;
    document.addEventListener('mousemove', handleMouseMove5);
    document.addEventListener('mouseup', handleMouseUp5);
}

// Function to handle mouse move event
function handleMouseMove5(event) {
    modal5.style.left = (event.clientX - offsetX5+206) + 'px';
    modal5.style.top = (event.clientY - offsetY5+134) + 'px';
}

// Function to handle mouse up event
function handleMouseUp5(event) {
    document.removeEventListener('mousemove', handleMouseMove5);
    document.removeEventListener('mouseup', handleMouseUp5);
}

// Add event listener for mouse down event on the modal2 title box
modal5.querySelector('.titleBox').addEventListener('mousedown', handleMouseDown5);




// DRAG-ABLE MODALS --- UpLim

// Get the modal
var modal6 = document.getElementById('UpLim');
    
// Variable for storing the offset
var offsetX6, offsetY6;

// Function to handle mouse down event
function handleMouseDown6(event) {
    event.preventDefault();
    offsetX6 = event.clientX - modal6.getBoundingClientRect().left;
    offsetY6 = event.clientY - modal6.getBoundingClientRect().top;
    document.addEventListener('mousemove', handleMouseMove6);
    document.addEventListener('mouseup', handleMouseUp6);
}

// Function to handle mouse move event
function handleMouseMove6(event) {
    modal6.style.left = (event.clientX - offsetX6+98) + 'px';
    modal6.style.top = (event.clientY - offsetY6+85) + 'px';
}

// Function to handle mouse up event
function handleMouseUp6(event) {
    document.removeEventListener('mousemove', handleMouseMove6);
    document.removeEventListener('mouseup', handleMouseUp6);
}

// Add event listener for mouse down event on the modal2 title box
modal6.querySelector('.titleBox').addEventListener('mousedown', handleMouseDown6);




// MODAL OPEN AND CLOSE

/* Opening Code Change */
function CodeChangerOpen() {
    document.getElementById("CodeChange").classList.remove("disNone");
    document.getElementById("CodeChange").classList.add("disGrid");
}

/* Closing Code Change */
function CodeChangerClose() {
    document.getElementById("CodeChange").classList.add("disNone");
    document.getElementById("CodeChange").classList.remove("disGrid");
}

/* Opening Intensive Search */
function IntensiveSearchOpen() {
    document.getElementById("IntensiveSearch").classList.remove("disNone");
    document.getElementById("IntensiveSearch").classList.add("disGrid");
}

/* Closing Intensive Search */
function IntensiveSearchClose() {
    document.getElementById("IntensiveSearch").classList.add("disNone");
    document.getElementById("IntensiveSearch").classList.remove("disGrid");
}

/* Opening Recycle Bin */
function RecycleBinOpen() {
    document.getElementById("RecycleBin").classList.remove("disNone");
    document.getElementById("RecycleBin").classList.add("disGrid");
}

/* Closing Recycle Bin */
function RecycleBinClose() {
    document.getElementById("RecycleBin").classList.add("disNone");
    document.getElementById("RecycleBin").classList.remove("disGrid");
}

/* Opening Account Requests */
function AccReqOpen() {
    document.getElementById("AccReq").classList.remove("disNone");
    document.getElementById("AccReq").classList.add("disGrid");
}

/* Closing Account Requests */
function AccReqClose() {
    document.getElementById("AccReq").classList.add("disNone");
    document.getElementById("AccReq").classList.remove("disGrid");
}

/* Opening Manage Permissions */
function ManPermissionOpen() {
    document.getElementById("ManPermission").classList.remove("disNone");
    document.getElementById("ManPermission").classList.add("disGrid");
}

/* Closing Manage Permissions */
function ManPermissionClose() {
    document.getElementById("ManPermission").classList.add("disNone");
    document.getElementById("ManPermission").classList.remove("disGrid");
}

/* Opening Upload Limit */
function UpLimOpen() {
    document.getElementById("UpLim").classList.remove("disNone");
    document.getElementById("UpLim").classList.add("disGrid");
}

/* Closing Upload Limit */
function UpLimClose() {
    document.getElementById("UpLim").classList.add("disNone");
    document.getElementById("UpLim").classList.remove("disGrid");
}
















/* Dropdown checkbox */
function toggleDropdown() {
    var dropdownContent = document.getElementById("dropdownContent");
    dropdownContent.style.display = (dropdownContent.style.display === "block") ? "none" : "block";
  }

  function stopPropagation(event) {
    event.stopPropagation();
  }



/* Slider input */
// Update the slider value display dynamically
const slider = document.getElementById('slider');
const sliderValue = document.getElementById('sliderValue');

slider.addEventListener('input', () => {
  sliderValue.textContent = slider.value;
});