<?php
//include config
require_once('../includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }

//show message from add / edit page
if(isset($_GET['delads'])){ 

	$stmt = $db->prepare('DELETE FROM sa_project WHERE proID = :proID') ;
	$stmt->execute(array(':proID' => $_GET['delads']));

	//delete post categories. 
	$stmt = $db->prepare('DELETE FROM sa_ads_dis_ads WHERE adsID = :adsID');
	$stmt->execute(array(':adsID' => $_GET['delads']));

	header('Location: ads.php?action=deleted');
	exit;
} 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">

    <title>Project</title>
    
    <!-- Style Sheet -->
           <?php include('includes/css.php');?> 
     <!-- Style Sheet -->

<script language="JavaScript" type="text/javascript">
  function delads(id, title)
  {
	  if (confirm("Are you sure you want to delete '" + title + "'"))
	  {
	  	window.location.href = 'ads.php?delads=' + id;
	  }
  }
  </script>

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

            <div id="wrapper">
	
		
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Project</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./">Home</a></li>
                        <li class="breadcrumb-item active">Project</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->


                <div class="row">
				    <div class="col-lg-12">
                        <div class="card">


                            <div class="card-title">
                                <h4>Recent Project</h4> <a href='new-ads.php'> <button type="button" class="btn btn-dark btn-xs m-b-10 m-l-5"><i class="fa fa-sticky-note"></i>  Add Project</button></a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">


					                <?php 
									//show message from add / edit page
									if(isset($_GET['action'])){ 
										echo '<h3>Ads '.$_GET['action'].'.</h3>'; 
									} 
									?>

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

									  <tbody>
                                    
                                    <?php
										try {

											$stmt = $db->query('SELECT * FROM sa_project ORDER BY proID DESC');
											while($row = $stmt->fetch()){

                                            echo '<tr>';

                                          echo '<td>'.$row['proID'].'</td>';
                                          echo '<td>'.$row['proTitle'].'</td>';
                                         
                                          echo '<td>'.date('jS M Y', strtotime($row['proDate'])).'</td>';
                                          ?>
                                                <td><a href="edit-ads.php?id=<?php echo $row['proID'];?>"><button type="button" class="btn btn-primary btn-xs btn-addon s-b-10 s-l-5"><i class="fa fa-edit"></i> Edit</button></a> | <a href="javascript:delads('<?php echo $row['proID'];?>','<?php echo $row['proTitle'];?>')"><button type="button" class="btn btn-danger btn-xs btn-addon s-b-10 s-l-5"><i class="fa fa-trash"></i> Delete</button></a></td>
                                            
                                            <?php 
												echo '</tr>';

											}

										} catch(PDOException $e) {
										    echo $e->getMessage();
										}
									?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


              </div>


                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <footer class="footer"> Copyrights &copy; <?php echo date("Y"); ?> <a href="http://aashatech.com/" target="_blank">Aasha Tech</a>. All Rights Reserved.</footer>
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