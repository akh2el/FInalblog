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
					
					echo '<div class="col-md-3">';

						
						echo  '<div class="">';
						echo '<h6 style="margin-top: 10px;width: 98%;height: 55px; overflow: hidden;"><strong><a href="viewpost.php?id='.$row['postSlug'].'">'.$row['postTitle'].'</a></strong></h6>';
						  echo  '<a href="viewpost.php?id='.$row['postSlug'].'"><img class="catpost-ima" src="admin/uploads/'.$row['image'].'" width="100%"></a>';
						  echo '</i><span> On:</span> '.date('jS M Y', strtotime($row['postDate'])).'';
                        
                        /**********Tags***********/

								// echo '<p>Tagged as: ';
								// $links = array();
								// $parts = explode(',', $row['postTags']);
								// foreach ($parts as $tag)
								// {
								//     $links[] = "<a href='t-".$tag."'>".$tag."</a>";
								// }
								// echo implode(", ", $links);
								// echo '</p>';

                        echo '</div>';

                        
						
						echo '<ul>';
						
						 
						  
						//   $stmt2 = $db->prepare('SELECT catTitle, catSlug FROM sa_categories, sa_post_categories WHERE sa_categories.catID = sa_post_categories.catID AND sa_post_categories.postID = :postID');
						// 	$stmt2->execute(array(':postID' => $row['postID']));

						// 	$catRow = $stmt2->fetchAll(PDO::FETCH_ASSOC);

						// 	$links = array();
						// 	foreach ($catRow as $cat)
						// 	{
						// 		$links[] = "<a href='c-".$cat['catSlug']."'>".$cat['catTitle']."</a>";
						// 	}
						  
						//    echo '<li class="fafa"><i class="fa fa-folder-open"></i><span> Category: </span>'.implode(", ", $links).'</li>';
						   
						   
					   echo '</ul>';

					   echo '<div class="" style="width: 95%; height: 200px; overflow: hidden;">';
						echo '<p>'.$row['postDesc'].'</p>';	
						echo '</div>';

						echo '</div>';

				}

				echo $pages->page_links('c-'.$_GET['id'].'&');

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

			?>

			
			   
			      
			  

         </div>
         <!--end of row-->     
      </div>
      <!--end of all container-->



      <?php include ('includes/footer.php'); ?>
      <!--end of footer-->
 