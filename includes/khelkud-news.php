<div class="container">
        <div class="row">
       

        <div class="col-md-4  border-right">
        <h5 class="text-center"><strong>रोमान्चक  ख़बर </strong> </h5>
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
                echo '<div class="row" style = "margin-top: 25px;">';
                    echo '<div class="col-md-4" >';
                        echo '<a href=""><img style:"width=110px; height=100px; margin-top:10px; margin-bottom:10px" src="admin/uploads/'.$row['image'].'"></a>';
                    echo '</div>';
                    echo '<div class="col-md-8 text-left">';
                        echo '<p style="height: 95px; overflow: hidden; width : 85%; margin-left:35px;"><strong><a href="viewpost.php? id='.$row['postSlug'].'">'.$row['postTitle'].'</a></strong></p>';			
                    echo '</div>'; 
                echo '</div>';
            }
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
        ?>
        </div>
  




        <div class="col-md-4 border-right">
        <h5 class="text-center"><strong>आजको ख़बर </strong> </h5>
        <?php
        try {
            $pages = new Paginator('3','p');

            $stmt2 = $db->query('SELECT postDate FROM sa_posts');

            //pass number of records to
            $pages->set_total($stmt2->rowCount());
            $stmt2 = $db->query('SELECT postID, postTitle, postSlug, postDesc, postDate, postTags, image FROM sa_posts ORDER BY postDate DESC '.$pages->get_limit());
                            
            while($row = $stmt2->fetch()){
                echo '<div class="row" style = "margin-top: 25px;">';
                echo '<div class="col-md-4" >';
                    echo '<a href=""><img style:"width=110px; height=100px; margin-top:10px; margin-bottom:10px" src="admin/uploads/'.$row['image'].'"></a>';
                echo '</div>';
                echo '<div class="col-md-8 text-left">';
                    echo '<p style="height: 95px; overflow: hidden; width : 85%; margin-left:35px;"><strong><a href="viewpost.php? id='.$row['postSlug'].'">'.$row['postTitle'].'</a></strong></p>';			
                echo '</div>'; 
            echo '</div>';
            }
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
        ?>
        </div>
        <div class="col-md-4">
        <h5 class="text-center"><strong>पढ्नै  पर्ने </strong> </h5>
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
            echo '<div class="row" style = "margin-top: 25px;">';
            echo '<div class="col-md-4" >';
                echo '<a href=""><img style:"width=110px; height=100px; margin-top:10px; margin-bottom:10px" src="admin/uploads/'.$row['image'].'"></a>';
            echo '</div>';
            echo '<div class="col-md-8 text-left">';
                echo '<p style="height: 95px; overflow: hidden; width : 85%; margin-left:35px;"><strong><a href="viewpost.php? id='.$row['postSlug'].'">'.$row['postTitle'].'</a></strong></p>';			
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



