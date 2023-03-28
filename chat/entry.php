<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Color Selector</title>
    <style>
        body {
            background-color: black;
            color: yellow;
        }

        h4 {
            margin-top: 1.5em;
        }

        input[type="color"] {
            height: 40px;
            width: 40px;
            border: none;
            border-radius: 50%;
            margin-right: 5px;
        }

        input[type="submit"] {
            background-color: yellow;
            color: black;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            cursor: pointer;
            font-weight: bold;
        }

        .color-option {
            display: inline-block;
            margin-right: 10px;
            margin-bottom: 10px;
            border: 3px solid black;
            padding: 20px;
            border-radius: 50%;
            cursor: pointer;
        }

        .selected {
            border-color: yellow;
        }
    </style>
</head>
<body>
    <form action="index.php" method="GET">
        <h4>Enter Name:</h4>
        <input name="name" type="text">

        <h4>Select Color:</h4>
        <div>
        <div class="color-option" style="background-color: #FF007F;"></div>
<div class="color-option" style="background-color: #FF8C00;"></div>
<div class="color-option" style="background-color: #00FF00;"></div>
<div class="color-option" style="background-color: #00FFFF;"></div>
<div class="color-option" style="background-color: #FF00FF;"></div>
<div class="color-option" style="background-color: #9400D3;"></div>
<div class="color-option" style="background-color: #FF1493;"></div><br>
<div class="color-option" style="background-color: #00FFFF;"></div>
<div class="color-option" style="background-color: #FFFF00;"></div>
<div class="color-option" style="background-color: #FF6347;"></div>
<div class="color-option" style="background-color: #FF69B4;"></div>
<div class="color-option" style="background-color: #32CD32;"></div>
<div class="color-option" style="background-color: #FF00FF;"></div>
<div class="color-option" style="background-color: #FF6B6B;"></div>

        </div>
        
        <input name="color" type="hidden" value="">
        <button type="submit">Go!</button>
    </form>

    <script>
        var colorOptions = document.querySelectorAll('.color-option');

        for (var i = 0; i < colorOptions.length; i++) {
            colorOptions[i].addEventListener('click', function() {
                var selectedColor = this.style.backgroundColor;
                var colorInput = document.querySelector('input[name="color"]');
                colorInput.value = selectedColor;
                
                var currentSelected = document.querySelector('.selected');
                if (currentSelected) {
                    currentSelected.classList.remove('selected');
}
this.classList.add('selected');
});
}
</script>

</body>
</html>
