<?php
// Mulai sesi
include 'check_activity.php';

// Periksa apakah pengguna belum login dan mencoba mengakses halaman CRUDProduct.php
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Jika belum login, arahkan pengguna kembali ke halaman login
}

// Periksa apakah waktu terakhir akses dalam cookie sudah lebih dari 5 menit yang lalu
if (isset($_COOKIE['last_activity']) && (time() - $_COOKIE['last_activity']) > (5 * 60)) {
    // Hapus sesi pengguna
    session_destroy();

    // Redirect ke halaman login setelah logout otomatis
    header("location: login.php");
    exit;
}

// Perbarui waktu terakhir akses dalam cookie
setcookie('last_activity', time(), time() + (5 * 60), "/"); // Cookie akan diperbarui setiap kali pengguna mengakses halaman

// Halaman berikutnya
// Tambahkan konten halaman yang diinginkan di sini
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GadgetKu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body class="bg-dark">
<section id="header">
    <!-- navbar start  -->
    <?php
    include 'modularitas/components/header.php';
    ?>
    <!-- sidebar component end -->
</section>

<section id="content">
    <!-- content start  -->
    <div class="content-index">
    <?php
    if (isset($_GET['target'])) {
        $target = $_GET['target'];
        if ($target == 'home') {
            require('modularitas/home.php');
        } else if ($target == 'product') {
            require('modularitas/product.php');
        } else if ($target == 'faq') {
            require('modularitas/faq.php');
        } else if ($target == 'about') {
            require('modularitas/about.php');
        } else if ($target == 'review') {
            require('modularitas/review.php');
        } else if ($target == 'service') {
            require('modularitas/service.php');
        } else if ($target == 'CRUDProduct') {
            require('modularitas/CRUDProduct.php');
        } else if ($target == 'brand') {
            require('modularitas/brand.php');
        } else if ($target == 'display') {
            require('modularitas/display.php');
        } else if ($target == 'kredit') {
            require('modularitas/kredit.php');
        } else if ($target == 'data1') {
            // Check if form is submitted and fields are not empty
            if (isset($_POST['name']) && isset($_POST['number']) && isset($_POST['email']) && isset($_POST['memType']) && isset($_POST['buyDate']) && isset($_POST['complaint']) && isset($_POST['experience']) && isset($_POST['garansi']) && isset($_POST['note'])) {
                echo '<div class="text-center" style="color: white;">';
                require('modularitas/data1.php');
                echo '</div>';
            } else {
                // Jika form belum diisi, tampilkan pesan error atau redirect ke halaman lain
                echo '<p class="text-center" style="color: white;">Anda harus mengisi form sebelum mengakses halaman database.</p>';
            }
        } else if ($target == 'data2') {
            // Check if form is submitted and fields are not empty
            if (isset($_POST['hargaBarang']) && isset($_POST['bungaPinjaman']) && isset($_POST['uangMuka']) && isset($_POST['jangkaWaktu'])) {
                echo '<div class="text-center" style="color: white;">';
                require('modularitas/data2.php');
                echo '</div>';
            } else {
                // Jika form belum diisi, tampilkan pesan error atau redirect ke halaman lain
                echo '<p class="text-center" style="color: white;">Anda harus mengisi form sebelum mengakses halaman database.</p>';
            }
        }
    } else {
        require('modularitas/home.php');
    }
    ?>
    </div>
    <!-- content end  -->
</section>

<?php
include 'modularitas/components/footer.php';
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
const myModal = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', () => {
    myInput.focus()
})
</script>
<script>
let lockIcon = document.getElementById("lockIcon");
let password = document.getElementById("password");

lockIcon.onclick = function () {
    if (password.type == "password") {
        password.type = "text";
        lockIcon.src = "assets/lock-open-alt.png";
    } else {
        password.type = "password";
        lockIcon.src = "assets/lock-alt.png";
    }
};
</script>
</body>
</html>
