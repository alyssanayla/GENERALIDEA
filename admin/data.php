<?php 
if (isset($_POST['submitfashion'])) {
    $kategori = $_POST['id_category'];
    $nama =  $_POST['name'];
    $harga =  $_POST['price'];
    $ukuran =  $_POST['size'];
    $gambar = $_FILES['image']["name"];

    $data = [ 
        'id_category' => $kategori,
        'name' => $nama,
        'price' => $harga,
        'size' => $ukuran,
        'image' => $gambar
    ];
    // var_dump($data);

    $validasi = validasiData($data);

    if($validasi == 0 ){
    //echo "data sudah lengkap siap di inputkan";

    $tempname = $_FILES['image']["tmp_name"];
    $folder = "../upload/" . $gambar;
    if (move_uploaded_file($tempname, $folder)) {
      //echo '<img src="'.$folder.'">';
    }
    
    $result = inputProduk($data, $koneksi);
        if($result) header("location:input_data.php?status=1");
        else header("location:input_data.php?errno=1");
}
else {
    echo "data $validasi kurang";
}
  }

?>