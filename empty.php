<?php
include'meta-head.php';
 include 'main-header.php';
 $pageTitle='';
 ?>

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
        <div class="row">

            /// content

        </div>
    </div>
</main>

<?php
include 'main-footer.php';
include 'script-footer.php';
?>
