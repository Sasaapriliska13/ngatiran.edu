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
        }
        h1, h2 {
            color: #9C1DE7;
            text-align: center;
        }
        .matrix-input {
            display: inline-block;
            margin: 10px;
            padding: 10px;
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
        .matrix {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            color: #C32F27;
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
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 12px;
        }
        .matrix-result {
            display: inline-block;
            margin: 20px;
            padding: 10px;
            border: 2px solid #F582AE;
            border-radius: 10px;
            background-color: #FFCCD5;
        }
    </style>
</head>
<body>
    <h1>Matrix Multiplication 4x3 and 3x2</h1>
    <form method="POST">
        <div class="matrix-input">
            <h2>Matrix 4x3</h2>
            <div class="matrix">
            <?php
            // Membuat input untuk matriks 4x3
            echo "[";
            for ($i = 0; $i < 4; $i++) {
                echo "<div class='matrix-row'>";
                echo "[ ";
                for ($j = 0; $j < 3; $j++) {
                    echo "<input type='number' name='matrix1[$i][$j]' required> ";
                    if ($j < 2) echo ", "; // Pemisah antar elemen
                }
                echo " ]";
                echo "</div>";
            }
            echo "]";
            ?>
            </div>
        </div>

        <div class="matrix-input">
            <h2>Matrix 3x2</h2>
            <div class="matrix">
            <?php
            // Membuat input untuk matriks 3x2
            echo "[";
            for ($i = 0; $i < 3; $i++) {
                echo "<div class='matrix-row'>";
                echo "[ ";
                for ($j = 0; $j < 2; $j++) {
                    echo "<input type='number' name='matrix2[$i][$j]' required> ";
                    if ($j < 1) echo ", "; // Pemisah antar elemen
                }
                echo " ]";
                echo "</div>";
            }
            echo "]";
            ?>
            </div>
        </div>

        <br><input type="submit" name="submit" value="Multiply Matrices">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        // Mendapatkan input dari user
        $matrix1 = $_POST['matrix1'];
        $matrix2 = $_POST['matrix2'];

        // Ukuran matriks
        $baris1 = 4;
        $kolom1 = 3;
        $baris2 = 3;
        $kolom2 = 2;

        // Inisialisasi matriks hasil
        $result = array();

        // Melakukan perkalian matriks
        for ($i = 0; $i < $baris1; $i++) {
            for ($j = 0; $j < $kolom2; $j++) {
                $result[$i][$j] = 0;
                for ($k = 0; $k < $kolom1; $k++) {
                    $result[$i][$j] += $matrix1[$i][$k] * $matrix2[$k][$j];
                }
            }
        }

        // Menampilkan hasil perkalian matriks
        echo "<h2>Resulting Matrix (4x2)</h2>";
        echo "<div class='matrix-result'>";
        echo "[";
        for ($i = 0; $i < $baris1; $i++) {
            echo "<div class='matrix-row'>";
            echo "[ ";
            for ($j = 0; $j < $kolom2; $j++) {
                echo $result[$i][$j];
                if ($j < $kolom2 - 1) {
                    echo ", "; // Pemisah antar elemen
                }
            }
            echo " ]";
            echo "</div>";
        }
        echo "]";
        echo "</div>";
    }
    ?>
</body>
</html>
