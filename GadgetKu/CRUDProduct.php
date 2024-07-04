<?php
// Mulai sesi
include 'check_activity.php';

// Periksa apakah pengguna belum login dan mencoba mengakses halaman CRUDProduct.php
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Jika belum login, arahkan pengguna kembali ke halaman login
    header("location: login.php");
    exit;
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
require "function.php";
// Tangani permintaan POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['addProduct'])) {
        $name = $_POST['name'];
        $id_merek = $_POST['id_merek'];
        $deskripsi = $_POST['deskripsi'];
        $stock = $_POST['stock'];
        $price = $_POST['price'];
        $image = 'path/to/default/image.jpg';

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image = 'upload/' . basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], $image);
        }

        if (addProduct($name, $id_merek, $deskripsi, $stock, $price, $image)) {
            $_SESSION['success_message'] = "Product added successfully.";
        } else {
            $_SESSION['error_message'] = "Error: " . mysqli_error($koneksi);
        }
    }

    if (isset($_POST['editProduct'])) {
        $id_smartphone = $_POST['id_smartphone'];
        $name = $_POST['name'];
        $id_merek = $_POST['id_merek'];
        $deskripsi = $_POST['deskripsi'];
        $stock = $_POST['stock'];
        $price = $_POST['price'];
        $image = null;

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image = 'upload/' . basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], $image);
        }

        if (editProduct($id_smartphone, $name, $id_merek, $deskripsi, $stock, $price, $image)) {
            $_SESSION['success_message'] = "Product updated successfully.";
        } else {
            $_SESSION['error_message'] = "Error: " . mysqli_error($koneksi);
        }
    }

    if (isset($_POST['deleteProduct'])) {
        $id_smartphone = $_POST['id_smartphone'];

        if (deleteProduct($id_smartphone)) {
            $_SESSION['success_message'] = "Product deleted successfully.";
        } else {
            $_SESSION['error_message'] = "Error: " . mysqli_error($koneksi);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manage Products</title>
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
        <div class="content-index">
            <div class="crud-wrapper pb-3">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    + Add product
                </button>
                <div id="notification" class="alert alert-success" style="display: none;">
                    Product added successfully.
                </div>

                <!-- Modal for Adding Product -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                        <div class="modal-content bg-dark">
                            <div class="modal-header">
                                <h1 class="modal-title text-white" id="staticBackdropLabel">Add Your <span>Product</span></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-addProduct">
                                    <form action="" method="post" enctype="multipart/form-data" id="addProductForm" name="addProductForm">
                                        <input type="hidden" name="addProduct" value="1">
                                        <table class="table table-sm table_custom table-borderless align-middle">
                                            <tbody>
                                                <tr>
                                                    <td><label for="name">Nama</label></td>
                                                    <td><input type="text" id="name" name="name" class="form-control bg-dark text-white" required></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="id_merek">Merek</label></td>
                                                    <td><select class="form-select bg-dark text-white" name="id_merek" id="id_merek">
                                                            <option value="SM00006">Vivo</option>
                                                            <option value="SM00007">Oppo</option>
                                                            <option value="SM00003">Xiaomi</option>
                                                            <option value="SM00008">Itel</option>
                                                            <option value="SM00001">Asus</option>
                                                            <option value="SM00002">Iphone</option>
                                                            <option value="SM00005">Infinix</option>
                                                            <option value="SM00004">Poco</option>
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="deskripsi">Deskripsi</label></td>
                                                    <td><textarea name="deskripsi" id="deskripsi" class="form-control bg-dark text-white"></textarea></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="stock">Stock</label></td>
                                                    <td><input type="number" id="stock" name="stock" class="form-control bg-dark text-white" required></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="price">Harga Jual</label></td>
                                                    <td><input type="number" id="price" name="price" class="form-control bg-dark text-white" required></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="image">Gambar</label></td>
                                                    <td><input type="file" id="image" name="image" accept="image/*" class="form-control bg-dark text-white" required></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-dark" value="Submit">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal for Editing Product -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                        <div class="modal-content bg-dark">
                            <div class="modal-header">
                                <h1 class="modal-title text-white" id="editModalLabel">Edit Your <span>Product</span></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-editProduct">
                                    <form id="editForm" action="" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="editProduct" value="1">
                                        <input type="hidden" id="edit_id_smartphone" name="id_smartphone">
                                        <table class="table table-sm table_custom table-borderless align-middle">
                                            <tbody>
                                                <tr>
                                                    <td><label for="edit_name">Nama</label></td>
                                                    <td><input type="text" id="edit_name" name="name" class="form-control bg-dark text-white" required></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="edit_id_merek">Merek</label></td>
                                                    <td><select class="form-select bg-dark text-white" name="id_merek" id="edit_id_merek">
                                                            <option value="SM00006">Vivo</option>
                                                            <option value="SM00007">Oppo</option>
                                                            <option value="SM00003">Xiaomi</option>
                                                            <option value="SM00008">Itel</option>
                                                            <option value="SM00001">Asus</option>
                                                            <option value="SM00002">Iphone</option>
                                                            <option value="SM00005">Infinix</option>
                                                            <option value="SM00004">Poco</option>
                                                        </select></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="edit_deskripsi">Deskripsi</label></td>
                                                    <td><textarea name="deskripsi" id="edit_deskripsi" class="form-control bg-dark text-white"></textarea></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="edit_stock">Stock</label></td>
                                                    <td><input type="number" id="edit_stock" name="stock" class="form-control bg-dark text-white" required></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="edit_price">Harga Jual</label></td>
                                                    <td><input type="number" id="edit_price" name="price" class="form-control bg-dark text-white" required></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="edit_image">Gambar</label></td>
                                                    <td><input type="file" id="edit_image" name="image" accept="image/*" class="form-control bg-dark text-white"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-dark" value="Update">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product List Table -->
                <table class="table table-dark my-2 align-middle crud-table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Merek</th>
                            <th scope="col">ID smartphone</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Harga Jual</th>
                            <th scope="col">Tanggal Ditambahkan</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once 'function.php';
                        $query = "
    SELECT 
        smartphone.*, 
        merek.merek
    FROM 
        smartphone 
    JOIN 
        merek 
    ON 
        smartphone.id_merek = merek.id_merek
";
                        $result = mysqli_query($koneksi, $query);
                        $no = 1;

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>' . $no . '</td>';
                            echo '<td>' . $row['nama'] . '</td>';
                            echo '<td>' . $row['merek'] . '</td>'; // Ubah untuk menampilkan nama_merek
                            echo '<td>' . $row['id_smartphone'] . '</td>';
                            echo '<td>' . $row['deskripsi'] . '</td>';
                            echo '<td>' . $row['stock'] . '</td>';
                            echo '<td>Rp' . number_format($row['price'], 0, ',', '.') . '</td>';
                            echo '<td>' . $row['date'] . '</td>';
                            echo '<td><img src="' . $row['image'] . '" alt="' . $row['nama'] . '" width="50" class="crud-image"></td>';
                            echo '<td>';
                            echo '<button class="btn btn-warning edit-btn me-2" data-id_smartphone="' . $row['id_smartphone'] . '" data-name="' . $row['nama'] . '" data-id_merek="' . $row['id_merek'] . '" data-merek="' . $row['merek'] . '" data-deskripsi="' . $row['deskripsi'] . '" data-stock="' . $row['stock'] . '" data-price="' . $row['price'] . '" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>';
                            echo '<form action="" method="post" style="display:inline-block;">';
                            echo '<input type="hidden" name="deleteProduct" value="1">';
                            echo '<input type="hidden" name="id_smartphone" value="' . $row['id_smartphone'] . '">';
                            echo '<button type="submit" class="btn btn-danger">Delete</button>';
                            echo '</form>';
                            echo '</td>';
                            echo '</tr>';
                            $no++;
                        }

                        ?>
                    </tbody>
                </table>
            </div>
    </section>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        const myModal = document.getElementById('myModal')
        const myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', () => {
            myInput.focus()
        })
    </script>
    <script>
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', () => {
                document.getElementById('edit_id_smartphone').value = button.getAttribute('data-id_smartphone');
                document.getElementById('edit_name').value = button.getAttribute('data-name');
                document.getElementById('edit_id_merek').value = button.getAttribute('data-id_merek');
                document.getElementById('edit_deskripsi').value = button.getAttribute('data-deskripsi');
                document.getElementById('edit_stock').value = button.getAttribute('data-stock');
                document.getElementById('edit_price').value = button.getAttribute('data-price');
            });
        });
    </script>
</body>

</html>