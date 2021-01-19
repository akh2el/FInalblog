

    
<!-- *************************	Advertisement section   ************************ -->
<div class = "container" style = "width:90%;height:120px;margin-top:20px;">

<?php 
			try {
				// number of records to be displayed in a page ie. 3 in this section
				$pages = new Paginator('1','p');
				// select a table
				$stmt = $db->query('SELECT postDate FROM sa_posts');

				//pass number of records to
				$pages->set_total($stmt->rowCount());
                // sql query to fetch data from tabel
				$stmt = $db->query('SELECT sa_ads.adsID, sa_ads.adsDate, image 
                  FROM sa_ads INNER JOIN sa_ads_dis_ads ON sa_ads.adsID = sa_ads_dis_ads.adsID
									INNER JOIN sa_dis_ads ON sa_ads_dis_ads.disID = sa_dis_ads.disID 
									WHERE sa_dis_ads.disTitle="6Above Footer" ORDER BY sa_ads.adsDate  DESC '.$pages->get_limit());
                
				while($row = $stmt->fetch()){
		
          echo '<a href=""><img class = "" style = "width:100%; height:120px" src="admin/uploads/'.$row['image'].'"></a>';
					}
				} catch(PDOException $e) {
					echo $e->getMessage();
				}
		?>

	  </div>

<footer>
	<div class="mr-container" style="background-color:black;padding-top:30px;">
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

            <div class="col-md-6   text-center">
		<!-- Facebook page start -->
				<div class="fb"id="fb-root ">
					<div class="fb-page" data-href="https://www.facebook.com/thalanikhabar/" 
						data-tabs="" data-width="400" data-height="270" data-small-header="false" 
						data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
						<blockquote cite="https://www.facebook.com/thalanikhabar/" class="fb-xfbml-parse-ignore">
						<a href="https://www.facebook.com/thalanikhabar/">Thalani Khabar</a></blockquote>
					</div>
				</div>
		<!-- facebook page end -->

		<!-- about us section -->
				<div class="fb"> <!-- fb class is for padding-top: 40px-->
					<p class="text-center"> काठमाडौँ, १९ वैशाख </p>     
                </div>
			</div>
		<!-- Page Links-->
			<div class="col-md-3 text-white text-center">
				<img class="footer_logoimg" src="images1/logo.png" alt="Thalani Khabar logo"> <!-- Thalani Logo -->
				<ul>
					<li><a class="" href="#">समाज</a></li>
					<li><a class="" href="#">राजनीति</a></li>
					<li><a class="" href="#">अर्थ</a></li>
					<li><a class="" href="#">अनौठो संसार</a></li>
					<li><a class="" href="#">खेलकुद</a></li>
					<li><a class="" href="#">मनोरञ्जन</a></li>
					<li><a class="" href="#">क्राइम</a></li>
					<li><a class="" href="#">विचार</a></li>
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