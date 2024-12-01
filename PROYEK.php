<?php
session_start();

    $soal = [
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

/// Tentukan jumlah soal
$totalSoal = count($soal);

// Inisialisasi sesi untuk jawaban pengguna
if (!isset($_SESSION['jawaban'])) {
    $_SESSION['jawaban'] = [];
}

// Proses jawaban
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['answer'], $_POST['current_question'])) {
    $currentQuestion = intval($_POST['current_question']);
    $_SESSION['jawaban'][$currentQuestion] = $_POST['answer'];
}

// Tentukan soal saat ini
$currentQuestion = isset($_POST['next_question']) ? intval($_POST['next_question']) : 0;

// Validasi soal saat ini
if ($currentQuestion >= $totalSoal) {
    header("Location: jawaban.php");
    exit();
}

// Data soal saat ini
$pertanyaan = $soal[$currentQuestion]['question'];
$pilihan = $soal[$currentQuestion]['options'];
$gambar = $soal[$currentQuestion]['image'] ?? "";

// Acak pilihan
shuffle($pilihan);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Application</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-image: url('https://college-directory-staging.s3.ap-southeast-3.amazonaws.com/media/college_banner/87461803_2516348841961032_9159484394031808512_n.jpg'); /* Ganti dengan URL gambar latar belakang */
            background-size: cover; /* Membuat gambar latar memenuhi layar */
            background-position: center; /* Menempatkan gambar latar di tengah */
            background-attachment: fixed; /* Gambar latar tetap saat halaman di-scroll */
        }
        h3 {
            color: #333;
        }
        .header {
            background-color: BLUE;
            color: #fff;
            padding: 15px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        form {
            background-color: rgba(255, 255, 255, 0.9); /* Tambahkan transparansi untuk efek lebih baik */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="radio"] {
            margin-right: 10px;
        }
        input[type="submit"] {
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #4cae4c;
        }
        p {
            font-size: 18px;
        }
        img {
            max-width: 30%; /* Menyesuaikan ukuran gambar */
            display: block;
            margin: 20px auto;
        }
        .options {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="header">KUIS PENGETAHUAN UMUM</div>
    <form action="" method="post">
        <h3><?php echo $pertanyaan; ?></h3>
        <?php if (!empty($gambar)): ?>
            <img src="<?php echo $gambar; ?>" alt="Gambar Pertanyaan">
        <?php endif; ?>
        <?php foreach ($pilihan as $i => $option): ?>
            <input type="radio" name="answer" value="<?php echo $option; ?>" id="option<?php echo $i; ?>" required>
            <label for="option<?php echo $i; ?>"><?php echo $option; ?></label><br>
        <?php endforeach; ?>
        <input type="hidden" name="current_question" value="<?php echo $currentQuestion; ?>">
        <input type="hidden" name="next_question" value="<?php echo $currentQuestion + 1; ?>">
        <input type="submit" value="Jawab">
    </form>
</body>
</html>
