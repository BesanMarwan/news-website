<?php
include'meta-head.php';
 include 'main-header.php';
 $pageTitle='اتصل بنا ';

if(isset($_POST['submit'])){

    $username=$_POST['user_name'];
    $mailFrom=$_POST['user_email'];
    $subject=$_POST['subject'];
    $msg=$_POST['message'];
    $mailTo="besanmarwan2000@gmail.com";

    $header="From:".$mailFrom;
    $text="تم ارسال الرسالة من قبل :".$username. nl2br($msg);


    if(mail($mailTo,$subject,$text,$header)){
        $sql = "INSERT INTO contact (name,email,subject,message) VALUES ('$username', '$mailFrom','$subject','$msg')";
          mysqli_query($conn,$sql);

        $msg="تم ارسال الرسالة بنجاح .";
        $class="success";
    }else{
        $msg="فشل بارسال الرسالة !";
        $class="danger";

}
}
 ?>
<link href="assets/css/contact-style.css" rel="stylesheet">

<main>


    <div class="container">
        <div class="bredcrumb mar-60 ">
            <nav aria-label="breadcrumb ">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo' '. $pageTitle?></li>
                </ol>
            </nav>
        </div>
        <form method="post" action="">
            <?php if(isset($msg)){ ?>
            <div class="alert alert-<?php echo $class ?> ">
                <button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>
                <?php echo $msg ?>
            </div>
            <?php } ?>
            <ul>
                <li>
                    <label for="name"><span>لاسم <span class="required-star">*</span></span></label>
                    <input type="text" id="name" name="user_name">
                </li>
                <li>
                    <label for="mail"><span>البريد الالكتروني <span class="required-star">*</span></span></label>
                    <input type="email" id="mail" name="user_email">
                </li>
                <li>
                    <label for="name"><span>الموضوع <span class="required-star">*</span></span></label>
                    <input type="text" id="subject" name="subject">
                </li>

                <li>

                    <label for="msg"><span>نص الرسالة</span></label>
                    <textarea rows="4" cols="50" name="message"></textarea>
                </li>
                <li>
                    <input type="submit" name="submit" value="ارسل">
                </li>
            </ul>
        </form>
    </div </div>
    </div>
</main>

<?php
include 'main-footer.php';
include 'script-footer.php';
?>
