<?php //include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">

    <title>Add New Ads</title>
    <!-- Style Sheet -->
           <?php include('includes/css.php');?> 
     <!-- Style Sheet -->
    <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
     <script>
         tinymce.init({
              selector: "textarea",
              plugins: [
                  "advlist autolink lists link image charmap print preview anchor",
                  "searchreplace visualblocks code fullscreen",
                  "insertdatetime media table contextmenu paste"
              ],
              toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
          });
</script>
<style>
/* Custom CSS */
.mce-tinymce {
margin: 0;
padding: 0;
display: block;
border: 1px solid #e3e3e3 !important;
border-top-left-radius: 3px !important;
border-top-right-radius: 3px !important;
border-bottom: 0px !important;
}
</style>
</head>

<body class="fix-header fix-sidebar">
    
    
      
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
        <!-- Main wrapper  -->
      <div id="main-wrapper">
          
        <!-- Menu -->
           <?php include('includes/menu.php');?> 
        <!-- End Menu -->
    
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add Ads</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./">Home</a></li>
                        <li class="breadcrumb-item active">Add Ads</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            
            
        
    
            
            
            
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                 
                <?php

                    //if form has been submitted process it
                    if(isset($_POST['submit'])){

                        //collect form data
                        extract($_POST);

                        //very basic validation
                        if($adsTitle ==''){
                            $error[] = 'Please enter the title.';
                        }

                        // if($adsURL ==''){
                        //     $adsURL = 'www.thalanikhabar.com';
                        // }

                        // if($postCont ==''){
                        //     $error[] = 'Please enter the content.';
                        // }
                        
                        if(!isset($error)){

                            

                                //$adsSlug = slug($adsTitle);
                                
                                $folder ="uploads/"; 

                                $image = $_FILES['image']['name']; 

                                $path = $folder . $image ; 

                                $target_file=$folder.basename($_FILES["image"]["name"]);


                                 $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);


                                $allowed=array('jpeg','png' ,'jpg','gif'); $filename=$_FILES['image']['name']; 

                                $ext=pathinfo($filename, PATHINFO_EXTENSION); if(!in_array($ext,$allowed) ) 

                                { 

                                 echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";

                                }

                                else{ 

                                move_uploaded_file( $_FILES['image'] ['tmp_name'], $path); }

                                if(!isset($error)){

                                try {
                                
                                //insert into database
                                $stmt = $db->prepare('INSERT INTO sa_ads (adsTitle,adsDate,adsURL, image) VALUES (:adsTitle,:postDate,:adsURL, :image)') ;
                                $stmt->execute(array(
                                    ':adsTitle' => $adsTitle,
                                    ':postDate' => date('Y-m-d H:i:s'),
                                    ':adsURL' => $adsURL,
                                    ':image' => $image
                                ));
                                $adsID = $db->lastInsertId();

                                //add categories
                                if(is_array($disID)){
                                    foreach($_POST['disID'] as $disID ){
                                        $stmt = $db->prepare('INSERT INTO sa_ads_dis_ads (adsID,disID)VALUES(:adsID,:disID)');
                                        
                                        $stmt->execute(array(
                                            ':adsID' => $adsID,
                                            ':disID' => $disID
                                            
                                        ));
                                    }
                                   
                                    
                                }
                                
                                
                                
                                 

                              //  $sth=$db->prepare("insert into sa_posts(image)values(:image) "); 

                              //  $sth->bindParam(':image',$image); 

                                //$sth->execute(); 

                              
                                
                                

                                //redirect to index page
                                header('Location: ads.php?action=added');
                                exit;

                            } catch(PDOException $e) {
                                echo $e->getMessage();
                            }
                          }

                        }

                    }

                    //check for any errors
                    if(isset($error)){
                        foreach($error as $error){
                            echo '<p class="error">'.$error.'</p>';
                            
                        }
                    }
                    ?>
                
                <!-- /# row -->
                 <form class="form-horizontal form-material" action='' method='post' enctype="multipart/form-data">  
                <div class="row">
                 
                    <div class="col-lg-9">
                     <div class="card">
                        <div class="card-title">
                            <h4>Add New Ads</h4>
                            
                        </div>
                        <div class="card-body">
                    
                        <div class="form-group">
                            <div class="col-md-12">
                                 <h4 class="card-title">Name</h4>
                                <input type="text" placeholder="Enter Ads Title" class="form-control form-control-line" name='adsTitle' value='<?php if(isset($error)){ echo $_POST['adsTitle'];}?>'>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                 <h4 class="card-title">URL</h4>
                                <input type="text" placeholder="Enter Ads URL" class="form-control form-control-line" name='adsURL' value='<?php if(isset($error)){ echo $_POST['adsURL'];}?>'>
                            </div>
                        </div>
                        
                      <!-- <div class="form-group">
                        <div class="col-md-12">
                        <h4 class="card-title">Description</h4>
                        <textarea name='postDesc' cols='60' rows='4'><?php //if(isset($error)){ echo $_POST['postDesc'];}?></textarea>
                        </div>
                     </div>
                            
                      <div class="form-group">
                        <div class="col-md-12">
                          <h4 class="card-title">Content</h4>
                         <textarea name='postCont' cols='60' rows='10'><?php //if(isset($error)){ echo $_POST['postCont'];}?></textarea>
                         </div>
                     </div> 

                      <div class="form-group">
                        <div class="col-md-12">
                          <h4 class="card-title">Tags</h4>
                                <input type='text' name='postTags' value='<?php //if(isset($error)){ echo $_POST['postTags'];}?>' style="width:400px;"></p>
                           </div>
                      </div>                         -->
                            
                      <div class="form-group">
                        <div class="col-md-12">
                          <h4 class="card-title">Images</h4>
                                <input type="file" name="image" accept=".gif,.jpg,.jpeg,.png"/> 
                           </div>
                      </div>      
            
                            
                            
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    
                    <div class="col-lg-3">
                        
                       <div class="col-lg-12"> 
                        <div class="card">
                            
                            <div class="card-title">
                                <h4>Publish ads</h4>
                            </div>
                            <div class="card-body">
                                
                             <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" name='submit' value='Submit' class="btn btn-danger">Publish</button>
                                    </div>
                                </div>

                            </div>
                             
                        </div>
                    </div>
                        
                        
                    <div class="col-lg-12"> 

<!-- ******************************** -->

                    <!-- <div class="card">
                            
                            <div class="card-title">
                               <h4>Section</h4>
                           </div>
                           <div class="card-body">
                                -->
                               
                           <?php 

            //    $stmt3 = $db->query('SELECT secID, secTitle FROM sa_Section ORDER BY secTitle');
            //    while($row3 = $stmt3->fetch()){
         
            //      if(isset($_POST['secID'])){
         
            //        if(in_array($row2['secID'], $_POST['secID'])){
            //           $checked="checked='checked'";
            //        }else{
            //           $checked = null;
            //        }
            //      }
            //     echo "<label><input type='checkbox' name='secID[]' value='".$row3['secID']."'> ".$row3['secTitle']."</label><br/>";


                                   
            //    }
         
               ?>

                               
                       <!-- </div>
                       </div> -->


<!-- *********************************************** -->


                        <div class="card">
                            
                             <div class="card-title">
                                <h4>Display Section</h4>
                            </div>
                            <div class="card-body">
                                
                                
                            <?php 

                $stmt2 = $db->query('SELECT disID, disTitle FROM sa_dis_ads ORDER BY disTitle');
                while($row2 = $stmt2->fetch()){
          
                  if(isset($_POST['disID'])){
          
                    if(in_array($row2['disID'], $_POST['disID'])){
                       $checked="checked='checked'";
                    }else{
                       $checked = null;
                    }
                  }
                 echo "<label><input type='checkbox' name='disID[]' value='".$row2['disID']."'> ".$row2['disTitle']."</label><br/>";


                                    
                }
          
                ?>

                                
                        </div>
                        </div>



                    </div>    
                    
                        
                 </div>
                    
                    
                </div>
                <!-- /# row -->
                </form>
                <!-- End PAge Content -->
            </div>
            
            <!-- End Container fluid  -->
            <!-- footer -->
            <footer class="footer"> Copyrights &copy; <?php echo date("Y"); ?> <a href="https://aashatech.com/" target="_blank">AashaTech</a>. All Rights Reserved.</footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    
     <!-- Java Scripts -->
           <?php include('includes/js.php');?> 
     <!-- End Java Scripts -->

</body>

</html>