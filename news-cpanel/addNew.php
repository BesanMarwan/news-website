<?php 
include 'mainLayout.php';
$pageTitle = 'اضافة خبر جديد ';


if(isset($_POST['add'])){
  
  $title         = htmlspecialchars(trim($_POST['title']));
  $content       = htmlspecialchars(trim($_POST['content']));
  $meta_data     = htmlspecialchars(trim($_POST['meta_data']));
  $comment_able  = htmlspecialchars(trim($_POST['comment_able']));
  $category_id   = htmlspecialchars(trim($_POST['category']));
  $user_id       =$_SESSION['id'];
  $date          =date('y-m-d');


  //upload news images 
   $filename='';

  if (is_uploaded_file($_FILES['uploadfile']['tmp_name'])){
  $filename      =$_FILES["uploadfile"]["name"];
  $filearr       =explode('.', $filename);
  $ext           =end($filearr);
  $filename      = 'newsimg_'.time().'.'.$ext;
  $tempname      =$_FILES['uploadfile']['tmp_name'];  
  $folder        = "assets/images/news/".$filename;
  move_uploaded_file($tempname, $folder);
}

 #validate if the new exist or not
  $sq_check_unique ="SELECT * FROM news Where title='$title'";
  $sq_check_unique =mysqli_query($conn,$sq_check_unique);
  if(mysqli_num_rows($sq_check_unique )==0){

  $sql = "INSERT INTO news (title,content,meta_data,dateN,comment_able,img_news,category_id,user_id) VALUES ('$title', '$content','$meta_data','$date','$comment_able','$filename','$category_id','$user_id')";

    if(mysqli_query($conn, $sql)) {
      $msg = 'تم اضافة الخبر بنجاح ';
      $class = 'success';   
       }else{
        $msg ="حدث خلل ما . يرجي المحاولة لاحقا :( ! ";
        $class='danger';  
      }
       }else{
      $msg='هذا القسم موجود بالفعل ';
      $class="warning";
    }
}
$title       ='';
$content     ="";
$meta_data   ='';
$category_id ="";
$img_news    ="";
$comment_able=""
;if(isset($_GET['edit'])){
  $pageTitle="تعديل الخبر";
  $edit_id  =$_GET['edit'];
  $pageTitle="تعديل االخبر ";

  $sql   ="SELECT * FROM news WHERE id =$edit_id";
  $result=mysqli_query($conn,$sql);
  $news  =mysqli_fetch_assoc($result);

   //reterive data 
  $title       =$news['title'];
  $content     =$news['content'];
  $meta_data   =$news['meta_data'];
  $img_news    =$news['img_news'];
  $category_id =$news['category_id'];
  $comment_able=$news['comment_able'];

}
if(isset($_POST['update'])){

  $title         =htmlspecialchars(trim($_POST['title']));
  $content       =htmlspecialchars(trim($_POST['content']));
  $meta_data     = htmlspecialchars(trim($_POST['meta_data']));
  $comment_able  = htmlspecialchars(trim($_POST['comment_able']));
  $category_id   = htmlspecialchars(trim($_POST['category']));
  $user_id       =$_SESSION['id'];
  $date          =date('y-m-d');


  //upload news images 
 
  if (is_uploaded_file($_FILES['uploadfile']['tmp_name'])){
  $filename      =$_FILES["uploadfile"]["name"];
  $filearr       =explode('.', $filename);
  $ext           =end($filearr);
  $filename      = 'newsimg_'.time().'.'.$ext;
  $tempname      =$_FILES['uploadfile']['tmp_name'];  
  $folder        = "assets/images/news/".$filename;
  move_uploaded_file($tempname, $folder);
}else{
  $filename=$img_news;
}

   $sql="UPDATE news  SET   title       ='$title', 
                            content     ='$content',
                            meta_data   ='$meta_data',
                            category_id ='$category_id',
                            dateN       ='$date',
                            comment_able='$comment_able',
                            img_news    ='$filename'
                            WHERE id    =$edit_id";
         

         if(mysqli_query($conn,$sql)){
           $msg="تم التعديل ع  الخبر نجاح";
           $class="success";
           $title       ='';
$content     ="";
$meta_data   ='';
$category_id ="";
$img_news    ="";

         }else{
              $msg="فشل التعديل   :(";
             $class="danger";
               }
/*} */                       
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
                        <h4 class="card-title"> اضافة خبر </h4>
                        <form method="post" class="m-t-30 " action="" enctype="multipart/form-data">
                            <?php if(isset($msg)){ ?>
                            <div class="alert alert-<?php echo $class ?> ">
                                <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
                                <?php echo $msg ?>
                            </div>
                            <?php } ?>
                            <?php if($img_news !=''){?>
                            <img src="assets/images/news/<?php echo $img_news?>" height="200px" width="300px" class="mb-3">
                            <?php }?>

                            <div class="form-group">
                                <h5>عنوان الخبر <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="title" class="form-control" value="<?php echo $title?>" required="" data-validation-required-message="هذا الحقل محتوطلوب " aria-invalid="false" value="<?php ?>">
                                    <div class="help-block"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>محتوى تعريفي للخبر <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <textarea class="form-control" name="content" rows="8" required="" aria-invalid="false"><?php echo $content;?></textarea>
                                    <div class="help-block"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">الكلمات الدلالية</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" value="<?php echo $meta_data?>" name="meta_data">
                                <small id="name13" class="badge badge-default badge-danger form-text text-white  "> ضع علامة # قبل كل كلمة دلالية</small>
                            </div>
                            <div class="form-group">
                                <h5>القسم <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="category" id="select" required="" class="form-control" aria-invalid="false">
                                        <option value="0" disabled selected> اختيار القسم</option>
                                        <?php
                                    $sql ='SELECT id,name FROM categories';
                                    $result =mysqli_query($conn,$sql);
                                    while($cat =mysqli_fetch_assoc($result)){
                                    ?>
                                        <option value="<?php echo $cat['id'] ?>" <?php echo ($cat['id']==$category_id)?'selected' :'';?>><?php echo $cat['name']?></option>
                                        <?php   } ?>
                                    </select>
                                    <div class="help-block"></div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label>صورة الخبر</label>
                                <input type="file" name="uploadfile" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> التعليق على البوست</label>

                                <select name="comment_able" class="custom-select col-12 mb-2" id="inlineFormCustomSelect">

                                    <option value="0" <?php echo ($comment_able==0)?'selected':''?>> غير مفعل</option>
                                    <option value="1" <?php echo ($comment_able==1) ? 'selected':''?> selected> مفعل</option>

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
