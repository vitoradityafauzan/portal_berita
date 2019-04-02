<html>
<?php 
     include_once("../koneksi.php");
?>
<head>
    <title>Add Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
 
    <form action="submit.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Judul Berita</td>
                <td><input type="text" name="title"></td>
            </tr>
            <tr> 
                <td>Isi Berita</td>
                <td><input type="text" name="description"></td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td> 
                    <select name="id_kategori">
                    <?php
                        $j=mysqli_query($koneksi,"SELECT * FROM kategori ");
                        while($k=mysqli_fetch_array($j)){
                        echo "<option value='$k[id_kategori]'>$k[nama_kategori]</option>";
                        }
                    ?>
                    </select>
                </td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
</body>
</html>