<?php
include 'mainLayout.php';
$apiKey = "d4488c67194ea3c38282682fe44b2699";
$cityId = "281132";
$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;
$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$data = json_decode($response);
$currentTime = time();

?>

<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">لوحة التحكم</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.php>الرئيسية</a>
                                    </li>
                                    <li class=" breadcrumb-item active" aria-current="page">لوحة التحكم
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
        <!-- Sales chart -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-7">
                                <i class="mdi mdi-emoticon font-20 text-info"></i>
                                <p class="font-16 m-b-5">عدد المستخدمين</p>
                            </div>
                            <?php 
                                    $sql ="SELECT * FROM users";
                                    $result=mysqli_query($conn,$sql);
                                          $user_count=mysqli_num_rows($result);
                            ?>

                            <div class="col-5">
                                <h1 class="font-light text-right mb-0"><?php echo $user_count?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-7">
                                <i class="mdi mdi-image font-20 text-success"></i>
                                <p class="font-16 m-b-5"> عدد الاقسام</p>
                            </div>
                            <?php 
                                    $sql ="SELECT * FROM categories";
                                    $result=mysqli_query($conn,$sql);
                                          $cat_num=mysqli_num_rows($result);
                            ?>

                            <div class="col-5">
                                <h1 class="font-light text-right mb-0"><?php echo $cat_num ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-7">
                                <i class="mdi mdi-newspaper font-20 text-purple"></i>
                                <p class="font-16 m-b-5">عدد الاخبار</p>
                            </div>
                            <?php 
                                    $sql ="SELECT * FROM news";
                                    $result=mysqli_query($conn,$sql);
                                          $news_num=mysqli_num_rows($result);
                            ?>

                            <div class="col-5">
                                <h1 class="font-light text-right mb-0"><?php echo $news_num?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- ============================================================== -->
        <!-- Sales chart -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Email campaign chart -->
        <!-- ============================================================== -->
        <div class="row">

            <div class="col-lg-12 col-md-12">
                <div class="card bg-info">
                    <div class="card-body mb-0">
                        <h4 class="card-title text-white"><?php echo getDateArabic(date('l'))?> <span class="font-14 font-normal text-white op-5"><?php echo date(' d-m-y')?></span></h4>
                        <div class="d-flex align-items-center flex-row m-t-30">
                            <h1 class="font-light text-white"><i class="wi wi-day-sleet"></i> <span><?php echo ($data->main->temp_max==$data->main->temp_min)? $data->main->temp_max : $data->main->temp_max.'-'.$data
                ->main->temp_min?>°C<sup>°</sup></span></h1>
                        </div>
                    </div>
                    <div class="weather-report" style="height:78px; width:100%;"></div>
                </div>

            </div>
        </div>

    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->

    <?php 
include 'footer.php';
?>
