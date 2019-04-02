<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>News</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
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
                        <li class="nav3"><a href="index_admin.php">ADMIN LOGIN</a></
                        <!--<li class="nav3"><a href="login.php"></a></li>-->
                    </ul>
                </div>
           </div>
            
     </div>
   <!-- END HEADER -->
   <div id="greenLine"></div>
   		<div id="content">
        	
            <div class="container">
                <?php 
                include "koneksi.php";
                $sql=mysqli_query($koneksi, "SELECT * FROM news_tbl/* WHERE id_news = '1'*/");
                $news=mysqli_fetch_array($sql);

                do {
                ?>
            	<div class="newsitem">
                	<div class="date_circle"><p class="day">28<span class="month">06</span></p></div>
                    <h2 class="news_title"><?php echo $news['title']; ?></h2>
                    <div class="clear"></div>
                    <img src="news_images/<?php echo $news['images']; ?>" class="news_image">
                    <!--<p>
                        <?php
                            /*$content = echo $news['description'];;
                            // your page id to display full content
                            $page_id = $id['id'];
                            // your page file to display full content
                            $link = "news_detail.php";
                            // limit content character
                            $limit = 100;
                            // Called readMore() function to convert full content to read more link
                            echo readMore($content,$link,"id",$page_id, $limit, $limit);*/
                        ?>
                    </p>-->
                    <p class="news_synopsis" style="width: 450px;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo $news['description']; ?></p>
                    <a href="#" class="link_detail">Read More</a>
                </div>
           
                <?php }while($news=mysqli_fetch_array($sql)); ?>
         
            </div><!--- END CONTENT WRAPPER -->
            
        </div>
<!-- -->
		<div id="footer">
        
        	<div class="container">
            	<p> Copyright &copy; Your Company All Right Reserved</p>
            </div>
        
        </div>
<!-- --> 
</div>
</body>
</html>