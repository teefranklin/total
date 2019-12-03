<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<?php

include '../connection/database.php';

if($_SESSION['role']=='participant'){
    header('Location:../index.php');
}

$query ="SELECT * FROM tender_response_questions"; 

$statement = $connect->prepare($query);
$statement->execute();
$count= $statement -> rowCount();
$result = $statement->fetchAll();
$id=1;
if($count>0){
    foreach($result as $row){
        $id=$row['question_id']+1;
    }
}else{
    die('wrong query');
}

?>


<section id="main-content">
        <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-users"></i>Users</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="../index.php">Home</a></li>
                            <li><i class="fa fa-users"></i><a href="add_question.php">Add Question</a></li>
                        </ol>
                    </div>
                </div>
                <div class="add-header">
                    
                    <form action="../includes/process.php" method="post" >
                        <div class="row">
                            <div class="col-md-2">
                                <label for=""><b>Question Number :</b></label> 
                            </div>
                            <div class="col-md-2">
                                <input type="number" name="question_number" id="" class="form-control" value="<?php echo $id ?>" disabled>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label for=""><b>Question Text :</b></label> 
                            </div>
                            <div class="col-md-6">
                            <textarea name="question_text" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <label for=""><b>Choose System :</b></label> 
                            </div>
                            <div class="col-md-6">
                                <select name="for_system" id="" class='form-control'>
                                    <option value="#">Choose A System</option>
                                    <option value="C-One">C-One</option>
                                    <option value="IBM-BI">IBM-BI</option>
                                    <option value="E-BOARD">E-BOARD</option>
                                    <option value="ORANGE-HRM">ORANGE-HRM</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <input type="submit" name="add_question" id="" class="btn btn-success" value="Add Question">
                    </form>
                </div>
        </section>
    </section>
</section>
<?php include 'includes/footer.php'; ?>