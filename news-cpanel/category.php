<?php 
ob_start();
include 'mainLayout.php';
$pagetitle="عرض الاخبار";
$id=$_GET['id'];

/*
**DELETE news
 */
 if(isset($_GET['del'])){
  $id=$_GET['del'];
  $sql="DELETE FROM news WHERE id=$id ";
  $result=mysqli_query($conn,$sql);
  header("location:showNews.php");
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
                            <li class="breadcrumb-item active" aria-current="page"> عرض الاخبار </li>
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
                        <h4 class="card-title">الاخبار</h4>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>

                                        <th>عنوان الخبر</th>
                                        <th>صورة</th>
                                        <th>الكلمات الدلالية</th>

                                        <th>القسم</th>
                                        <th> تاريخ النشر</th>
                                        <th>لعمليات</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                    $sql ="SELECT * FROM news WHERE category_id='$id'";
                                    $result=mysqli_query($conn,$sql);
                                    while($new=mysqli_fetch_assoc($result)){
                                    
                                    ?>

                                    <tr>

                                        <td><a href="../post.php?id=<?php echo $new['id']?>" target="_blank" class="font-bold link"><?php echo $new['title']?></a></td>
                                        <td><img src="assets/images/news/<?php echo $new['img_news']?>" height="100px" width="100px"></td>
                                        <td>
                                            <?php echo $new['meta_data'];?>
                                        </td>
                                        <?php 
                                        $cat_id=$new['category_id'];
                                         $q ="SELECT * from categories WHERE id ='$cat_id'";
                                        $r=mysqli_query($conn,$q);
                                        $ca=mysqli_fetch_assoc($r);
                                        ?>
                                        <td><?php echo $ca['name']?></td>
                                        <td><?php echo $new['dateN'];?></td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ti-settings"></i>
                                                </button>
                                                <div class="dropdown-menu animated slideInUp" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 35px, 0px);">
                                                    <a class="dropdown-item" href="addNew.php?edit=<?php echo $new['id'];?>"><i class="ti-pencil-alt"></i> Edit</a>
                                                    <a class="dropdown-item" id="sa-params" href="showNews.php?del=<?php echo $new['id']?>" onclick="return confirm('هل انت متاكد من حدف الخبر !')"><i class="ti-trash"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <?php }?>


                                </tbody>
                                <tfoot>
                                    <tr>
                                    <tr>

                                        <th>عنوان الخبر</th>
                                        <th>صورة</th>
                                        <th>الكلمات الدلالية</th>

                                        <th>القسم</th>
                                        <th> تاريخ النشر</th>
                                        <th>لعمليات</th>
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
