<?php
// including the database connection file
include_once("../koneksi.php");
/*

*/?>
<?php
//getting id from url
$id2 = $_GET['id_news'];

//selecting data associated with this particular id
$result = mysqli_query($koneksi, "SELECT news_tbl.id_news, news_tbl.id_kategori, news_tbl.title, news_tbl.description, kategori.nama_kategori FROM news_tbl INNER JOIN kategori ON news_tbl.id_kategori = kategori.id_kategori WHERE id_news = $id2");

while($res = mysqli_fetch_array($result))
{
    $judul = $res['title'];
    $isi = $res['description'];
    $id_kate = $res['id_kategori'];
}
?>
<html>
<head>  
    <title>Edit Data</title>
</head>

<body>
    <a href="../index_admin.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="proses_edit.php">
        <table border="0">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="title" value="<?php echo $judul;?>"></td>
            </tr>
            <tr> 
                <td>Age</td>
                <td><input type="text" name="description" value="<?php echo $isi;?>"></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td>
                    <!--<input type="text" name="email" value="<?php echo $id_kat;?>">-->
                    <select name="id_kategori">
                    <?php
                        $j=mysqli_query($koneksi,"SELECT nama_kategori FROM kategori");
                        while($k=mysqli_fetch_array($j)){
                        echo "<option value='$id_kate'>$k[nama_kategori]</option>";
                        }
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="hidden" name="id_news" value=<?php echo $_GET['id_news'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>