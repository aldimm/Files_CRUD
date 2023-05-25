<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["KB"])) {
    // Mendapatkan kode buku dari parameter URL
    $Code_Book = trim($_GET["KB"]);

    // Memeriksa apakah kode buku ada dalam file data_buku.txt
    $file_name = "DataBuku.txt";
    $read = file($file_name);
    $found = false;
    $updated_content = '';

    foreach ($read as $book) {
        $data_book = explode("-", $book);

        if ($data_book[0] == $Code_Book) {
            $found = true;
            continue; // Mengabaikan data buku yang akan dihapus
        }

        $updated_content .= $book;
    }

    if ($found) {
        // Menulis kembali isi file buku.txt setelah data buku dihapus
        file_put_contents($file_name, $updated_content);
        echo "Data buku berhasil dihapus!";
    } else {
        echo "Buku tidak ditemukan";
    }
} else {
    echo "Permintaan tidak valid";
}
echo '<br><br><a href="Read.php">Lihat Data</a>';

?>
