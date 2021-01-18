<?php 
    require('includes/config.php'); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thalani Khabar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name='keywords' content='bibekguragain, blog, dynmaic blog, blog about life, mysql blog'>
    <meta name='description' content='Bibek Guragain Blog Post'>
    <meta name='copyright' content='Bibek Guragain'>
    <meta name='language' content='en'>
    <meta name='robots' content='index,follow'>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!---------Font Awespme 4.7---------------------->
    <script src="https://use.fontawesome.com/037e1fd53a.js"></script>


     <script src="assets/js/custom.js" type="text/javascript"></script>

    
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<body>
<div class="mr-container responsive">
<!-- ************************* -->
         
        <div class="text-center">
            <h1><strong>Thalani Khabar</strong></h1>
        </div>
<header class="date_social_link">
        <div class="row">

            <div class="col-md-4"></div>

            <div class=" col-md-4 text-center">

                <h6><span id="datetime"></span></h6>
                <script>
                    var dt = new Date();
                    document.getElementById("datetime").innerHTML = dt.toLocaleDateString();
                </script>

            </div>
            <div class=" col-md-4 text-right">
                <a class="logo" href="#"><i class="fa fa-facebook-square" style="font-size:36px;color:#39569c"></i></a>
                <a class="logo" href="#"><i class="fa fa-linkedin-square" style="font-size:36px;color:#2867B2"></i></a>
                <a class="logo" href="#"><i class="fa fa-twitter-square" style="font-size:36px;color:#1DA1F2"></i></a>
                <a class="logo" href="#"><i class="fa fa-pinterest-square" style="font-size:36px;color:#E60023"></i></a> 
            </div>
        </div> 
    </header>
<nav class="navbar navbar-default navbar-fixed-top navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="index.php">गृहपृष्ठ <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      
                    <?php
                        $stmt = $db->query('SELECT catTitle, catSlug FROM sa_categories WHERE catTitle="समाज" ORDER BY catID DESC');
                        $row = $stmt->fetch();
                             echo '<a class="nav-link" href="catpost.php?id='.$row['catSlug'].'" class="categories">समाज</a>';    
                        ?>
                    </li>
                    <li class="nav-item">
                    <?php
                        $stmt = $db->query('SELECT catTitle, catSlug FROM sa_categories WHERE catTitle="अर्थ / व्यापार" ORDER BY catID DESC');
                        $row = $stmt->fetch();
                             echo '<a class="nav-link" href="catpost.php?id='.$row['catSlug'].'" class="categories">अर्थ / व्यापार</a>';
                         
                        ?>
                      </li>
                      <li class="nav-item">
                      <?php
                        $stmt = $db->query('SELECT catTitle, catSlug FROM sa_categories WHERE catTitle="अनौठो संसार" ORDER BY catID DESC');
                        $row = $stmt->fetch();
                             echo '<a class="nav-link" href="catpost.php?id='.$row['catSlug'].'" class="categories">अनौठो संसार</a>';
                         
                        ?>
                      </li>
                      <li class="nav-item">
                      <?php
                        $stmt = $db->query('SELECT catTitle, catSlug FROM sa_categories WHERE catTitle="खेलकुद" ORDER BY catID DESC');
                        $row = $stmt->fetch();
                             echo '<a class="nav-link" href="catpost.php?id='.$row['catSlug'].'" class="categories">खेलकुद</a>';
                         
                        ?>
                      </li>
                      <li class="nav-item">
                      <?php
                        $stmt = $db->query('SELECT catTitle, catSlug FROM sa_categories WHERE catTitle="मनोरञ्जन" ORDER BY catID DESC');
                        $row = $stmt->fetch();
                             echo '<a class="nav-link" href="catpost.php?id='.$row['catSlug'].'" class="categories">मनोरञ्जन</a>';
                         
                        ?>
                      </li>
                      <li class="nav-item">
                        <?php
                        $stmt = $db->query('SELECT catTitle, catSlug FROM sa_categories WHERE catTitle="क्राइम" ORDER BY catID DESC');
                        $row = $stmt->fetch();
                             echo '<a class="nav-link" href="catpost.php?id='.$row['catSlug'].'" class="categories">क्राइम</a>';
                         
                        ?>
                      </li>
                      <li class="nav-item">
                      <?php
                        $stmt = $db->query('SELECT catTitle, catSlug FROM sa_categories WHERE catTitle="samaj" ORDER BY catID DESC');
                        $row = $stmt->fetch();
                             echo '<a class="nav-link" href="catpost.php?id='.$row['catSlug'].'" class="categories">विचार</a>';
                         
                        ?>
                      </li> 
                      
                  </ul>
                  <form action="search.php" role="search" class="search-form" method="POST">
                    <!-- <input type="submit"   value="" class="search-submit"> -->
                    <input type="search" name="search" class="search-text" placeholder="Search..." autocomplete="off" >
                </form>
                 </div>
    </div>
</nav>



