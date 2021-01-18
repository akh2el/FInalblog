<?php require('includes/config.php'); 

$stmt = $db->prepare('SELECT pageId,pageTitle,pageSlug,pageContent,pageDescrip,pageKeywords FROM techno_pages WHERE pageSlug = :pageSlug');
$stmt->execute(array(':pageSlug' => $_GET['pageId']));
$row = $stmt->fetch();

//if post does not exists redirect user.
if($row['pageId'] == ''){
    header('Location: ./');
    exit;
}


?>

<!DOCTYPE html>
<html>
   <head>
      <title><?php echo $row['pageTitle'];?></title>

      <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <meta name='robots' content='index,follow'>
	  <meta name="description" content="<?php echo $row['pageDescrip'];?>">
	  <meta name="keywords" content="<?php echo $row['pageKeywords'];?>">
           <!--jquery-->
      <link rel="icon" type="image/png" href="assets/images/favicon.ico" sizes="16x16">
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
			<?php
				$baseUrl="http://localhost/bibekguragain/page/"; 
			        try {

			            $stmt = $db->query('SELECT pageTitle,pageSlug FROM my_pages ORDER BY pageId ASC');
			            while($rowlink = $stmt->fetch()){
			                
			                echo '<li><a href="'.$baseUrl.''.$rowlink['pageSlug'].'">'.$rowlink['pageTitle'].'</a></li>';
			            }

			        } catch(PDOException $e) {
			            echo $e->getMessage();
			        }
			    ?>
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
 
				<?php
				echo '<a href="page.php?id='.$row['pageTitle'].'</a>';
				?>
				<hr> 
				<?php 
				echo '<p>'.$row['pageContent'].'</p>';
       
					?>
		</div>

	    <div class="container">
	      <?php include ('includes/hor-recent.php'); ?>
	    </div>


	      <?php include ('includes/footer.php'); ?>
	      <!--end of footer-->
 