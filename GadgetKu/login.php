<?php
session_start();

// Pemeriksaan jika sudah login, redirect ke halaman lain
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: index.php");
    exit;
}

// Logika lainnya untuk halaman login
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
      <form action="login_process.php" method="post">
        <h1>Login</h1>
        <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == 'wrongpassword') {
                echo '<div class="alert alert-danger">Password salah.</div>';
            } elseif ($_GET['error'] == 'usernotfound') {
                echo '<div class="alert alert-danger">Username tidak ditemukan.</div>';
            }
        }
        ?>
        <div class="input-box">
          <input type="text" placeholder="Username" id="username" name="username" required />
          <i class="bx bxs-user"></i>
        </div>
        <div class="input-box">
          <input
            type="password"
            placeholder="Password"
            required
            name="password"
            id="password"
          />
          <img src="assets/lock-alt.png" id="lockIcon" />
        </div>
        <div class="remember-forgot">
          <label><input type="checkbox" /> Remember me</label>
          <a href="forgot.php">Forgot Password?</a>
        </div>
        <button type="submit" class="btn">Login</button>
        <div class="register-link">
          <p>
            Don't have an account? <a href="register.php">Register here!</a>
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
