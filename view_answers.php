<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<?php include 'connection/database.php'; ?>
<?php
$i = 0;
if ($_SESSION['ansad'] == 0) {
    die('<br><br><br><br><br><h1 align="center">test is finished please click <a href="practice.php">Here </a> to start another one</h1>');
}
?>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-pencil"></i>View Answers</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                    <li><i class="icon_documents_alt"></i>Practice</li>
                    <li><i class="fa fa-pencil"></i>View Answers</li>
                </ol>
            </div>
        </div>
        <main>
            <div class="container">
                <?php for ($i = 0; $i < $_SESSION['total']; $i++) : ?>
                    <?php
                        $query = "SELECT * FROM `questions` WHERE question_number = " . $_SESSION['all_questions'][$i];
                        $statement = $connect->prepare($query);
                        $statement->execute();
                        $count = $statement->rowCount();
                        $result = $statement->fetchAll();
                        ?>
                    <?php foreach ($result as $questions) : ?>
                        <p class="question"><?php echo $i + 1; ?><?php echo ") " . $questions['text']; ?></p>
                        <?php
                                $query = "SELECT * FROM `choices` WHERE question_number = " . $_SESSION['all_questions'][$i];
                                $statement = $connect->prepare($query);
                                $statement->execute();
                                $count = $statement->rowCount();
                                $choices = $statement->fetchAll();
                                ?>
                        <ul class="choices">
                            <?php foreach ($choices as $row) : ?>
                                <li>
                                    <input type="radio" name="choice" value="<?php echo $row['id']; ?>" <?php if ($row['is_correct'] == 1) {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>>
                                    <?php
                                                if ($row['is_correct'] == 1) {
                                                    echo "<span style='color:green;font-weight:bolder;'>" . $row['text'] . '</span>';
                                                } else if ($row['id'] == $_SESSION['ansas'][$i]) {
                                                    echo "<span style='color:red'>" . $row['text'] . '</span>' . "<span style='margin-left:60px; color:red;'>Wrong Answer</span>";
                                                } else {
                                                    echo $row['text'];
                                                }
                                                ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <hr style="height:3px color:black;">
                    <?php endforeach; ?>
                <?php endfor; ?>
                <?php
                $_SESSION['system_tested'] = '';
                $_SESSION['practice_id'] = '';
                $_SESSION['total'] = 0;
                $_SESSION['ansad'] = 0;
                $_SESSION['score'] = 0;
                ?>
                <a href="practice.php" class="btn btn-info"><i class="fa fa-arrow-left"></i>&nbsp;Take The Test Again</a>
                <a href="marks.php" class="btn btn-info">View Marks &nbsp; <i class="fa fa-arrow-right"></i></a>
            </div>
        </main>
    </section>
</section>
</section>
<br><br><br><br><br>
<?php include 'includes/footer.php'; ?>