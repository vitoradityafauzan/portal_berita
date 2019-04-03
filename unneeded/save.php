<?php
if($_POST){
    include_once("koneksi.php");
    //menyimpan ke table product
    $sql = "insert into news_tbl (title, description) values ('{$_POST['title']}','{$_POST['description']})";
    mysqli_query($sql) or die('Gagal menyimpan produk');
    //mencari id produk
    $sql = "select max(id_news) as last_id from news_tbl limit 1";
    $hasil = mysqli_query($sql);
    $row = mysqli_fetch_array($hasil);
    $lastId = $row['last_id'];
    //menyimpan data buku ke table buku
    $sql = "insert into kategori (id_produk,penulis,penerbit,isbn,tgl_terbit) 
    values ('$lastId','{$_POST['penulis']}','{$_POST['penerbit']}','{$_POST['isbn']}','{$_POST['tgl_terbit']}')";
    mysqli_query($sql) or die('Gagal menyimpan data buku');
    echo 'data tersimpan';
}
