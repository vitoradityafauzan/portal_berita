<html>
<head>
<title>Tambah data mahasiswa</title>
</head>
<body>
<h2 align=”center”>Tambah Mahasiswa</h2>
<form action="submitform.php" method="POST" enctype="multipart/form-data">
<table border="0" width="60%" align="center">
   <tr> 
        <td>Judul Berita</td>
        <td><input type="text" name="title" size="20"></td>
    </tr>
    <tr> 
        <td>Isi Berita</td>
        <td><input type="text" name="description" size="90"></td>
    </tr>

   <!-- <tr>
        <td>kategori</td>
        <td><select name="id_kategori">
        <?php/*
        include("koneksi.php");
        $j=mysqli_query($koneksi,"SELECT * FROM kategori");
        while($k=mysqli_fetch_array($j)){
        echo "<option value='$k[id_kategori]>$k[nama_kategori]</option>";
        }*/
        ?>
        </select></td>
    </tr> -->
    
    <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="submit" value="SIMPAN">
        <input type="reset" name="batal" value="BATAL"></td>
    </tr>
</table>
</form>
</body>
</html>