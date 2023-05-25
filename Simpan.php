<?php

if ($_POST) {
    //variable penampung
    $LIBRARY = $_POST['KB'] . "-" . $_POST['J'] . "-" . $_POST['PR'] . "-" . $_POST['YEAR'] . "-" . $_POST['PAGE'] . "-" . $_POST['PB'] . "-" . $_POST['GENRE'] . "-" . $_FILES['file']['name'] . "\n";
    //simpan ke file
    $file_name = "DataBuku.txt";

    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], $target_file);
    if (file_put_contents($file_name, $LIBRARY, FILE_APPEND) > 0) {
        echo "data telah disimpan";
    } else {
        echo "data gagal disimpan";
    }

    echo '<br><br><a href="Form.php">Kembali ke Form</a>';
    echo '<br><br><a href="Read.php">Lihat Data</a>';
}