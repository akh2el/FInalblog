<?php include ('includes/header.php');
	  include ('includes/breaking-news.php') ;
	  echo '<hr>';


$stmt = $db->prepare('SELECT * FROM sa_categories WHERE catSlug = :catSlug');
$stmt->execute(array(':catSlug' => $_GET['id']));
$row = $stmt->fetch();

//if post does not exists redirect user.
if($row['catID'] == ''){
	header('Location: ./');
	exit;
}

?>

    <div class="container responsive">
		<div class ="row">
			<div class="col-md-9">
				<div class="blog-listing row">							
					<?php	
							try {

								$pages = new Paginator('50','p');

								$stmt = $db->prepare('SELECT sa_posts.postID FROM sa_posts, sa_post_categories WHERE sa_posts.postID = sa_post_categories.postID AND sa_post_categories.catID = :catID');
								$stmt->execute(array(':catID' => $row['catID']));

								//pass number of records to
								$pages->set_total($stmt->rowCount());

								$stmt = $db->prepare('
									SELECT 
										sa_posts.postID, sa_posts.postTitle, sa_posts.image, sa_posts.postSlug, sa_posts.postDesc, sa_posts.postDate , sa_posts.postTags
									FROM 
										sa_posts,
										sa_post_categories
									WHERE
										sa_posts.postID = sa_post_categories.postID
										AND sa_post_categories.catID = :catID
									ORDER BY 
										postID DESC
									'.$pages->get_limit());

								$stmt->execute(array(':catID' => $row['catID']));
								while($row = $stmt->fetch()){
						
							echo '<div class="col-md-4 ">';
								echo  '<div class="">';
									echo '<h6 class = "catpost_title"><strong><a href="viewpost.php?id='.$row['postSlug'].'">'.$row['postTitle'].'</a></strong></h6>';
									echo  '<a href="viewpost.php?id='.$row['postSlug'].'"><img class="catpost_img" src="admin/uploads/'.$row['image'].'" width="90%"></a>';
									echo '</i><span></span> '.date('jS M Y', strtotime($row['postDate'])).'';
								echo '</div>';
								echo '<div class="catpost_desc">';
									echo '<p>'.$row['postDesc'].'</p>';	
								echo '</div>';
								echo "<hr>";

							echo '</div>';

					}

						echo $pages->page_links('c-'.$_GET['id'].'&');

					} catch(PDOException $e) {
						echo $e->getMessage();
					}

					?>
				</div>
			</div>	 


			<!-- *******************Advertisement section******************* -->

										<!-- start -->
			<div class="col-md-3">

			
			<?php 
			try {
				// number of records to be displayed in a page ie. 3 in this section
				$pages = new Paginator('10','p');
				// select a table
				$stmt = $db->query('SELECT postDate FROM sa_posts');

				//pass number of records to
				$pages->set_total($stmt->rowCount());
                // sql query to fetch data from tabel
				$stmt = $db->query('SELECT sa_ads.adsID, sa_ads.adsDate, sa_ads.adsURL, image 
                  FROM sa_ads INNER JOIN sa_ads_dis_ads ON sa_ads.adsID = sa_ads_dis_ads.adsID
									INNER JOIN sa_dis_ads ON sa_ads_dis_ads.disID = sa_dis_ads.disID 
									WHERE sa_dis_ads.disTitle="7Sidebar ads" ORDER BY sa_ads.adsID  DESC '.$pages->get_limit());
                
				while($row = $stmt->fetch()){
					echo '<div style = "margin-top:20px;">';
		  echo '<a href="'.$row['adsURL'].'" target="_blank"><img class = "sidebar_ads_img" src="admin/uploads/'.$row['image'].'"></a>';
		  echo '</div>';
					}
				} catch(PDOException $e) {
					echo $e->getMessage();
				}
		?>


			</div>
		</div>
		
		

										<!-- end -->
		   
    </div>
      <!--end of all container-->



      <?php include ('includes/footer.php'); ?>
      <!--end of footer-->
 