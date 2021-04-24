<?php
include 'mainLayout.php';
$pageTitle ="صندوق الرسائل المرسلة";
$id=$_GET['id'];
if(isset($_GET['del'])){
  $id=$_GET['del'];
  $sql="DELETE FROM contact WHERE id=$id ";
  $result=mysqli_query($conn,$sql);
  header("location:emails.php");
}
?>

<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Email App Part -->
    <!-- ============================================================== -->
    <div class="email-app">
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Part  Mail detail -->
        <!-- ============================================================== -->

        <?php $sql="SELECT * FROM contact WHERE id='$id'";
                                $result=mysqli_query($conn,$sql);
                                 while($msg=mysqli_fetch_assoc($result)){?>

        <div class="col-md-12 mail-details bg-white" style="">
            <div class="card-body bg-light">
                <a class="btn btn-secondary" id="back_to_inbox" onclick="window.history.go(-1); return false;" class="btn btn-outline-secondary font-18 m-r-10"><i class="mdi mdi-arrow-left " style="color:#fff"></i></a>
                <div class="btn-group m-r-10" role="group" aria-label="Button group with nested dropdown">

                    <a class="btn btn-danger" href="emails.php?del=<?php echo $msg['id'] ?>" onclick="return confirm('هل انت متاكد من حدف  الرسالة !')"><i class="mdi mdi-delete"></i></a>
                </div>

            </div>
            <div class="card-body border-bottom">
                <h4 class="m-b-0"><?php echo $msg['subject']?></h4>
            </div>
            <div class="card-body border-bottom">
                <div class="d-flex no-block align-items-center m-b-40">
                    <div class="m-r-10"><img src="assets/images/users/1.jpg" alt="user" class="rounded-circle" width="45"></div>
                    <div class="">
                        <h5 class="m-b-0 font-16 font-medium"><?php echo $msg['name']?> <small><?php echo $msg['email']?></small></h5><span></span>
                    </div>
                </div>
                <h4 class="m-b-15">مرحبا ،</h4>
                <p><?php echo $msg['message']?>.</p>
            </div>
            <!--<div class="card-body">
     
                        <div class="border m-t-20 p-15">
                            <p class="p-b-20">click here to <a href="javascript:void(0)">Reply</a> or <a href="javascript:void(0)">Forward</a></p>
                        </div>
                    </div>-->
        </div>
    </div><?php } ?>
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
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<?php
include 'footer.php';
?>
