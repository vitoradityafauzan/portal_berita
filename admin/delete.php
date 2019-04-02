<?php 
//including the database connection file
include("../koneksi.php");
 
//getting id of the data from url
$id = $_GET['id_news'];
 
//deleting the row from table
$result = mysqli_query($koneksi, "DELETE FROM news_tbl WHERE id_news=$id");
 
//redirecting to the display page (index.php in our case)
header("Location:../index_admin.php");
?>