<?php require('includes/config.php'); ?>
<!DOCTYPE html>
<html>
   <head>
      <title>softAOX - Archives</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name='robots' content='index,follow'>
     <!--jquery-->
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 

          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
      <!---------Font Awespme 4.7---------------------->
    <script src="https://use.fontawesome.com/037e1fd53a.js"></script>
      <script src="assets/js/general.js" type="text/javascript"></script>
      <link href="assets/css/style.css" rel="stylesheet" type="text/css">
   </head>

   <body>

   	<nav>
        <div class="logo">
          <a href="index.php"><img src="assets/images/logo3.png"></a> 
        </div>
        

        <!-- The overlay -->
        <div id="myNav" class="overlay">

          <!-- Button to close the overlay navigation -->
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

          <!-- Overlay content -->
          <div class="overlay-content">
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Clients</a>
            <a href="#">Contact</a>
          </div>

        </div>

        <!-- Use any element to open/show the overlay navigation menu -->
        <span class="fabar" onclick="openNav()"><i class="fa fa-bars" aria-hidden="true"></i></span>



      <form action="#" role="search" class="search-form">
          <input type="submit" value="" class="search-submit"> 
          <input type="search" name="q" class="search-text" placeholder="Search..." autocomplete="off">
      </form>


      </nav>

      <div class="container">
      	<p class="arrow"><a href="./"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a></p>
	 	 <h1>Blog</h1>
		<hr />

        <div class="blog-listing row">
					
				  
				  <?php
				try {

					//collect month and year data
					$month = $_GET['month'];
					$year = $_GET['year'];

					//set from and to dates
					$from = date('Y-m-01 00:00:00', strtotime("$year-$month"));
					$to = date('Y-m-31 23:59:59', strtotime("$year-$month"));


					$pages = new Paginator('4','p');

					$stmt = $db->prepare('SELECT postID FROM sa_posts WHERE postDate >= :from AND postDate <= :to');
					$stmt->execute(array(
						':from' => $from,
						':to' => $to
				 	));

					//pass number of records to
					$pages->set_total($stmt->rowCount());

					$stmt = $db->prepare('SELECT * FROM sa_posts WHERE postDate >= :from AND postDate <= :to ORDER BY postID DESC '.$pages->get_limit());
					$stmt->execute(array(
						':from' => $from,
						':to' => $to
				 	));
					while($row = $stmt->fetch()){
					
					echo '<div class="blog-listing-one col-md-6">';

						echo  '<div class="blog-listing-one-img">';

						echo '<li class="fafa"><i class="fa fa-calendar" aria-hidden="true"></i><span> On:</span> '.date('jS M Y', strtotime($row['postDate'])).'</li>';

                        echo  '<a href="'.$row['postSlug'].'"><img src="admin/uploads/'.$row['image'].'" width="100%"></a>';

                        echo '</div>';

                        echo '<h4><a href="'.$row['postSlug'].'">'.$row['postTitle'].'</a></h4>';

					
						echo '<ul>';

						  
						  
						  $stmt2 = $db->prepare('SELECT catTitle, catSlug FROM sa_categories, sa_post_categories WHERE sa_categories.catID = sa_post_categories.catID AND sa_post_categories.postID = :postID');
							$stmt2->execute(array(':postID' => $row['postID']));

							$catRow = $stmt2->fetchAll(PDO::FETCH_ASSOC);

							$links = array();
							foreach ($catRow as $cat)
							{
								$links[] = "<a href='c-".$cat['catSlug']."'>".$cat['catTitle']."</a>";
							}
						  
						   echo '<li class="fafa"><i class="fa fa-folder-open"></i><span> Category: </span>'.implode(", ", $links).'</li>';
						  
					   echo '</ul>';

					   echo '<div class="blog-listing-one-desc">';
				
						echo '<p>'.$row['postDesc'].'</p>';	

						echo '</div>';

						echo '<a href="'.$row['postSlug'].'" class="btn-readmore">CONTINUE<i class="fa fa-angle-right" aria-hidden="true"></i></a>';				
					echo '</div>';

				}

				echo $pages->page_links("a-$month-$year&");

				} catch(PDOException $e) {
				    echo $e->getMessage();
				}
			?>

			
			   
			      
			  
                </div>
			    <!--end of blog listing-->
              </div>
           
    <div class="container">
      <?php include ('includes/hor-recent.php'); ?>
    </div>

                

     <?php include ('includes/footer.php'); ?>
      <!--end of footer-->
