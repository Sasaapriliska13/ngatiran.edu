<?php
session_start();
// Memeriksa apakah jawaban tersedia di sesi, jika tidak arahkan ke halaman utama
if (!isset($_SESSION['jawaban']) || !is_array($_SESSION['jawaban'])) {
    header("Location: index.php");
    exit();
}

// Daftar soal dan jawaban benar sesuai dengan yang ada di kuis
$questions = [

        [
            "question" => "Apa nama lain Indonesia saat masa penjajahan?",
            "image" => "https://i.pinimg.com/736x/0d/5f/d1/0d5fd145eca540f930a5bdc65eb5dc76.jpg",
            "options" => ["Nusantara", "Hindia Belanda", "Dwipantara", "Malaya Raya"],
            "answer" => "Hindia Belanda"
        ],
        [
            "question" => "Mengapa kebijakan bebas-aktif Soekarno dianggap kontroversial?",
            "image" => "https://awsimages.detik.net.id/community/media/visual/2019/09/05/cc4f3a09-0b5a-4745-83b5-864756dd857f.jpeg?w=1200",
            "options" => ["Tidak memilih pihak", "Dekat dengan Soviet", "Pihak Barat", "Fokus domestik"],
            "answer" => "Tidak memilih pihak"
        ],
        [
            "question" => "Planet merah karena oksida besi?",
            "image" => "https://i.pinimg.com/736x/22/04/b3/2204b313a50476e9becac4b0d2f664e8.jpg",
            "options" => ["Venus", "Merkurius", "Mars", "Jupiter"],
            "answer" => "Mars"
        ],
        [
            "question" => "Provinsi mana terpisah dari Sulawesi Utara tahun 2000?",
            "image" => "https://i.pinimg.com/736x/96/bc/66/96bc661838c58556ca042433bc9a074e.jpg",
            "options" => ["Sulawesi Tengah", "Gorontalo", "Sulawesi Selatan", "Sulawesi Barat"],
            "answer" => "Gorontalo"
        ],
        [
            "question" => "Fungsi utama Sungai Nil di Mesir Kuno?",
            "image" => "https://i.pinimg.com/736x/43/5e/b0/435eb0b346b82ef044977875f024c322.jpg",
            "options" => ["Pengairan", "Tempat tinggal", "Pertemuan suku", "Penyimpanan makanan"],
            "answer" => "Pengairan"
        ],
        [
            "question" => "Sistem pemerintahan Amerika Serikat?",
            "image" => "https://i.pinimg.com/736x/2c/72/6e/2c726eaa44770efbdae7b016bfd8789e.jpg",
            "options" => ["Monarki", "Republik", "Diktator", "Teokrasi"],
            "answer" => "Republik"
        ],
        [
            "question" => "Penemu bola lampu?",
            "image" => "https://i.pinimg.com/736x/7b/56/93/7b56934a8e9943b4aec6d288cd67c562.jpg",
            "options" => ["Thomas Edison", "Albert Einstein", "Isaac Newton", "Nikola Tesla"],
            "answer" => "Thomas Edison"
        ],
        [
            "question" => "Dimana Menara Eiffel berada?",
            "image" => "https://i.pinimg.com/736x/21/bc/83/21bc83ed03e3241f6d94e44fdd6269a0.jpg",
            "options" => ["Paris", "London", "Berlin", "Madrid"],
            "answer" => "Paris"
        ],
        [
            "question" => "Berapa jumlah sisi segitiga?",
            "image" => "https://i.pinimg.com/736x/5c/58/c6/5c58c6ebf93e41f23aa37d7b20a7a098.jpg",
            "options" => ["2", "3", "4", "5"],
            "answer" => "3"
        ],
        [
            "question" => "Apa simbol kimia air?",
            "image" => "https://i.pinimg.com/736x/39/37/fa/3937fab09edb5b11fe15cb54f5c16d3a.jpg",
            "options" => ["O2", "H2O", "CO2", "NaCl"],
            "answer" => "H2O"
        ]
    ];

// Hitung jumlah jawaban yang benar
$correctAnswers = 0;
foreach ($_SESSION['jawaban'] as $index => $answer) {
    if (isset($questions[$index]) && $answer === $questions[$index]['answer']) {
        $correctAnswers++;
    }
}

// Hapus sesi untuk memulai tes dari awal
session_destroy();
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Hasil Tes</title>
<style>
body {
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-image: url('https://college-directory-staging.s3.ap-southeast-3.amazonaws.com/media/college_banner/87461803_2516348841961032_9159484394031808512_n.jpg');
    background-size: cover;
}
.container {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    width: 90%;
    max-width: 500px;
    padding: 20px;
    text-align: center;
}
.header {
    background-color: #0056b3;
    color: #fff;
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 20px;
    font-size: 22px;
    font-weight: bold;
    text-transform: uppercase;
}
.result {
    font-size: 20px;
    color: #333;
    margin-bottom: 20px;
}
.score {
    font-size: 48px;
    font-weight: bold;
    color: #00cc99;
    margin-top: 10px;
}
.feedback {
    font-size: 16px;
    color: #666;
    margin-top: 10px;
}
.button-container {
    margin-top: 20px;
}
.button-container a {
    text-decoration: none;
    color: #fff;
    background-color: #0056b3;
    padding: 12px 20px;
    border-radius: 8px;
    transition: background-color 0.3s;
    display: inline-block;
    font-weight: bold;
}
.button-container a:hover {
    background-color: #003d7a;
}
</style>
</head>
<body>
<div class="container">
    <div class="header">Hasil Tes</div>
    <div class="result">
        <p>Anda berhasil menjawab:</p>
        <div class="score"><?php echo $correctAnswers; ?> / <?php echo count($questions); ?></div>
        <div class="feedback">
            <?php
            // Menampilkan feedback berdasarkan skor
            if ($correctAnswers == count($questions)) {
                echo "Luar biasa! Anda menjawab semua soal dengan benar!";
            } elseif ($correctAnswers > count($questions) / 2) {
                echo "Bagus sekali! Anda menjawab sebagian besar soal dengan benar!";
            } else {
                echo "Tetap semangat, Anda bisa coba lagi!";
            }
            ?>
        </div>
    </div>
    <div class="button-container">
        <a href="cover.html">Mulai Lagi</a>
    </div>
</div>
</body>
</html>
