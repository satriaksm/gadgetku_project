<?php
// Pastikan Anda telah membuat koneksi ke database sebelumnya
include_once 'function.php';

// Inisialisasi variabel pesan error
$username_err = $email_err = $password_err = $confirm_password_err = "";

// Memproses data ketika form dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Memeriksa apakah field username tidak kosong
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Memeriksa apakah field email tidak kosong
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter an email.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Memeriksa apakah field password tidak kosong
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Memeriksa apakah field confirm password tidak kosong
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        // Memeriksa apakah password dan confirm password cocok
        if ($password != $confirm_password) {
            $confirm_password_err = "Password did not match.";
        }
    }

    // Jika tidak ada pesan error, lakukan penambahan data ke dalam database
    if (empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)) {
        // Siapkan pernyataan INSERT
        $sql = "INSERT INTO admin (username, email, password) VALUES (?, ?, ?)";

        if ($stmt = mysqli_prepare($koneksi, $sql)) {
            // Bind parameter ke pernyataan
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_email, $param_password);

            // Set parameter
            $param_username = $username;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Hash password sebelum disimpan ke database

            // Cobalah untuk mengeksekusi pernyataan yang telah disiapkan
            if (mysqli_stmt_execute($stmt)) {
                // Jika berhasil, redirect ke halaman login
                header("location: login.php");
            } else {
                echo "Something went wrong. Please try again later.";
            }

            // Tutup pernyataan
            mysqli_stmt_close($stmt);
        }
    }

    // Tutup koneksi
    mysqli_close($koneksi);
}
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
    <main class="main-login">
        <div class="login-body">
            <div class="login-wrapper">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <h1>Register</h1>
                    <div class="input-box">
                        <input type="text" name="username" placeholder="Username" required />
                        <i class="bx bxs-user"></i>
                    </div>
                    <div class="input-box">
                        <input type="email" name="email" placeholder="Email" required />
                        <i class="bx bx-envelope"></i>
                    </div>
                    <div class="input-box">
                        <input type="password" name="password" placeholder="Password" required />
                        <i class="bx bxs-lock-alt"></i>
                    </div>
                    <div class="input-box">
                        <input type="password" name="confirm_password" placeholder="Confirm Password" required />
                        <i class="bx bxs-lock-alt"></i>
                    </div>
                    <button type="submit" class="btn">Create Account</button>
                    <a href="login.php" class="btn2">Back to Login</a>
                    <div class="register-link">
                        <p>
                            By continuing, you agree to our <a href="#">Terms of Service</a> and
                            <a href="#">Privacy Policy.</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </main>
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