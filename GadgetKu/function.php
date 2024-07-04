<?php

$koneksi = mysqli_connect("localhost", "root", "", "db_gadgetku");
function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function addProduct($name, $id_merek, $deskripsi, $stock, $price, $image) {
    global $koneksi;
    $query = "INSERT INTO smartphone (nama, id_merek, deskripsi, stock, price, image) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "sssiis", $name, $id_merek, $deskripsi, $stock, $price, $image);
    return mysqli_stmt_execute($stmt);
}

function editProduct($id_smartphone, $name, $id_merek, $deskripsi, $stock, $price, $image = null) {
    global $koneksi;
    if ($image) {
        $query = "UPDATE smartphone SET nama = ?, id_merek = ?, deskripsi = ?, stock = ?, price = ?, image = ? WHERE id_smartphone = ?";
        $stmt = mysqli_prepare($koneksi, $query);
        mysqli_stmt_bind_param($stmt, 'sssissi', $name, $id_merek, $deskripsi, $stock, $price, $image, $id_smartphone);
    } else {
        $query = "UPDATE smartphone SET nama = ?, id_merek = ?, deskripsi = ?, stock = ?, price = ? WHERE id_smartphone = ?";
        $stmt = mysqli_prepare($koneksi, $query);
        mysqli_stmt_bind_param($stmt, 'sssiii', $name, $id_merek, $deskripsi, $stock, $price, $id_smartphone);
    }
    return mysqli_stmt_execute($stmt);
}

function deleteProduct($id_smartphone) {
    global $koneksi;
    $query = "DELETE FROM smartphone WHERE id_smartphone = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id_smartphone);
    return mysqli_stmt_execute($stmt);
}
?>
