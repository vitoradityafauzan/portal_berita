<?php
include_once("koneksi.php");
//apabila klik tombol simpan
if(isset($_POST['submit'])) {
//buat variabel
//$idkat=$_POST['id_kategori'];
$judul=$_POST['title'];
$isi=$_POST['description'];

//upload foto
/*$foto=$_FILES[‘foto’][‘name’];
if(strlen($foto)>0){
    if(is_uploaded_file($_FILES[‘foto’][‘tmp_name’])){
    move_uploaded_file($_FILES[‘foto’] [‘tmp_name’],”images/”.$foto);
    }
}*/
//buat query input
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
        $result = mysqli_query($koneksi, "INSERT INTO news_tbl(/*id_kategori, */title, description) VALUES(/*'$idkat', */$judul', '$isi')");
        
        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index_admin.php'>View Result</a>";
    }

/*    
$a="INSERT INTO mahasiswa(id_kategori, title, description)
values('$idkat', '$judul', '$isi')";
$b=mysqli_query($koneksi,$a);
    if($b){
    header("location: index_admin.php");
    }else{
    echo "Data gagal disimpan";
    }
*/

}
?>