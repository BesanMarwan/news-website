<?php
include'meta-head.php';
 include 'main-header.php';
$category=$_GET['id'];
$sql="SELECT * FROM categories WHERE id='$category'";
$result=mysqli_query($conn,$sql);
$cat=mysqli_fetch_assoc($result);
 ?>

<main>


    <div class="container">
        <div class="bredcrumb mar-60 ">
            <nav aria-label="breadcrumb ">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo' '. $cat['name']?></li>
                </ol>
            </nav>
        </div>
        <div class="row d-flex ">
            <?php 
            	$sql="SELECT * FROM news WHERE category_id='$category'";
            	$result=mysqli_query($conn,$sql);
            	while($post=mysqli_fetch_assoc($result)){
                ?>

            <div class="col-md-4">
                <a href="post.php?id=<?php echo $post['id']?>">
                    <div class="new-box shadow rounded pb-2 mt-30 ">
                        <div class="img-box">
                            <div class="img-box">
                                <div class="img-new">
                                    <img src="news-cpanel/assets/images/news/<?php echo $post['img_news']?>" alt="News picture" class="img-fluid w-100" title="picture news">
                                </div>
                                <div class="img-text pr-2">
                                    <span class="date">
                                        <i class="fas fa-calendar-alt ml-2"></i><?php echo $post['dateN']?>
                                    </span>
                                    <a href="post.php?id=<?php echo $post['id']?>">
                                        <h6 class="">
                                            <?php echo $post['title'].'.'?>

                                        </h6>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
</main>

<?php
include 'main-footer.php';
include 'script-footer.php';
?>
