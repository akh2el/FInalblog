
<!-- collected news section -->
<div class="container">
    <hr>
        <div class="row">
            <div class="col-md-3 order-md-2 mb-4" >
                <h5 class=""><strong>बिचार</strong></h5>
                
                    <?php 
			try {
				// number of records to be displayed in a page ie. 3 in this section
				$pages = new Paginator('1','p');
				// select a table
				$stmt = $db->query('SELECT postDate FROM sa_posts');

				//pass number of records to
				$pages->set_total($stmt->rowCount());
                // sql query to fetch data from tabel
				$stmt = $db->query('SELECT sa_posts.postID, sa_posts.postTitle, sa_posts.postSlug, sa_posts.postDesc, sa_posts.postDate, sa_posts.postTags, image 
                                    FROM sa_posts INNER JOIN sa_post_section ON sa_posts.postID = sa_post_section.postID
									INNER JOIN sa_section ON sa_post_section.secID = sa_section.secID 
									WHERE sa_section.secTitle="Breaking News" ORDER BY sa_posts.postDate  DESC '.$pages->get_limit());
                
				while($row = $stmt->fetch()){

                    echo '<div class="row bichar">';
                    echo '<div class="col-md-7">';
                    echo '<p class="braking-news-title"><strong><a href="viewpost.php? id='.$row['postSlug'].'">'.$row['postTitle'].'</a></strong></p>';
                    echo '<div class="braking-news-desc"  >';
                        echo '<p>'.$row['postDesc'].'</p>';
                    echo '</div>';
                echo '</div>';
                    echo '<div class="col-md-5">';
                    echo '<a href="viewpost.php? id='.$row['postSlug'].'"><img class = "braking-news-img" src="admin/uploads/'.$row['image'].'"></a>';
                    
                echo '</div>';
                
                echo '</div>'; 
                
            }
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
?>




            <div class = "border-left bichar_scroll">
            
                <?php 
                    try {
                        // number of records to be displayed in a page ie. 3 in this section
                        $pages = new Paginator('4','p');
                        // select a table
                        $stmt = $db->query('SELECT postDate FROM sa_posts');

                        //pass number of records to
                        $pages->set_total($stmt->rowCount());
                        // sql query to fetch data from tabel
                        $stmt = $db->query('SELECT sa_posts.postID, sa_posts.postTitle, sa_posts.postSlug, sa_posts.postDesc, sa_posts.postDate, sa_posts.postTags, image 
                                            FROM sa_posts INNER JOIN sa_post_section ON sa_posts.postID = sa_post_section.postID
                                            INNER JOIN sa_section ON sa_post_section.secID = sa_section.secID 
                                            WHERE sa_section.secTitle="विचार" ORDER BY sa_posts.postDate  DESC '.$pages->get_limit());
                        
                        while($row = $stmt->fetch()){
                            
                            echo '<div class ="row bichar_margin">'; 
                                echo '<div class = "col-md-6 bichar_col">';
                                    echo '<p class="bichar_title"><strong><a href="viewpost.php? id='.$row['postSlug'].'">'.$row['postTitle'].'</a></strong></p>';
                                echo '</div>';
                                echo '<div class = "col-md-6 text-right bichar_col2">';
                                    echo '<img class = "bichar_img" src="admin/uploads/'.$row['image'].'">';
                                echo '</div>';
                                
                                echo '<div class="bichar_desc" >'; // display description
                                echo '<p >'.$row['postDesc'].'</p>';
                                echo '</div>';
                                
                            echo '</div>' ;
                            echo "<hr>";
                                
                            }
                        } catch(PDOException $e) {
                            echo $e->getMessage();
                        }
                        ?>                         
            </div>
                     


                    <!-- **************************************Ads section*************** -->


                <div class = "sidebar_ads">

                <?php 
			try {
				// number of records to be displayed in a page ie. 3 in this section
				$pages = new Paginator('2','p');
				// select a table
				$stmt = $db->query('SELECT adsDate FROM sa_ads');

				//pass number of records to
				$pages->set_total($stmt->rowCount());
                // sql query to fetch data from tabel
				$stmt = $db->query('SELECT sa_ads.adsID, sa_ads.adsDate,sa_ads.adsURL, image 
                  FROM sa_ads INNER JOIN sa_ads_dis_ads ON sa_ads.adsID = sa_ads_dis_ads.adsID
									INNER JOIN sa_dis_ads ON sa_ads_dis_ads.disID = sa_dis_ads.disID 
									WHERE sa_dis_ads.disTitle="7Sidebar ads" ORDER BY sa_ads.adsDate  DESC '.$pages->get_limit());
                
				while($row = $stmt->fetch()){
		  echo '<div style = "margin-top:20px"'; 
          echo '<a href="'.$row['adsURL'].'" target="_blank"><img class = "sidebar_ads_img" src="admin/uploads/'.$row['image'].'"></a>';
          echo "</div>";
					}
				} catch(PDOException $e) {
					echo $e->getMessage();
				}
		?>

                    </div>



                    <!-- ******************End********** -->
                
               
               
            </div>

            <div class="col-md-9 order-md-1">
                <?php 
                    echo'<div class="row collected-news">';
                
                
                        try {
                            
                            $pages = new Paginator('6','p');

                            $stmt = $db->query('SELECT postDate FROM sa_posts');

                            //pass number of records to
                            $pages->set_total($stmt->rowCount());

                            $stmt = $db->query('SELECT postID, postTitle, postSlug, postDesc, postDate, postTags, image FROM sa_posts ORDER BY postDate DESC '.$pages->get_limit());
                            while($row = $stmt->fetch()){
                    

                        echo'<div class="col-md-4 collected_margin">';

                       

                            echo '<p class="collected-News-title " ><strong><a href="viewpost.php? id='.$row['postSlug'].'">'.$row['postTitle'].'</a></strong></p>';
                            
                            $stmt2 = $db->prepare('SELECT catTitle, catSlug FROM sa_categories, sa_post_categories WHERE sa_categories.catID = sa_post_categories.catID AND sa_post_categories.postID = :postID');
                            $stmt2->execute(array(':postID' => $row['postID']));
    
                            $catRow = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    
                            $links = array();
                            foreach ($catRow as $cat)
                            {
                                $links[] = "<a href='catpost.php?id=".$cat['catSlug']."'>".$cat['catTitle']."</a>";
                            }
            
                            echo '</i><span></span> '.date('jS/M ', strtotime($row['postDate'])).'';
                            echo '<a href="viewpost.php? id='.$row['postSlug'].'"><img class="collected-news-img"  src="admin/uploads/'.$row['image'].'"></a>';
                            echo '<p class="collecterd_news_cat">'.implode(", ", $links).'</p>';
                          
                            echo '<div class="collected-News-desc"  >';
                                echo '<p>'.$row['postDesc'].'</p>';
                                
                            echo '</div>';
                            
                            
                        echo'</div>';  
                            }
                        } catch(PDOException $e) {
                            echo $e->getMessage();
                        }

                    echo'</div>';
    



// ********************************समाज********************************



                    echo "<hr>";
                    echo '<hp class=""><strong>समाज </strong> </hp>';
                    echo '<div class="row">';
                    try {
                        $pages = new Paginator('1','p');

                        $stmt = $db->query('SELECT postDate FROM sa_posts');

                        //pass number of records to
                        $pages->set_total($stmt->rowCount());

                        $stmt = $db->query('SELECT sa_posts.postID, sa_posts.postTitle, sa_posts.postSlug, sa_posts.postDesc, sa_posts.postDate, sa_posts.postTags, image 
                        FROM sa_posts INNER JOIN sa_post_categories ON sa_posts.postID = sa_post_categories.postID
                        INNER JOIN sa_categories ON sa_post_categories.catID = sa_categories.catID 
                        WHERE sa_categories.catTitle="समाज" ORDER BY sa_posts.postDate  DESC '.$pages->get_limit());
    
                        while($row = $stmt->fetch()){
                
                        echo '<div class="col-md-6 collected_news_samaj">';
                        
                            echo '<p class = "collected_news_samaj_title"><strong><a href="viewpost.php? id='.$row['postSlug'].'">'.$row['postTitle'].'</a></strong></p>';
                        
                            echo '<div class="collected_news_samaj_desc">';
                                echo '<p>'.$row['postDesc'].'</p>';
                             echo '</div>';
                        echo'</div>';
    
                        echo'<div class="col-md-6 collected_news_samaj_img_col" >'; 
                        
                            echo '<a href="viewpost.php? id='.$row['postSlug'].'"><img classs="text-center " style:" width=100%; height=220px;" src="admin/uploads/'.$row['image'].'"></a>';
                        
                        echo'</div>';

                    }
                } catch(PDOException $e) {
                    echo $e->getMessage();
                }
                    echo'</div>';
                
 ?>               
            </div>
        </div>
    <hr>
</div>
    
