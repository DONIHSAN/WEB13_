<?php
include_once 'koneksi.php';

// Kode untuk mengatur hasil pencarian
$result = null;

// Periksa apakah ada input pencarian
if (isset($_GET['keyword'])) {
    // Ambil kata kunci pencarian dari URL
    $keyword = $_GET['keyword'];

    // Lakukan kueri pencarian
    $query = "SELECT * FROM data_barang WHERE nama LIKE '%$keyword%' OR kategori LIKE '%$keyword%'";
    $result = mysqli_query($conn, $query);
}

// Mulai HTML
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum 13</title>
    <!-- Gantilah dengan stylesheet Anda -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php require('header.php'); ?>

<div class="content">
    <h1>Data Barang</h1><br>

    <!-- Formulir pencarian -->
    <form action="" method="GET">
        <label for="keyword" style="font-weight: bold; color:var(--black); font-size: 15px;">Cari Barang :</label>
        <input type="text" name="keyword" id="keyword" style="height: 15px; border: 1px solid var(--darkblue); border-radius: 4px; padding: 5px;" value="<?= isset($keyword) ? $keyword : ''; ?>" />
        <input type="submit" value="Cari" style="background-color: var(--blue-tiktok); color:var(--black); padding: 6px 24px; font-weight: 700; border: 1px solid var(--white); border-radius: 6px; cursor: pointer;"/>
    </form><br>

    <div class="main">
        <table>
            <tr>
                <th>Gambar</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga Jual</th>
                <th>Harga Beli</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
            <?php if($result && mysqli_num_rows($result) > 0): ?>
                <?php while($row = mysqli_fetch_array($result)): ?>
                    <tr>
                        <td><img src="gambar/<?= $row['gambar'];?>" alt="<?= $row['nama'];?>"></td>
                        <td><?= $row['nama'];?></td>
                        <td><?= $row['kategori'];?></td>
                        <td><?= $row['harga_jual'];?></td>
                        <td><?= $row['harga_beli'];?></td>
                        <td><?= $row['stok'];?></td>
                        <td>
                            <a href="ubah.php?id=<?= $row['id_barang'];?>">Ubah</a>
                            <a href="hapus.php?id=<?= $row['id_barang'];?>">Hapus</a> 
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">Tidak ada hasil pencarian</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
    <?php require('pagination.php'); ?>
</div>

<?php require('footer.php'); ?>

</body>
</html>
<?php
// Tutup koneksi
mysqli_close($conn);
?>
