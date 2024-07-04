<?php
// Mulai sesi
session_start();

// Koneksi ke database
$servername = "localhost"; // Ganti dengan nama host database Anda
$username_db = "root"; // Ganti dengan username database Anda
$password_db = ""; // Ganti dengan password database Anda
$dbname = "db_gadgetku"; // Ganti dengan nama database Anda

$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil username dan password dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk mengambil data pengguna berdasarkan username
$sql = "SELECT username, password FROM admin WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($db_username, $db_password);
    $stmt->fetch();
    
    // Verifikasi password
    if (password_verify($password, $db_password)) {
        // Jika login berhasil, simpan informasi pengguna dalam sesi
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $db_username;

        // Atur cookie waktu terakhir akses
        setcookie('last_activity', time(), time() + (5 * 60), "/"); // Cookie akan berakhir dalam 5 menit

        // Redirect pengguna ke halaman lain setelah login
        header("location: index.php?target=home"); // Ganti home.php dengan halaman tujuan setelah login
        exit;
    } else {
        // Jika password salah
        header("location: login.php?error=wrongpassword");
        exit;
    }
} else {
    // Jika username tidak ditemukan
    header("location: login.php?error=usernotfound");
    exit;
}

$stmt->close();
$conn->close();
?>
