<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Kuis</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffd1dc; /* Latar belakang pink pastel */
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #d94f7f; /* Judul berwarna pink lebih gelap */
        }

        .result-container {
            background: #ffc1e3; /* Latar belakang container hasil pink muda */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 800px;
            margin: auto;
            text-align: left;
        }

        .correct {
            border: 2px solid #ff69b4; /* Border pink untuk jawaban benar */
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            background-color: #ffeff6; /* Background pink muda untuk jawaban benar */
        }

        .incorrect {
            border: 2px solid #ff94b4; /* Border pink sedikit lebih gelap untuk jawaban salah */
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            background-color: #ffe5ec; /* Background pink muda untuk jawaban salah */
        }

        .retry-button {
            background-color: #ff6f9d; /* Tombol pink terang */
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            font-weight: bold;
        }

        .retry-button:hover {
            background-color: #ff4c80; /* Warna pink sedikit lebih gelap saat hover */
        }

        .score {
            font-weight: bold;
            font-size: 1.5em;
            margin-top: 15px;
            color: #d94f7f; /* Warna teks skor pink lebih gelap */
        }
    </style>
</head>

<body>
    <h1>Hasil Kuis Anda</h1>
    <div class="result-container">
        <?php
        session_start();

        if (isset($_SESSION['answers'])) {
            // Mendefinisikan soal beserta jawaban yang benar
            $soal = [
                ['pertanyaan' => 'Ayah akan mengganti ubin kamar Farah...', 'jawaban_benar' => '200 ubin'],
                ['pertanyaan' => 'Apa saja yang tergolong organ reproduksi perempuan?', 'jawaban_benar' => 'Serviks'],
                ['pertanyaan' => 'Apakah yang termasuk ciri - ciri tumbuhan dikotil?', 'jawaban_benar' => 'Terdapat batang akar'],
                ['pertanyaan' => 'Aku mendengar dengan.... dan melihat dengan...', 'jawaban_benar' => 'Telinga dan mata'],
                ['pertanyaan' => 'Setiap naik 80 meter, suhu udara turun 0,50 derajat Celsius. Berapakah suhu udara di luar pesawat?', 'jawaban_benar' => '-49 derajat Celsius.'],
                ['pertanyaan' => 'Luas taman di halaman belakang sebuah rumah adalah 58 m². Luas taman yang digunakan untuk kolam adalah ....', 'jawaban_benar' => '21,75 m².'],
                ['pertanyaan' => 'Sekarang di Belanda sedang musim dingin dengan suhu 10º C. Suhu sekarang adalah …. ', 'jawaban_benar' => '-7° C'],
                ['pertanyaan' => 'Yusuf membeli gula merah 14 kg. Berapakah gula merah yang digunakan Yusuf untuk membuat cendol adalah….', 'jawaban_benar' => '0,33 kg'],
                ['pertanyaan' => 'Sebuah bongkahan objek penelitian di laboratorium disimpan dalam freezer. Maka objek penelitian tersebut dikeluarkan selama 12 menit akan berada di suhu….', 'jawaban_benar' => '-8'],
                ['pertanyaan' => 'Petok..Petok... adalah suara hewan...', 'jawaban_benar' => 'Ayam']
            ];

            $score = 0;

            // Menampilkan hasil jawaban
            foreach ($_SESSION['answers'] as $index => $answer) {
                if (isset($soal[$index])) {
                    $is_correct = $answer === $soal[$index]['jawaban_benar'];
                    if ($is_correct) {
                        $score++;
                    }

                    $result_class = $is_correct ? 'correct' : 'incorrect';
                    echo "<div class='$result_class'>Soal " . ($index + 1) . ": " . $soal[$index]['pertanyaan'] . "<br>";
                    echo "Jawaban Anda: " . $answer . "<br>";
                    echo "Jawaban Benar: " . $soal[$index]['jawaban_benar'] . "</div>";
                }
            }

            echo "<div class='score'>Skor Anda: $score dari " . count($soal) . "</div>";

            // Reset session data for new quiz
            session_unset();
        } else {
            echo "<p>Anda belum mengerjakan kuis ini.</p>";
        }
        ?>

        <button class="retry-button" onclick="window.location.href='quiz.php';">Coba Lagi</button>
    </div>
</body>

</html>
