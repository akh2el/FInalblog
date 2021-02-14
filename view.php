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
<body>
<div class="container ">
        
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
        
      <div class="container responsive">  
                <?php 
                  $stmt = $db->query('SELECT sa_project.proID, sa_project.proTitle, sa_project.proDate,image 
                  FROM sa_project  ORDER BY sa_project.proDate  DESC '.$pages->get_limit());  
                    echo '<div class="viewpost">';
                      echo '<div class="row">';
                        echo '<div class="col-md-9 ">';
                          echo '<h3>'.$row['postTitle'].'</h3>';
                              echo '<div class="fafaone"><span> Category: </span>'.implode(", ", $links).'</div>';
                              echo  '<img class="viwepost_img" src="admin/uploads/'.$row['image'].'" width="100%">';
                              echo'<div class="blog-content"';
                                echo ' < p class = "viewpost_desc">'.$row['proTitle'].'</p>';
                                
                        echo('</div>');
                      echo '</div>'; 
                    echo '</div>';

                        ?>
      </div>
  
    </div>














<script src="assets/js/wow.min.js"></script>
	<script>
	new WOW().init();
  </script>
  

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script type="text/javascript" src="assets/jquery/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="assets/vinobox/venobox.min.js"></script>
<script>
    $(document).ready(function(){
    $('.venobox').venobox({
      closeColor: '#f4f4f4',
      SpinColor: '#f4f4f4',
      colorBackground:'#17191D',
      overlayColor: 'rgba(23,25,29,0.8)'
    }); 
});
</script>



<!-- 
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->
<script>

    $(document).ready(function(){
        $('.card').on('mouseenter',function(e){
            x = e.pageX - $(this).offset().left;
            // y = e.pageY - $(this).offset().top
            $(this).find('span').css({top:y, top:x})
        })
        $('.card').on('mouseenter',function(e){
            x = e.pageX - $(this).offset().left;
            // y = e.pageY - $(this).offset().top;
            $(this).find('span').css({top:y, top:x})
        })
    })
</script>


</body>
</html>