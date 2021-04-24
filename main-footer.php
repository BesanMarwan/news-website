 <footer class="mar-60">
     <div class="container-fluid   bg-foot pb-3 pt-2">
         <div class="container animate-box">
             <div class="row ">

                 <div class="col-12 col-md-4">
                     <div class="logo mr-2 ">
                         <a href="index.php">
                             <img src="assets/images/logo.png" alt="" class="img-fluid "></a>
                         <p> هو موقع اخباري يقوم على توفير خدمة للأخبار تسهل على المستفيدين عناء البحث عن المعلومات الإخبارية فى خضم العديد من المواقع الإخبارية ، و تعمل على تنظيم المعلومات الإخبارية وتقسيمها إلى قطاعات موضوعية تناسب إحتياجات كل مستفيد .</p>

                     </div>

                 </div>
                 <div class="col-12 col-md-4 ">
                     <div class="footer_main_title py-3 text-right color-secon" style="padding-right: 60px;"> أقسام الموقع</div>
                     <ul class=" row">
                         <nav style="padding-right:60px">
                             <ul class="useful-links row list-unstyled">
                                 <li class="col-6 col-md-6  mb-1"><a href="index.php"><i class="fa fa-angle-left"></i>&nbsp;&nbsp; الرئيسية<a></li>

                                 <?php
                                    $sql="SELECT * FROM categories";
                                    $result=mysqli_query($conn,$sql);
                                   if((mysqli_num_rows($result) )> 0){
                                   while($cat =mysqli_fetch_assoc($result)){
                                    ?>
                                 <li class="col-6 col-md-6  mb-1"><a href="category.php?id=<?php echo $cat['id']?>"><i class="fa fa-angle-left"></i>&nbsp;&nbsp; <?php echo $cat['name']?></a></li>
                                 <?php }} ?>


                             </ul>
                         </nav>
                     </ul>
                 </div>


                 <div class="col-12 col-md-4 position_footer_relative">

                     <div class="footer_main_title mt-3   mb-2 color-secon mr-5" style="margin-top: 10px"> روابط مفيدة </div>
                     <ul class="nav mb-3 mt-1 mr-4" style="">
                         <li class="col-12 col-md-12  mb-1"><a href=""><i class="fa fa-angle-left"></i>&nbsp;&nbsp; من نحن</a></li>
                         <li class="col-12 col-md-12  mb-1"><a href="contact-us.php"><i class="fa fa-angle-left"></i>&nbsp;&nbsp; اتصل بنا </a></li>
                         <li class="col-12  col-md-12 mb-1 "><a href=""><i class="fa fa-angle-left"></i>&nbsp;&nbsp; سياسة الخصوصية </a></li>

                     </ul>
                     <div class="social d-flex  mr-5">
                         <a href="#"><i class="fab fa-youtube"></i></a>
                         <a href="#"><i class="fab fa-facebook "></i></a>
                         <a href="#"> <i class="fab fa-twitter "></i></a>
                         <a href="#"><i class="fab fa-whatsapp "></i></a>
                     </div>


                 </div>
             </div>
         </div>
         <hr class="mt-3">
         <div class="container-fluid ">
             <div class="container">
                 <div class="container block-p mt-3 copy-right d-flex justify-content-between text-white">
                     <p class="copy-right "> جميع الحقوق محفوظة لموقع One Time News &copy; 2021</p>
                     <p class=""><a href="http://www.high-five.co" target="_blank"> برمجة وتطوير <img src="assets/images/high5.png" style="width:22px" alt="high-five.co"> هاي فايف</a></p>
                 </div>

             </div>
         </div>

     </div>
 </footer>
