 <div class="right-card latest">
        <div class="head">
           <h4>Archives</h4>
        </div>
        <!--Start of List-->
        <div class="panel panel-info">
                <ul class="list-group">
                    <?php
                    $stmt = $db->query("SELECT Month(postDate) as Month, Year(postDate) as Year FROM sa_posts GROUP BY Month(postDate), Year(postDate) ORDER BY postDate DESC");
                    while($row = $stmt->fetch()){
                        $monthName = date("F", mktime(0, 0, 0, $row['Month'], 10));
                        $slug = 'a-'.$row['Month'].'-'.$row['Year'];
                         echo '<a href='.$slug.' class="archives">'.$monthName.'</a>';
                     }
                    ?>
                </ul>
         </div>
      </div>