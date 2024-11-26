<?php 
require "../config/config.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-10">
                <?php 
                    $produk = viewProduk($koneksi);

                    if($produk == 0) {
                        echo 'Data Kosong';
                    }
                    else {
                ?>
                <table class=table>
                    <tr>
                        <th>Nomor</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Size</th>
                        <th colspan=2>Menu</th>
                    </tr>
                    <?php 
                    // awalan foreach 
                    $no = 1; 
                    foreach($produk as $data) {
                    ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $data['name_category'] ?></td>
                        <td><?= $data['name'] ?></td>
                        <td><img class="img-fluid" style="height: 70px;" src="../upload/<?= $data['image'] ?>"></td>
                        <td><?= $data['price'] ?></td>
                        <td><?= $data['size'] ?></td>
                        <td>edit</td>
                        <td>delete</td>
                    </tr>
                    <?php 
                       $no ++;
                    }
                        // akhiran foreach
                    ?>
                </table>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>