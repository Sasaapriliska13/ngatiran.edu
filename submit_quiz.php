<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Kuis Pengetahuan Umum</title>
    <style>
        body {
            background-color: #ffe6f2;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .result-container {
            background-color: #fff0f5;
            border: 2px solid #ffb6c1;
            border-radius: 10px;
            padding: 20px;
            width: 90%;
            max-width: 600px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .result-container h1 {
            color: #ff69b4;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .result-container p {
            font-size: 18px;
            color: #d147a3;
        }
        .result-container .score {
            font-size: 22px;
            color: #ff1493;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="result-container">
    <h1>Hasil Kuis Pengetahuan Umum</h1>

    <?php
    $questions = [
        [
            "question" => "Indonesia dikenal sebagai negara dengan sejarah panjang, termasuk dalam hal penamaan. Sebelum dikenal dengan nama Indonesia, negara ini pernah menggunakan beberapa nama lain yang mencerminkan masa kolonial dan perjuangan kemerdekaan. Apa nama lain yang pernah digunakan untuk menyebut wilayah Indonesia pada masa lalu?",
            "answer" => "Hindia Belanda nama yang digunakan oleh pemerintahan kolonial Belanda untuk menyebut wilayah ini selama penjajahan"
        ],
        [
            "question" => "Presiden pertama Indonesia adalah Soekarno. Selama pemerintahan Presiden Soekarno, Indonesia mengadopsi kebijakan politik luar negeri bebas-aktif yang bertujuan menjaga kemandirian dan menghindari keterlibatan dalam Perang Dingin. Kebijakan ini mendorong Indonesia untuk tidak berpihak pada blok Barat atau Timur, serta mendorong solidaritas dengan negara-negara Asia dan Afrika. Salah satu contoh konkritnya adalah Konferensi Asia-Afrika 1955 yang melahirkan Gerakan Non-Blok. Meski menghadapi kritik, kebijakan ini membantu Indonesia memperjuangkan kemerdekaan negara-negara berkembang di dunia internasional. Mengapa kebijakan politik luar negeri bebas-aktif dianggap kontroversial, dan bagaimana pengaruhnya terhadap hubungan Indonesia dengan negara-negara besar?",
            "answer" => "Kebijakan ini dianggap kontroversial karena Indonesia tidak memilih pihak dalam Perang Dingin yang membuat negara negara besar merasa tidak nyaman namun Indonesia memperkuat hubungan dengan negara negara Asia dan Afrika"
        ],
        [
            "question" => "Planet-planet dalam tata surya kita memiliki karakteristik dan komposisi yang berbeda-beda. Planet manakah yang dikenal sebagai planet dan apa yang menyebabkan warna permukaannya merah?",
            "answer" => "Mars karena permukaannya mengandung oksida besi yang memberikan warna merah khas pada planet tersebut"
        ],
        [
            "question" => "Indonesia saat ini terdiri dari 38 provinsi yang tersebar di berbagai pulau. Setiap provinsi memiliki keunikan budaya dan kekayaan alam. Provinsi manakah yang pada tahun 2000 resmi terpisah dari Sulawesi Utara untuk menjadi provinsi yang mandiri?",
            "answer" => "Gorontalo yang terkenal dengan potensi hasil laut serta pertaniannya"
        ],
        [
            "question" => "Di benua manakah negara Mesir berada?",
            "answer" => "Afrika"
        ],
        [
            "question" => "Hewan apa yang menjadi lambang negara Amerika Serikat?",
            "answer" => "Elang"
        ],
        [
            "question" => "Siapa penemu bola lampu?",
            "answer" => "Thomas Edison"
        ],
        [
            "question" => "Dimana Menara Eiffel berada?",
            "answer" => "Paris"
        ],
        [
            "question" => "Berapakah jumlah sisi pada segitiga?",
            "answer" => "3"
        ],
        [
            "question" => "Apa simbol kimia untuk air?",
            "answer" => "H2O"
        ]
    ];
    $pointsPerCorrectAnswer = 10;
    $score = 0;
    foreach ($questions as $index => $q) {
        if (isset($_POST["question_$index"]) && $_POST["question_$index"] === $q["answer"]) {
            $score += $pointsPerCorrectAnswer;
        }
    }
    $totalQuestions = count($questions);
    $maxScore = $totalQuestions * $pointsPerCorrectAnswer;
    echo "<p>Nama: " . htmlspecialchars($_POST['name']) . "</p>";
    echo "<p>NIM: " . htmlspecialchars($_POST['nim']) . "</p>";
    echo "<p>Skor Anda: $score dari $maxScore</p>";

    if ($score == $maxScore) {
        echo "<p><strong>Selamat! Anda mendapatkan skor sempurna, 100!</strong></p>";
    } elseif ($score > $maxScore / 2) {
        echo "<p>Bagus! Anda memiliki pengetahuan yang baik.</p>";
    } else {
        echo "<p>Jangan khawatir, terus belajar dan coba lagi!</p>";
    }
    ?>
</div>

</body>
</html>
