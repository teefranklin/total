<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<?php include 'connection/database.php'; ?>
<?php
        $_SESSION['system_tested']='';
        $_SESSION['practice_id']='';
        $_SESSION['total']=0;
        $_SESSION['ansad']=0;
        $_SESSION['score']=0;
?>
    <section id="main-content">
        <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-pencil"></i>Tender Response Practice</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                            <li><i class="icon_documents_alt"></i>Practice</li>
                            <li><i class="fa fa-pencil"></i><a href="tender.php">Multiple Choice System Practice</a></li>
                        </ol>
                    </div>
                </div>
                <div >
                    <br><br><br>
                    <div class="row">
                    <div class="col-md-4"></div>
                        <div class="col-md-4 tender-all">
                            <form action="includes/practice_start.php" method="post">
                                <legend style="color:white;">Practice Test Details</legend>

                                <select name="system_tested" id="" class='form-control'>
                                    <option value="#">Choose A System</option>
                                    <option value="EDMS">EDMS</option>
                                </select>
                                <br>
                                <input type="number" name="number_of_questions" id="" class='form-control' placeholder="Choose Number Of Questions" required>
                                <br>
                                <input type="submit" name="start_test" id="" class="btn btn-default" value=" Start Test ">
                            </form>
                        </div>
                    </div>
                </div>
        </section>
    </section>
</section>
<br><br><br><br><br>
<?php include 'includes/footer.php'; ?>