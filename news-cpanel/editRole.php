<?php

include 'mainLayout.php';
$pageTitle = 'تعديل صلاحية  المستخدم ';


if(isset($_GET['editRole'])){
  
  $edit_id  =$_GET['editRole'];

  $sql   ="SELECT * FROM users WHERE id =$edit_id";
  $result=mysqli_query($conn,$sql);
  $user  =mysqli_fetch_assoc($result);

   //reterive data 
  $username       =$user['username'];
  $name =$user['name'];
  $bio =$user['bio'];
  $email=$user['email'];
  $profile_user=$user['profile_user'];
  $role= $user['role'];

}
if(isset($_GET['updateRole'])){
  $role         =htmlspecialchars(trim($_GET['role']));

   $sql="UPDATE users  SET  role='$role' 
                            WHERE id =$edit_id";
         

         if(mysqli_query($conn,$sql)){
           $msg="تم تغيير الصلاحية بنجاح  ";
           $class="success";
         header('location:showUsers.php');

         }else{
              $msg="فشل  التعديل   :(";
             $class="danger";
               }
}                        

?>


<!-- Page wrapper  -->


<div class="page-wrapper" style="display: block;">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">

            <div class=" col-12 align-self-center text-bold">
                <div class="d-flex align-items-center justify-content-start">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">المستخدمين</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"> <?php echo $pageTitle ?>.</li>
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





        <div class="row">
            <div class="col-sm-12">
                <div class="card card-body">
                    <h4 class="card-title"><?php echo $pageTitle?></h4>
                    <form method="get" action="" class="form-horizontal m-t-30">
                        <?php if(isset($msg)){ ?>
                        <div class="alert alert-<?php echo $class ?> ">
                            <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
                            <?php echo $msg ?>
                        </div>
                        <?php } ?>

                        <div class="form-group mb-4">
                            <?php if($profile_user !=''){?>
                            <img src="<?php echo $profile_user?>" height="200px" width="300px" class="">
                            <?php }?>
                        </div>
                        <div class="form-group">
                            <fieldset disabled="">
                                <label for="disabledTextInput">اسم المستخدم</label>
                                <input type="text" id="disabledTextInput" value="<?php echo $name?>" class="form-control" placeholder="<?php echo $name?>">
                            </fieldset>
                        </div>
                        <div class="form-group">
                            <fieldset disabled="">
                                <label for="disabledTextInput">اسم مختصر او بديل </label>
                                <input type="text" id="disabledTextInput" value="<?php echo $username?>" class="form-control" placeholder="<?php echo $username?>">
                            </fieldset>
                        </div>
                        <div class="form-group">
                            <fieldset disabled="">
                                <label for="disabledTextInput">نبذة عن <?php echo $username?></label>
                                <textarea name="bio" class="form-control"><?php echo $bio ?></textarea>

                            </fieldset>
                        </div>
                        <div class="form-group">
                            <fieldset disabled="">
                                <label for="disabledTextInput">الايميل </label>
                                <input type="text" id="disabledTextInput" class="form-control" placeholder="<?php echo $email?>">
                            </fieldset>
                        </div>


                        <div class="form-group">
                            <label> صلاحيات المستخدم :</label>
                            <select name="role" class="custom-select col-12" id="inlineFormCustomSelect">
                                <option selected="">اختيار</option>
                                <option value="admin" <?php echo $role=='admin'? 'selected' :''?>>admin</option>
                                <option value="user" <?php echo $role=='user'? 'selected' :''?>>user</option>
                            </select>
                        </div>
                        <?php if(isset($edit_id)){ ?>
                        <input type="hidden" name="editRole" value="<?php echo $edit_id; ?>">
                        <?php } ?>
                        <button type="submit" class="btn btn-primary" name="updateRole">تعديل الصلاحية</button>
                        <a class="btn btn-danger " href="showUsers.php">تراجع</a>

                    </form>
                </div>
            </div>
        </div>
        <?php
                include 'footer.php';
                ?>
