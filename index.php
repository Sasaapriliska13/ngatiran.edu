<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrix Multiplication</title>
    <style>
        body {
            background-color: #FDE2E4; /* Pink coquette theme */
            font-family: 'Comic Sans MS', cursive, sans-serif; /* Girly font style */
            color: #D90368;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
        }
        h1 {
            color: #9C1DE7;
            text-align: center;
        }
        .matrix-input {
            display: inline-block;
            margin: 20px;
            padding: 20px;
            border: 2px solid #F582AE;
            border-radius: 10px;
            background-color: #FFCCD5;
        }
        .matrix-input input {
            width: 50px;
            text-align: center;
            margin: 5px;
            border-radius: 5px;
            border: 1px solid #FF87AB;
            background-color: #FFF1F3;
            color: #D90368;
        }
        .matrix-row {
            display: flex;
            justify-content: center;
        }
        input[type="submit"] {
            background-color: #FF8FAB;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 10px 2px;
            cursor: pointer;
            border-radius: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Matrix Multiplication 4x3 and 3x2</h1>
        <form method="POST" action="result.php" target="_blank">
            <div class="matrix-input">
                <h2>Matrix 4x3</h2>
                <div>
                <?php
                // Membuat input untuk matriks 4x3
                for ($i = 0; $i < 4; $i++) {
                    echo "<div class='matrix-row'>";
                    for ($j = 0; $j < 3; $j++) {
                        echo "<input type='number' name='matrix1[$i][$j]' required> ";
                    }
                    echo "</div>";
                }
                ?>
                </div>
            </div>

            <div class="matrix-input">
                <h2>Matrix 3x2</h2>
                <div>
                <?php
                // Membuat input untuk matriks 3x2
                for ($i = 0; $i < 3; $i++) {
                    echo "<div class='matrix-row'>";
                    for ($j = 0; $j < 2; $j++) {
                        echo "<input type='number' name='matrix2[$i][$j]' required> ";
                    }
                    echo "</div>";
                }
                ?>
                </div>
            </div>

            <br><input type="submit" name="submit" value="Multiply Matrices">
        </form>
    </div>
</body>
</html>
