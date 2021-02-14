<?php include ('includes/header.php');?>


<!-- **************************************Project Banner Secion ********************* -->
                                            <!-- START -->
<section>
<div class="mr-container project_banner" style="background-image: url('assets/images/p11.jpg');" >
    <div class="container">
        <div class="text-left project_banner_title">
          <h2 class="row project_banner_title2 foleft wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay="0.5s"">
            US Construction Company are proud to serve the growing needs of Nepal and its people.We believe a successful business is the one which unlocks potential in its people and thereby enabling them to create solutions which adds value to our customers.
            When competition is tough and inevitable, uniqueness is the key to success.</h2>
        </div>
  </div>
</div>
</section>
                                                <!-- END -->


<!-- ************************************************ Project  Dispaly Section *********************** -->
                                                                <!-- START -->
<section id="about" style="background-image: url('assets/images/p2.jpg');">
	<div class="container ">
        <h3 class="project_dis_main_title"><strong> Our Project<strong></h3>
        <div class="row project_dis_row">
        <?php 
			try {
				// number of records to be displayed in a page ie. 3 in this section
				$pages = new Paginator('1000','p');
				// select a table
				$stmt = $db->query('SELECT proDate FROM sa_project');

				//pass number of records to
				$pages->set_total($stmt->rowCount());
                // sql query to fetch data from tabel
				$stmt = $db->query('SELECT sa_project.proID, sa_project.proTitle,sa_project.proDesc, sa_project.proSlug, sa_project.proDate,image 
                                    FROM sa_project  ORDER BY sa_project.proDate  DESC '.$pages->get_limit());
                
				while($row = $stmt->fetch()){


                    echo '<div class="service_dis_row">';
                    echo '<div class="col-md-4  wow animate__zoomIn" data-wow-duration="1s" data-wow-delay="0.2s" style="border-radius: 5px; padding: 15px;">';
                    echo '<div class="product" >';
                    echo '<a class="venobox" data-vbtype="iframe" href="viewpost.php? id='.$row['proSlug'].'"><img class="project_dis_img" src="admin/uploads/'.$row['image'].'"></a>';
                    echo '<h5 class="text-center" style="background: blanchedalmond; padding: 5px;margin-top: 0px;"><strong>'.$row['proTitle'].'</strong></h5>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
                
            }
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
        
        ?>
   <!-- <a class="venobox" data-vbtype="iframe" href="viewpost.php">iFrame</a>  -->
    </div>
    
</section>	
                            <!-- END -->





<?php include ('includes/footer.php'); ?>  <!-- Footer-->
