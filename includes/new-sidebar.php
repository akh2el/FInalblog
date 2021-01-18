<div class="right-card latest">
        <div class="head">
           <h4>Recent Posts</h4>
        </div>
        <!--end of head-->
        <div class="blog-listing-one-latest">
            <?php

            $stmt = $db->query('SELECT * FROM sa_posts ORDER BY postID DESC LIMIT 5');
            while($row = $stmt->fetch()){
            echo '<div class="flex">';
                echo '<div class="media">';
                echo '<a class="pull-left" href="'.$row['postSlug'].'">';
                echo '<img class="media-object" src="admin/uploads/'.$row['image'].'" width="100%">';
                echo '</a>';
                  echo '<div class="media-body">';
                   
                    $string = $row['postTitle'];
                    if (strlen($string) > 80) {
                    $trimhead = substr($string, 0, 80);
                    } else {
                    $trimhead = $string;
                    }
                    
                    echo '<h4 class="media-heading"><a href="'.$row['postSlug'].'">'.$trimhead.'</a></h4>';
                  
                      echo '<ul class="list-inline list-unstyled">';
                          echo '<li>
                              <span><i class="fa fa-calendar" aria-hidden="true"></i> '.date('M jS Y', strtotime($row['postDate'])).'</span>
                            </li>';
                        echo '</ul>';
                    echo '</div>';
                 echo '</div>';
                echo '</div>';
                    }
                    ?>
            </div>
      </div>