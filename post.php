<?php
include'meta-head.php';
 include 'main-header.php';
 $post_id=$_GET['id'];

 $visitor_ip=$_SERVER['REMOTE_ADDR'];

 $sql="SELECT * FROM viewer WHERE  post_id='$post_id'";
 $result=mysqli_query($conn,$sql);
 $visitor=mysqli_num_rows($result);
 $sql="UPDATE news SET view='$visitor' WHERE id='$post_id'";
 $result=mysqli_query($conn,$sql);


 $sql="SELECT * FROM viewer WHERE ip_address='$visitor_ip' AND post_id='$post_id'";
 $result=mysqli_query($conn,$sql);
 $total_visitor=mysqli_num_rows($result);
 if($total_visitor<1){
      $sql = "INSERT INTO viewer (ip_address,post_id) VALUES ('$visitor_ip','$post_id')";
      $result=mysqli_query($conn,$sql);
      $visitor++;
       $sql="UPDATE news SET view='$visitor' WHERE id='$post_id'";
 $result=mysqli_query($conn,$sql);

 }
 ?>
 <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/ar_AR/sdk.js#xfbml=1&version=v10.0&appId=533194210965005&autoLogAppEvents=1" nonce="GD8hEuOo"></script>

    <main>


        <div class="container">
            <div class="bredcrumb mar-60">
                <nav aria-label="breadcrumb ">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">الاخبار</li>
                    </ol>
                </nav>
            </div>
            <div class="row ">
                <div class="col-md-8">
                <?php
                $sql="SELECT * FROM news WHERE id='$post_id'";
                $result=mysqli_query($conn,$sql);
                $post=mysqli_fetch_assoc($result);
                ?>
                <?php $category=$post['category_id']?>    
                                <div class="post-box-lg mt-30">
                        <h3 class="mb-30"><?php echo $post['title']?></h3>

                        <div class="img-post">
                            <img src="news-cpanel/assets/images/news/<?php echo $post['img_news']?>" class="img-fluid w-100" alt="">
                        </div>
                       <!-- <p class="top-picture p-2">الرئيس عباس وأعضاء اللجنة المركزية لحركة فتح</p>-->

                        <div class="text-post  ">


                            <div class="share d-flex justify-content-between">
                                <span class="date-publish pr-1 mt-1">تاريخ النشر : <?php ECHO $post['dateN']?></span>

                                <div class=" social-sh justify-content-end share-social-info pl-2">

                                    <span>مشاركة عبر :</span>
                                    <a href="#"><i class="fa fa-facebook" style="padding-right:14px"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="clear-fix"></div>
                            <p class="px-2 py-3 font-size-16"><?php echo $post['content']?>

                            </p>

                        </div>

                        <hr>

                        <div class="row container">
                              <?php 
                         $sql="SELECT * FROM news 
                        LEFT JOIN users ON news.user_id= users.id";
                        $result=mysqli_query($conn,$sql);
                        $author=mysqli_fetch_assoc($result);

                            ?>
                            <div class="author-box d-flex mt-30 mb-30 mr-20  ">
                                <div class=" col-md-3 auther-img">
                                    <img src="news-cpanel/<?php echo $author['profile_user']?>" height="120px " width="120px" alt="auther picture profile" class="img-fluid ">

                                </div>
                          
                                <div class="post-author-desc pl-4">
                                    <a href="#" class="author-name"><?php echo $author['name']?></a>
                                       <p><?php echo $author['bio']?></p>
                                        <div class="post-author-social-info">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-pinterest"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-dribbble"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Contenedor Principal -->
                    <div class="comments-container mt-30 mb-30">
                        <h4>التعليقات </h4>
                        <div class="fb-comments" data-href="http://localhost/turk-ecno/post.php" data-width="" data-numposts=""></div>

                    </div>
                </div>
                <?php include 'sidebar.php'; ?>


            </div>
        </div>
    </main>
    <?php include 'main-footer.php';
    include 'script-footer.php'; ?>