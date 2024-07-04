<?php
include 'function.php'; // Sesuaikan path untuk include function.php

// Mengecek apakah parameter id_merek ada di URL
$id_merek = isset($_GET['id_merek']) ? htmlspecialchars($_GET['id_merek']) : '';

// Inisialisasi variabel nama_merek
$nama_merek = '';

// Pastikan bahwa id_merek bukan nol atau string kosong sebelum menjalankan query
if ($id_merek) {
    // Query untuk mendapatkan nama merek berdasarkan id_merek
    $query_merek = "SELECT merek FROM merek WHERE id_merek = '$id_merek'";
    $result_merek = mysqli_query($koneksi, $query_merek);

    if ($row_merek = mysqli_fetch_assoc($result_merek)) {
        $nama_merek = htmlspecialchars($row_merek['merek']);
    }

    // Query untuk mendapatkan produk berdasarkan id_merek
    $query = "SELECT * FROM smartphone WHERE id_merek = '$id_merek'";
    $result = mysqli_query($koneksi, $query);

    // Inisialisasi array untuk menyimpan data produk
    $products = [];

    // Memproses setiap baris dan menambahkannya ke array produk
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = [
            'id_smartphone' => $row['id_smartphone'],
            'name' => $row['nama'],
            'id_merek' => $row['id_merek'],
            'deskripsi' => $row['deskripsi'],
            'stock' => $row['stock'],
            'price' => $row['price'],
            'image' => $row['image'] // Pastikan ini mengambil kolom gambar
        ];
    }

    // Tambahkan pernyataan debugging
} else {
    echo "Invalid brand ID.";
    $products = [];
}
?>

<main class="container mt-3">
    <h1 class="text-white fw-bold text-center mb-3"><span><?php echo $nama_merek; ?></span></h1>
    <div class="card-container d-flex flex-wrap">
        <?php if (empty($products)) : ?>
            <p class="text-light">No products found for this brand.</p>
        <?php else : ?>
            <?php foreach ($products as $product) : ?>
                <div class="card card-parent mb-3 mx-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <?php
                            // Memeriksa apakah file gambar ada
                            $imagePath = htmlspecialchars($product['image']);
                            if (file_exists($imagePath)) {
                                echo '<img src="' . $imagePath . '" class="card-img-top product-card mx-3 my-3" alt="' . htmlspecialchars($product['name']) . '">';
                            } else {
                                echo '<img src="path/to/default/image.jpg" class="card-img-top product-card mx-3 my-3" alt="Image not found" >';
                                error_log("Image not found: " . $imagePath);
                            }
                            ?>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body mx-3">
                                <h5 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h5>
                                <p class="card-text">
                                    • <?php echo htmlspecialchars($nama_merek); ?><br />
                                    • <?php echo htmlspecialchars($product['deskripsi']); ?><br />
                                    • Stok: <?php echo htmlspecialchars($product['stock']); ?><br />
                                    • Harga: Rp<?php echo htmlspecialchars($product['price']); ?>
                                </p>
                                <div class="buy-btn">
                                    <a href="#" class="btn btn-primary buy-btn">Buy</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</main>