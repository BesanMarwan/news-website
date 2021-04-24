<?php 
ob_start();
include 'mainLayout.php';

/*
**DELETE CATEGORY
 */
 if(isset($_GET['del'])){
  $id=$_GET['del'];
  $sql="DELETE FROM users WHERE id=$id ";
  $result=mysqli_query($conn,$sql);
  header("location:showUsers.php");
}
?>





<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 align-self-center">
                <div class="d-flex align-items-center justify-content-start">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"> عرض المستخدمين </li>
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
        <!-- basic table -->
       
       <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">المستخدمين </h4>
                                
                                <div class="table-responsive">
                                    <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="zero_config_length"><label>عرض <select name="zero_config_length" aria-controls="zero_config" class="form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> سجلات</label></div></div><div class="col-sm-12 col-md-6"><div id="zero_config_filter" class="dataTables_filter"><label>بحث:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="zero_config"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="zero_config" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
                                        <thead>
                                            <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 0px;">اسم المستخدم</th><th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 0px;">الاايميل</th><th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 0px;">الصوره الشخصية </th><th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 0px;">الصلاحيات</th><th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 0px;"> العمليات</th> </tr>
                                        </thead>
                                        <tbody>
                                     
                                            
                                                                                <?php 
                                    $sql ="SELECT * FROM users";
                                    $result=mysqli_query($conn,$sql);
                                    $users=mysqli_num_rows($result);
                                    while($user=mysqli_fetch_assoc($result)){?>

                                        <tr role="row" class="odd">
                                                <td class="sorting_1"><a href="user-profile.php?id=<?php echo $user['id']?>"> <?php  echo $user['username']?></a></td>
                                                <td><?php echo $user['email']?></td>
                                                <td><img src="<?php echo $user['profile_user']?>" class="img-fluid" width="100px" height"100px"></td>
                                                <td><?php echo $user['role']?></td>
                                                <td> <div class="btn-group">
                                                <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ti-settings"></i>
                                                </button>
                                                <div class="dropdown-menu animated slideInUp" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 35px, 0px);">
                                                    <a class="dropdown-item" href="editRole.php?editRole=<?php echo $user['id']?> "><i class="ti-pencil-alt"></i> تغيير الصلاحيات</a>
                                                    <a class="dropdown-item" id="sa-params"
                                                      href="showUsers.php?del=<?php echo $user['id']?>" onclick="return confirm('هل انت متاكد من حدف اليوزر !')"><i class="ti-trash"></i> حدف</a>
                                                </div>
                                            </div></td>
                                            </tr>
                                        <?php  } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr><th rowspan="1" colspan="1">الاسم </th><th rowspan="1" colspan="1">الايميل</th><th rowspan="1" colspan="1">الصوره الشخصية</th><th rowspan="1" colspan="1">الصلاحيات</th><th rowspan="1" colspan="1"> العمليات</th></tr>
                                        </tfoot>
                                    </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="zero_config_info" role="status" aria-live="polite">عرض 1-10 من  <?php echo $users?></div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="zero_config_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="zero_config_previous"><a href="#" aria-controls="zero_config" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="zero_config" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="zero_config" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="zero_config" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="zero_config" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="zero_config" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="zero_config" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="zero_config_next"><a href="#" aria-controls="zero_config" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
</div>






<?php 
include 'footer.php';
?>
