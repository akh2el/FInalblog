

    
<!-- *************************	Advertisement section   ************************ -->
<div class = "container ads" style = "margin-bottom:20px">

<?php 
			try {
				// number of records to be displayed in a page ie. 3 in this section
				$pages = new Paginator('1','p');
				// select a table
				$stmt = $db->query('SELECT postDate FROM sa_posts');

				//pass number of records to
				$pages->set_total($stmt->rowCount());
                // sql query to fetch data from tabel
				$stmt = $db->query('SELECT sa_ads.adsID, sa_ads.adsDate,sa_ads.adsURL, image 
                  FROM sa_ads INNER JOIN sa_ads_dis_ads ON sa_ads.adsID = sa_ads_dis_ads.adsID
									INNER JOIN sa_dis_ads ON sa_ads_dis_ads.disID = sa_dis_ads.disID 
									WHERE sa_dis_ads.disTitle="6Above Footer" ORDER BY sa_ads.adsDate  DESC '.$pages->get_limit());
                
				while($row = $stmt->fetch()){
		
          echo '<a href="'.$row['adsURL'].'" target="_blank"><img class = "ads_img"  src="admin/uploads/'.$row['image'].'"></a>';
					}
				} catch(PDOException $e) {
					echo $e->getMessage();
				}
		?>

	  </div>

<footer>
	<div class="mr-container footer1">
    	<div class="row ">
            <div class="col-md-3">
                 <div class="text-white  f1"> <!-- f1 class is for padding top and left : 30px and 60px  -->
	<!-- Contact Address -->				
				 <div class='row f2'> <!-- f2 class is for  padding-top: 10px -->
					   <div class="col-4 text-center">
					  		 <i class="fa fa-home"></i>
						</div>
						<div class="col-6">
							<p class=''> थालनी ख़बर प्रा. लि. <br>कामनपा वडा नम्बर-३१, बानेश्वर,<br>काठमाडौँ, नेपाल </p>
						</div>
					</div>
	<!-- contact Phone Number -->
					<div class='row f2'> <!-- f2 class is for  padding-top: 10px -->
						<div class="col-4 text-center">
					   		<i class="fa fa-phone-square "></i>
						</div>
						<div class="col-8">
						<p class=''>+९७७-०१-४४६९२०५</p> 
						</div>
			
					</div>
	<!-- contact Email -->
					<div class='row f2'> <!-- f2 class is for  padding-top: 10px -->
					<div class="col-4 text-center">
						<i class="fa fa-envelope "></i>
						</div>
						<div class=" col-8">
						<p class=''> thalanikhabar@gmail.com </p>
						</div>
						</div>
	<!-- Website -->
					<div class='row f2'> <!-- f2 class is for  padding-top: 10px -->
					<div class="col-4 text-center">
						<i class="fa fa-globe "></i>
						</div>
						<div class="col-8">
						<p class=''>www.thalanikhabar.com</p>
						</div>
					</div>


	<!-- Footer Social Links -->				
				<div class='row'>
					<div class="col-4 "></div> <!-- for gap -->
						<div class="col-8">
							<a class="logo" href="#"><i class="fa fa-facebook-square" style="font-size:36px;color:#39569c"></i></a>
							<a class="logo" href="#"><i class="fa fa-linkedin-square" style="font-size:36px;color:#2867B2"></i></a>
							<a class="logo" href="#"><i class="fa fa-twitter-square" style="font-size:36px;color:#1DA1F2"></i></a>
							<a class="logo" href="#"><i class="fa fa-pinterest-square" style="font-size:36px;color:#E60023"></i></a>         
						</div>
					</div>

				</div>
            </div>
				
	<!-- facebook page implementation -->

	<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v9.0" nonce="5CJAKDWz"></script>

	<div class="col-md-6   text-center">
		<!-- Facebook page start -->
		<div class="fb-page" data-href="https://www.facebook.com/thalanikhabar" data-tabs="" data-width="400" data-height="270" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="false">
		<blockquote cite="https://www.facebook.com/thalanikhabar" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/thalanikhabar">Thalani Khabar</a></blockquote>
	</div>
		<!-- facebook page end -->


		<!-- about us section -->
				<div class="fb"> <!-- fb class is for padding-top: 40px-->
					     
                </div>
			</div>
		<!-- Page Links-->
			<div class="col-md-3 text-white text-center">
				<img class="footer_logoimg" src="assets/images/logo.png" alt="Thalani Khabar logo"> <!-- Thalani Logo -->
				<ul >
					<li>
					<?php
                        $stmt = $db->query('SELECT catTitle, catSlug FROM sa_categories WHERE catTitle="समाज" ORDER BY catID DESC');
                        $row = $stmt->fetch();
                             echo '<a class="nav-link" href="catpost.php?id='.$row['catSlug'].'" class="categories">समाज</a>';    
                        ?>
					</li>
					<li>
					<?php
                        $stmt = $db->query('SELECT catTitle, catSlug FROM sa_categories WHERE catTitle="राजनीति" ORDER BY catID DESC');
                        $row = $stmt->fetch();
                             echo '<a class="nav-link" href="catpost.php?id='.$row['catSlug'].'" class="categories">राजनीति</a>';
                         
                        ?>
					</li>
					<li>
					<?php
                        $stmt = $db->query('SELECT catTitle, catSlug FROM sa_categories WHERE catTitle="अर्थ / व्यापार" ORDER BY catID DESC');
                        $row = $stmt->fetch();
                             echo '<a class="nav-link" href="catpost.php?id='.$row['catSlug'].'" class="categories">अर्थ / व्यापार</a>';
                         
                        ?>
					</li>
					<li>
					<?php
                        $stmt = $db->query('SELECT catTitle, catSlug FROM sa_categories WHERE catTitle="अनौठो संसार" ORDER BY catID DESC');
                        $row = $stmt->fetch();
                             echo '<a class="nav-link" href="catpost.php?id='.$row['catSlug'].'" class="categories">अनौठो संसार</a>';
                         
                        ?>
					</li>
					<li>
					<?php
                        $stmt = $db->query('SELECT catTitle, catSlug FROM sa_categories WHERE catTitle="खेलकुद" ORDER BY catID DESC');
                        $row = $stmt->fetch();
                             echo '<a class="nav-link" href="catpost.php?id='.$row['catSlug'].'" class="categories">खेलकुद</a>';
                         
                        ?>
					</li>
					<li>
					<?php
                        $stmt = $db->query('SELECT catTitle, catSlug FROM sa_categories WHERE catTitle="मनोरञ्जन" ORDER BY catID DESC');
                        $row = $stmt->fetch();
                             echo '<a class="nav-link" href="catpost.php?id='.$row['catSlug'].'" class="categories">मनोरञ्जन</a>';
                         
                        ?>
					</li>
					<li> <?php
                        $stmt = $db->query('SELECT catTitle, catSlug FROM sa_categories WHERE catTitle="क्राइम" ORDER BY catID DESC');
                        $row = $stmt->fetch();
                             echo '<a class="nav-link" href="catpost.php?id='.$row['catSlug'].'" class="categories">क्राइम</a>';
                         
                        ?></li>
					<li>
					<?php
                        $stmt = $db->query('SELECT catTitle, catSlug FROM sa_categories WHERE catTitle="विचार" ORDER BY catID DESC');
                        $row = $stmt->fetch();
                             echo '<a class="nav-link" href="catpost.php?id='.$row['catSlug'].'" class="categories">विचार</a>';
                         
                        ?>
					</li>
				</ul> 
			</div>
        </div>  
    </div>
     
</footer>












<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>