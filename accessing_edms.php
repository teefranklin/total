<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<?php include 'connection/database.php'; ?>
<?php
$current=checkStage($connect);
if($current<2){
    $query = "UPDATE login set progress=".round((2 / 8) * 100) .", stage = 2 where user_id='" . $_SESSION['user_id'] . "'";
    $statement = $connect->prepare($query);
    $statement->execute();
}

/*
$query = "SELECT * FROM login where user_id='".$_SESSION['user_id']."'";
$statement = $connect->prepare($query);
$statement->execute();
$count = $statement->rowCount();
$result = $statement->fetchAll();

foreach ($result as $row) {
    if($row['stage'] >1 || $row['stage'] < 1){
        redirect_to_stage($connect);
    }else if($row['stage']==1){
        $query = "UPDATE login set progress=".round((2 / 8) * 100) .", stage = 2 where user_id='" . $_SESSION['user_id'] . "'";
        $statement = $connect->prepare($query);
        $statement->execute();
    }
    
}
*/
$i = 1;
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo round((2 / 8) * 100); ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo round((2 / 8) * 100); ?>%">
                <?php echo round((2 / 8) * 100); ?>%
            </div>
        </div>
        <!--overview start-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-pencil"></i>Acessing EDMS</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                    <li><i class="fa fa-pencil"></i><a href="study_home.php">Study</a></li>
                    <li><i class="fa fa-pencil"></i><a href="accessing_edms.php">Acessing EDMS</a></li>
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
                    <div class="panel-heading">ACCESSING EDMS</div>
                    <div class="panel-body">
                        <ul class="my_list">
                            <li>Select your browser preferably chrome</li>
                            <li>Enter https://edms.totaledms.co.zw:8080/edms/Home</li>
                            <li>An authentication Window Security will pop up</li>
                            <li>Enter LOGIN credentials i.e. username and password</li>
                            <li>Username: your IGG e.g. J0464413</li>
                            <li>Password: Use a generic password i.e. Password12 then you change the password after logging in for the first time.</li>
                            <li>Click OK</li>
                            <br>
                            <p><img src="img/1.png" alt="" height="470px"></p>
                            <br>
                            <li>This will take you to the Homepage</li>
                            <li>The Home page shows three main features:
                                <ul>
                                    <li>Applications
                                        <ul>
                                            <li>Shows main queries for instance:
                                                <ul>
                                                    <li>My requests</li>
                                                    <li>My assignments</li>
                                                    <li>Documents archive</li>
                                                    <li>Management queries mainly used to track workflows</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>To Do
                                        <ul>
                                            <li>Shows workflows to be actioned</li>
                                        </ul>
                                    </li>
                                    <li>My requests
                                        <ul>
                                            <li>Shows all incomplete workflows requested awaiting approval</li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <a href="introduction.php" class="btn btn-xm btn-default pull-left"><i class="fa fa-arrow-left"></i> Previous </a>
                        <a href="homepage.php" class="btn btn-xm btn-success pull-right">Next <i class="fa fa-arrow-right"></i></a>
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