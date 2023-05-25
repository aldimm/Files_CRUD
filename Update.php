<?php
if ($_POST) {
    $file_name = "DataBuku.txt";
    $read = file($file_name);

    $Code_Book = $_POST['KB'];

    foreach ($read as $key => $book) {
        $data_book = explode("-", $book);
        if ($data_book[0] === $Code_Book) {
            // Update data sesuai dengan input baru
            $data_book[1] = $_POST['J'];
            $data_book[2] = $_POST['PR'];
            $data_book[3] = $_POST['YEAR'];
            $data_book[4] = $_POST['PAGE'];
            $data_book[5] = $_POST['PB'];
            $data_book[6] = $_POST['GENRE'];
            // Menghapus karakter newline pada gambar sebelumnya
            $data_book[7] = str_replace("\n", "", $data_book[7]);

            // Cek apakah ada gambar baru yang diupload
            if ($_FILES['file']['size'] > 0) {
                $target_dir = "upload/";
                $target_file = $target_dir . basename($_FILES['file']['name']);
                move_uploaded_file($_FILES['file']['tmp_name'], $target_file);
                $data_book[7] = basename($_FILES['file']['name']);
            }

            // Gabungkan data kembali menjadi string
            $read[$key] = implode("-", $data_book) . "\n";

            // Simpan perubahan ke file
            file_put_contents($file_name, $read);
            echo "Data berhasil diperbarui.";
            echo '<br><br><a href="Read.php">Lihat Data</a>';

            break;
        }
    }
}
?>