<!-- **************anya news section****************** -->



<div class="container responsive" >
    
<!-- *************************	Advertisement section   ************************ -->
<div class = "ads">

<?php 
			try {
				// number of records to be displayed in a page ie. 3 in this section
				$pages = new Paginator('1','p');
				// select a table
				$stmt = $db->query('SELECT postDate FROM sa_posts');

				//pass number of records to
				$pages->set_total($stmt->rowCount());
                // sql query to fetch data from tabel
				$stmt = $db->query('SELECT sa_ads.adsID, sa_ads.adsDate,sa_ads.adsURL, image 
                  FROM sa_ads INNER JOIN sa_ads_dis_ads ON sa_ads.adsID = sa_ads_dis_ads.adsID
									INNER JOIN sa_dis_ads ON sa_ads_dis_ads.disID = sa_dis_ads.disID 
									WHERE sa_dis_ads.disTitle="4Above Anya news" ORDER BY sa_ads.adsID  DESC '.$pages->get_limit());
                
				while($row = $stmt->fetch()){
		
          echo '<a href="'.$row['adsURL'].'" target="_blank"><img class = "ads_img" src="admin/uploads/'.$row['image'].'"></a>';
					}
				} catch(PDOException $e) {
					echo $e->getMessage();
				}
		?>

	  </div>
<h5 class="anya-news_header"><strong>अन्य </strong> </h5>
    <div class="row anya_news" >
    <?php 
			try {
                // number of records to be displayed in a page ie. 4 in this section
				$pages = new Paginator('4','p');  
                // select a table
				$stmt = $db->prepare('SELECT postDate FROM sa_posts');

				//pass number of records to
				$pages->set_total($stmt->rowCount());

                // sql query to fetch data from tabel
				$stmt = $db->query('SELECT sa_posts.postID, sa_posts.postTitle, sa_posts.postSlug, sa_posts.postDesc, sa_posts.postDate, sa_posts.postTags, image 
                                    FROM sa_posts INNER JOIN sa_post_section ON sa_posts.postID = sa_post_section.postID
									INNER JOIN sa_section ON sa_post_section.secID = sa_section.secID 
									WHERE sa_section.secTitle="Anya News" ORDER BY sa_posts.postDate  DESC '.$pages->get_limit());
                while($row = $stmt->fetch()){

                    echo'<div class="col-md-3">';
                        echo '<p class="anya-news-title"><strong><a href="viewpost.php? id='.$row['postSlug'].'">'.$row['postTitle'].'</a></strong></p>'; // display title 
                        echo '<a href="viewpost.php? id='.$row['postSlug'].'"><img class="anya-news-img" src="admin/uploads/'.$row['image'].'"></a>';	// display image			
                        echo '<div class="anya-news-desc" >'; // display description
                        echo '<p >'.$row['postDesc'].'</p>';
                        echo '</div>';
                    echo '</div>';  

                }
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
		?>
    </div>
<hr>
</div>