<?php
require_once("koneksi.php");

$query = "SELECT news_tbl.id_news, news_tbl.title, news_tbl.description, kategori.nama_kategori FROM news_tbl INNER JOIN kategori ON news_tbl.id_kategori = kategori.id_kategori ORDER BY id_news ASC";
$data = mysqli_query($koneksi, $query);

?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD PHP Sederhana</title>
</head>
<body>
    <h3>Daftar Anggota</h3>
    <a href="admin/add.php">Tambah Data</a>

    <table border="1px">
    <tr>
        <th>Judul</th>
        <th>Isi Berita</th>
        <th>Kategori</th>
        <th>Aksi</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($data)){ ?>
    <tr>
        <td><?php echo $row['title'] ;?></td>
        <td><?php echo $row['description'] ;?></td>
        <td><?php echo $row['nama_kategori'] ;?></td>
        <td>
            <a href="admin/edit.php?id_news=<?php echo $row['id_news']; ?>">Edit</a> | 
            <a href="#">Hapus</a>
        </td>
    </tr>
    <?php
    } // end while
    
    mysqli_close($koneksi); // menutup koneksi ke database
    ?>
    
    </table>

</body>
</html>