<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<?php include '../connection/database.php'; ?>
<?php
$msg=$_GET['msg'];
if(!isset($msg)){
    $msg="Add Question";
}
$query ="SELECT * FROM questions"; 

$statement = $connect->prepare($query);
$statement->execute();
$count= $statement -> rowCount();
$result = $statement->fetchAll();
$id=1;
if($count>0){
    foreach($result as $row){
        $id=$row['question_number']+1;
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
                    
                
          <div class="alert alert-success">
            <h4 align="center"><?php echo $msg; ?></h4>
          </div>
           <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
            <form action="../includes/add.php" method="post">
               <p>
                   <label>Question Number : </label>
                   <input class="form-control" type="number" name="question_number" id="" value="<?php echo $id; ?>" disabled required>
               </p>
               <p>
                   <label>Question Text : </label>
                   <input class="form-control" type="text" name="question_text" id="" placeholder="Type your Question Text Here" required>
               </p>
               <p>
                   <label>choice #1 : </label>
                   <input class="form-control" type="text" name="choice1" id="" placeholder="First Choice" required>
               </p>
               <p>
                   <label>choice #2 :</label>
                   <input class="form-control" type="text" name="choice2" id="" placeholder="Second Choice" required>
               </p>
               <p>
                   <label>choice #3 : </label>
                   <input class="form-control" type="text" name="choice3" id="" placeholder="Third Choice Choice" required>
               </p>
               <p>
                   <label>choice #4 : </label>
                   <input class="form-control" type="text" name="choice4" placeholder="Fourth Choice" id="">
               </p>
               <p>
                   <label>choice #5 : </label>
                   <input class="form-control" type="text" name="choice5" placeholder="Fifth Choice" id="">
               </p>
               <p>
                   <label>correct choice number : </label>
                   <input class="form-control" type="number" name="correct_choice" id="" required>
               </p>
               <p>
                   <input  type="submit" value="Submit" name="add_multiple" id="" class="btn btn-info">
               </p>
           </form></div>
           </div>
                </div>
        </section>
    </section>
</section>
<?php include 'includes/footer.php'; ?>