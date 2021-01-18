
<div class="container responsive">
<hr>
    <div class=" row">       
        <div class="col-md-3 ">
            <?php 
                try {
                    
                    $pages = new Paginator('3','p');

                    $stmt = $db->query('SELECT postDate FROM sa_posts');

                    //pass number of records to
                    $pages->set_total($stmt->rowCount());

                   $stmt = $db->query('SELECT sa_posts.postID, sa_posts.postTitle, sa_posts.postSlug, sa_posts.postDesc, sa_posts.postDate, sa_posts.postTags, image 
                                    FROM sa_posts INNER JOIN sa_post_section ON sa_posts.postID = sa_post_section.postID
									INNER JOIN sa_section ON sa_post_section.secID = sa_section.secID 
									WHERE sa_section.secTitle="Sub Lead News" ORDER BY sa_posts.postDate  DESC '.$pages->get_limit());
                    while($row = $stmt->fetch()){
                    echo '<p class="lead-news-title-one"><strong><a href="viewpost.php? id='.$row['postSlug'].'">'.$row['postTitle'].'</a></strong></p>';   
                    echo'<div class="">';
                    echo'</div>';
                    echo'<div class="">';
                        echo '<div class="lead-news-desc-one" >';
                                    echo '<p style:">'.$row['postDesc'].'</p>';
                        echo '</div>';
                    echo '</div>';
                    echo "<hr>";

                    }

                } catch(PDOException $e) {
                    echo $e->getMessage();
                }
            ?>
        </div>



        
        <?php 
			try {
				$pages = new Paginator('1','p');

				$stmt = $db->query('SELECT postDate FROM sa_posts');

				//pass number of records to
				$pages->set_total($stmt->rowCount());

				$stmt = $db->query('SELECT sa_posts.postID, sa_posts.postTitle, sa_posts.postSlug, sa_posts.postDesc, sa_posts.postDate, sa_posts.postTags, image 
                                    FROM sa_posts INNER JOIN sa_post_section ON sa_posts.postID = sa_post_section.postID
									INNER JOIN sa_section ON sa_post_section.secID = sa_section.secID 
									WHERE sa_section.secTitle="Lead News" ORDER BY sa_posts.postDate  DESC '.$pages->get_limit());
                
                while($row = $stmt->fetch()){




            echo'<div class="col-md-6 text-center ">';
                echo '<p class="lead-news-title-two"><strong><a href="viewpost.php? id='.$row['postSlug'].'">'.$row['postTitle'].'</a></strong></p>';   
                echo '<a href=""><img class="lead-news-img responsive" src="admin/uploads/'.$row['image'].'"></a>';
                echo '<div class="lead-news-desc-two">';
                    echo '<p style:">'.$row['postDesc'].'</p>';
                echo '</div>';
            echo ' </div>';
            
        
	      
}

} catch(PDOException $e) {
echo $e->getMessage();
}
?>


<div class="col-md-3">
        <h4 class="text-center"><strong>मुखिय समचार</strong> </h4>

          <?php 
			try {
				$pages = new Paginator('6','p');

				$stmt = $db->query('SELECT postDate FROM sa_posts');

				//pass number of records to
				$pages->set_total($stmt->rowCount());

				$stmt = $db->query('SELECT sa_posts.postID, sa_posts.postTitle, sa_posts.postSlug, sa_posts.postDesc, sa_posts.postDate, sa_posts.postTags, image 
                                    FROM sa_posts INNER JOIN sa_post_section ON sa_posts.postID = sa_post_section.postID
									INNER JOIN sa_section ON sa_post_section.secID = sa_section.secID 
									WHERE sa_section.secTitle="Mukhya Samachar" ORDER BY sa_posts.postDate  DESC '.$pages->get_limit());
                
                while($row = $stmt->fetch()){
        
               echo '<ul class = "mukhya_samachar">'; 
                    echo '<li> <p class="mukhya_samachar_desc"><strong><a href="viewpost.php? id='.$row['postSlug'].'">'.$row['postTitle'].'</a></strong></p></li>';   
                    
                echo'</ul>';
           // echo'</div>';

    }

} catch(PDOException $e) {
    echo $e->getMessage();
}
?>
</div>
</div>
</div>
