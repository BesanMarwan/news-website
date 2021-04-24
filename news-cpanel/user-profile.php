<?php
ob_start();
include 'mainLayout.php';
$id=$_GET['id'];
if(isset($_POST['update'])){
	$name=htmlspecialchars(tirm($_POST['name']));
    $username=htmlspecialchars(tirm($_POST['username']));
	$email=htmlspecialchars(trim($_POST['email']));
	$password=sha1(htmlspecialchars(trim($_POST['password'])));
	$bio=htmlspecialchars(tirm($_POST['bio']));
	$profile='';

  if (is_uploaded_file($_FILES['uploadfile']['tmp_name'])){
  $profile       =$_FILES["uploadfile"]["name"];
  $filearr       =explode('.', $profile);
  $ext           =end($filearr);
  $profile       = 'assets/images/users/'.time().'.'.$ext;
  $tempname      =$_FILES['uploadfile']['tmp_name'];  
  $profile       = "assets/images/users/".$profile;
  move_uploaded_file($tempname, $profile);
}
$sql="UPDATE users SET name='$name' , username='$username', email='$email', bio='$bio',profile_user='$profile' WHERE id='$id'";
if(mysqli_query($conn,$sql)){
	$msg="تم التحديث بنجاح ";
	$class="success";

}else{
	$msg="فشل التحديث !";
	$class="danger";

}


}
?>
<!-- ==================================================-->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">البروفايل</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.php">الرئيسية </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">البروفايل</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <?php $user_id=$_GET['id'];
                    	$sql="SELECT * FROM users WHERE id='$user_id'";
                    	      $result=mysqli_query($conn,$sql);
                    	      $user=mysqli_fetch_assoc($result);?>
                <div class="card">
                    <div class="card-body">
                        <center class="m-t-30"> <img src="<?php echo $user['profile_user']?>" class="rounded-circle" width="150" />
                            <h4 class="card-title m-t-10"><?php echo $user['name']?></h4>
                            <h6 class="card-subtitle"><?php  echo $user['bio']?></h6>
                        </center>
                    </div>
                    <div>
                        <hr>
                    </div>
                    <div class="card-body"> <small class="text-muted">البريد الالكتروني</small>
                        <h6><?php echo $user['email']?></h6>
                    </div>


                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <!-- Tabs -->
                    <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-timeline" aria-selected="true">المنشورات التي نشرتها</a>
                        </li>
                        <?php if($_SESSION['id']==$_GET['id']){ ?>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">الاعدادات</a>
                        </li>
                        <?php } ?>
                    </ul>

                    <!-- Tabs -->
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
                            <?php if(isset($msg)){ ?>
                            <div class="alert alert-<?php echo $class ?> ">
                                <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
                                <?php echo $msg ?>
                            </div>
                            <?php } ?>
                            <div class="card-body">
                                <div class="profiletimeline m-t-0">
                                    <?php 
                                        	$sql="SELECT * FROM news WHERE user_id='$user_id' ORDER BY id DESC LIMIT 5";
                                        	 $result=mysqli_query($conn,$sql);
                                        	 if(mysqli_num_rows($result)>0){
                                        	 while($post=mysqli_fetch_assoc($result)){?>
                                    <div class="sl-item">
                                        <div class="sl-left"> <img src="assets/images/news/<?php echo $post['img_news']?>" width="100px" height="50px" alt="user" class="" /> </div>
                                        <div class="sl-right">
                                            <div>
                                                <h4 class="font-weight-bold"><a href="../post.php?id=<?php echo $post['id']?>" class="link"><?php echo $post['title']?></a></h4>
                                                <p><?php echo strlen($post['content'])>250? substr($post['content'],0,400).'...': $post['content]']?></p>

                                                <div class="like-comm"> <a href="javascript:void(0)" class="link m-r-10"> <i class="mdi mdi-comment  mr-1"></i>
                                                        2 تعليق</a> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <?php }}?>



                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                            <div class="card-body">
                                <form class="form-horizontal form-material" method="post" action="" enctype="multipart/form-data">
                                    <input type="hidden" value="<?php  echo $id?>">
                                    <div class="form-group">

                                        <label class="col-md-12">الاسم </label>
                                        <div class="col-md-12">
                                            <input type="text" name="name" placeholder="<?php echo $user['name']?>" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12"> اسم مختصر</label>
                                        <div class="col-md-12">
                                            <input type="text" name="username" placeholder="<?php echo $user['username']?>" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">البريد الالكتروني</label>
                                        <div class="col-md-12">
                                            <input type="email" placeholder="<?php echo $user['email']?>" class="form-control form-control-line" name="email" id="example-email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">كلمة السر</label>
                                        <div class="col-md-12">
                                            <input type="password" value="password" name="password" class="form-control form-control-line">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">نبذة </label>
                                        <div class="col-md-12">
                                            <textarea rows="5" class="form-control form-control-line" name="bio"><?php echo $user['bio']?>
                                                    </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">الصوره الشخصية</label>
                                        <div class="col-md-12">
                                            <input type="file" class="form-control form-control-line" name="uploadfile">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success" type="submit" name="update">تحديث المعلومات</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- Row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<?php include 'footer.php';  ?>
