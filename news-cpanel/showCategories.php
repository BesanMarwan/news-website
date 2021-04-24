<?php 
ob_start();
include 'mainLayout.php';

/*
**DELETE CATEGORY
 */
 if(isset($_GET['del'])){
  $id=$_GET['del'];
  $sql="DELETE FROM categories WHERE id=$id ";
  $result=mysqli_query($conn,$sql);
  header("location:showCategories.php");
}
?>

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
                            <li class="breadcrumb-item active" aria-current="page"> عرض الاقسام</li>
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
                        <h4 class="card-title">الاقسام</h4>
                        <div class="row m-t-40">
                            <!-- Column -->
                            <?php 
                                    $sql ="SELECT * FROM categories";
                                    $result=mysqli_query($conn,$sql);
                                          $cat_num=mysqli_num_rows($result);
                            ?>
                            <div class="col-md-6 col-lg-3 col-xlg-3">
                                <div class="card card-hover">
                                    <div class="box bg-info text-center">
                                        <h1 class="font-light text-white"><?php echo $cat_num?></h1>
                                        <h6 class="text-white"> مجموع الاقسام</h6>
                                    </div>
                                </div>
                            </div>
                            <?php 
                                    $sql ="SELECT * FROM categories WHERE status =1";
                                    $result=mysqli_query($conn,$sql);
                                          $cat1_num=mysqli_num_rows($result);
                            ?>
                            <div class="col-md-6 col-lg-3 col-xlg-3">
                                <div class="card card-hover">
                                    <div class="box bg-success text-center">
                                        <h1 class="font-light text-white"><?php echo $cat1_num ?></h1>
                                        <h6 class="text-white">الاقسام المفعلة</h6>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <?php 
                                    $sql ="SELECT * FROM categories WHERE status =0";
                                    $result=mysqli_query($conn,$sql);
                                          $cat0_num=mysqli_num_rows($result);
                            ?>

                            <div class="col-md-6 col-lg-3 col-xlg-3">
                                <div class="card card-hover">
                                    <div class="box bg-danger text-center">
                                        <h1 class="font-light text-white"><?php echo $cat0_num ?></h1>
                                        <h6 class="text-white">الاقسام الغير مفعلة</h6>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                        </div>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>

                                        <th>اسم القسم</th>
                                        <th>الوصف</th>

                                        <th>الحالة</th>
                                        <th> العمليات</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                    $sql ="SELECT * FROM categories";
                                    $result=mysqli_query($conn,$sql);
                                    while($cat=mysqli_fetch_assoc($result)){
                                    
                                    
                                    ?>
                                    <tr>

                                        <td><?php echo $cat['id']?></td>
                                        <td><a href="category.php?id=<?php echo $cat['id']?>"> <?php echo $cat['name'];?></a></td>
                                        <td><a href="ticket-detail.html" class="font-medium link"><?php echo ($cat['description'])==''?  'لا يوجد وصف تعريفي ' :  $cat['description'];?></a></td>
                                        <td><span class="label label-<?php echo $cat['status']?'success':'danger' ?>"><?php echo $cat['status']? 'مفعل':'غير مفعل'?></span></td>


                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ti-settings"></i>
                                                </button>
                                                <div class="dropdown-menu animated slideInUp" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 35px, 0px);">
                                                    <a class="dropdown-item" href="addCategory.php?edit=<?php echo $cat['id'];?>"><i class="ti-pencil-alt"></i> Edit</a>
                                                    <a class="dropdown-item" id="sa-params" href="showCategories.php?del=<?php echo $cat['id']?>" onclick="return confirm('هل انت متاكد من حدف القسم !')"><i class="ti-trash"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <?php }?>


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>

                                        <th>اسم القسم</th>
                                        <th>الوصف</th>

                                        <th>الحالة</th>
                                        <th> العمليات</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <ul class="pagination float-right">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
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
