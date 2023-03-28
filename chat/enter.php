<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            background-color: black;
            color: yellow;
            font-family: Arial, Helvetica, sans-serif;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 50px;
        }

        label {
            margin-top: 20px;
            font-size: 20px;
        }

        input[type="text"] {
            height: 40px;
            width: 250px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 5px;
            margin-bottom: 20px;
        }

        input[type="color"] {
            height: 40px;
            width: 40px;
            border: none;
            border-radius: 50%;
            margin-right: 5px;
            outline: none;
        }

        input[type="color"]:hover {
            cursor: pointer;
        }

        input[type="submit"] {
            margin-top: 20px;
            background-color: yellow;
            font-weight: bold;
            color: black;
            padding: 10px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 20px;
        }

        .color-options {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .color-option {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 40px;
            width: 40px;
            border-radius: 50%;
            margin: 10px;
            cursor: pointer;
        }

        .selected {
            border: 3px solid yellow;
        }
    </style>
</head>
<body>
    <form action="index.php" method="GET">
        <label for="name">Name:</label>
        <input name="name" id="name" type="text" required>

        <label for="color">Select Color:</label>
        <input name="color" id="color" type="color" required>
        
        <div class="color-options">
            <div class="color-option" style="background-color: #ff00fc;"></div>
            <div class="color-option" style="background-color: #ff3131;"></div>
            <div class="color-option" style="background-color: #bc13fe;"></div>
            <div class="color-option" style="background-color: #FF5F1F;"></div>
            <div class="color-option" style="background-color: #fbffff;"></div>
            <div class="color-option" style="background-color: #ccff00;"></div>
            <div class="color-option" style="background-color: #ffff00;"></div>
            <div class="color-option" style="background-color: #FF3131;"></div>
            <div class="color-option" style="background-color: #39FF14;"></div>
            <div class="color-option" style="background-color: #ff3e84;"></div>
            <div class="color-option" style="background-color: #d60143;"></div>
            <div class="color-option" style="background-color: #fe7fca;"></div>
            
        </div>

        <input type="submit" value="GO!">
    </form>

    <script>
       
// Get all color options
const colorOptions = document.querySelectorAll('.color-option');

// Add event listener to each color option
colorOptions.forEach(colorOption => {
    colorOption.addEventListener('click', () => {
        // Remove 'selected' class from all color options
        colorOptions.forEach(option => {
            option.classList.remove('selected');
        });

        // Add 'selected' class to the clicked color option
        colorOption.classList.add('selected');

        // Set the value of the color input to the background color of the clicked color option
        const selectedColor = colorOption.style.backgroundColor;
        document.getElementById('color').value = rgb2hex(selectedColor);
    });
});

// Function to convert RGB color to hex color
function rgb2hex(rgb) {
    if (/^#[0-9A-F]{6}$/i.test(rgb)) {
        return rgb;
    }

    rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
    function hex(x) {
        return ("0" + parseInt(x).toString(16)).slice(-2);
    }
    return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
}
</script>
</body>
</html>