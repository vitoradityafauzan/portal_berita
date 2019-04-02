<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Gallery</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="lightbox/css/lightbox.css" type="text/css">
</head>

<body>
<div id="wrapper">
  <div id="header">
        
           <div class="container">
           		<img id="logo" src="images/logo.png">
                <div id="menu">
                	<ul>
                    	  <li class="nav1"><a href="index.php">HOME</a></li>
                        <li class="nav2"><a href="news.php">NEWS</a></li>
                        <li class="nav3"><a href="products.php">PRODUCTS</a></li>
                        <li class="nav4"><a href="contact.php">CONTACT</a></li>
                        <li class="nav3"><a href="index_admin.php">ADMIN LOGIN</a></li>
                    </ul>
                </div>
           </div>
            
     </div>
   <!-- END HEADER -->
   <div id="greenLine"></div> 
   <div id="content">
        	<style>
    				.img_box { width:100%;} 
    				.img_box li { float:left;  overflow:hidden; margin:10px; height:200px; width:290px; border:1px solid red; }
    				.img_box li:hover { box-shadow:3px 3px 3px #CCCCCC;}
            .img_box li img{ height:200px; border-radius:5px;}
            .img_box li p{ height:200px; width: 550px; border: 1px solid black;}
          </style>
            <div class="container">
               <ul class="img_box">
                 <?php 
                    include "koneksi.php";
                    $sql=mysqli_query($koneksi, "SELECT * FROM galery/* WHERE id_news = '1'*/");
                    $news=mysqli_fetch_array($sql);

                do { ?>

               		<li>
                    <a class="" href="images/image_gallery/<?php echo $news['images']; ?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="images/image_gallery/<?php echo $news['images']; ?>" /></a>
                    <p class=""><?php echo $news['description']; ?></p>
                  </li>

                <?php } while($news=mysqli_fetch_array($sql)); ?>    
                    
               </ul>       
         
            </div><!--- END CONTENT WRAPPER -->
            
       </div> 
<!-- END CONTENT CONTENT-->
	   <div id="footer">
        
        	<div class="container">
            	<p> Copyright &copy; Your Company All Right Reserved</p>
            </div>
        
       </div>
<!-- END FOOTER -->
</div>
	<script src="lightbox/js/jquery-1.11.0.min.js"></script>
	<script src="lightbox/js/lightbox.js"></script>
</body>
</html>
