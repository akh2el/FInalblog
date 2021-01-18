    <div class="tags">
    			<h4 class="text-center">TAGS</h4>
    			<?php
            $tagsArray = [];
            $stmt = $db->query('select distinct LOWER(postTags) as postTags from sa_posts where postTags != "" group by postTags');
            while($row = $stmt->fetch()){
                $parts = explode(',', $row['postTags']);
                foreach ($parts as $tag) {
                    $tagsArray[] = $tag;
                }
            }

            $finalTags = array_unique($tagsArray);
            foreach ($finalTags as $tag) {

                echo "<button><a href='t-".$tag."'>".ucwords($tag)."</a></button>";
            }
          ?>

		</div>