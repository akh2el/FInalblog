
<!-- not in use for thalani khabar -->
<div class="right-card latestcat">
    <div class="head">
        <h4>Categories</h4>
    </div>
    <!--Start of List-->
    <div class="panel panel-info">
        <ul class="list-group cat">
            <?php
                $stmt = $db->query('SELECT catTitle, catSlug FROM sa_categories ORDER BY catID DESC');
                while($row = $stmt->fetch()){
                echo '<a href="catpost.php?id='.$row['catSlug'].'" class="categories">'.$row['catTitle'].'</a>';
                    }
            ?>
        </ul>
    </div>
</div>