<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<?php
    include 'connection/database.php';
    $next =(int) $_GET['n'];
    $number=$_SESSION['all_questions'][$next];
    //print_r($_SESSION['all_questions']);
    //die(''.$number);
    if($_SESSION['total']==0){
        die('<br><br><br><br><br><h1 align="center">test is finished please click <a href="practice.php">Here </a> to start another one</h1>');
    }
    $query="SELECT * FROM `questions`
            WHERE question_number = $number";

    $statement = $connect->prepare($query);
    $statement->execute();
    $count= $statement -> rowCount();
    $result = $statement->fetchAll();

    $progress=round((($next+1) / $_SESSION['total'])*100);
    foreach($result as $row){
        $question=$row['text'];
    }
    
?>
    <section id="main-content">
        <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-spinner"></i>Multiple Choice Practice Test In Progress</h3>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $progress; ?>"
                            aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $progress; ?>%">
                             <?php echo $progress; ?>%
                            </div>
                        </div> 
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                            <li><i class="icon_documents_alt"></i>Practice</li>
                            <li><i class="fa fa-pencil"></i><a href="practice.php">Multiple Choice</a></li>
                            <li><i class="fa fa-spinner"></i>Multiple Choice Test In Progress</li>
                        </ol>
                    </div>
                </div>
                <div>
                    <div class="row">
                    <div class="col-md-3"></div>
                        <form action="includes/practice_start.php?n=<?php echo $next; ?>&question_number=<?php echo $number; ?>" method="post">
                            <div class="col-md-6 tender-all">
                                <div class="tender-header">
                                    <p>Question <?php echo $next+1; ?> of <?php echo $_SESSION['total']; ?></p>
                                </div>
                                <div class="tender-body">
                                    <br>
                                    <p class="tender-question"><?php echo $question; ?></p>
                                    <br>
                                    <?php
                                        $query="SELECT * FROM `choices`
                                        WHERE question_number = $number";
                            
                                        $statement = $connect->prepare($query);
                                        $statement->execute();
                                        $count= $statement -> rowCount();
                                        $choices = $statement->fetchAll();
                                    
                                        $progress=round((($next+1) / $_SESSION['total'])*100);
                                        
                                    ?>
                                    <ul>
                                        <?php foreach($choices as $choice) : ?>
                                            <li><input type="radio" name="choice" value="<?php echo $choice['id']; ?>" required><?php echo $choice['text']; ?></li>
                                        <?php endforeach ; ?>
                                    </ul>
                                </div>
                                <br>
                                <div class="tender-footer">
                                    <?php if($progress<100) : ?>
                                        <input type="submit" name="next_question" id="" class="btn btn-success pull-right" value="Next Question">
                                        <input type="submit" name="previous_question" id="" class="btn btn-default pull-left" value="Previous Question">
                                        <input type="hidden" name="number" id="" value="<?php echo $number; ?>">
                                    <?php else : ?>
                                        <input type="submit" name="next_question" id="" class="btn btn-success pull-right" value="Finish Test">
                                        <input type="hidden" name="number" id="" value="<?php echo $number; ?>">
                                    <?php endif ; ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </section>
    </section>
</section>
<?php include 'includes/footer.php'; ?>