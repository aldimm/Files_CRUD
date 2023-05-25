<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
</head>

<body>
    <h3>Pengisian Data Buku Perpustakaan</h3>
    <form action="Simpan.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Kode Buku</td>
                <td><input type="text" name="KB"></td>
            </tr>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="J"></td>
            </tr>
            <tr>
                <td>Pengarang</td>
                <td><input type="text" name="PR"></td>
            </tr>
            <tr>
                <td>Tahun Terbit</td>
                <td><input type="text" name="YEAR"></td>
            </tr>
            <tr>
                <td>Jumlah Halaman</td>
                <td><input type="text" name="PAGE"></td>
            </tr>
            <tr>
                <td>Penerbit</td>
                <td><input type="text" name="PB"></td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td><input type="text" name="GENRE"></td>
            </tr>
            <tr>
                <td>Cover</td>
                <td><input type="file" name="file" accept="image/*" id="file"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tulis ke FILE"></td>
            </tr>
        </table>
    </form>
</body>

</html>