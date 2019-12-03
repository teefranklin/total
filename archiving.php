<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<?php include 'connection/database.php'; ?>
<?php
$current=checkStage($connect);
if($current<7){
    $query = "UPDATE login set progress=".round((7 / 8) * 100) .", stage = 7 where user_id='" . $_SESSION['user_id'] . "'";
    $statement = $connect->prepare($query);
    $statement->execute();
}
$i = 1;
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo round((7 / 8) * 100); ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo round((7 / 8) * 100); ?>%">
                <?php echo round((7 / 8) * 100); ?>%
            </div>
        </div>
        <!--overview start-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-pencil"></i>Archiving</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                    <li><i class="fa fa-pencil"></i><a href="study_home.php">Study</a></li>
                    <li><i class="fa fa-pencil"></i><a href="archiving.php">Archiving</a></li>
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
                    <div class="panel-heading">Archiving</div>
                    <div class="panel-body">
                        <ul class="my_list">
                            <br><br>
                            <img src="img/15.png" height="470px" alt="">
                            <br>
                            <br>
                            <li>Depending with the value, some requests are approved up to HOD and FECs with a value above $5000USD must be approved by the MD.</li>
                            <li>In our example purchase value was below $5000 therefore automatically could not reach MD.</li>
                            <li>Status changed to action and the request is sent back to the initiator for action.</li>	
                            <li>Once the initiator is done the request can be archived.</li>
                            <li>By clicking archive, the request is archived.</li>
                            <li><b>Click archive.</b></li>
                        </ul>
                        <a href="approvals.php" class="btn btn-xm btn-default pull-left"><i class="fa fa-arrow-left"> Previous </i></a>
                        <a href="accessing_archives.php" class="btn btn-xm btn-success pull-right">Next <i class="fa fa-arrow-right"></i></a>
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