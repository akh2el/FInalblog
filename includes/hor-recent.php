    <div class="head">
           <h2 class="no-background"><span>OTHER STORIES</span></h2>
        </div>
        <!--end of head-->
        <div class="d-flex">
            <?php
            $stmt = $db->query('SELECT * FROM sa_posts ORDER BY postID DESC LIMIT 4');

           /** where postId>$postIdc order by postId jquery limit 5");**/
            while($row = $stmt->fetch()){
            echo '<div class="p-2">';
                echo '<div class="p-2-listing">';
                echo '<a href="'.$row['postSlug'].'">';
                echo '<img class="p-2-img" src="admin/uploads/'.$row['image'].'" width="100%">';

                echo '</a>';
                $string = $row['postTitle'];
                    if (strlen($string) > 80) {
                    $trimhead = substr($string, 0, 80);
                    } else {
                    $trimhead = $string;
                    }
                    
                    echo '<h4><a href="'.$row['postSlug'].'">'.$trimhead.'</a></h4>';
                                             
                               echo '<span><i class="fa fa-calendar" aria-hidden="true"></i> '.date('M jS Y', strtotime($row['postDate'])).'</span>'
                            ;
    
                   
                    
                echo '</div>';
                echo '</div>';
      
            }
            ?>
    </div>