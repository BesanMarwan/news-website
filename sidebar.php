<div class="col-md-4 mt-30">
    <div class="title d-flex p-1">
        <h6 class=" pr-3 font-weight-bold ">أخبار ذات صلة </h6>
        <button class="more px-2">المزيد <i class="fas fa-chevron-left"></i></button>
    </div>
    <?php
                    $sql="SELECT * FROM news  WHERE category_id='$category'  ORDER BY RAND() LIMIT 1";
                    $result=mysqli_query($conn,$sql);
                     if((mysqli_num_rows($result) )> 0){
                     while($post =mysqli_fetch_assoc($result)){
                    ?>
    <div class="news-box-related box">
        <div class="travel-box  pt-2 ">
            <div class="travel-img">
                <img src="news-cpanel/assets/images/news/<?php echo $post['img_news']?>" class="img-fluid w-100" alt="">
            </div>
            <div class="travel-text   px-1 ">

                <a href="post.php?id=<?php echo $post['id']?>">
                    <h6 class="pt-1 mb-0 font-weight-bold text-white"><?php echo $post['title']?> </h6>
                </a>
                <span class="dateN">
                    <i class="fas fa-calendar-alt ml-2  pb-2"></i><?php echo $post['dateN']?>
                </span>
            </div>
        </div>
        <?php }} ?>
        <?php
                       $sql="SELECT * FROM news WHERE category_id='$category'  ORDER BY RAND() LIMIT 3";
                    $result=mysqli_query($conn,$sql);
                     if(mysqli_num_rows($result) > 0){
                     while($post =mysqli_fetch_assoc($result)){
                    ?>
        <div class="relate-box mt-30 d-flex">
            <div class="relate-img col-md-6 ">
                <img src="news-cpanel/assets/images/news/<?php echo $post['img_news']?>" class="img-fluid " alt="">
            </div>
            <div class="relate-text  mt-1">
                <a href="post.php?id=<?php echo $post['id']?>">
                    <h6><?php echo $post['title']?>
                    </h6>
                </a>
                <span class="date font-weight-bold">
                    <i class="fas fa-calendar-alt ml-2"></i></span><?php echo $post['dateN']?>
                </span>

            </div>
        </div>

        <?php }} ?>
    </div>



    <div class="title d-flex p-1 mar-60">
        <h6 class=" pr-3 font-weight-bold"> اقرأ أيضا </h6>
        <button class="more px-2">المزيد <i class="fas fa-chevron-left"></i></button>
    </div>
    <?php
                    $sql="SELECT * FROM news ORDER BY RAND() LIMIT 1";
                    $result=mysqli_query($conn,$sql);
                     if((mysqli_num_rows($result) )> 0){
                     while($post =mysqli_fetch_assoc($result)){
                    ?>
    <div class="news-box-related box">
        <div class="travel-box  pt-2 ">
            <div class="travel-img">
                <img src="news-cpanel/assets/images/news/<?php echo $post['img_news']?>" class="img-fluid w-100" alt="">
            </div>
            <div class="travel-text   pr-1 ">

                <h6 class="pt-1 mb-0 font-weight-bold"><?php echo $post['title']?> </h6>
                <span class="dateN">
                    <i class="fas fa-calendar-alt ml-2  pb-2"></i><?php echo $post['dateN']?>
                </span>
            </div>
        </div>
        <?php }} ?>
        <?php
                       $sql="SELECT * FROM news ORDER BY RAND() LIMIT 3";
                    $result=mysqli_query($conn,$sql);
                     if(mysqli_num_rows($result) > 0){
                     while($post =mysqli_fetch_assoc($result)){
                    ?>
        <div class="relate-box mt-30 d-flex">
            <div class="relate-img col-md-6 ">
                <img src="news-cpanel/assets/images/news/<?php echo $post['img_news']?>" class="img-fluid " alt="">
            </div>
            <div class="relate-text  mt-1">

                <h6><?php echo $post['title']?>
                </h6>
                <span class="date font-weight-bold">
                    <i class="fas fa-calendar-alt ml-2"></i></span><?php echo $post['dateN']?>
                </span>

            </div>
        </div>

        <?php }} ?>
    </div>
</div>
