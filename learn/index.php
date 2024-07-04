<?php
session_start();
$currentPage = 'home';
include('./includes/header.php');
?>

<div class="gadgetku-container">

    <!-- Jumbotron -->
    <div class="container my-5">
        <!-- Jumbotron -->
        <div class="row flex-lg-row-reverse align-items-center g-5">
            <div class="col-10 mx-auto col-sm-8 col-lg-6">
                <img src="uploads/samsung_s21.png" class="d-block mx-lg-auto img-fluid" alt="samsung_s21" />
            </div>
            <div class="col-lg-6">
                <div class="lc-block mb-3">
                    <div editable="rich">
                        <h2 class="fw-bold display-6">
                            <span class="text-hijau">Revolutionize</span><br />
                            Your Tech Experience
                        </h2>
                    </div>
                </div>

                <div class="lc-block mb-3">
                    <div editable="rich">
                        <p class="lead fw-medium">
                            Experience unparalleled shopping at GadgetKu, where innovation meets excellence. Explore our curated selection and elevate your tech
                            journey today.
                        </p>
                    </div>
                </div>

                <div class="lc-block d-grid gap-1 d-md-flex justify-content-md-start">
                    <a class="btn btn-primary px-4 me-md-2 rounded-5 " href="categories.php" role="button">Product</a>
                    <a class="btn btn-outline-primary px-4 rounded-5 " href="" role="button">Support</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Explore Product -->
    <div class="bg-light py-4">
        <div class="container my-2">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="bg-putih-product rounded-5 d-flex justify-content-center flex-column py-3">
                        <img src="uploads/samsung s24.png" alt="samsung s24" width="170" height="170" class="mx-auto" />
                        <p class=" fw-semibold mx-auto fs-5">Smartphone</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="bg-putih-product rounded-5 d-flex justify-content-center flex-column py-3">
                        <img src="uploads/laptops.png" alt="samsung s24" height="170" class="mx-auto" />
                        <p class=" fw-semibold mx-auto fs-5">Laptops</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="bg-putih-product rounded-5 d-flex justify-content-center flex-column py-3">
                        <img src="uploads/desktop.png" alt="samsung s24" width="170" height="170" class="mx-auto" />
                        <p class=" fw-semibold mx-auto fs-5">Desktops</p>
                    </div>
                </div>
            </div>

            <div class="lc-block d-grid gap-1 d-md-flex justify-content-md-start">
                <a class="btn btn-outline-dark px-4 rounded-5 mx-auto" href="categories.php" role="button">See More
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle ms-1" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                    </svg></a>
            </div>
        </div>
    </div>

    <!-- Recomended Product -->
    <div class="container py-5">
        <h2 class="fw-semibold text-center my-5">Recommended for You</h2>
        <div class="row">
            <?php for ($i = 1; $i <= 6; $i++) : ?>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="lc-block bg-white rounded-5 shadow"><img src="uploads/infinix note 40.png" loading="lazy" width="100%">
                        <div class="lc-block p-4">
                            <div editable="rich">
                                <h6>Smartphone</h6>
                                <h3>Infinix Note 40 Pro</h3>
                                <p>Get the Infinix Note 40 Pro now and unlock unparalleled performance and style, revolutionizing your smartphone experience.</p>
                                <a href="" class="link-offset-2 link-underline link-underline-opacity-0">Detail Product</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>

    <!-- Faq -->
    <div class="container my-5">
        <h2 class="fw-semibold text-center my-4">FAQ</h2>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Apakah produk Anda memiliki garansi?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Ya, semua produk kami dilengkapi dengan garansi pabrik standar. Silakan hubungi layanan pelanggan kami untuk informasi lebih lanjut tentang garansi spesifik untuk setiap produk.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Bagaimana cara melakukan pengiriman dan pengembalian produk?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Kami menawarkan pengiriman yang cepat dan aman untuk semua pesanan. Untuk pengembalian produk, silakan kunjungi halaman Kebijakan Pengembalian kami untuk panduan langkah demi langkah.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Apakah produk Anda kompatibel dengan sistem operasi tertentu?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Sebagian besar produk kami kompatibel dengan berbagai sistem operasi, namun untuk informasi lebih lanjut, pastikan untuk memeriksa spesifikasi produk yang tertera di halaman detail produk.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Apakah Anda menawarkan layanan pelanggan 24/7?
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Ya, tim layanan pelanggan kami siap membantu Anda 24 jam sehari, 7 hari seminggu. Silakan hubungi kami melalui email, telepon, atau obrolan langsung untuk bantuan lebih lanjut.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        Bagaimana cara mendapatkan pembaruan produk dan promosi terbaru?
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Anda dapat mendaftar untuk menerima buletin kami atau mengikuti kami di media sosial untuk mendapatkan pembaruan produk, penawaran spesial, dan promosi eksklusif kami.
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include('./includes/footer.php'); ?>