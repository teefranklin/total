<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<?php include 'connection/database.php'; ?>
<?php
$current=checkStage($connect);
if($current<5){
    $query = "UPDATE login set progress=".round((5 / 8) * 100) .", stage = 5 where user_id='" . $_SESSION['user_id'] . "'";
    $statement = $connect->prepare($query);
    $statement->execute();
}
$i = 1;
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo round((5 / 8) * 100); ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo round((5 / 8) * 100); ?>%">
                <?php echo round((5 / 8) * 100); ?>%
            </div>
        </div>
        <!--overview start-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-pencil"></i>Attaching Files</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                    <li><i class="fa fa-pencil"></i><a href="study_home.php">Study</a></li>
                    <li><i class="fa fa-pencil"></i><a href="attach.php">Attaching Files</a></li>
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
                    <div class="panel-heading">Attaching Files</div>
                    <div class="panel-body">
                        <ul class="my_list">
                            <img src="img/8.png" height="470px" alt="">
                            <br>
                            <br>
                            <li>
                                <h4>ATTACHMENTS</h4>
                                <ul>
                                    <li>The attachment tab shows 5 placeholders for ATTACHMENTS.</li>
                                    <li>To attach the first quotation, select the placeholder. <img src="img/placeholder.jpg" alt=""></li>
                                    <li>Browse to attach the required document.</li>
                                </ul>
                            </li>
                            <br><br>
                            <img src="img/9.png" height="470px" alt="">
                            <br>
                            <br>
                            <li>Click ok to upload an attachment</li>
                            <li>To attach the next attachment, refresh the tab and attach another one.</li>
                            <li>Once you are done with attachments click submit.</li>
                            <li>The FEC moves to the SAP Admin who is also notified in form of an email.</li>
                            <li>Under my requests you can actually see the requested workflow as shown below:</li>
                            <br><br>
                            <img src="img/10.png" height="470px" alt="">
                            <br>
                            <br>
                        </ul>
                        <a href="assignments.php" class="btn btn-xm btn-default pull-left"><i class="fa fa-arrow-left"> Previous </i></a>
                        <a href="approvals.php" class="btn btn-xm btn-success pull-right">Next <i class="fa fa-arrow-right"></i></a>
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