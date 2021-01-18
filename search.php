<?php
$search =$_POST['search'];
 include ('includes/header.php');
 

 $sql = "SELECT * FROM sa_posts WHERE postTitle LIKE '%$search%' ORDER BY postDate";

 $result = $db->query($sql);

 if($result->rowCount() > 0){
     while($row = $result->fetch(PDO::FETCH_ASSOC))
     {
        echo '<div class="container">';
            echo '<div class="row responsive">';
                echo'<div class="col-md-8 responsive" style="margin-top:20px;">';
                    echo ''.date('jS M Y', strtotime($row['postDate']));
                    echo '<p class="anya-news-title" style="width: 95%;height: 45px; margin-bottom:30px" ><strong><a href="viewpost.php? id='.$row['postSlug'].'">'.$row['postTitle'].'</a></strong></p>';
                    echo '<a href=""><img class="anya-news-img" style="height: 220px;width: 400px;" src="admin/uploads/'.$row['image'].'"></a>';				
                    echo '<div class="" >';
                        echo '<p >'.$row['postDesc'].'</p>';
                    echo '</div>';
                echo '</div>';  
            echo '</div>';
        echo '</div>';    
        
     }
 }else{
     echo "o record";
 }
?>

<?php
 include ('includes/footer.php')
 ?>