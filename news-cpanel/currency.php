<?php 
$pageTitle="العملات النقدية ";
ob_start();
include 'mainLayout.php';
if(isset($_GET['save'])){
      $currency         = htmlspecialchars(trim($_GET['currency']));
      $equivalent       = htmlspecialchars(trim($_GET['equivalent']));
       $sql = "INSERT INTO transfers (currency,equivalent) VALUES ('$currency', '$equivalent')";

    if(mysqli_query($conn, $sql)) {
      $msg = 'تمت اضافة  العملة بنجاح :)';
      $class = 'success';
    }else {
      $msg ="حدث خلل ما . يرجي المحاولة لاحقا :( ! ";
      $class='danger';
    }
}
 $currency       ='' ;
   $equivalent='';

if(isset($_GET['edit'])){
  
  $edit_id  =$_GET['edit'];

  $sql   ="SELECT * FROM transfers WHERE id =$edit_id";
  $result=mysqli_query($conn,$sql);
  $curr  =mysqli_fetch_assoc($result);

   //reterive data 
  $currency       =$curr['currency'];
  $equivalent=$curr['equivalent'];


}
if(isset($_GET['update'])){
  $currency         =htmlspecialchars(trim($_GET['currency']));
  $equivalent  =htmlspecialchars(trim($_GET['equivalent']));


 /*$sq_check_unique  ="SELECT * FROM categories Where name='$name'";
  $sq_check_unique =mysqli_query($conn,$sql);
  if(mysqli_num_rows($sq_check_unique )==0){*/
   $sql="UPDATE transfers  SET  currency='$currency', 
                                 equivalent='$equivalent', 
                                 WHERE id =$edit_id";
         

         if(mysqli_query($conn,$sql)){
           $msg="تم التعديل ع العملة  نجاح";
           $class="success";
            $text=' ' ;
   $name=' ';
   $description=' ';

         }else{
              $msg="فشل التعديل   :(";
             $class="danger";
               }
/*} */                       
}
?>


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
                                <a href="#"><?php echo $pageTitle?></a>
                            </li>
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
        <!-- row -->
        <div class="row">

<div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $pageTitle?></h4>
                                <div id="education_fields" class=" m-t-20"></div>
                                <form class="row" method="get" action="">
                                    <div class="col-md-10">
                                     <?php if(isset($msg)){ ?>
                            <div class="alert alert-<?php echo $class ?> ">
                                <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
                                <?php echo $msg ?>
                            </div>
                        <?php } ?>
                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="currency" name="currency"value="<?php echo $currency?>" placeholder="سم العملة">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <input type="number" step=".01" class="form-control" id="equivalent" name="equivalent" value="<?php echo $equivalent?>" placeholder="تكافئ بالشيكل">
                                        </div>
                                    </div>
                                    
                             <?php if(isset($edit_id)){ ?>
                               <input type="hidden" name="editRole" value="<?php echo $edit_id; ?>">
                         <?php } ?>

                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <button class="btn btn-primary" name="<?php echo (isset($edit_id)) ?'update':'save'?>" type="submit" ><?php echo isset($edit_id)?'تعديل':'اضافة'?></button>
                                                                        <a href="currency.php" class="btn btn-danger">الغاء</a>

                                        </div>
                                    </div>
                                </form>
                                <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>اسم العملة </th>
                                        <th>تكافئ بالشيكل </th>   
                                        <th>لعمليات</th>                                 </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                    $sql ="SELECT * FROM transfers";
                                    $result=mysqli_query($conn,$sql);
                                    while($curr=mysqli_fetch_assoc($result)){                                    
                                    
                                    ?>
                                    <tr>
                                            
                                        <td><?php echo $curr['currency'];?></td>
                                        <td><?php echo $curr['equivalent']?></td>
                                                                            


                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="ti-settings"></i>
                                                </button>
                                                <div class="dropdown-menu animated slideInUp" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 35px, 0px);">
                                                    <a class="dropdown-item" href="currency.php?edit=<?php echo $curr['id'];?>"><i class="ti-pencil-alt"></i> Edit</a>
                                                    <a class="dropdown-item" id="sa-params"
                                                      href="currency.php?del=<?php echo $curr['id']?>" onclick="return confirm('هل انت متاكد من حدف لعملة  !')"><i class="ti-trash"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                <?php }?>


                                </tbody>
                                <tfoot>
                                    <tr>

                                        <th>اسم العملة </th>
                                        <th>تكافئ بالشيكل </th>
                                        <th>العمليات     </th>

                                    </tr> </tfoot>
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
<?php
include 'footer.php';?>