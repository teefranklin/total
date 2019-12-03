<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<?php include 'connection/database.php'; ?>
<?php

$query ="SELECT * FROM login where user_id='".$_SESSION['user_id']."'";
$statement = $connect->prepare($query);
$statement->execute();
$count= $statement -> rowCount();
$result = $statement->fetchAll();

foreach($result as $row){
    $progress=$row['progress'];
}
$i=1;
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!--overview start-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-home"></i>Home</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                </ol>
            </div>
        </div>
        <!-- Today status end -->

        <div class="row container dash-items">
            <div class="col-md-3 div-body">
                <div class="number">
                    <h1>7</h1>
                </div>
                <div class="description" >
                    <p>Modules Available</p>
                </div>
                <span class="fa fa-cog my-icon"></span>
                <a href="study_home.php" class="pull-right">View All <span class="fa fa-arrow-right"></span></a>
            </div>

            <div class="col-md-3 div-body2">
                <div class="number">
                    <h1>3</h1>
                </div>
                <div class="description">
                    <p>Users Completed</p>
                </div>
                <span class="fa fa-users my-icon2"></span>
                <a href="#clients" class="pull-right">View All <span class="fa fa-arrow-right"></span></a>
            </div>

            <div class="col-md-3 div-body3">
                <div class="number">
                    <h1><?php echo $progress; ?> %</h1>
                </div>
                <div class="description">
                    <p>Study Progress</p>
                </div>
                <span class="fa fa-pencil my-icon"></span>
                <a href="study_home.php" class="pull-right"><?php
                    if($progress>0){
                        echo "Continue Studying";
                    }else{
                        echo "Start Studying";
                    }
                ?>&nbsp;&nbsp;<span class="fa fa-arrow-right"></span></a>
            </div>

        </div>

    </section>
</section>
<!--main content end-->
</section>
<!-- container section start -->
<?php include 'includes/footer.php'; ?>