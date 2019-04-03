<?php
//including the database connection file
include_once("koneksi.php");
 
//fetching data in descending order (lastest entry first)
$con = "SELECT news_tbl.id_news, news_tbl.title, news_tbl.description, kategori.nama_kategori FROM news_tbl INNER JOIN kategori ON news_tbl.id_kategori = kategori.id_kategori ORDER BY id_news ASC";
$result = @mysqli_query($koneksi, $con); // mysql_query is deprecated

//$result = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY id_berita DESC"); // using mysqli_query instead
?>
 
<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>
    <a href="admin/add.php">Add New Data</a><br/><br/>
    <?php if ($result) {
        # code...
     ?>
    <table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>JUDUL</td>
            <td>ISI</td>
            <td>KATEGORI</td>
            <td>Manipulate Data</td>
        </tr>
        <?php 
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {         
            echo "<tr>";
            echo "<td>".$res['title']."</td>";
            echo "<td>".$res['description']."</td>";
            echo "<td>".$res['nama_kategori']."</td>";
            
            //echo '<td><a href="admin/edit.php?" id="$res[id_news];">Edit</a> | <a href="admin/delete.php?" id="$res[id_news];">Delete</a></td>';  

           /* echo "<td>";
            echo '<a href="admin/edit2.php?id=' . $res['id_news'] . '">Edit</a>';
            echo "<a href='admin/delete.php?id=".$res['id_news']."'>Hapus</a>";
            echo "</td>"; */

            echo "<td><a href=\"admin/edit2.php?id=$res[id_news]\">Edit</a> | <a href=\"admin/delete.php?id=$res[id_news]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>"; 
        }
        ?>    
    </table>
    <?php
    } else{
        echo "<p class='error'>Tabel tidak terbaca</p>";
        echo "<p>" . mysqli_error($koneksi) . "<br><br />Query: " . $con . "</p>";
    }
    ?>
</body>
</html>