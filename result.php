<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrix Multiplication Result</title>
    <style>
        body {
            background-color: #FDE2E4; /* Pink coquette theme */
            font-family: 'Comic Sans MS', cursive, sans-serif; /* Girly font style */
            color: #D90368;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .matrix-result {
            text-align: center;
            padding: 20px;
            border: 2px solid #F582AE;
            border-radius: 10px;
            background-color: #FFCCD5;
        }
        .matrix-row {
            display: flex;
            justify-content: center;
        }
        .matrix-result span {
            margin: 5px;
        }
    </style>
</head>
<body>
    <div class="matrix-result">
        <h1>Resulting Matrix (4x2)</h1>
        <div>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
                for ($j = 0; $j < $kolom2; $j++) { // Di sini ada kondisi pembanding yang benar
                    $result[$i][$j] = 0;
                    for ($k = 0; $k < $kolom1; $k++) {
                        $result[$i][$j] += $matrix1[$i][$k] * $matrix2[$k][$j];
                    }
                }
            }

            // Menampilkan hasil perkalian matriks
            for ($i = 0; $i < $baris1; $i++) {
                echo "<div class='matrix-row'>";
                for ($j = 0; $j < $kolom2; $j++) {
                    echo "<span>" . $result[$i][$j] . "</span>";
                }
                echo "</div>";
            }
        }
        ?>
        </div>
    </div>
</body>
</html>
