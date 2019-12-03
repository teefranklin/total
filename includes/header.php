<?php
date_default_timezone_set("Africa/Harare");
include 'connection/database.php';
session_start();

if (!isset($_SESSION['username'])) {
  header('Location:login.php');
}
function checkStage($connect)
{
  $query = "SELECT * FROM login where user_id='" . $_SESSION['user_id'] . "'";
  $statement = $connect->prepare($query);
  $statement->execute();
  $count = $statement->rowCount();
  $result = $statement->fetchAll();

  foreach ($result as $row) {
    $progress = $row['stage'];
  }
  return $progress;
}
function redirect_to_stage($connect)
{
  switch (checkStage($connect)) {
    case 1:
      header("Location:introduction.php");
      break;
    case 2:
      header("Location:accessing_edms.php");
      break;
    case 3:
      header("Location:homepage.php");
      break;
    case 4:
      header("Location:assignments.php");
      break;
    case 5:
      header("Location:attach.php");
      break;
    case 6:
      header("Location:approvals.php");
      break;
    case 7:
      header("Location:archiving.php");
      break;
    case 8:
      header("Location:accessing_archives.php");
      break;
    default:
      die("</br></br></br></br><h1>Stage Unavailable</h1>");
  }
}
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Total | E-Learn Home</title>
    <link href="img/top.png" rel="icon">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />

    <!-- Custom styles -->
    <link href="css/widgets.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
    <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
    <link href="css/styleProfile.css" rel="stylesheet">
  </head>

  <body>
    <!-- container section start -->
    <section id="container" class="">


      <header class="header dark-bg">
        <div class="toggle-nav">
          <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
        </div>

        <!--logo start-->
        <a href="index.php" class="logo">E-<span class="lite">Learn</span></a>
        <!--logo end-->

        <div class="top-nav notification-row">

          <!-- notificatoin dropdown start-->
          <ul class="nav pull-right top-menu">
            <!-- user login dropdown start-->
            <li class="dropdown">
              <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <span class="profile-ava">
                  <img alt="" src="avatars/<?php echo $_SESSION['avatar']; ?>" height="40px" width="40px">
                </span>
                <span class="username"><?php echo $_SESSION['username']; ?></span>
                <b class="caret"></b>
              </a>
              <ul class="dropdown-menu extended logout">
                <div class="log-arrow-up"></div>
                <li class="eborder-top">
                  <a href="prof.php"><i class="icon_profile"></i> My Profile</a>
                </li>
                <li>
                  <a href="updateProfile.php"><i class="fa fa-pencil"></i>Edit My Profile</a>
                </li>
                <?php if ($_SESSION['role'] == 'admin') : ?>
                  <li>
                    <a href="admin/index.php"><i class="fa fa-home"></i>Admin Home</a>
                  </li>
                <?php endif; ?>
                <li>
                  <a href="#" data-toggle="modal" data-target="#myModal"><i class="icon_key_alt"></i>Change Password</a>
                </li>
                <li>
                  <a href="logout.php"><i class="fa fa-edit"></i> Log Out</a>
                </li>

              </ul>
            </li>
            <!-- user login dropdown end -->
          </ul>
          <!-- notificatoin dropdown end-->
        </div>
      </header>

      <!--header end-->