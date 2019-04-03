<?php
// including the database connection file
include_once("../koneksi.php");
 
if(isset($_POST['update']))
{    
    $id_news = $_GET['id_news'];
    $kat = $_POST['id_kategori'];
    $title=$_POST['title'];
    $description=$_POST['description'];
    
    // checking empty fields
    if(empty($title) || empty($description)) {            
        if(empty($title)) {
            echo "<font color='red'>Harap isikan judul.</font><br/>";
        }
        
        if(empty($description)) {
            echo "<font color='red'>Harap isikan berita.</font><br/>";
        }
            
    } else {    
        //updating the table
        $result = mysqli_query($koneksi, "UPDATE id_news SET title ='$title',description ='$description', id_kategori = '$kat' WHERE id_news='$id_news' ");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: index_admin.php");
    }
}
?>
<?php
//getting id from url
 
//selecting data associated with this particular id
$result = mysqli_query($koneksi, "SELECT * FROM news_tbl WHERE id_news='$id_news' ");
 
while($res = mysqli_fetch_array($result))
{
    $title = $res['title'];
    $description = $res['description'];
    
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="../index_admin.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Judul</td>
                <td><input type="text" name="title" value="<?php echo $title;?>"></td>
            </tr>
            <tr> 
                <td>Isi Berita</td>
                <td><input type="text" name="description" value="<?php echo $description;?>"></td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td> 
                    <select name="id_kategori">
                    <?php
                        $j=mysqli_query($koneksi,"SELECT * FROM kategori WHERE id_kategori = '$kat' ");
                        while($k=mysqli_fetch_array($j)){
                        echo "<option value='$k[id_kategori]'>$k[nama_kategori]</option>";
                        }
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="hidden" name="id_news" value=<?php echo $id_news;?>></td>
                <td><input type="submit" name="update" value="update"></td>
            </tr>
        </table>
    </form>
</body>
</html>