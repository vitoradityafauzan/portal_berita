<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
<?php
//including the database connection file
include_once("../koneksi.php");
 
if(isset($_POST['Submit'])) {    
    $judul = $_POST['title'];
    $isi = $_POST['description'];
    $id_kat = $_POST['id_kategori'];
   
        
    // checking empty fields
    if(empty($judul) || empty($isi)) {                
        if(empty($judul)) {
            echo "<font color='red'>Harap isikan judul.</font><br/>";
        }
        
        if(empty($isi)) {
            echo "<font color='red'>Harap isikan berita.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($koneksi, "INSERT INTO news_tbl(title,description,id_kategori) VALUES('$judul','$isi','$id_kat')");
        
        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='../index.php'>View Result</a>";
    }
}
?>
</body>
</html>