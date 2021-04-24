   <?php
   include 'meta-head.php';
   include 'main-header.php';
   ?>
   <main>
       <div class="slider  mt-30">
           <div class="container full ">
               <img src="assets/images/5VuE0.jpeg" class="img-fluid w-100" alt="turkey pazzar">
           </div>
       </div>
       <!--    start  news section -->
       <section class="news container mt-30">
           <div class="row">
               <div class="col-md-4">
                   <div class="block-content latest  shadow">
                       <div class="block-title pl-2 ">
                           <h5 class="p-3 font-weight-bold">آخر الاخبار</h5>
                       </div>
                       <?php
                        $sql="SELECT * FROM news 
                        LEFT JOIN categories ON news.category_id= categories.id
                        ORDER BY news.id DESC LIMIT 5";
                        $result =mysqli_query($conn, $sql);
                        while($post=mysqli_fetch_assoc($result)){
                        ?>
                       <div class="latest-box d-flex">
                           <div class="latest-img col-md-5">
                               <img src="news-cpanel/assets/images/news/<?php echo $post['img_news']?>" class="img-fluid " alt="">
                           </div>
                           <div class="new-box-text col-md-7">

                               <span class="list-1__date font-weight-bold type"><?php echo $post['name']?></span>

                               <a href="post.php?id=<?php echo $post['id']?>">
                                   <h6 class="pt-1 text-bold"> <?php echo $post['title']?></h6>
                               </a>
                           </div>
                       </div>
                       <hr>
                       <?php }?>

                   </div>
               </div>
               <div class="col-md-5">
                   <?php
                    $sql="SELECT * FROM news ORDER BY RAND() LIMIT 1";
                    $result=mysqli_query($conn,$sql);
                     if((mysqli_num_rows($result) )> 0){
                     while($post =mysqli_fetch_assoc($result)){
                    ?>
                   <div class="new-box-lg shadow rounded">
                       <div class="img-new">
                           <img src="news-cpanel/assets/images/news/<?php echo $post['img_news']?>" alt="News picture" class="img-fluid w-100" title="picture news">
                       </div>
                       <div class="new-text px-1">
                           <span class="date font-weight-bold">
                               <i class="fas fa-calendar-alt ml-2"></i>,<?php echo $post['dateN']?>
                           </span>
                           <a href="post.php?id=<?php echo $post['id']?>">
                               <h5 class="font-weight-bold text-white mb-0"><?php echo $post['title']?></h5>
                           </a>
                           <p class="pt-1"><?php echo strlen($post['content'])>250? substr($post['content'],0,255).'...': $post['content]']?>
                           </p>
                       </div>
                   </div>
                   <?php }} ?>
                   <div class="adv mt-30">
                       <img src="assets/images/k7UpZ.png" class="img-fluid h-100" alt="">
                   </div>

               </div>
               <div class="col-md-3">
                   <div class="row d-flex justify-content-between">
                       <?php
                    $sql="SELECT * FROM news ORDER BY RAND() LIMIT 2";
                    $result=mysqli_query($conn,$sql);
                     if((mysqli_num_rows($result) )> 0){
                     while($post =mysqli_fetch_assoc($result)){
                    ?>
                       <div class="col-md-12 mb-30">
                           <div class="new-box shadow rounded pb-2">
                               <div class="img-box">
                                   <div class="img-box">
                                       <div class="img-new">
                                           <img src="news-cpanel/assets/images/news/<?php echo $post['img_news']?>" alt="News picture" class="img-fluid w-100" title="picture news">
                                       </div>
                                       <div class="img-text pr-2">
                                           <span class="date">
                                               <i class="fas fa-calendar-alt ml-2"></i><?php echo $post['dateN']?>
                                           </span>
                                           <a href="">
                                               <h6 class="">
                                                   <?php echo $post['title']?>

                                               </h6>
                                           </a>

                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <?php }} ?>
                   </div>
               </div>
           </div>
       </section>

       <!--    end cooktil news section -->

       <!--    start ecnomics news section -->
       <div class="ecnomic-bg mar-30">
           <section class="ecnomic container  ">
               <div class="row ">
                   <div class="col-md-6">
                       <div class="title d-flex p-1">
                           <h4 class="pr-3 font-weight-bold">اقتصاد </h4>
                           <a href="category.php?id=3">
                               <button class="more px-2">المزيد <i class="fas fa-chevron-left"></i></button></a>
                       </div>
                       <?php
                        $sql="SELECT * FROM news WHERE category_id=3 ORDER BY id ASC LIMIT 1";
                $result =mysqli_query($conn,$sql);
                if((mysqli_num_rows($result) )> 0){
                while($post=mysqli_fetch_assoc($result)){
                ?>

                       <div class="ecno-post shadow pb-2 rounded">
                           <div class="ecno-img">
                               <img src="news-cpanel/assets/images/news/<?php echo $post['img_news']?>" class="img-fluid" alt="">
                           </div>
                           <div class="ecno-text pr-2">

                               <a href="post.php?id=<?php echo $post['id']?>">
                                   <h6 class="pt-1 font-weight-bold">
                                       <?php echo $post['title']?>
                                   </h6>
                               </a>

                               <p class="mb-0"> <?php echo strlen($post['content'])>320? substr($post['content'],0,300).'...': $post['content]']?>
                               </p>
                               <span class="date font-weight-bold">
                                   <i class="fas fa-calendar-alt ml-2"></i><?php echo $post['dateN']?>
                               </span>
                           </div>
                       </div>
                       <?php }} ?>
                       <div class="row d-flex mt30">
                           <?php
                        $sql="SELECT * FROM news WHERE category_id=3 ORDER BY id DESC LIMIT 2";
                $result =mysqli_query($conn,$sql);
                if((mysqli_num_rows($result) )> 0){
                while($post=mysqli_fetch_assoc($result)){
                ?>
                           <div class="col-md-6  ">
                               <div class="ecno-post ecno1 shadow pb-2 rounded">
                                   <div class="ecn-img">
                                       <img src="news-cpanel/assets/images/news/<?php echo $post['img_news']?>" class="img-fluid w-100" alt="">
                                   </div>
                                   <div class="ecno-text pr-2">
                                       <span class="date font-weight-bold">
                                           <i class="fas fa-calendar-alt ml-2 pt-2"></i><?php echo $post['dateN']?>
                                       </span>
                                       <a href="post.php?id=<?php echo $post['id']?>">
                                           <h6 class="pt-1"><?php echo $post['title']?></h6>
                                       </a>
                                   </div>

                               </div>

                           </div>
                           <?php }} ?>

                       </div>
                   </div>
                   <div class="col-md-6">
                       <div class="title d-flex p-1">
                           <h4 class="pr-3 font-weight-bold">اراء ومختارات </h4>
                           <a href="category.php?id=9">

                               <button class="more px-2">المزيد <i class="fas fa-chevron-left"></i></button></a>
                       </div>
                       <?php
                        $sql="SELECT * FROM news WHERE category_id=9 ORDER BY id ASC LIMIT 1";
                $result =mysqli_query($conn,$sql);
                if((mysqli_num_rows($result) )> 0){
                while($post=mysqli_fetch_assoc($result)){
                ?>

                       <div class="ecno-post shadow pb-2 rounded">
                           <div class="ecno-img">
                               <img src="news-cpanel/assets/images/news/<?php echo $post['img_news']?>" class="img-fluid" alt="">
                           </div>
                           <div class="ecno-text pr-2">
                               <a href="post.php?id=<?php echo $post['id']?>">
                                   <h6 class="pt-1 font-weight-bold">
                                       <?php echo $post['title']?>
                                   </h6>
                               </a>

                               <p class="mb-0"> <?php echo strlen($post['content'])>320? substr($post['content'],0,300).'...': $post['content]']?>
                               </p>
                               <span class="date font-weight-bold">
                                   <i class="fas fa-calendar-alt ml-2"></i><?php echo $post['dateN']?>
                               </span>
                           </div>
                       </div>
                       <?php }} ?>
                       <div class="row d-flex mt30">
                           <?php
                        $sql="SELECT * FROM news WHERE category_id=9 ORDER BY id DESC LIMIT 2";
                $result =mysqli_query($conn,$sql);
                if((mysqli_num_rows($result) )> 0){
                while($post=mysqli_fetch_assoc($result)){
                ?>
                           <div class="col-md-6  ">
                               <div class="ecno-post ecno1 shadow pb-2 rounded">
                                   <div class="ecn-img">
                                       <img src="news-cpanel/assets/images/news/<?php echo $post['img_news']?>" class="img-fluid w-100" alt="">
                                   </div>
                                   <div class="ecno-text pr-2">
                                       <span class="date font-weight-bold">
                                           <i class="fas fa-calendar-alt ml-2 pt-2"></i><?php echo $post['dateN']?>
                                       </span>
                                       <a href="post.php?id=<?php echo $post['id']?>">
                                           <h6 class="pt-1"><?php echo $post['title']?></h6>
                                       </a>
                                   </div>

                               </div>

                           </div>
                           <?php }} ?>

                       </div>
                   </div>
               </div>
           </section>
       </div>
       <!--    end ecnomics news section -->

       <!--       start read news section-->
       <section class="read mar-60">
           <div class="container">
               <div class="read-title">
                   <h4>الاكثر قراءة</h4>
               </div>

               <div class="row d-flex" style="width:99%;
                margin:0 auto">
                   <?php
                $sql="SELECT * FROM news ORDER BY view DESC LIMIT 3";
                $result =mysqli_query($conn,$sql);
                if((mysqli_num_rows($result) )> 0){
                while($post=mysqli_fetch_assoc($result)){
                ?>
                   <div class="col-md-4">
                       <div class="read-box">
                           <div class="read-img">
                               <img src="news-cpanel/assets/images/news/<?php echo  $post['img_news']?>" class="img-fluid w-100">
                           </div>
                           <div class="read-text px-2 py-1 pl-1">
                               <span class="type font-weight-bolder">
                                   <?php echo $post['dateN']?>
                               </span>
                               <a href="post.php?id=<?php echo $post['id']?>">
                                   <h5 class="text-white"><?php echo $post['title']?> </h5>
                               </a>
                           </div>
                       </div>
                   </div>
                   <?php } }?>

               </div>
           </div>
       </section>
       <!--       end read news section-->

       <!--       start travels news section-->
       <section class="travel mar-60 container">
           <div class="col-md-12">
               <div class="title d-flex p-1">
                   <h4 class="pr-3 font-weight-bold">سياحة وسفر </h4>
                   <a href="category.php?id=5">

                       <button class="more px-2">المزيد <i class="fas fa-chevron-left"></i></button></a>
               </div>


               <div class="row">
                   <div class="col-12 col-md-6" style="margin-right:0;">
                       <?php
                $sql="SELECT * FROM news WHERE category_id=5 ORDER BY id DESC LIMIT 1";
                $result =mysqli_query($conn,$sql);
                if((mysqli_num_rows($result) )> 0){
                while($post=mysqli_fetch_assoc($result)){
                ?>
                       <div class="travel-box-lg">
                           <div class="travel-img">
                               <img src="news-cpanel/assets/images/news/<?php echo $post['img_news']?>" class="img-fluid w-100" alt="">
                           </div>
                           <div class="travel-text pr-2">
                               <span class="date">
                                   <i class="fas fa-calendar-alt ml-2 pt-2"></i><?php echo $post['dateN']?>
                               </span>
                               <a href="post.php?id=<?php echo $post['id']?>">
                                   <h6 class="pt-1 text-white font-weight-bold"><?php echo $post['title']?>
                                   </h6>
                               </a>
                               <p class=""><?php echo strlen($post['content'])>280? substr($post['content'],0,280).'...':$post['content']?></p>
                           </div>
                       </div>
                       <?php }} ?>
                   </div>
                   <div class="col-12  col-md-3 " style="margin-right:-25px">
                       <?php
                    $sql="SELECT * FROM news WHERE category_id=5 ORDER BY RAND() LIMIT 2";
                    $result=mysqli_query($conn,$sql);
                     if((mysqli_num_rows($result) )> 0){
                     while($post =mysqli_fetch_assoc($result)){
                    ?>
                       <div class="travel-box  mb-30">
                           <div class="travel-img">
                               <img src="news-cpanel/assets/images/news/<?php echo $post['img_news']?>" class="img-fluid " alt="">
                           </div>
                           <div class="travel-text pr-1 ">

                               <a href="post.php?id=<?php echo $post['id']?>">
                                   <h6 class="pt-1 text-white mb-0 font-weight-bold"><?php echo $post['title']?>
                                   </h6>
                               </a>
                               <span class="dateN">
                                   <i class="fas fa-calendar-alt ml-2  pb-2"></i><?php echo $post['dateN']?>
                               </span>
                           </div>
                       </div>
                       <?php }} ?>

                   </div>

                   <div class="col-md-3 travel-text-box  w-100" style="margin-right:13px;">
                       <div class="travels-text-box shadow">
                           <?php
                    $sql="SELECT * FROM news WHERE category_id=5 ORDER BY id DESC LIMIT 4";
                    $result=mysqli_query($conn,$sql);
                     if((mysqli_num_rows($result) )> 0){
                     while($post =mysqli_fetch_assoc($result)){
                    ?>
                           <div class="travels-text mb-3">
                               <span class="date font-weight-bold">
                                   <i class="fas fa-calendar-alt ml-2"></i><?php echo $post['dateN'] ?>
                               </span>
                               <a href="post.php?id=<?php echo $post['id']?>">
                                   <h6 class="pt-1"><?php echo $post['title']?>
                                   </h6>
                               </a>
                           </div>
                           <hr style="width:100%;margin-right:-8px">
                           <?php }} ?>

                       </div>
                   </div>
               </div>
           </div>
       </section>
       <!--       end travels news section-->

       <!-- start estate news section-->
       <section class="estate container  mar-60">
           <div class="col-md-12 ">
               <div class="title d-flex p-1">
                   <h4 class="pr-3 font-weight-bold">عقارات </h4>
                   <a href="category.php?id=4">

                       <button class="more px-2">المزيد <i class="fas fa-chevron-left"></i></button>
                       < </div>
               </div>
               <div class="row" style="margin-right:0px;width:99.8%">

                   <?php
                $sql="SELECT * FROM news WHERE category_id=4 ORDER BY id DESC LIMIT 6";
                $result =mysqli_query($conn,$sql);
                if(($offest=mysqli_num_rows($result) )> 0){
                while($post=mysqli_fetch_assoc($result)){
                ?>
                   <div class="col-md-6">

                       <div class="estate-box mb-30 shadow d-flex">
                           <div class="estate-img">
                               <img src="news-cpanel/assets/images/news/<?php echo $post['img_news']?>" class="img-fluid" alt="">
                           </div>
                           <div class="estate-text pr-2 mt-4">

                               <a href="post.php?id=<?php echo $post['id']?>">
                                   <h6>
                                       <?php echo $post['title']?>
                                   </h6>
                               </a>
                               <span class="date font-weight-bold">
                                   <i class="fas fa-calendar-alt ml-2"></i><?php echo $post['dateN']?>
                               </span>

                           </div>
                       </div>
                   </div>
                   <?php }}?>

               </div>
       </section>
       <!-- end estate new section -->

       <!--       start technicals news section-->
       <section class="technical mar-60 container">
           <div class="col-md-12">
               <div class="title d-flex p-1">
                   <h4 class="pr-3 font-weight-bold">تقنية </h4>
                   <a href="category.php?id=1">

                       <button class="more px-2">المزيد <i class="fas fa-chevron-left"></i></button></a>
               </div>
               <div class="row">
                   <?php 
                        $sql="SELECT * FROM news WHERE category_id=1 ORDER BY id ASC LIMIT 1";
                $result =mysqli_query($conn,$sql);
                if(($offest=mysqli_num_rows($result) )> 0){
                while($post=mysqli_fetch_assoc($result)){
                ?>

                   <div class="col-md-6">
                       <div class="tech-box-lg shadow pb-2 ">
                           <div class="tech-img">
                               <img src="news-cpanel/assets/images/news/<?php echo $post['img_news']?>" class="img-fluid w-100" alt="">
                           </div>
                           <div class="travel-text pr-2 pt-2">
                               <a href="post.php?id=<?php echo $post['id']?>">
                                   <h6 class="pt-1 font-weight-bold"><?php echo $post['title']?> </h6>
                               </a>
                               <p class="pl-1 mb-2"><?php echo strlen($post['content'])>320? substr($post['content'],0,400): $post['content]']?>
                               </p>
                               <span class="date font-weight-bold">
                                   <i class="fas fa-calendar-alt ml-2 pt-1"></i><?php echo $post['dateN'] ?>
                               </span>

                           </div>
                       </div>

                   </div>

                   <?php }}?>
                   <div class="col-md-6 " style="margin-bottom:0px !important">
                       <div class="row tech" id="tech">

                           <?php 
                        $sql="SELECT * FROM news WHERE category_id=1 ORDER BY id DESC LIMIT 4";
                $result =mysqli_query($conn,$sql);
                if(($offest=mysqli_num_rows($result) )> 0){
                while($post=mysqli_fetch_assoc($result)){
                ?>
                           <div class="col-md-6">
                               <div class="tech-box tech-box-mo shadow pb-2 mb-30 ">
                                   <div class="tech-img">
                                       <img src="news-cpanel/assets/images/news/<?php echo $post['img_news']?>" class="img-fluid w-100" alt="">
                                   </div>
                                   <div class="travel-text pr-2">
                                       <span class="date font-weight-bold">
                                           <i class="fas fa-calendar-alt ml-2 pt-2"></i><?php echo $post['dateN']?>
                                       </span>
                                       <a href="post.php?id=<?php echo $post['id']?>">
                                           <h6 class="pt-1"><?php echo $post['title'] ?>
                                           </h6>
                                       </a>
                                   </div>
                               </div>

                           </div>
                           <?php }} ?>


                       </div>
                   </div>
               </div>
           </div>

       </section>
       <!--       end technicals news section-->

       <!--       start cokktil news section-->
       <section class="cooktil mar-30 container">
           <div class="col-md-12">
               <div class="title d-flex p-1">
                   <h4 class="pr-3 font-weight-bold">منوعات </h4>
                   <a href="category.php?id=">

                       <button class="more px-2">المزيد <i class="fas fa-chevron-left"></i></button></a>
               </div>
               <div class="row">
                   <div class="col-md-6">
                       <?php
                $sql="SELECT * FROM news WHERE category_id=2 ORDER BY id DESC LIMIT 4";
                $result =mysqli_query($conn,$sql);
                if(($offest=mysqli_num_rows($result) )> 0){
                while($post=mysqli_fetch_assoc($result)){
                ?>
                       <div class="estate-box mb-30 shadow d-flex">
                           <div class="estate-img">
                               <img src="news-cpanel/assets/images/news/<?php echo $post['img_news']?>" class="img-fluid" alt="">
                           </div>
                           <div class="estate-text pr-2 mt-4">

                               <a href="post.php?id=<?php echo $post['id']?>">
                                   <h6>
                                       <?php echo $post['title']?>
                                   </h6>
                               </a>
                               <span class="date font-weight-bold">
                                   <i class="fas fa-calendar-alt ml-2"></i><?php echo $post['dateN']?>
                               </span>

                           </div>
                       </div>
                       <?php }}?>


                   </div>
                   <div class="col-md-6">
                       <?php 
                        $sql="SELECT * FROM news WHERE category_id=2 ORDER BY id ASC LIMIT 1";
                $result =mysqli_query($conn,$sql);
                if(($offest=mysqli_num_rows($result) )> 0){
                while($post=mysqli_fetch_assoc($result)){
                ?>
                       <div class="cooktil-box-lg shadow ">
                           <div class="cooktil-img">
                               <img src="news-cpanel/assets/images/news/<?php echo $post['img_news']?>" class="img-fluid w-100" alt="">
                           </div>
                           <div class="cooktil-text pr-2">
                               <span class="date font-weight-bold">
                                   <i class="fas fa-calendar-alt ml-2 pt-1"></i><?php echo $post['dateN'] ?>
                               </span>
                               <a href="post.php?id=<?php echo $post['id']?>">
                                   <h6 class="pt-1 font-weight-bold"><?php echo $post['title']?> </h6>
                               </a>
                               <p class="pb-2"><?php echo strlen($post['content'])>200 ? substr($post['content'],0,357): $post['content]']?>
                               </p>
                           </div>
                       </div>
                       <?php }}?>

                   </div>
               </div>
           </div>
       </section>

       <!--       start companies news section-->
       <section class="companies container mar-30">
           <div class="col-md-12">
               <div class="title p-1 mb-0">
                   <h4 class="pr-3 font-weight-bold">شركات </h4>
                   <a href="category.php?id=6">

                       <button class="more px-2">المزيد <i class="fas fa-chevron-left"></i></button></a>

               </div>
               <div class="row container shadow rounded pt-4 pb-3" style="margin-right:0px;">
                   <?php
                $sql="SELECT * FROM news WHERE category_id=6 ORDER BY id DESC LIMIT 4";
                $result =mysqli_query($conn,$sql);
                                        if(mysqli_num_rows($result) > 0){
                while($post=mysqli_fetch_assoc($result)){
                ?>
                   <div class="col-md-3">
                       <div class="comaney-box">
                           <div class="comp-img">
                               <img src="news-cpanel/assets/images/news/<?php echo $post['img_news']?>" class="img-fluid" alt="">
                           </div>
                           <div class="comp-text">
                               <a href="post.php/<?php echo $post['id']?>">
                                   <h6 class="p-2"><?php echo $post['title'] ?>
                                   </h6>
                               </a>
                           </div>
                       </div>
                   </div>
                   <?php }} ?>
               </div>
           </div>
       </section>
       <!--       end companies news section-->

       <!--       start cars news section-->
       <section class="companies container  mar-60">
           <div class="col-md-12  ">
               <div class="title p-1 mb-0">
                   <h4 class="pr-3 font-weight-bold">سيارات </h4>
                   <a href="category.php?id=8">

                       <button class="more px-2">المزيد <i class="fas fa-chevron-left"></i></button></a>

               </div>

               <div class="row container shadow rounded pt-4 pb-3" style="margin-right:0px;">
                   <?php
                $sql="SELECT * FROM news WHERE category_id=8 ORDER BY id DESC LIMIT 4";
                $result =mysqli_query($conn,$sql);
                                        if(mysqli_num_rows($result) > 0){
                while($post=mysqli_fetch_assoc($result)){
                ?>
                   <div class="col-md-3">
                       <div class="comaney-box">
                           <div class="comp-img">
                               <img src="news-cpanel/assets/images/news/<?php echo $post['img_news']?>" class="img-fluid" alt="">
                           </div>
                           <div class="comp-text">
                               <a href="post.php?id=<?php echo $post['id']?>">
                                   <h6 class="p-2"><?php echo $post['title'] ?>
                                   </h6>
                               </a>
                           </div>
                       </div>
                   </div>
                   <?php }} ?>



               </div>
           </div>
       </section>
       <!--       end cars news section-->

   </main>


   <?php
  include 'main-footer.php';
  include 'script-footer.php';
  ?>
