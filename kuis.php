<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuis Pengetahuan Umum</title>
    <style>
        body {
            background-color: #ffe6f2; /* Pink pastel background */
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .quiz-container {
            background-color: #fff0f5;
            border: 2px solid #ffb6c1;
            border-radius: 10px;
            padding: 20px;
            width: 90%;
            max-width: 600px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .quiz-container h1 {
            text-align: center;
            color: #ff69b4;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .input-container {
            margin-bottom: 20px;
        }
        .input-container label {
            display: block;
            font-size: 16px;
            color: #d147a3;
            margin-bottom: 5px;
        }
        .input-container input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ffb6c1;
            border-radius: 5px;
            font-size: 14px;
            margin-bottom: 10px;
        }
        .question-container {
            margin-bottom: 15px;
            padding: 15px;
            border: 1px solid #ffb6c1;
            border-radius: 8px;
            background-color: #fff;
        }
        .question-container h3 {
            color: #d147a3;
            font-size: 18px;
            margin-bottom: 10px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-size: 16px;
            color: #ff1493;
        }
        input[type="submit"] {
            display: block;
            background-color: #ff69b4;
            color: #fff;
            font-size: 16px;
            padding: 10px;
            width: 100%;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #ff85c1;
        }
    </style>
</head>
<body>

<div class="quiz-container">
    <h1>Kuis Pengetahuan Umum</h1>
    
    <form action="submit_quiz.php" method="post">
        <!-- Input Nama dan NIM -->
        <div class="input-container">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" required>

            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" required>
        </div>

        <?php
        // Array berisi soal dan pilihan jawaban
        $questions = [
            [
                "question" => "Apa ibukota negara Indonesia?",
                "options" => ["Jakarta", "Surabaya", "Bandung", "Medan"],
                "answer" => "Jakarta"
            ],
            [
                "question" => "Siapakah presiden pertama Indonesia?",
                "options" => ["Soekarno", "Suharto", "Jokowi", "Habibie"],
                "answer" => "Soekarno"
            ],
            [
                "question" => "Planet mana yang paling dekat dengan matahari?",
                "options" => ["Mars", "Venus", "Merkurius", "Bumi"],
                "answer" => "Merkurius"
            ],
            [
                "question" => "Berapa jumlah provinsi di Indonesia saat ini?",
                "options" => ["34", "33", "35", "36"],
                "answer" => "34"
            ],
            [
                "question" => "Di benua manakah negara Mesir berada?",
                "options" => ["Asia", "Afrika", "Eropa", "Amerika"],
                "answer" => "Afrika"
            ],
            [
                "question" => "Hewan apa yang menjadi lambang negara Amerika Serikat?",
                "options" => ["Elang", "Harimau", "Beruang", "Singa"],
                "answer" => "Elang"
            ],
            [
                "question" => "Siapa penemu bola lampu?",
                "options" => ["Thomas Edison", "Albert Einstein", "Isaac Newton", "Nikola Tesla"],
                "answer" => "Thomas Edison"
            ],
            [
                "question" => "Dimana Menara Eiffel berada?",
                "options" => ["Paris", "London", "Berlin", "Madrid"],
                "answer" => "Paris"
            ],
            [
                "question" => "Berapakah jumlah sisi pada segitiga?",
                "options" => ["2", "3", "4", "5"],
                "answer" => "3"
            ],
            [
                "question" => "Apa simbol kimia untuk air?",
                "options" => ["O2", "H2O", "CO2", "NaCl"],
                "answer" => "H2O"
            ]
        ];

        // Mengacak urutan soal
        shuffle($questions);

        // Menampilkan soal dengan pilihan jawaban acak
        foreach ($questions as $index => $q) {
            echo "<div class='question-container'>";
            echo "<h3>" . ($index + 1) . ". " . $q['question'] . "</h3>";

            // Mengacak urutan pilihan jawaban
            $options = $q['options'];
            shuffle($options);

            foreach ($options as $option) {
                echo "<label>";
                echo "<input type='radio' name='question_$index' value='$option' required> $option";
                echo "</label>";
            }
            echo "</div>";
        }
        ?>
        <br>
        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>
