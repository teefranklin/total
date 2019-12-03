<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<?php include 'connection/database.php'; ?>
<?php
$current=checkStage($connect);
if($current<6){
    $query = "UPDATE login set progress=".round((6 / 8) * 100) .", stage = 6 where user_id='" . $_SESSION['user_id'] . "'";
    $statement = $connect->prepare($query);
    $statement->execute();
}
$i = 1;
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo round((6 / 8) * 100); ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo round((6 / 8) * 100); ?>%">
                <?php echo round((6 / 8) * 100); ?>%
            </div>
        </div>
        <!--overview start-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-pencil"></i>Approvals</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                    <li><i class="fa fa-pencil"></i><a href="study_home.php">Study</a></li>
                    <li><i class="fa fa-pencil"></i><a href="approvals.php">Approvals</a></li>
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
                    <div class="panel-heading">Approvals</div>
                    <div class="panel-body">
                        <ul class="my_list">
                            <li>To work on the request, the assigned actor must tick the check box and click open.</li>
                            <li>Sometimes the request will be locked as shown below, meaning to say someone has opened the request</li>
                            <br><br>
                            <img src="img/11.png" height="470px" alt="">
                            <br>
                            <br>
                            <li>To act on it the actor must click lock. This entails that the user is locking the session to him or herself so that not more than one user is editing or working on the same request.</li>
                            <li>After locking the session, the actor can now see dispatch buttons as shown below:</li>
                            <br><br>
                            <img src="img/12.png" height="470px" alt="">
                            <br>
                            <br>
                            <li>Submit forward button takes the request to the next level</li>
                            <li>Reassignment button is used to change assignments</li>
                            <li>Denied button takes the request to the initiator for amendment</li>
                            <li>Pause button keeps the instance at that same level</li>
                            <li>Unlock button takes the user to Homepage</li>
                            <li><b>Click submit forward</b> </li>
                            <br><br>
                            <img src="img/13.png" height="470px" alt="">
                            <br>
                            <br>
                            <li>Now two stages are cancelled off i.e. <em style="color:blue">preparation</em> and <em style="color:blue">SAP and Admin review</em> as shown above and status now showing <em style="color:blue">Line manager review</em></li>
                            <li><b>Click submit to HOD.</b></li>
                            <br><br>
                            <img src="img/14.png" height="470px" alt="">
                            <br>
                            <br>
                            <li>Now two three stages are cancelled off i.e. <em style="color:blue">preparation</em>, <em style="color:blue">SAP and Admin review</em> and <em style="color:blue">Line manager review</em> as shown above and status now showing HOD Approval</li>
                            <li><b>Click approve.</b></li>
                            <br><br>

                        </ul>
                        <a href="attach.php" class="btn btn-xm btn-default pull-left"><i class="fa fa-arrow-left"> Previous </i></a>
                        <a href="archiving.php" class="btn btn-xm btn-success pull-right">Next <i class="fa fa-arrow-right"></i></a>
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