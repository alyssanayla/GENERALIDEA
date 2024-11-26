<?php

function validasiData($data)
{

    foreach ($data as $index => $value) {
        $value = trim($value);
        if ($value === '' || $value === 0 || $value === null || $value === false) {
            return $index;
        }
    }
    return 0;
}

function inputProduk($data, $koneksi)
{
    $kategori = $data['id_category'];
    $nama =  $data['name'];
    $harga =  $data['price'];
    $ukuran =  $data['size'];
    $gambar = $data['image'];

    $sql = "INSERT INTO product (id_category, name, image, price, size) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $sql);
    if ($stmt === false) {
        return "failed";
    }

    mysqli_stmt_bind_param($stmt, 'sssss', $kategori, $nama, $gambar, $harga, $ukuran);
    $result = mysqli_stmt_execute($stmt);

    if (!$result)
        return false;

    mysqli_stmt_close($stmt);
    return true;
}

function viewKategori($koneksi)
{
    $sql = "SELECT * FROM category";
    $stmt = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($stmt) > 0) return mysqli_fetch_all($stmt, MYSQLI_ASSOC);
    else return false;
}

function viewProduk($koneksi)
{
    $sql = "SELECT product.id, category.name
    AS name_category, product.name,product.image, product.price, product.size
    FROM `product` JOIN category ON category.id_category = product.id_category
    ORDER BY category.id_category ASC";

    $stmt = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($stmt) > 0) return mysqli_fetch_all($stmt, MYSQLI_ASSOC);
    else return false;
}
?>