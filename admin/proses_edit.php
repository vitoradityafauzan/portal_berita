<?php
// including the database connection file
include_once("../koneksi.php");

if(isset($_POST['update']))
{   
    $id2 = $_POST['id_news'];
    
    $judul=$_POST['title'];
    $isi=$_POST['description'];
    $id_kat=$_POST['id_kategori']; 
    
    // checking empty fields
    if(empty($judul) || empty($isi) || empty($id_kat)) {          
        if(empty($judul)) {
            echo "<font color='red'>field Judul Kosong !</font><br/>";
        }
        
        if(empty($isi)) {
            echo "<font color='red'>Field Isi Kosong !</font><br/>";
        }
        
        if(empty($id_kat)) {
            echo "<font color='red'>Field Kategori Kosong !</font><br/>";
        }       
    } else {    
        //updating the table
        $result = mysqli_query($koneksi, "UPDATE news_tbl SET title='$judul', description='$isi', id_kategori='$id_kat' WHERE id_news=$id2");
        
        header("Location: ../index_admin.php");
    }
}
?>