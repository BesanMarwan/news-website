<?php
include 'mainLayout.php';
$pageTitle ="صندوق الرسائل المرسلة";
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
        <!-- Left Part -->
        <!-- ============================================================== -->
        <!--  <div class="left-part">
                    <a class="ti-menu ti-close btn btn-success show-left-part d-block d-md-none" href="javascript:void(0)"></a>
                    <div class="scrollable" style="height:100%;">
                                                <div class="divider"></div>
                        <ul class="list-group">
                            <li>
                                <small class="p-15 grey-text text-lighten-1 db">الملفات</small>
                            </li>
                            <?php $sql="SELECT * FROM contact";
                            	$result=mysqli_query($conn,$sql);
                            	$msg_new=mysqli_num_rows($result);
?>
                            <li class="list-group-item">
                                <a href="javascript:void(0)" class="active list-group-item-action"><i class="mdi mdi-inbox"></i> الوارد <span class="label label-success float-right"><?php echo $msg_new?></span></a>
                            </li>
                             <li class="list-group-item">
                                <a href="javascript:void(0)" class="active list-group-item-action"><i class="mdi mdi-inbox"></i> المفضلة </a>
                            </li>

                                                       <li class="list-group-item">
                                <hr>
                            </li>
                          
                            <li class="list-group-item">
                                <a href="javascript:void(0)" class="list-group-item-action"> <i class="mdi mdi-delete"></i> سلة المحدوفات </a>
                            </li>
                           
                            
                                                </ul>
                    </div>
                </div>-->
        <!-- ============================================================== -->
        <!-- Right Part -->
        <!-- ============================================================== -->
        <div class=" col-md-12  mail-list bg-white">
            <div class="p-15 b-b">
                <div class="d-flex align-items-center">
                    <div>
                        <h4>صنوق الرسائل </h4>
                        <span>يحتوي على جميع الرسائل المررسله </span>
                    </div>
                    <!-- <div class="ml-auto">
                                <input placeholder="Search Mail" id="" type="text" class="form-control">
                            </div>-->
                </div>
            </div>
            <!-- Action part -->
            <!-- Button group part -->
            <div class="bg-light p-15 d-flex align-items-center do-block">
                <div class="btn-group m-t-5 m-b-5">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input sl-all" id="cstall">
                        <label class="custom-control-label" for="cstall">تحديد الكل</label>
                    </div>
                </div>
                <div class="ml-auto">
                    <div class="btn-group m-r-10" role="group" aria-label="Button group with nested dropdown">
                        <button type="button" class="btn btn-outline-secondary font-18" onclick="location.reload();"><i class="mdi mdi-reload"></i></button>

                        <button type="button" class="btn btn-outline-secondary font-18"><i class="mdi mdi-delete"></i></button>
                    </div>
                </div>
            </div>
            <!-- Action part -->
            <!-- Mail list-->
            <div class="table-responsive">
                <table class="table email-table no-wrap table-hover v-middle">
                    <tbody>
                        <?php $sql="SELECT * FROM contact";
                            	$result=mysqli_query($conn,$sql);
                            	while($cont=mysqli_fetch_assoc($result)){?>
                        <!-- row -->
                        <tr class="<?php echo ($cont['read']==0)?'unread':''?>">
                            <!-- label -->
                            <td class="chb">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="cst1">
                                    <label class="custom-control-label" for="cst1">&nbsp;</label>
                                </div>
                            </td>
                            <!-- star -->
                            <!-- User -->
                            <td class="user-image"><img src="assets/images/users/1.jpg" alt="user" class="rounded-circle" width="30"></td>
                            <td class="user-name">
                                <h6 class="m-b-0"><?php echo $cont['name']?></h6>
                            </td>
                            <!-- Message -->
                            <td class="max-texts"> <a class="link" href="email-details.php?id=<?php echo $cont['id']?>"> <span class="blue-grey-text text-darken-4"><?php echo strlen($cont['subject'])>100 ? substr($cont['subject'],0,100).'...': $cont['subject']?></td>
                            <!-- Attachment -->
                            <!-- Time -->
                            <td class="time"><?php $cont['time']?></td>
                        </tr>
                        <?php }?>



                    </tbody>
                </table>
            </div>
            <div class="p-15 m-t-30">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item"><a class="page-link" href="javascript:void(0)">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0)">1</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0)">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Part  Mail detail -->
        <!-- ============================================================== -->
        <div class="right-part mail-details bg-white" style="display: none;">
            <div class="card-body bg-light">
                <button type="button" id="back_to_inbox" class="btn btn-outline-secondary font-18 m-r-10"><i class="mdi mdi-arrow-left"></i></button>
                <div class="btn-group m-r-10" role="group" aria-label="Button group with nested dropdown">

                    <button type="button" class="btn btn-outline-secondary font-18"><i class="mdi mdi-delete"></i></button>
                </div>

            </div>
            <?php $sql="SELECT * FROM contact";
                            	$result=mysqli_query($conn,$sql);
                                 while($msg=mysqli_fetch_assoc($result)){?>
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
