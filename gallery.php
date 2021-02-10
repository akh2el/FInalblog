<?php include ('includes/header.php');?>


            <!-- *********************************** Galler Banner Section ***************************** -->
                                                            <!-- START -->
<section>
    <div class="mr-container gallery_banner" style="background-image: url('assets/images/z1.jpg');" >
        <div class="container">
            <div class="text-left gallery_banner_margin">
                <h2 class="row gallery_banner_main_title foleft wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay="0.5s"" >
                    We are committed to saving energy and natural resources by encouraging low consumption and a company-wide focus on recycling. In partnership with our customers, 
                    we look for new and innovative ways to deliver products and services to reduce their impact on the environment.
                </h2>
            </div>
        </div>
    </div>
</section>    
                                                                    <!-- END -->

                <!-- ********************************** Gallery Image Display Section ********************** -->
                                                                <!-- START -->

<section id="about" style="background-image: linear-gradient(180deg, #099053 0%, #1e77ae 100%);">
    <div class="container">
        <h3 class="gallery_dis_main_title"><strong> Gallery<strong></h3>
        <a href="videos.php" class="button gallery_video_btn">Video Gallery</a>     
        <hr>
        <div class="row gallery_dis_row">
        <?php 
			try {
				// number of records to be displayed in a page ie. 3 in this section
				$pages = new Paginator('100','p');
				// select a table
				$stmt = $db->query('SELECT postDate FROM sa_posts');

				//pass number of records to
				$pages->set_total($stmt->rowCount());
                // sql query to fetch data from tabel
				$stmt = $db->query('SELECT sa_posts.postID, sa_posts.postTitle, sa_posts.postDate,image 
                                    FROM sa_posts  ORDER BY sa_posts.postDate  DESC '.$pages->get_limit());
                
				while($row = $stmt->fetch()){


                // echo '<div class="row" style="margin-top: 20px;text-align: justify;">'; 
                    echo '<div class="col-md-4 product wow animate__zoomIn" data-wow-duration="1.5s" data-wow-delay="0.5s" style="border-radius: 5px;">';
                        // echo<img src="assets/images/sand.jpg" width="100%" height="220px">
                        echo '<img class="gallery_dis_img" src="admin/uploads/'.$row['image'].'">';
                            // <h3 class="text-center" style="background-color: rgb(220, 194, 128);"><strong>Sand</strong> </h3> 
                        echo '<h5 class="text-center gallery_dis_title"><strong>'.$row['postTitle'].'</strong></h5>';
                    echo ' </div>';
                // echo ' </div>';
                
            }
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
        ?>
        
    </div>
</section>	

                                    <!-- END-->




<?php include ('includes/footer.php'); ?>  <!-- Footer-->
