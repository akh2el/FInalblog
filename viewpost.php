<?php 
    require('includes/config.php'); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>US Construction</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name='keywords' content='bibekguragain, blog, dynmaic blog, blog about life, mysql blog'>
    <meta name='description' content='Bibek Guragain Blog Post'>
    <meta name='copyright' content='Bibek Guragain'>
    <meta name='language' content='en'>
    <meta name='robots' content='index,follow'>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!---------Font Awespme 4.7---------------------->
    <script src="https://use.fontawesome.com/037e1fd53a.js"></script>


     <script src="assets/js/custom.js" type="text/javascript"></script>

    
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="assets/vinobox/venobox.css" type="text/css" media="screen" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<?php

$stmt = $db->prepare('SELECT * FROM sa_project WHERE proSlug = :proSlug');
$stmt->execute(array(':proSlug' => $_GET['id']));
$row = $stmt->fetch();
//if post does not exists redirect user.
if($row['proID'] == ''){
    header('Location: ./');
    exit;

}

?>

<div class="mr-container" style="background-color: antiquewhite;">
<div class="container responsive" >  
                <?php 
                  $stmt = $db->query('SELECT sa_project.proID, sa_project.proTitle, sa_project.proDesc, sa_project.proDate,image 
                  FROM sa_project  ORDER BY sa_project.proDate  DESC ');  

                    echo '<div class = "row">';
                        echo '<div class = "col-md-6">';
                            echo  '<img class="" style = " width : 100% ; height : 440px;" src="admin/uploads/'.$row['image'].'" width="100%">';
                        echo '</div>';
                        echo '<div class = "col-md-6">';
                        echo ' <h4 style = "font-family: Arial, Helvetica, sans-serif; padding: 10px;"> <strong>'.$row['proTitle'].'</strong></h4>';
                        echo ' <p style="font-family: Arial, Helvetica, sans-serif; padding: 10px;">'.$row['proDesc'].'</p>';
                        echo '</div>';
                    echo '</div>';

                        ?>
      </div>
    </div>
    

