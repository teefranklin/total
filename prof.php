<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<?php
include 'connection/database.php';

$query ="SELECT * FROM personal_information WHERE user_id='".$_SESSION['user_id']."'";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

foreach($result as $row){
    $firstname=$row['firstname'];
    $middlename=$row['middlename'];
    $lastname=$row['lastname'];
    $nationality=$row['nationality'];
    $gender=$row['gender'];
    $dob=$row['dob'];
    $marital_status=$row['marital_status'];
    $avatar=$row['avatar'];
    $fullname=$firstname." ". $middlename ." ".$lastname;
}

$query ="SELECT * FROM job_information WHERE user_id='".$_SESSION['user_id']."'";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

//getiing job information
foreach($result as $row){
    $department=trim($row['department']);
    $description=trim($row['job_description']);
    $position=trim($row['position']);
}

$query ="SELECT * FROM contact_details WHERE user_id='".$_SESSION['user_id']."'";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

//getting contact information
foreach($result as $row){
    $phone=trim($row['phones']);
    $email=trim($row['email']);
}

$query ="SELECT * FROM address WHERE user_id='".$_SESSION['user_id']."'";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

 //getting address
 foreach($result as $row){
    $street=trim($row['street']);
    $city=trim($row['city']);
    $country=trim($row['country']);
    $zip=trim($row['zip']);
    $province=trim($row['province']);
 }

$query ="SELECT * FROM expertise WHERE user_id='".$_SESSION['user_id']."'";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

  //getting expertise
  foreach($result as $row){
    $language=trim($row['languages']);
    $application=trim($row['applications']);
    $certificate=trim($row['certificates']);
  }
?>
 <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-user"></i>Profile</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                            <li><i class="fa fa-user"></i><a href="prof.php">My Profile</a></li>
                        </ol>
                    </div>
                </div>
                <div class="profile-main container">
                    <div class="profile-header">
                        
                        <div class="row">
                            <div class="col-md-2">
                                <img src="./avatars/<?php echo $avatar; ?>" alt="Image" height="180px">
                            </div>
                            <div class="col-md-8">
                                <h2 class="fullname"><?php echo $fullname; ?></h2>
                                <p class="job-title"><?php echo $position; ?></p>
                                <span class="fa fa-envelope "></span><span
                                    class="text"><?php echo $email; ?></span> <br>
                                <span class="fa fa-phone"></span><span class="text"> <?php echo $phone; ?></span>
                                <br>
                                <div class="bio">
                                    <br>
                                    <span class="bio-header detail"> Employee ID</span>
                                    <p class="bio-text"><?php echo $_SESSION['user_id']; ?></p>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <a href="updateProfile.php" class="btn btn-primary">Edit Profile</a>
                            </div>
                        </div>
                    </div>
                    <div class="profile-body">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home">Basic Information</a></li>
                            <li><a data-toggle="tab" href="#menu1">Address & Contact Details</a></li>
                            <li><a data-toggle="tab" href="#menu2">Expertise</a></li>
                        </ul>

                        <div class="tab-content container">
                            <div id="home" class="tab-pane fade in active ">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3>Personal Information</h3>
                                        <hr class="underLine" align="left">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>
                                                    <span class="detail">Firstname</span> <br>
                                                    <span class="answer"><?php echo $firstname; ?></span>
                                                </p>
                                                <p>
                                                    <span class="detail">Middle Name</span> <br>
                                                    <span class="answer"><?php echo $middlename; ?></span>
                                                </p>
                                                <p>
                                                    <span class="detail">Lastname</span> <br>
                                                    <span class="answer"><?php echo $lastname; ?></span>
                                                </p>
                                                <p>
                                                    <span class="detail">Nationality</span> <br>
                                                    <span class="answer"><?php echo $nationality; ?></span>
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>
                                                    <span class="detail">Gender</span> <br>
                                                    <span class="answer"><?php echo $gender; ?></span>
                                                </p>
                                                <p>
                                                    <span class="detail">D.O.B</span> <br>
                                                    <span class="answer"><?php echo $dob; ?></span>
                                                </p>
                                                <p>
                                                    <span class="detail">Marital Status</span> <br>
                                                    <span class="answer"><?php echo $marital_status; ?></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <h3>Job Information</h3>
                                        <hr class="underLine" align="left">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>
                                                    <span class="detail">Department</span> <br>
                                                    <span class="answer"><?php echo $department; ?></span>
                                                </p>
                                                
                                            </div>
                                            <div class="col-md-6">
                                                <p>
                                                    <span class="detail">Description</span> <br>
                                                    <span class="answer"><?php echo $description; ?></span>
                                                </p>
                                                <p>
                                                    <span class="detail">Position</span> <br>
                                                    <span class="answer"><?php echo $position; ?></span>
                                                </p>
                                            </div>
                                        </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3>Address</h3>
                                        <hr class="underLine" align="left">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>
                                                    <span class="detail">Street</span> <br>
                                                    <span class="answer"><?php echo $street; ?></span>
                                                </p>
                                                <p>
                                                    <span class="detail">Province</span> <br>
                                                    <span class="answer"><?php echo $province; ?></span>
                                                </p>
                                                <p>
                                                    <span class="detail">Country</span> <br>
                                                    <span class="answer"><?php echo $country; ?></span>
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>
                                                    <span class="detail">City</span> <br>
                                                    <span class="answer"><?php echo $city; ?></span>
                                                </p>
                                                <p>
                                                    <span class="detail">Zip</span> <br>
                                                    <span class="answer"><?php echo $zip; ?></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <h3>Contact Details</h3>
                                        <hr class="underLine" align="left">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>
                                                    <span class="detail">Phone(s)</span> <br>
                                                    <span class="answer"><?php echo $phone; ?></span>
                                                </p>
                                                <p>
                                                    <span class="detail">Email</span> <br>
                                                    <span class="answer"><?php echo $email; ?></span>
                                                </p>
                                            </div>
                                        </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3>Expertise</h3>
                                        <hr class="underLine" align="left">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>
                                                    <span class="detail">Languages</span> <br>
                                                    <span class="answer"><?php echo $language; ?></span>
                                                </p>

                                                <p>
                                                    <span class="detail">Applications</span> <br>
                                                    <span class="answer"><?php echo $application; ?></span>
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>
                                                    <span class="detail">Certificate or Degree</span> <br>
                                                    <span class="answer"><?php echo $certificate; ?></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section>
        </section>
        <!--main content end-->
    </section>
    <?php include 'includes/footer.php'; ?>
