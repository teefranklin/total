<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<?php include 'connection/database.php'; ?>
<?php

$query ="SELECT * FROM tasks ORDER by due_date asc ";
$statement = $connect->prepare($query);
$statement->execute();
$count= $statement -> rowCount();
$result = $statement->fetchAll();
$i=1;
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!--overview start-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-pencil"></i>Study Home</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                    <li><i class="fa fa-pencil"></i><a href="study_home.php">Study</a></li>
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
                <div class="panel-heading">All Modules</div>
                <div class="panel-body">
                    <a href="introduction.php">1.0 INTRODUCTION</a> <br>
                    <a href="accessing_edms.php">1.1 ACCESSING EDMS</a> <br>
                    <a href="homepage.php">1.2 HOMEPAGE</a> <br>
                    <a href="assignments.php">1.3 ASSIGNMENTS</a><br>
                    <a href="attach.php">1.4 ATTACHING FILES</a> <br>
                    <a href="approvals.php">1.5 APPROVALS</a> <br>
                    <a href="archiving.php">1.6 ARCHIVING</a> <br>
                    <a href="accessing_archives.php">1.7 ACCESSING ARCHIVED FORMS</a> <br>
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