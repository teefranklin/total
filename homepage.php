<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<?php include 'connection/database.php'; ?>
<?php
$current=checkStage($connect);
if($current<3){
    $query = "UPDATE login set progress=".round((3 / 8) * 100) .", stage = 3 where user_id='" . $_SESSION['user_id'] . "'";
    $statement = $connect->prepare($query);
    $statement->execute();
}
$i = 1;
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo round((3 / 8) * 100); ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo round((3 / 8) * 100); ?>%">
                <?php echo round((3 / 8) * 100); ?>%
            </div>
        </div>
        <!--overview start-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-pencil"></i>Homepage</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                    <li><i class="fa fa-pencil"></i><a href="study_home.php">Study</a></li>
                    <li><i class="fa fa-pencil"></i><a href="homepage.php">Homepage</a></li>
                </ol>
            </div>
        </div>
        <!-- Today status end -->
        <div class="container row">
            <div class="col-md-12">
                <h2 align="center" style="font-weight:bolder">ELECTRONIC DOCUMENTS MANAGEMENT SYSTEM</h2>
                <h4 align="center"><em>TRAINING GUIDE</em></h4>
            </div>
            <br>
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="panel panel-default items">
                    <div class="panel-heading">HOMEPAGE</div>
                    <div class="panel-body">
                        <ul class="my_list">
                            <p>Below is The Picture of The Homepage</p>
                            <img src="img/2.png" height="470px" alt="">
                            <br>
                            <h4><b>FEC CREATION</b></h4>
                            <li>Click the dropdown button Create New on the top right corner and select FEC</li>
                            <br>
                            <img src="img/3.png" height="470px" alt="">
                            <br>
                            <br>
                            <li>The FEC form will appear on the screen.</li>
                            <br>
                            <br>
                            <img src="img/4.png" height="470px" alt="">
                            <br>
                            <br>
                            <li>Put budget charge and click check, approved budget amount, amount already utilized and overall account balance will be filled automatically.</li>
                            <li>Fill in all other fields.</li>
                            <br><br>
                            <img src="img/5.png" height="470px" alt="">
                            <br><br>
                        </ul>
                        <a href="accessing_edms.php" class="btn btn-xm btn-default pull-left"><i class="fa fa-arrow-left"></i> Previous </a>
                        <a href="assignments.php" class="btn btn-xm btn-success pull-right">Next <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<!--main content end-->
</section>
<!-- container section start -->
<?php include 'includes/footer.php'; ?>