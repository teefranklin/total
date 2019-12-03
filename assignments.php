<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<?php include 'connection/database.php'; ?>
<?php
$current=checkStage($connect);
if($current<6){
    $query = "UPDATE login set progress=".round((4 / 8) * 100) .", stage = 4 where user_id='" . $_SESSION['user_id'] . "'";
    $statement = $connect->prepare($query);
    $statement->execute();
}
$i = 1;
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo round((4 / 8) * 100); ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo round((4 / 8) * 100); ?>%">
                <?php echo round((4 / 8) * 100); ?>%
            </div>
        </div>
        <!--overview start-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-pencil"></i>Assignments</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                    <li><i class="fa fa-pencil"></i><a href="study_home.php">Study</a></li>
                    <li><i class="fa fa-pencil"></i><a href="assignments.php">Assignments</a></li>
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
                    <div class="panel-heading">Assignments</div>
                    <div class="panel-body">
                        <ul class="my_list">
                            
                            <li>Under assignments specify respective actors in the flow to approve the request. Some roles are predefined in the system for instance SAP Admin is already defined in the system so by default the system sends the request to SAP administrator after submission.</li>
                            <li>There is an option to skip line manager for employees who does not have line managers, otherwise specify Line manager and HOD.</li>
                            <li><b>NB.</b> Line manager and HOD are different per department therefore the roles are not predefined in the system, users must specify who their line managers and HODs are.</li>
                            <li>For this guide EDMS Admin is assigned on Line manager approval and HOD.</li>
                            <br>
                            <br>
                            <img src="img/6.png" height="470px" alt="">
                            <br>
                            <br>
                            <li style="color:red"><b>NB.</b> When doing assignments these check boxes should not be ticked. They are ticked automatically by the system past that stage.</li>
                            <li style="color:red"><b>Ticking the check box may cause the workflow to misbehave </b></li>
                            <br>
                            <br>
                            <img src="img/7.png" height="470px" alt="">
                            <br>
                            <br>
                        </ul>
                        <a href="homepage.php" class="btn btn-xm btn-default pull-left"> <i class="fa fa-arrow-left"></i> Previous </a>
                        <a href="attach.php" class="btn btn-xm btn-success pull-right">Next <i class="fa fa-arrow-right"></i></a>
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