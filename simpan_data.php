<?php
// Konfigurasi database
$host = "localhost";
$user = "root";
$password = "";
$database = "coba";

// Membuat koneksi ke database
$conn = new mysqli($host, $user, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari formulir
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$hp = $_POST['hp'];

// Query untuk memasukkan data ke tabel
$sql = "INSERT INTO coba (nim, nama, alamat, hp) VALUES ('$nim', '$nama', '$alamat', '$hp')";

// Eksekusi query
if ($conn->query($sql) === TRUE) {
    echo "Data berhasil disimpan.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
