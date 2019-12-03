<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<section id="main-content">
  <section class="wrapper">
    <!--overview start-->
    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"><i class="fa fa-laptop"></i>Admin Home</h3>
        <ol class="breadcrumb">
          <li><i class="fa fa-home"></i><a href="index.php">Admin Home</a></li>
        </ol>
      </div>
    </div>
    <div class="row container dash-items">
      <div class="col-md-3 div-body">
        <div class="number">
          <h1>1</h1>
        </div>
        <div class="description">
          <p>Systems available</p>
        </div>
        <span class="fa fa-cog my-icon"></span>
        <a href="../index.php#systems" class="pull-right">View All <span class="fa fa-arrow-right"></span></a>
      </div>

      <div class="col-md-3 div-body2">
        <?php
        include '../connection/database.php';
        $query = "SELECT * FROM personal_information";
        $statement = $connect->prepare($query);
        $statement->execute();
        $count = $statement->rowCount();
        $result = $statement->fetchAll();
        ?>
        <div class="number">
          <h1><?php echo $count; ?></h1>
        </div>
        <div class="description">
          <p>Users Registered</p>
        </div>
        <span class="fa fa-users my-icon2"></span>
        <a href="../users.php" class="pull-right">View All <span class="fa fa-arrow-right"></span></a>
      </div>
      <div class="col-md-3 div-body6">
        <?php
        include '../connection/database.php';
        $query = "SELECT * FROM questions";
        $statement = $connect->prepare($query);
        $statement->execute();
        $count = $statement->rowCount();
        $result = $statement->fetchAll();
        ?>
        <div class="number">
          <h1><?php echo $count; ?></h1>
        </div>
        <div class="description">
          <p>Multiple Choice Questions</p>
        </div>
        <span class="fa fa-spinner my-icon"></span>
        <a href="add.php" class="pull-right">Add Question <span class="fa fa-arrow-right"></span></a>
      </div>
    </div>
  </section>
</section>
<!--main content end-->
</section>
<?php include 'includes/footer.php'; ?>