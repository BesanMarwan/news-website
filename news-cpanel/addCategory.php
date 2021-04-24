<?php 
include 'mainLayout.php';
$pageTitle = 'اضافى قسم';

$name        = '';
$description = '';
$active      ='';

if(isset($_GET['add'])) {
  $name       = htmlspecialchars(trim($_GET['name']));
  $description = htmlspecialchars(trim($_GET['description']));
  $status =htmlspecialchars($_GET['status']);
   
   #validate if the category exist or not
  $sq_check_unique ="SELECT * FROM categories Where name='$name'";
  $sq_check_unique =mysqli_query($conn,$sq_check_unique);
  if(mysqli_num_rows($sq_check_unique )==0){
  $sql = "INSERT INTO categories (name,description,status) VALUES ('$name', '$description','$status')";

    if(mysqli_query($conn, $sql)) {
      $msg = 'تمت اضافة القسم بنجاح :)';
      $class = 'success';
    }else {
      $msg ="حدث خلل ما . يرجي المحاولة لاحقا :( ! ";
      $class='danger';
    }
    }else{
      $msg='هذا القسم موجود بالفعل ';
      $class="warning";
    }}
   $name       =' ' ;
   $description=' ';

if(isset($_GET['edit'])){
  
  $edit_id  =$_GET['edit'];
  $pageTitle="تعديل القسم ";

  $sql   ="SELECT * FROM categories WHERE id =$edit_id";
  $result=mysqli_query($conn,$sql);
  $cate  =mysqli_fetch_assoc($result);

   //reterive data 
  $name       =$cate['name'];
  $description=$cate['description'];
  $active     =$cate['status'];


}
if(isset($_GET['update'])){
  $name         =htmlspecialchars(trim($_GET['name']));
  $description  =htmlspecialchars(trim($_GET['description']));
    $active =htmlspecialchars($_GET['status']);


 /*$sq_check_unique  ="SELECT * FROM categories Where name='$name'";
  $sq_check_unique =mysqli_query($conn,$sql);
  if(mysqli_num_rows($sq_check_unique )==0){*/
   $sql="UPDATE categories  SET  name='$name', 
                                 description='$description', 
                                 status ='$active'
                                 WHERE id =$edit_id";
         

         if(mysqli_query($conn,$sql)){
           $msg="تم التعديل ع القسم نجاح";
           $class="success";
            $text=' ' ;
   $name=' ';
   $description=' ';

         }else{
              $msg="فشل التعديل   :(";
             $class="danger";
                                    
}}

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
                                <a href="#">الاقسام</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"> اضافة قسم</li>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> اضافة قسم</h4>
                        <form method="get" class="m-t-30 " action="">
                            <?php if(isset($msg)){ ?>
                            <div class="alert alert-<?php echo $class ?> ">
                                <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
                                <?php echo $msg ?>
                            </div>
                            <?php } ?>
                            <div class="form-group">
                                <h5>اسم القسم<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name" class="form-control" value="<?php echo $name?>" required="" data-validation-required-message="This field is required" aria-invalid="false">
                                    <div class="help-block"></div>
                                </div>
                                <!--<div class="form-control-feedback"><small>Add <code>required</code> attribute to field for required validation.</small></div>-->
                            </div>
                            <div class="form-group">
                                <label>وصف تعريفي للقسم</label>
                                <textarea class="form-control" name="description" rows="5"><?php echo $description;?>

                                </textarea>
                            </div>
                            <div class="form-group">
                                <label> حالة النشاط</label>

                                <select name="status" class="custom-select col-12 mb-2" id="inlineFormCustomSelect">

                                    <option value="0" <?php echo ($active==0)?'selected':''?>> غير مفعل</option>
                                    <option value="1" <?php echo ($active==1) ? 'selected':''?> selected> مفعل</option>
                                </select>

                                <?php if(isset($edit_id)){ ?>
                                <input type="hidden" name="edit" value="<?php echo $edit_id; ?>">
                                <?php } ?>

                                <button type="submit" class="btn btn-primary" name="<?php echo isset($edit_id) ? 'update':'add'?>"><?php echo isset($edit_id) ? 'تعديل':'اضافة'?></button>
                                <button type="reset" class="btn btn-danger">تراجع</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- row -->
        <!--/row-->

    </div>

    <?php include 'footer.php' ?>
