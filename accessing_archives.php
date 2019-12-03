<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<?php include 'connection/database.php'; ?>
<?php

$query = "UPDATE login set progress=".round((8 / 8) * 100) .", stage = 8 where user_id='" . $_SESSION['user_id'] . "'";
$statement = $connect->prepare($query);
$statement->execute();
$i = 1;
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo round((8 / 8) * 100); ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo round((8 / 8) * 100); ?>%">
                <?php echo round((8 / 8) * 100); ?>%
            </div>
        </div>
        <!--overview start-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-pencil"></i>Accessing Archives</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                    <li><i class="fa fa-pencil"></i><a href="study_home.php">Study</a></li>
                    <li><i class="fa fa-pencil"></i><a href="accessing_archives.php">Accessing Archives</a></li>
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
                    <div class="panel-heading">Accessing Archives</div>
                    <div class="panel-body">
                        <ul class="my_list">
                            <li>Once requests are archived, they can be accessed from Documents Archive application to your left as shown below:</li>
                            <br><br>
                            <img src="img/16.png" height="470px" alt="">
                            <br>
                            <br>
                            <li>Open Documents Archive</li>
                            <li>Click Fixed expense control forms</li>
                            <br><br>
                            <img src="img/17.png" height="470px" alt="">
                            <br>
                            <br>
                            <li>The following interface will pop up:</li>
                            <br><br>
                            <img src="img/18.png" height="470px" alt="">
                            <br>
                            <br>
                            <li>You can filter the archived requests by <em style="color:blue">Approved budget amount</em>, <em style="color:blue">Budget charge</em> or <em style="color:blue">Budget year</em></li>
                            <li>Let’s filter by <em style="color:blue">budget year</em></li>
                            <br><br>
                            <img src="img/19.png" height="470px" alt="">
                            <br>
                            <br>
                            <li><b>Click submit.</b></li>
                            <br><br>
                            <img src="img/20.png" height="470px" alt="">
                            <br>
                            <br>
                            <li>By default, archived FECs are sorted by date requested as shown above.</li>
                            <li>Our Test FEC is the one on top.</li>
                        </ul>
                        <a href="archiving.php" class="btn btn-xm btn-default pull-left"><i class="fa fa-arrow-left"> Previous </i></a>
                        <a href="pdf/practice.php?id=<?php echo $_SESSION['user_id']; ?>" class="btn btn-xm btn-success pull-right">Finish Course <i class="fa fa-arrow-right"></i></a>
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