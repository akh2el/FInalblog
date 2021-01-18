
<!-- collected news section -->
<div class="container">
    <hr>
        <div class="row">
            <div class="col-md-3 order-md-2 mb-4">
                <h5 class="">बिचार</h5>
                <div class="row">
                    <div class="col-md-7">
                    <h6 class="" style = "width:90%; height:25px"><strong>मुखिय समचार</strong> </h6>
                    <p class="" style = "width:95%; height:75px; overflow: hidden;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                    </div>
                    <div class="col-md-5">
                    <img class="" style="width:100%; height: 100px;" src="assets/images/diary.jpg" alt="News Images"></img>
                    </div>
                </div>  
                <hr>  

                <div style=" height:400px;overflow:scroll;overflow-y:scroll;overflow-x:hidden;">
                        
                        <div class ="row">
                            <div class = "col-md-6">
                                <p class="" style = " height:50px; overflow: hidden;"><strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</strong> </p>
                            </div>
                            <div class = "col-md-6">
                                <img class="" style="width:auto; border-radius: 50%;height: 60px;" src="assets/images/diary.jpg" alt="News Images"></img>
                            </div>
                            <p class="" style = "margin-left:15px; height:70px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                    
                            
                        </div> 
                        <hr>
                        <div class ="row">
                        <div class = "col-md-6">
                                <p class="" style = " height:50px; overflow: hidden;"><strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</strong> </p>
                            </div>
                            <div class = "col-md-6">
                                <img class="" style="width:auto; border-radius: 50%;height: 60px;" src="assets/images/diary.jpg" alt="News Images"></img>
                            </div>
                            <p class="" style = "margin-left:15px; height:70px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                    
                            
                        </div> 
                        <hr> 
                        <div class ="row">
                        <div class = "col-md-6">
                                <p class="" style = " height:50px; overflow: hidden;"><strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</strong> </p>
                            </div>
                            <div class = "col-md-6">
                                <img class="" style="width:auto; border-radius: 50%;height: 60px;" src="assets/images/diary.jpg" alt="News Images"></img>
                            </div>
                            <p class="" style = "margin-left:15px; height:70px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                    
                        </div>  
                        <hr>
                    
                    
                       
                          
                </div>
                
                        
                     
                
                
               
                <h3 class="text-center" style = "margin-top:20px;"><strong>मुखिय समचार</strong> </h3>
                <ul>
                    <li>lead ffffffffffffffffnews 1 <br> line2</li>
                    <li>Lead news 2<br>line2</li>
                    <li>Lead news 3<br>line2</li>
                    <li>Lead news 4<br>line2</li>
                    <li>Lead news 5<br>line2</li>
                    <li>Lead news 6<br>line2</li>
                    <li>Lead news 7<br>line2</li>
                </ul>
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
    
