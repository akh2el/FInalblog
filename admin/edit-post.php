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

   <title>Edit Images</title>
   
     <!-- Style Sheet -->
           <?php include('includes/css.php');?> 
     <!-- Style Sheet -->
    <!-- <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
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

  </script> -->
    
</head>
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
                    <h3 class="text-primary">Edit Images</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./">Home</a></li>
                        <li class="breadcrumb-item active">Edit Images</li>
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
                        if($postID ==''){
                            $error[] = 'This post is missing a valid id!.';
                        }

                        if($postTitle ==''){
                            $error[] = 'Please enter the title.';
                        }

                      
                        if(!isset($error)){

                            try {

                               
                                
                                $folder ="uploads/"; 

                                $image = $_FILES['image']['name']; 

                                $path = $folder . $image ; 

                                $target_file=$folder.basename($_FILES["image"]["name"]);


                                 $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);


                                $allowed=array('jpeg','png' ,'jpg'); $filename=$_FILES['image']['name']; 

                                $ext=pathinfo($filename, PATHINFO_EXTENSION); if(!in_array($ext,$allowed) ) 

                                { 

                                 echo "<span style='color:red; padding:10px;'>Please re-upload the image</span>";

                                }

                                else{ 

                                move_uploaded_file( $_FILES['image'] ['tmp_name'], $path);

                                //insert into database
                                $stmt = $db->prepare('UPDATE sa_posts SET postTitle = :postTitle, image = :image WHERE postID = :postID') ;
                                $stmt->execute(array(
                                    ':postTitle' => $postTitle,
                                    
                                    ':postID' => $postID,
                                    ':image' => $image
                                ));

                            
                                
                                
                                }

                      
            

                            } catch(PDOException $e) {
                                echo $e->getMessage();
                            }
                        }

                    }

                    ?>


                    <?php
                    //check for any errors
                    if(isset($error)){
                        foreach($error as $error){
                            echo $error.'<br />';
                        }
                    }

                        try {

                            $stmt = $db->prepare('SELECT postID, postTitle,image FROM sa_posts WHERE postID = :postID') ;
                            $stmt->execute(array(':postID' => $_GET['id']));
                            $row = $stmt->fetch(); 

                        } catch(PDOException $e) {
                            echo $e->getMessage();
                        }

                    ?>
                
                <!-- /# row -->
                 <form class="form-horizontal form-material"  enctype="multipart/form-data" action='' method='post'>  
                <div class="row"> 
                 
                    <div class="col-lg-9">
                     <div class="card">
                        <div class="card-title">
                            <h4>Edit Images</h4>
                        </div>
                        <div class="card-body">
                            
                            
                            <input type='hidden' name='postID' value='<?php echo $row['postID'];?>'>

	                
                        <div class="form-group">
                            <div class="col-md-12">
                                <h4 class="card-title">Name</h4>
                                <input type="text" placeholder="Enter post title" class="form-control form-control-line" name='postTitle' value='<?php echo $row['postTitle'];?>'>
                            </div>
                        </div>
                    
                            
                    <div class="form-group">
                        <div class="col-md-12">
                        <div class="preview_img">
                         <img src="<?php echo 'uploads/'.$row['image']; ?>" width="150px">
                         </div>
                          <h4 class="card-title">Images</h4>
                                <input type="file" name="image" accept=".jpg,.jpeg,.png"/> 
                           </div>
                   </div>    
                            
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    
                    <div class="col-lg-3 custom-my-side">
                    <div class="col-lg-12">
                        <div class="card">
                            
                            <div class="card-title">
                                <h4>Update Post</h4>
                            </div>
                            <div class="card-body">
                                
                             <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" name='submit' value='Submit' class="btn btn-danger">Update</button>
                                    </div>
                                </div>

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
            <footer class="footer"> Copyrights &copy; <?php echo date("Y"); ?> <a href="http://aashatech.com/" target="_blank">AashaTech</a>. All Rights Reserved.</footer>
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