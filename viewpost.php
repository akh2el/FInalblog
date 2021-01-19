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
                          echo'<div class="blog-content"';
                            echo ' < p style="width: 100%; text-align: justify; overflow: hidden;">'.$row['postCont'].'</p>';
                            
                          echo('</div>');
                          
                        echo '</div>';




                     
            



              // ******************Ads section **************
                        echo '<div class="col-md-3" style = "width:100%;">';

// ******************
                       echo ' <div class="" style = "">';
                       echo ' <h4 class="text-center" style = "margin-top:80px; "><strong>मुखिय समचार</strong> </h4>';
                
                          
                      try {
                        $pages = new Paginator('7','p');
                
                        $stmt = $db->query('SELECT postDate FROM sa_posts');
                
                        //pass number of records to
                        $pages->set_total($stmt->rowCount());
                
                        $stmt = $db->query('SELECT sa_posts.postID, sa_posts.postTitle, sa_posts.postSlug, sa_posts.postDesc, sa_posts.postDate, sa_posts.postTags, image 
                                                    FROM sa_posts INNER JOIN sa_post_section ON sa_posts.postID = sa_post_section.postID
                                  INNER JOIN sa_section ON sa_post_section.secID = sa_section.secID 
                                  WHERE sa_section.secTitle="Mukhya Samachar" ORDER BY sa_posts.postDate  DESC '.$pages->get_limit());
                                
                                while($row = $stmt->fetch()){
                        
                               echo '<ul class = "mukhya_samachar" style="">'; 
                                    echo '<li style = "text-align: justify; margin-top:20px;"> <p class="mukhya_samachar_desc" ><strong><a style="" href="viewpost.php? id='.$row['postSlug'].'">'.$row['postTitle'].'</a></strong></p></li>';   
                                    
                                echo'</ul>';
                           // echo'</div>';
                
                    }
                
                } catch(PDOException $e) {
                    echo $e->getMessage();
                }

                
              
                echo '</div>'; 
                
// *************




                        try {
                          // number of records to be displayed in a page ie. 3 in this section
                          $pages = new Paginator('4','p');
                          // select a table
                          $stmt2 = $db->query('SELECT adsDate FROM sa_ads');
                  
                          //pass number of records to
                          $pages->set_total($stmt2->rowCount());
                                  // sql query to fetch data from tabel
                          $stmt2 = $db->query('SELECT sa_ads.adsID, sa_ads.adsDate, image 
                                    FROM sa_ads INNER JOIN sa_ads_dis_ads ON sa_ads.adsID = sa_ads_dis_ads.adsID
                                    INNER JOIN sa_dis_ads ON sa_ads_dis_ads.disID = sa_dis_ads.disID 
                                    WHERE sa_dis_ads.disTitle="7Sidebar ads" ORDER BY sa_ads.adsDate  DESC '.$pages->get_limit());
                                  
                          while($row2 = $stmt2->fetch()){
                            echo '<div style = "margin-top:20px;">';
                            echo '<a href=""><img class = "" style = "width:100%; height:220px" src="admin/uploads/'.$row2['image'].'"></a>';
                            echo '</div>';
                            }
                          } catch(PDOException $e) {
                            echo $e->getMessage();
                          }
                        echo '</div>';

                      echo '</div>';
                    echo '</div>';
                  echo '</div>'; 
               ?> 
              <hr>
          
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

                
               <!--end of col-05-->
       
    <?php   include('includes/anya-news.php'); ?>
        



      <!--end of all container-->
      <?php include ('includes/footer.php'); ?>
      <!--end of footer-->
