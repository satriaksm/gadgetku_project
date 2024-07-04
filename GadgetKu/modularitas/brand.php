<?php
require "function.php"; // Path to function.php
$brandSmartphone = query("SELECT * FROM merek ORDER BY id_merek ASC;");
?>

<div class="mb-4 mx-4">
    <h1 class="text-white fw-bold text-center mb-3">Merek <span>Smartphone</span></h1>
    <div class="row g-0">
        <?php foreach ($brandSmartphone as $brand) : ?>
            <div class="col-3">
                <div class="card mb-3 mx-3 text-center" style="max-width: 360px;">
                    <a href="index.php?target=product&id_merek=<?php echo urlencode($brand['id_merek']); ?>" class="text-decoration-none text-reset">
                        <div class="">
                            <?php
                            // Menggunakan path yang sama seperti product.php untuk gambar
                            $imagePath = htmlspecialchars($brand['image']);
                            
                            // Memeriksa apakah file gambar ada
                            if (file_exists($imagePath)) {
                                echo '<img src="' . $imagePath . '" alt="merk' . htmlspecialchars($brand['merek']) . '" max-width="130px" class="img-brand my-2">';
                            } else {
                                echo '<img src="path/to/default/image.jpg" alt="Image not found" max-width="130px" class="img-brand">';
                                error_log("Image not found: " . $imagePath);
                            }
                            ?>
                        </div>
                        <h6 class="text-center fw-bold text-uppercase"><?php echo htmlspecialchars($brand['merek']); ?></h6>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
