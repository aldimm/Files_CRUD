<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Buku</title>
</head>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["KB"])) {
            // Mendapatkan kode buku dari parameter URL
            $Code_Book = trim($_GET["KB"]);

            // Memeriksa apakah kode buku ada dalam file buku.txt
            $file_name = "DataBuku.txt";
            $read = file($file_name);
            $found = false;
            $selected_buku = [];

            foreach ($read as $book) {
                $data_book = explode("-", $book);

                if ($data_book[0] == $Code_Book) {
                    $found = true;
                    $selected_buku = $data_book;
                    break;
                }
            }

            if ($found) {
                // Form edit buku
                // Ambil nilai kode_buku dari URL jika tersedia
                $Code_Book = $_GET['KB'] ?? '';?>

                <center>
                    <h3>Update Data Buku</h3>
                    <form action="Update.php" method="post" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td>Kode buku</td>
                                <td><input type="text" name="KB" value="<?php echo "$Code_Book";?>"></td>
                            </tr>
                            <tr>
                                <td>Judul</td>
                                <td><input type="text" name="J" value="<?php echo "$selected_buku[1]";?>" required><br></td>
                            </tr>
                            <tr>
                                <td>Pengarang</td>
                                <td><input type="text" name="PR" value="<?php echo "$selected_buku[2]";?>" required><br></td>
                            </tr>
                            <tr>
                                <td>Tahun Terbit</td>
                                <td><input type="text" name="YEAR" value="<?php echo isset($selected_buku[3]) ? $selected_buku[3] : ''; ?>" required><br></td>
                            </tr>
                            <tr>
                                <td>Jumlah Halaman</td>
                                <td><input type="text" name="PAGE" value="<?php echo isset($selected_buku[4]) ? $selected_buku[4] : ''; ?>" required><br></td>
                            </tr>
                            <tr>
                                <td>Penerbit</td>
                                <td><input type="text" name="PB" value="<?php echo "$selected_buku[5]";?>" required><br></td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td><input type="text" name="GENRE" value="<?php echo isset($selected_buku[6]) ? $selected_buku[6] : ''; ?>" required><br></td>
                            </tr>
                            <tr>
                                <td>Cover</td>
                                <td><input type="file" name="file" accept="image/*"><br></td>
                            </tr>
                            <?php
                                // Menampilkan gambar lama jika tersedia
                                $gambar_lama = $selected_buku[7];
                                if (!empty($gambar_lama)) {
                                    echo "<tr><td><label>Cover Lama:</label><br></td>";
                                    echo "<td><img src='upload/$gambar_lama' alt='Gambar Lama' width='200'><br></td></tr>";
                                }
                                echo "<tr><td><input type='submit' name='update' value='Perbarui'></td></td></tr>";
                            ?>
                        </table>
                    </form>
                </center>
            <?php
            } else {
                echo "Buku tidak ditemukan";
            }
        } else {
            echo "Permintaan tidak valid";
        }
    ?>
</body>
</html>
