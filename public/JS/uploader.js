/* Drag and drop file to upload [Irrelevent]*/ 
// JavaScript (script.js)
const dropContainer = document.getElementById('dropContainer');
const dropLabel = document.getElementById('dropLabel');
const fileInput = document.getElementById('fileInput');
const fileList = document.getElementById('fileList');

dropContainer.addEventListener('dragover', handleDragOver);
dropContainer.addEventListener('dragenter', handleDragEnter);
dropContainer.addEventListener('dragleave', handleDragLeave);
dropContainer.addEventListener('drop', handleDrop);

fileInput.addEventListener('change', handleFileSelect);

function handleDragOver(event) {
    event.preventDefault();
}

function handleDragEnter(event) {
    dropContainer.classList.add('highlight');
}

function handleDragLeave(event) {
    dropContainer.classList.remove('highlight');
}

function handleDrop(event) {
    event.preventDefault();
    dropContainer.classList.remove('highlight');
    dropLabel.classList.add('disNone');

    const files = event.dataTransfer.files;
    handleFiles(files);
}

function handleFileSelect(event) {
    const files = event.target.files;
    handleFiles(files);
}

function handleFiles(files) {
    for (const file of files) {
        const listItem = document.createElement('div');
        listItem.className = 'file-item';
        listItem.textContent = file.name;

        fileList.appendChild(listItem);
    }
}

/* Getting file in one input field by putting it in another input field [Irrelevent]*/

// Get references to the file input elements
const fileInput2 = document.getElementById('fileInput2');

// Add event listener to fileInput1 for when file is selected
fileInput.addEventListener('change', function() {
    if (fileInput.files.length > 0) {
        // Set the same file to fileInput2
        fileInput2.files = fileInput.files;
    } else {
        // Clear fileInput2 if no file selected in fileInput1
        fileInput2.value = '';
    }
});






/* Modal dragging */

/* Add file/folder */

// Get the modal
var modal = document.getElementById('fileFolderAdder');
    
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
    modal.style.left = (event.clientX - offsetX+183) + 'px';
    modal.style.top = (event.clientY - offsetY+157) + 'px';
}

// Function to handle mouse up event
function handleMouseUp(event) {
    document.removeEventListener('mousemove', handleMouseMove);
    document.removeEventListener('mouseup', handleMouseUp);
}

// Add event listener for mouse down event on the modal title box
modal.querySelector('.titleBox').addEventListener('mousedown', handleMouseDown);






/* Move file */

// Get the modal
var modal2 = document.getElementById('MoveFile');
    
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
    modal2.style.left = (event.clientX - offsetX2+205) + 'px';
    modal2.style.top = (event.clientY - offsetY2+135) + 'px';
}

// Function to handle mouse up event
function handleMouseUp2(event) {
    document.removeEventListener('mousemove', handleMouseMove2);
    document.removeEventListener('mouseup', handleMouseUp2);
}

// Add event listener for mouse down event on the modal title box
modal2.querySelector('.titleBox').addEventListener('mousedown', handleMouseDown2);








/* Modal dragging */

/* Lock File */

// Get the modal
var modal3 = document.getElementById('LockFile');
    
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
    modal3.style.left = (event.clientX - offsetX3+165) + 'px';
    modal3.style.top = (event.clientY - offsetY3+93) + 'px';
}

// Function to handle mouse up event
function handleMouseUp3(event) {
    document.removeEventListener('mousemove', handleMouseMove3);
    document.removeEventListener('mouseup', handleMouseUp3);
}

// Add event listener for mouse down event on the modal title box
modal3.querySelector('.titleBox').addEventListener('mousedown', handleMouseDown3);







/* Opening File / Folder Adder */
function fileFolderAdderOpen() {
    document.getElementById("fileFolderAdder").classList.remove("disNone");
    document.getElementById("fileFolderAdder").classList.add("disGrid");
}

/* Closing File / Folder Adder */
function fileFolderAdderClose() {
    document.getElementById("fileFolderAdder").classList.add("disNone");
    document.getElementById("fileFolderAdder").classList.remove("disGrid");
}



/* Opening Move File */
function MoveFileOpen() {
    document.getElementById("MoveFile").classList.remove("disNone");
    document.getElementById("MoveFile").classList.add("disGrid");
}

/* Closing Move File */
function MoveFileClose() {
    document.getElementById("MoveFile").classList.add("disNone");
    document.getElementById("MoveFile").classList.remove("disGrid");
}



/* Opening Lock File */
function LockFileOpen() {
    document.getElementById("LockFile").classList.remove("disNone");
    document.getElementById("LockFile").classList.add("disGrid");
}

/* Closing Lock File */
function LockFileClose() {
    document.getElementById("LockFile").classList.add("disNone");
    document.getElementById("LockFile").classList.remove("disGrid");
}