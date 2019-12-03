<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<?php include 'connection/database.php'; ?>
<?php
$current=checkStage($connect);
if($current<1){
    $query = "UPDATE login set progress=".round((1 / 8) * 100) .", stage = 1 where user_id='" . $_SESSION['user_id'] . "'";
    $statement = $connect->prepare($query);
    $statement->execute();
}
$i = 1;
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo round((1/9)*100); ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo round((1/8)*100); ?>%">
            <?php echo round((1/8)*100); ?>%
            </div>
        </div>
        <!--overview start-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-pencil"></i>Introduction</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                    <li><i class="fa fa-pencil"></i><a href="study_home.php">Study</a></li>
                    <li><i class="fa fa-pencil"></i><a href="introduction.php">Introduction</a></li>
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
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="panel panel-default items">
                    <div class="panel-heading">INTRODUCTION</div>
                    <div class="panel-body">
                        <p>This Course is a step by step guide of workflow request. For the purpose of this guide FEC request shall be used. The course covers how EDMS can be accessed, how to initiate a workflow, how to assign actors, how to attach documents as well archiving complete workflows. The course also shows how archived requests can be accessed.</p>
                        <a href="accessing_edms.php" class="btn btn-xm btn-success pull-right">Next <i class="fa fa-arrow-right"></i></a>
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