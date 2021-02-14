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





        <div class="wrapper">
  <div class="link_wrapper">
    <a class="av" href="videos.php">Video Gallery</a>
    <div class="icon">
      <svg class="icon_svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 268.832 268.832">
        <path d="M265.17 125.577l-80-80c-4.88-4.88-12.796-4.88-17.677 0-4.882 4.882-4.882 12.796 0 17.678l58.66 58.66H12.5c-6.903 0-12.5 5.598-12.5 12.5 0 6.903 5.597 12.5 12.5 12.5h213.654l-58.66 58.662c-4.88 4.882-4.88 12.796 0 17.678 2.44 2.44 5.64 3.66 8.84 3.66s6.398-1.22 8.84-3.66l79.997-80c4.883-4.882 4.883-12.796 0-17.678z"/>
      </svg>
    </div>
  </div>
  
</div>




        <!-- <a href="videos.php" class="button gallery_video_btn">Video Gallery</a>      -->
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

                    echo '<div class="col-md-4 product wow animate__zoomIn" data-wow-duration="1.5s" data-wow-delay="0.5s" style="border-radius: 5px;">';
                        echo '<a class="venobox" href="admin/uploads/'.$row['image'].'"><img class="gallery_dis_img" src="admin/uploads/'.$row['image'].'" alt="image alt"/>';
                            echo '<h5 class="text-center gallery_dis_title"><strong>'.$row['postTitle'].'</strong></h5>';
                        echo '</a>';
                    echo ' </div>';
               
            }
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
        ?>      
    </div>

</section>	

                                    <!-- END-->




<?php include ('includes/footer.php'); ?>  <!-- Footer-->
