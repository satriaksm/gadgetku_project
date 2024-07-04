<nav class="navbar navbar-expand-lg bg-body-transparat navbar-dark">
    <div class="container sticky-top" id="index-container">
        <a class="navbar-brand" href="index.php">Gadget<span>Ku</span></a>
        <button class="btn btn-lg" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <i class='bx bx-menu' style='color:#ffffff'  ></i>
        </button>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-right" id="navbarText">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php?target=home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?target=about">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a
                      class="nav-link dropdown-toggle"
                      href="#"
                      role="button"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                      >Product</a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="index.php?target=brand">Show Product</a></li>
                      <li><a class="dropdown-item" href="CRUDProduct.php">Manage Product</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a
                      class="nav-link dropdown-toggle"
                      href="#"
                      role="button"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                      >Form</a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="index.php?target=service">Service</a></li>
                      <li><a class="dropdown-item" href="index.php?target=kredit">Simulasi Kredit</a></li>
                      <!-- <li><a class="dropdown-item" href="index.php?target=review">Review</a></li> -->
                    </ul>
                </li>
                <?php
                    // Periksa apakah pengguna sudah login
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                        // Jika pengguna sudah login, tampilkan tombol logout
                        echo '<li class="nav-item">';
                        echo '<a class="btn btn-danger ms-3 login-btn" href="logout.php" role="button">Log out</a>';
                        echo '</li>';
                    } else {
                        // Jika pengguna belum login, tampilkan tombol login
                        echo '<li class="nav-item">';
                        echo '<a class="btn btn-success ms-3 login-btn" href="login.php" role="button">Log In</a>';
                        echo '</li>';
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>
    <!-- navbar end  -->

    <!-- sidebar component start -->
    <div
      class="offcanvas offcanvas-start"
      tabindex="-1"
      id="offcanvasExample"
      aria-labelledby="offcanvasExampleLabel"
    >
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel"></h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="offcanvas"
          aria-label="Close"
        ></button>
      </div>
      <div class="offcanvas-body">
        <div class="dropdown mt-3">
            <ul class="navbar-parent">
                <li class="nav-item-sidebar"><a class="nav-link active" href="index.php?target=home">Home</a></li>
                <li class="nav-item-sidebar"><a class="nav-link" href="index.php?target=about">About</a></li>
                <li class="nav-item-dropdown">
                    <a
                      class="nav-link dropdown-toggle"
                      href="#"
                      role="button"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                      >Product</a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="index.php?target=brand">Show product</a></li>
                      <li><a class="dropdown-item" href="CRUDProduct.php">Manage Product</a></li>
                    </ul>
                </li>
                <li class="nav-item-dropdown">
                    <a
                      class="nav-link dropdown-toggle"
                      href="#"
                      role="button"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                      >Form</a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="index.php?target=service">Service</a></li>
                      <li><a class="dropdown-item" href="index.php?target=kredit">Simulasi Kredit</a></li>
                      <!-- <li><a class="dropdown-item" href="index.php?target=review">Review</a></li> -->
                    </ul>
                </li>
            </ul>
        </div>
      </div>
    </div>