<?php include ('includes/header.php');
?>

<div class="container">
  <div class="row">
		<?php 
			try {
				$pages = new Paginator('50','p');

				$stmt = $db->query('SELECT postDate FROM sa_posts');

				//pass number of records to
				$pages->set_total($stmt->rowCount());

				$stmt = $db->query('SELECT sa_posts.postID, sa_posts.postTitle, sa_posts.postSlug, sa_posts.postDesc, sa_posts.postDate, sa_posts.postTags, image 
                                    FROM sa_posts INNER JOIN sa_post_categories ON sa_posts.postID = sa_post_categories.postID
									INNER JOIN sa_categories ON sa_post_categories.catID = sa_categories.catID 
									WHERE sa_categories.catTitle="home" ORDER BY sa_posts.postDate  DESC '.$pages->get_limit());
                
               // where sa_categories.catTitle = Artha
                // $stmt = $db->query('SELECT pt.postID, pt.postTitle, pt.postSlug, pt.postDesc, pt.postDate, pt.postTags, pt.image FROM sa_posts as pt INNER JOIN sa_post_categories as 
                //    pc ON pt.postID = pc.postID  INNER JOIN sa_categories as cat ON cat.catID = pc.catID ON ORDER BY postDate DESC '.$pages->get_limit());
                // SELECT
                // bt.title , kt.keyword
                // FROM blog_table as bt 
                // INNER JOIN blog_search   AS bs ON bt.blogId  = bs.blogId 
                // INNER JOIN keywords_table  AS kt ON  bs.keywordId  = kt.keywordId
				// WHERE  kt.keyword  ='cheap'       
				
				// SELECT bt.title , kt.keyword 
				//FROM blog_table INNER JOIN blog_search ON bt.blogId  = bs.blogId INNER JOIN keywords_table ON  bs.keywordId  = kt.keywordId WHERE  kt.keyword  ='cheap'       
                
                
                while($row = $stmt->fetch()){
		
					
						echo ' <div class="col-md-6">';				  
							echo '<div class="row">';
								echo '<div class="col-md-4">';
									echo ''.date('jS M Y', strtotime($row['postDate']));
									echo '<a href=""><img style:"width=300px; height=200px;" src="admin/uploads/'.$row['image'].'"></a>';
								echo '</div>';
								echo '<div class="col-md-8">';
									echo '<p style="height:overflow: hidden; margin-left: 35px;margin-right: 5px; overflow: hidden;"><strong><a href="viewpost.php? id='.$row['postSlug'].'">'.$row['postTitle'].'</a></strong></p>';
								
									
							// 	$stmt2 = $db->prepare('SELECT catTitle, catSlug FROM sa_categories, sa_post_categories WHERE sa_categories.catID = sa_post_categories.catID AND sa_post_categories.postID = :postID');
							// 	$stmt2->execute(array(':postID' => $row['postID']));

							// 	$catRow = $stmt2->fetchAll(PDO::FETCH_ASSOC);

							// 	$links = array();
							// 	foreach ($catRow as $cat)
							// 	{
							// 	    $links[] = "<a href='#".$cat['catSlug']."'>".$cat['catTitle']."</a>";
							// 	}
                
							//    echo '<li class="fafa"><span> Category: </span>'.implode(", ", $links).'</li>';



									echo '<div class="" style="height: 110px; overflow: hidden; margin-left: 35px;margin-top: -25px; margin-bottom: 15px;">';
									echo '<p style:">'.$row['postDesc'].'</p>';
									echo '</div>';
								echo ' </div>';
							echo ' </div>';
						echo ' </div>';
			
					//echo ' </div>';	      
				}

			} catch(PDOException $e) {
				echo $e->getMessage();
			}
		?>
		</div>
</div>


<?php include ('includes/footer.php'); ?>