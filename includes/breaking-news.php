<!-- *******************Braking news/notnews********* -->

<div class="container responsive">
  <div class="row braking-news">
		<?php 
			try {
				// number of records to be displayed in a page ie. 3 in this section
				$pages = new Paginator('3','p');
				// select a table
				$stmt = $db->query('SELECT postDate FROM sa_posts');

				//pass number of records to
				$pages->set_total($stmt->rowCount());
                // sql query to fetch data from tabel
				$stmt = $db->query('SELECT sa_posts.postID, sa_posts.postTitle, sa_posts.postSlug, sa_posts.postDesc, sa_posts.postDate, sa_posts.postTags, image 
                                    FROM sa_posts INNER JOIN sa_post_section ON sa_posts.postID = sa_post_section.postID
									INNER JOIN sa_section ON sa_post_section.secID = sa_section.secID 
									WHERE sa_section.secTitle="Breaking News" ORDER BY sa_posts.postDate  DESC '.$pages->get_limit());
                
				while($row = $stmt->fetch()){
		
						echo ' <div class="col-md-4 border-right">';				  
							echo '<div class="row">';
								echo '<div class="col-md-4 braking-news">';
									echo '<a href=""><img class = "braking-news-img" style = "width:100%;" src="admin/uploads/'.$row['image'].'"></a>';
								echo '</div>';
								echo '<div class="col-md-8">';
									echo '<p class="braking-news-title" style = " text-align: justify;font-family: var(--semibold); height: 20px;"><strong><a href="viewpost.php? id='.$row['postSlug'].'">'.$row['postTitle'].'</a></strong></p>';
									echo '<div class="braking-news-desc" style = "text-align: justify;font-family: var(--semibold);" >';
										echo '<p style:">'.$row['postDesc'].'</p>';
									echo '</div>';
								echo ' </div>';
							echo ' </div>';
						echo ' </div>';
					}
				} catch(PDOException $e) {
					echo $e->getMessage();
				}
		?>
	</div>
	

<!-- *************************	Advertisement section   ************************ -->
<div class = "" style = "width:100%;height:120px;margin-top:20px;background-color: rgb(51, 161, 161);">

<?php 
			try {
				// number of records to be displayed in a page ie. 3 in this section
				$pages = new Paginator('1','p');
				// select a table
				$stmt = $db->query('SELECT postDate FROM sa_posts');

				//pass number of records to
				$pages->set_total($stmt->rowCount());
                // sql query to fetch data from tabel
				$stmt = $db->query('SELECT sa_ads.adsID, sa_ads.adsDate, image 
                  FROM sa_ads INNER JOIN sa_ads_dis_ads ON sa_ads.adsID = sa_ads_dis_ads.adsID
									INNER JOIN sa_dis_ads ON sa_ads_dis_ads.disID = sa_dis_ads.disID 
									WHERE sa_dis_ads.disTitle="2Below Breaking news" ORDER BY sa_ads.adsDate  DESC '.$pages->get_limit());
                
				while($row = $stmt->fetch()){
		
          echo '<a href=""><img class = "" style = "width:100%; height:120px" src="admin/uploads/'.$row['image'].'"></a>';
					}
				} catch(PDOException $e) {
					echo $e->getMessage();
				}
		?>

	  </div>





</div>


