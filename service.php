<?php include ('includes/header.php');?>

 <section>                 <!--  *********************Banner section Start************** -->
    <div class="mr-container service_banner" style="background-image: url('assets/images/g111.jpg');" >
        <div class="container">
            <div class="text-left service_banner_margin">
                <h2 class="row service_banner_text foleft wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay="0.5s"">
                    US construction delivers a wide range of services covering the full life cycle period of Construction.
                    Our service portfolio covers fabrication, construction, maintenance, turnarounds, and specialist logistics.
                    As a full end-to-end service provider, our customizable range of services can tackle any construction challenge.
                </h2>
            </div>
        </div>
    </div>
 </section>        <!-- END -->


                        <!-- ******************************Service Display Section ********************** -->
                                                               <!-- START -->

<section style=" background-image: linear-gradient(to top, #537895 0%, #09203f 100%);">
	<div class="container column">
        <h3 class="service_dis_heder"><strong> Services<strong></h3>
        <hr>
        <!-- <div class="row service_banner_row"> -->
        <?php 
			try {
				// number of records to be displayed in a page ie. 3 in this section
				$pages = new Paginator('100','p');
				// select a table
				$stmt = $db->query('SELECT sevDate FROM sa_service');

				//pass number of records to
				$pages->set_total($stmt->rowCount());
                // sql query to fetch data from tabel
				$stmt = $db->query('SELECT sa_service.sevID, sa_service.sevTitle, sa_service.sevDesc, sa_service.sevDate,image 
                                    FROM sa_service  ORDER BY sa_service.sevDate  DESC '.$pages->get_limit());
                
				while($row = $stmt->fetch()){


                    echo '<div class="service_dis_row">';
                        echo '<div class="col-md-4  wow animate__zoomIn" data-wow-duration="1s" data-wow-delay="0.2s" style="border-radius: 5px;">';
                            echo '<div class = "cards">';
                                    echo '<span></span>';
                                    echo '<div class="imgBx"><img class="project_dis_img" src="admin/uploads/'.$row['image'].'"></div>';
                                    echo '<div class = "content">';
                                        echo '<div>';
                                            echo '<h5 class="" style = " margin-left: 20px;"><strong>'.$row['sevTitle'].'</strong></h5>';
                                            echo '<div>';
                                                echo '<p class="" style = " margin-left: 10px; padding: 10px; font-family: monospace; overflow: hidden;">'.$row['sevDesc'].'</p>';
                                            echo '</div>';    
                                        echo '</div>';
                                    echo '</div>';    
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
 
            }
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
        ?>
        </div>
    	
</section>
                                                    <!-- END -->

                                                  

 <?php include ('includes/footer.php'); ?>  <!-- footer -->



