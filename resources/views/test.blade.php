<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Index of Clicked Element</title>
    <style>
        .clickable {
            cursor: pointer;
            padding: 10px;
            margin: 5px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>

<div class="clickable">Element 1</div>
<div class="clickable">Element 2</div>
<div class="clickable">Element 3</div>
<div class="clickable">Element 4</div>

<script>
    // Get all elements with the class 'clickable'
    var clickableElements = document.querySelectorAll('.clickable');

    // Add click event listener to each element
    clickableElements.forEach(function(element, index) {
        element.addEventListener('click', function() {
            console.log("Clicked element index: " + index);
        });
    });
</script>

</body>
</html>
