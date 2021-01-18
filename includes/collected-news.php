
<!-- collected news section -->
<div class="container">
    <hr>
        <div class="row">
            <div class="col-md-3 order-md-2 mb-4">
                <h5 class="">बिचार</h5>
                
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

                    echo '<div class="row">';
                    echo '<div class="col-md-7">';
                    echo '<p class="braking-news-title" style = " font-family: var(--semibold); height: 20px;"><strong><a href="viewpost.php? id='.$row['postSlug'].'">'.$row['postTitle'].'</a></strong></p>';
                    echo '<div class="braking-news-desc" style = "font-family: var(--semibold);" >';
                        echo '<p style:">'.$row['postDesc'].'</p>';
                    echo '</div>';
                echo '</div>';
                    echo '<div class="col-md-5">';
                    echo '<a href=""><img class = "braking-news-img" src="admin/uploads/'.$row['image'].'"></a>';
                    
                echo '</div>';
                
                echo '</div>'; 
                
            }
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
?>




<div style=" height:400px;margin-top:20px;overflow:scroll;overflow-y:scroll;overflow-x:hidden;">
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
                            
                            echo '<div class ="row">'; 
                                echo '<div class = "col-md-6">';
                                    echo '<p class="" style = " height:50px; overflow: hidden;font-family: var(--semibold); height: 20px;"><strong><a href="viewpost.php? id='.$row['postSlug'].'">'.$row['postTitle'].'</a></strong></p>';
                                echo '</div>';
                                echo '<div class = "col-md-6">';
                                    echo '<a href=""><img class = "" style="width:auto; border-radius: 50%;height: 60px;"src="admin/uploads/'.$row['image'].'"></a>';
                                echo '</div>';
                                echo '<div class="" style = "font-family: var(--semibold);" >';
                                    echo '<p style = "margin-left:15px; height:70px;">'.$row['postDesc'].'</p>';
                                echo '</div>'; 
                            echo '</div>' ;
                                
                            }
                        } catch(PDOException $e) {
                            echo $e->getMessage();
                        }
                        ?>                         
                </div>
                     
                <div style = "background-color: rgb(51, 161, 161); width: 95%;height: 450px; margin-top: 20px;">

                        <h2 style="padding-top:60px">Advertisement<br>Section</h2>
                    </div>
                
               
               
            </div>

            <div class="col-md-9 order-md-1">
                <?php 
                    echo'<div class="row collected-news" style="margin-bottom: 30px; margin-top:30px">';
                
                
                        try {
                            
                            $pages = new Paginator('6','p');

                            $stmt = $db->query('SELECT postDate FROM sa_posts');

                            //pass number of records to
                            $pages->set_total($stmt->rowCount());

                            $stmt = $db->query('SELECT postID, postTitle, postSlug, postDesc, postDate, postTags, image FROM sa_posts ORDER BY postDate DESC '.$pages->get_limit());
                            while($row = $stmt->fetch()){
                    

                        echo'<div class="col-md-4 "style="margin-bottom: 20px; margin-top:20px">';

                        $stmt2 = $db->prepare('SELECT catTitle, catSlug FROM sa_categories, sa_post_categories WHERE sa_categories.catID = sa_post_categories.catID AND sa_post_categories.postID = :postID');
                        $stmt2->execute(array(':postID' => $row['postID']));

                        $catRow = $stmt2->fetchAll(PDO::FETCH_ASSOC);

                        $links = array();
                        foreach ($catRow as $cat)
                        {
                            $links[] = "<a href='catpost.php?id=".$cat['catSlug']."'>".$cat['catTitle']."</a>";
                        }
        
                       echo '<p class="" style = "overflow: hidden; width: 55%; height: 20px;">'.implode(", ", $links).'</p>';


                            echo '<p class="collected-News-title " ><strong><a href="viewpost.php? id='.$row['postSlug'].'">'.$row['postTitle'].'</a></strong></p>';
                            echo '<a href=""><img class="collected-news-img" src="admin/uploads/'.$row['image'].'"></a>';
                            echo '<div class="collected-News-desc" >';
                                echo '<p style:">'.$row['postDesc'].'</p>';
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
                
                        echo '<div class="col-md-6" style="margin-bottom: 30px; margin-top:30px">';
                        
                            echo '<p style="height:overflow: hidden; margin-left: 35px;margin-right: 5px;"><strong><a href="viewpost.php? id='.$row['postSlug'].'">'.$row['postTitle'].'</a></strong></p>';
                        
                            echo '<div class="" style="height: 110px; overflow: hidden; margin-left: 35px;margin-top: -25px; margin-bottom: 15px;">';
                                echo '<p style:">'.$row['postDesc'].'</p>';
                             echo '</div>';
                        echo'</div>';
    
                        echo'<div class="col-md-6" style="margin-bottom: 30px; margin-top:30px">'; 
                        
                            echo '<a href=""><img classs="text-center" style:"width=500px; height=200px;" src="admin/uploads/'.$row['image'].'"></a>';
                        
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
    
