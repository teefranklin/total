<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<?php include 'connection/database.php'; ?>
<?php



$query ="SELECT * FROM marks WHERE user_id='".$_SESSION['user_id']."' ORDER by start_date DESC";
$statement = $connect->prepare($query);
$statement->execute();
$count= $statement -> rowCount();
$result = $statement->fetchAll();


?>
<!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <!--overview start-->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-table"></i>Marks / Credits</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                            <li><i class="fa fa-table"></i><a href="marks.php">Marks / Credits</a></li>
                        </ol>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2><i class="fa fa-gear red"></i><strong>Marks For System Practice Test</strong></h2>
                        <div class="panel-actions">
                        <a href="marks.php#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table id="marks" class="table bootstrap-datatable countries">
                            <thead>
                                <tr>
                                    <th>Practice ID</th>
                                    <th>Date</th>
                                    <th>Mark Attained</th>
                                    <th>Mark Limit</th>
                                    <th>System</th>
                                    <th>Percentage</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php foreach($result as $row) : ?>
                                <tr>
                                    <td><?php echo $row['practice_id'] ?></td>
                                    <td><?php echo date('Y-m-d h:i',strtotime($row['start_date'])) ?></td>
                                    <td><?php echo $row['mark_attained'] ?></td>
                                    <td><?php echo $row['mark_limit'] ?></td>
                                    <td><?php echo $row['system'] ?></td>
                                    <td><?php echo $row['percentage'].'%' ?></td>
                                </tr>
                            <?php endforeach ; ?>    
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                <!-- statics end -->
            </section>
        </section>
        <!--main content end-->
    </section>
    <?php include 'includes/footer.php'; ?>
