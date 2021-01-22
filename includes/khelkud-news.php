<div class="container">


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
									WHERE sa_dis_ads.disTitle="5Below Anya News" ORDER BY sa_ads.adsDate  DESC '.$pages->get_limit());
                
				while($row = $stmt->fetch()){
		
          echo '<a href="'.$row['adsURL'].'" target="_blank"><img class = "ads_img" src="admin/uploads/'.$row['image'].'"></a>';
					}
				} catch(PDOException $e) {
					echo $e->getMessage();
				}
		?>

      </div>
      
        <div class="row romanchak_news">
       

        <div class="col-md-4  border-right">
        <h5 class="text-center" style = "background-color: yellow; padding: 3px;"><strong>रोमान्चक  ख़बर </strong> </h5>
        <?php
        try {
            $pages = new Paginator('3','p');

            $stmt = $db->query('SELECT postDate FROM sa_posts');

            //pass number of records to
            $pages->set_total($stmt->rowCount());

           $stmt = $db->query('SELECT sa_posts.postID, sa_posts.postTitle, sa_posts.postSlug, sa_posts.postDesc, sa_posts.postDate, sa_posts.postTags, image 
                                    FROM sa_posts INNER JOIN sa_post_section ON sa_posts.postID = sa_post_section.postID
									INNER JOIN sa_section ON sa_post_section.secID = sa_section.secID 
									WHERE sa_section.secTitle="Romanchak News" ORDER BY sa_posts.postDate  DESC '.$pages->get_limit());
            
            while($row = $stmt->fetch()){
                echo '<div class="row ">';
                    echo '<div class="col-md-4" >';
                        echo '<img class = "romanchak_img" src="admin/uploads/'.$row['image'].'">';
                    echo '</div>';
                    echo '<div class="col-md-8 text-left romanchak_t">';
                        echo '<p class = "romanchak_title"><strong><a href="viewpost.php? id='.$row['postSlug'].'">'.$row['postTitle'].'</a></strong></p>';			
                    echo '</div>'; 
                echo '</div>';
            }
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
        ?>
        </div>
  




        <div class="col-md-4 border-right">
        <h5 class="text-center" style = "background-color: green; padding: 3px;"><strong>आजको ख़बर </strong> </h5>
        <?php
        try {
            $pages = new Paginator('3','p');

            $stmt2 = $db->query('SELECT postDate FROM sa_posts');

            //pass number of records to
            $pages->set_total($stmt2->rowCount());
            $stmt2 = $db->query('SELECT postID, postTitle, postSlug, postDesc, postDate, postTags, image FROM sa_posts ORDER BY postDate DESC '.$pages->get_limit());
                            
            while($row = $stmt2->fetch()){
                echo '<div class="row ">';
                echo '<div class="col-md-4" >';
                    echo '<img class = "romanchak_img" src="admin/uploads/'.$row['image'].'">';
                echo '</div>';
                echo '<div class="col-md-8 text-left romanchak_t">';
                    echo '<p class = "romanchak_title"><strong><a href="viewpost.php? id='.$row['postSlug'].'">'.$row['postTitle'].'</a></strong></p>';			
                echo '</div>'; 
            echo '</div>';
            }
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
        ?>
        </div>
        <div class="col-md-4">
        <h5 class="text-center"  style = "background-color: red; padding: 3px;" ><strong>पढ्नै  पर्ने </strong> </h5>
        <?php
        try {
            $pages = new Paginator('3','p');

            $stmt3 = $db->query('SELECT postDate FROM sa_posts');

            //pass number of records to
            $pages->set_total($stmt3->rowCount());
        $stmt3 = $db->query('SELECT sa_posts.postID, sa_posts.postTitle, sa_posts.postSlug, sa_posts.postDesc, sa_posts.postDate, sa_posts.postTags, image 
        FROM sa_posts INNER JOIN sa_post_section ON sa_posts.postID = sa_post_section.postID
        INNER JOIN sa_section ON sa_post_section.secID = sa_section.secID 
        WHERE sa_section.secTitle="पढ्नै  पर्ने" ORDER BY sa_posts.postDate  DESC '.$pages->get_limit());
        
        while($row = $stmt3->fetch()){
            echo '<div class="row">';
            echo '<div class="col-md-4" >';
                echo '<img class = "romanchak_img" src="admin/uploads/'.$row['image'].'">';
            echo '</div>';
            echo '<div class="col-md-8 text-left romanchak_t">';
                echo '<p class = "romanchak_title"><strong><a href="viewpost.php? id='.$row['postSlug'].'">'.$row['postTitle'].'</a></strong></p>';			
            echo '</div>'; 
        echo '</div>';
        }
} catch(PDOException $e) {
    echo $e->getMessage();
}
?>
</div>
          
      </div>
      <hr>
  
  </div>



