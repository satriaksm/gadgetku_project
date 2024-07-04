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
      <form action="">
        <h1>Forgot Password</h1>
        <div class="register-link">
          <p>
            <strong>No worries!</strong> Enter your email address below and we
            will send you a code to reset password.
          </p>
        </div>
        <div class="input-box">
          <input type="text" placeholder="Email" required />
          <i class="bx bx-envelope"></i>
        </div>
        <button type="submit" class="btn">Send</button>
        <a href="login.php" class="btn2">Back to Login</a>
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