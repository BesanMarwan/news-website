<?php
include 'db.php';
?>
<div class="search-page">
    <span class="closeIcon"><i class="fas fa-times"></i></span>
    <div class="search-content">
        <form action="search.php" class="search-f">
            <input type="text" class="sear px-2 py-3" name="search" placeholder="بحث ..">
            <button type="submit" class="search"><i class="fas fa-search"></i></button>
        </form>
    </div>

</div>

<body>

    <header>
        <div class="container">
            <div class="row top-head d-flex">
                <div class="col-md-3 col-5">
                    <div class=" top-social d-flex mt-3">
                        <a href="#" class="search mr-2"> <i class="fas fa-search "></i></a>
                        <a href="#" class="wheather"><i class="fas fa-cloud-sun"></i></a>
                        <a href="#" class="euro"><i class="fas fa-euro-sign"></i></a>
                        <div class="bars">
                            <label class="navbar-toggler check navbar-toggler-left" type="button" data-target="#navbarSupportedContent" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon text-center mt-2" id="bars"><i class="fas fa-bars"></i></span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-7">
                    <div class="logo mt-4">
                        <a href="index.php">
                            <img src="assets/images/logo.png" class="img-fluid " alt=""></a>

                    </div>
                </div>
                <div class="col-md-3 top-soc">
                    <div class="top-social d-flex justify-content-end mt-3">
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-facebook "></i></a>
                        <a href="#"> <i class="fab fa-twitter "></i></a>
                        <a href="#"><i class="fab fa-whatsapp "></i></a>
                        <a href="#"><i class="fab fa-telegram-plane"></i></a>
                    </div>
                </div>

            </div>
            <div class="menu-web ">
                <div class="nav container d-flex justify-contnet-center">

                    <nav class="navbar navbar-expand-lg    text-light font-weight-bold d-flex justify-content-center ">


                        <div class="collapse navbar-collapse active" id="navbarSupportedContent">

                            <ul class="navbar-nav nav justify-content-center m-auto" style="">
                                <li class="nav-item  active ">
                                    <a class="nav-link text-uppercase mr-3  ml-3 active " id="basic" href="index.php" tabindex="-1"><i class="fas fa-home"></i>الرئيسية</a>
                                </li>
                                <?php
                            $sql   ="SELECT * FROM categories";
                            $result=mysqli_query($conn,$sql);
                                    while($cat=mysqli_fetch_assoc($result)){
                            ?>

                                <li class="nav-item mr-1 ml-3 active">
                                    <a class="nav-link text-uppercase  " href="category.php?id=<?php echo $cat['id']?>" tabindex="-1"><?php echo $cat['name']?></a>
                                </li>
                                <?php } ?>

                            </ul>

                        </div>

                    </nav>


                </div>

            </div>

            <!--                            start nav mobile                -->

            <div class="navmo-menu menu-on">
                <!-- Menu Close Button -->
                <div class="close">
                    <div class="cross-wrap"><span class="to"></span><i class="fas fa-times text-white"></i><span class="bottom"></span></div>
                </div>

                <!-- Nav Start -->
                <div class="nav-mobile m-5">
                    <ul id="nav " class="list-unstyled">
                        <li class="current-item"><a class="mb-2 text-bold text-white  d-inline-block" href="">الرئيسية</a></li>


                        <li><a href="#" class="mb-2 text-bold text-white  d-inline-block"> اقتصاد</a></li>

                        <li><a href="#" class="mb-2 text-bold text-white  d-inline-block"> عقارات </a></li>

                        <li><a href="#" class="mb-2 text-bold text-white  d-inline-block"> منوعات</a></li>
                        <li><a href="#" class="mb-2 text-bold text-white  d-inline-block"> سياحة وسفر</a></li>
                        <li><a href="" class="mb-2 text-bold text-white  d-inline-block">تقنية </a></li>

                        <li><a href="" class="mb-2 text-bold text-white  d-inline-block"> شركات</a></li>
                        <li><a href="" class="mb-2 text-bold text-white  d-inline-block"> وظائف</a></li>
                        <li><a href="" class="mb-2 text-bold text-white  d-inline-block"> سيارات</a></li>
                        <li><a href="" class="mb-2 text-bold text-white  d-inline-block"> اراء ومختارات</a></li>
                    </ul>


                </div>
                <!-- Nav End -->
            </div>
        </div>

    </header>
    <div class="awsem">
        <div class="euro-box">
            <div class="triangle"></div>
            <div class="item-box p-4" style="">
                <h4 class="font-size-16 font-weight-bold text-center mb-4">أسعار العملات</h4>
                <?php $sql="SELECT * FROM transfers";
                $result=mysqli_query($conn,$sql);
                if((mysqli_num_rows($result) )> 0){
                while($curren=mysqli_fetch_assoc($result)){?>
                <div class="itm d-flex align-items-center  border-bottom pb-3  mt-3">
                    <span class="ml-auto"><?php echo $curren['currency']?></span>
                    <span class="text-gray-600"><?php echo $curren['equivalent']?></span>
                </div>
                <?php }}?>

            </div>
        </div>
        <?php include 'wheatherApi.php';?>
    </div>
