<?php
include "koneksi.php";
//menampilkan data
$x="SELECT * from mahasiswa WHERE nim='$_GET[nim]' ";
$y=mysqli_query($koneksi,$x);
$z=mysqli_fetch_array($y);
//apabila klik tombol simpan
if(isset($_POST['ubah'])) {
//buat variabel
$nama=$_POST['nama'];
$kdprodi=$_POST['kdprodi'];
$semester=$_POST['semester'];
$jk=$_POST['jk'];
$alamat=$_POST['alamat'];
//upload foto
$foto=$_FILES['foto']['name'];
if(strlen($foto)>0){
    if(is_uploaded_file($_FILES['foto']['tmp_name'])){
    move_uploaded_file($_FILES['foto']['tmp_name'],"images/".$foto);
    }
mysqli_query($koneksi,"update mahasiswa set foto='$foto'
where nim='$_GET[nim]'");
}
//buat query ubah
$a="update mahasiswa set nama='$nama',kdprodi='$kdprodi',
semester='$semester',jk='$jk',alamat='$alamat'
where nim='$_GET[nim]'";
$b=mysqli_query($koneksi,$a);
    if($b){
    header("location:tampil-mhs.php");
    }else{
    echo "Data gagal diubah";
    }
}
?>
<html>
<head>
<title>Ubah data mahasiswa</title>
</head>
<body>
<h2 align="center">Ubah Data Mahasiswa</h2>
<form action=" method="POST" enctype="multipart/form-data">
<table border="0" width="50%" align="center">
    <tr>
        <td>Nomor Induk Mahasiswa</td>
        <td><?php echo $z['nim']; ?></td>
    </tr>
    <tr>
        <td>Nama Mahasiswa</td>
        <td><input type="text" name="nama" size="30" value="<?php echo $z['nama']; ?>"></td>
    </tr>
    <tr>
        <td>Program Studi</td>
        <td><select name="kdprodi">
        <?php
        $j=mysqli_query($koneksi,"SELECT * from prodi");
        while($k=mysqli_fetch_array($j)){
        $pilih=("$k['kdprodi']==$z['kdprodi']?"selected":");
        echo "<option value='$k[kdprodi]' $pilih>$k[nama_prodi]</option>";
        }
        ?>
        </select></td>
    </tr>
    <tr>
        <td>Semester</td>
        <td>
        <select name="semester">
            <option value="1" <?php if($z['semester']=="1"){ echo "selected"; }?>>1</option>
            <option value="2" <?php if($z['semester']=="2"){ echo "selected"; }?>>2</option>
            <option value="3" <?php if($z['semester']=="3"){ echo "selected"; }?>>3</option>
            <option value="4" <?php if($z['semester']=="4"){ echo "selected"; }?>>4</option>
            <option value="5" <?php if($z['semester']=="5"){ echo "selected"; }?>>5</option>
            <option value="6" <?php if($z['semester']=="6"){ echo "selected"; }?>>6</option>
        </select>
        </td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td><input type="radio" name="jk" value="L" <?php if($z['jk']=="L"){ echo "checked"; }?>>Laki-Laki
        <input type="radio" name="jk" value="P" <?php if($z['jk']=="P"){ echo "checked"; }?>>Perempuan
        </td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td><textarea name="alamat" cols="30" rows="4"><?php echo $z['alamat']; ?></textarea>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td><img src="images/<?php echo $z['foto']; ?>" width="100" height="130"></td>
    </tr>
    <tr>
        <td>Foto</td>
        <td><input type="file" name="foto"></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="ubah" value="UBAH">
        </td>
    </tr>
</table>
</form>
</body>
</html>