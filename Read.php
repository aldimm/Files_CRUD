<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    echo "<h3>Data Buku Perpustakaan</h3>";
    $file_name = "DataBuku.txt";

    $read = file($file_name); 
    ?>

    <table border = '1'>
        <thead>
            <tr>
                <th>Kode Buku</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Tahun Terbit</th>
                <th>Jumlah Halaman</th>
                <th>Penerbit</th>
                <th>Kategori</th>
                <th>Cover</th>
                <th>AKSI</th>
                </tr>
        </thead>

        <tbody>
            <?php
                $file_name = "DataBuku.txt";
                $read = file($file_name);
            ?>
                
            <?php
                foreach ($read as $book) {
                $data_book = explode("-", $book);
            ?>
            <tr>
                <td><?php echo $data_book[0];?></td>
                <td><?php echo $data_book[1];?></td>
                <td><?php echo $data_book[2];?></td>
                <td><?php echo $data_book[3];?></td>
                <td><?php echo $data_book[4];?></td>
                <td><?php echo $data_book[5];?></td>
                <td><?php echo $data_book[6];?></td>
                <td><img src="upload/<?php echo $data_book[7];?>" . width= 200 height= 100></td>
                <td>
                    <a href="Hapus.php?KB=<?php echo $data_book[0];?>">HAPUS</a>
                    <a href="Editing.php?KB=<?php echo $data_book[0];?>">UPDATE</a>
                </td>
            </tr>    
            <?php
                }
            ?>
               
        </tbody>
    </table>
    <br><br><a href="form.php">Kembali ke Form</a>
</body>
</html>

