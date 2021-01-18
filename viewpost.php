<?php require('includes/header.php'); 
$stmt = $db->prepare('SELECT * FROM sa_posts WHERE postSlug = :postSlug');
$stmt->execute(array(':postSlug' => $_GET['id']));
$row = $stmt->fetch();
//if post does not exists redirect user.
if($row['postID'] == ''){
    header('Location: ./');
    exit;

}
 ?>
        
      <div class="container responsive">
                <p class="arrow"><a href="./"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a></p>   
                  <?php 
                  $stmt = $db->prepare('SELECT postID, postTitle, postSlug, postDesc, postCont, postDate, postTags, image FROM sa_posts WHERE postSlug = :postSlug');
                 
                    echo '<div class="viewpost">';
                    echo '<div class="row">';
                    echo '<div class="col-md-9 ">';
                    echo '<h3>'.$row['postTitle'].'</h3>';
                    $stmt2 = $db->prepare('SELECT catTitle, catSlug FROM sa_categories, sa_post_categories WHERE sa_categories.catID = sa_post_categories.catID AND sa_post_categories.postID = :postID');
                    $stmt2->execute(array(':postID' => $row['postID']));

                    $catRow = $stmt2->fetchAll(PDO::FETCH_ASSOC);

                    $links = array();
                    foreach ($catRow as $cat)
                    {
                        $links[] = "<a href='c-".$cat['catSlug']."'>".$cat['catTitle']."</a>";
                    }
                  
                   echo '<div class="fafaone"><span> Category: </span>'.implode(", ", $links).'</div>';


                  
                   echo  '<a href="'.$row['postSlug'].'"><img class="" style="width: 100%; height: 500px;" src="admin/uploads/'.$row['image'].'" width="100%"></a>';
                   echo '<strong> Date:</span> '.date('jS M Y', strtotime($row['postDate'])).'</span></strong>';
                    
                    echo('</div>');

                    
                     
                            
                              
                              
                             
                           
                        
                    echo'<div class="blog-content"';
                     echo '<p style="width: 80%; overflow: hidden;">'.$row['postCont'].'</p>';
                     echo '</div>';




                    echo '<div class="col-md-3">';



                     
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
                  
               ?>
              
               
              <hr>
          
              </div>

                
               <!--end of col-05-->
       
    <?php   include('includes/anya-news.php'); ?>

<!-- comment section -->

            <!-- ************Start********* -->
            <?php
            
          function current_url(){

            $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            $validURL = str_replace("&","&amp;",$url);
            return $validURL;
          }
         //echo current_url();
          


    //  echo' <div class="container">';
    //       echo '<div id="fb-root">';

    //        echo' <div class="fb-comments" data-href="echo current_url();" data-width="600" data-numposts="100"></div>';
           
    //         echo '</div>';
    //         echo '<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0" nonce="PhQ7TiiA"></script>';

    //         echo '</div>';

            ?>
             <div class="container">
          <div id="fb-root">

           <div class="fb-comments" data-href="<?php echo current_url(); ?>" data-width="600" data-numposts="100"></div>
           
          </div>
            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0" nonce="PhQ7TiiA"></script>

            </div>


            <!-- **************END********* -->




      <!--end of all container-->
      <?php include ('includes/footer.php'); ?>
      <!--end of footer-->
