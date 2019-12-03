<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<?php
include 'connection/database.php';
$nationality=array(
    'Rwanda',
    'Uganda',
    'Kenya',
    'Tanzania',
    'Zimbabwean'
);
$countries=array(
    'Rwanda',
    'Uganda',
    'Kenya',
    'Tanzania',
    'Zimbabwe'
);

$gender=array(
    'Female',
    'Male',
    'Other'
);

$ms=array(
    'Married',
    'Single',
    'Other'
);

$departments=array(
    'Business Development',
    'Technical',
    'HR',
    'Marketing'
);

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
                        <h3 class="page-header"><i class="fa fa-pencil"></i>Update Profile</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
                            <li><i class="fa fa-user"></i><a href="prof.php">My Profile</a></li>
                            <li><i class="fa fa-pencil"></i><a href="updateProfile.php">Update Profile</a></li>
                        </ol>
                    </div>
                </div>
                <div class="update-main">
                    <form action="includes/edit_my_info.php" method="post" enctype="multipart/form-data">
                        <div class="profile-header">
                            <div class="row">
                                <div class="col-md-3">
                                   
                                    
                                </div>
                                <div class="col-md-3 my-wrapper" id="image-box">
                                    <img src="./avatars/<?php echo $avatar ?>" alt="Image" height="400px" width='300px' id="avatar">
                                    <input type="file" id="file" name="change" class="changePic" onchange="readURL(this);" />
                                    <label for="file" class="btn-2"><span class="fa fa-upload"></span> Change Image</label>
                                </div>
                                <div class="col-md-4">
                                    
                                </div>
                                <div class="col-md-2">
                                    <input type="submit" name="save_changes" class="btn btn-success" value="Save changes">
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
                                                        <input type="text" name="firstname" id="" class="form-control"
                                                            value="<?php echo $firstname; ?>">
                                                    </p>
                                                    <p>
                                                        <span class="detail">Middle Name</span> <br>
                                                        <input type="text" name="middlename" id="" class="form-control"
                                                            value="<?php echo $middlename; ?>">
                                                    </p>
                                                    <p>
                                                        <span class="detail">Lastname</span> <br>
                                                        <input type="text" name="lastname" id="" class="form-control"
                                                            value="<?php echo $lastname; ?>">
                                                    </p>
                                                    <p>
                                                        <span class="detail">Nationality</span> <br>
                                                        <input type="text" name="nationality" id="" class="form-control"
                                                            value="<?php echo $nationality; ?>">
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>
                                                        <span class="detail">Gender</span> <br>
                                                        <input type="text" name="gender" id="" class="form-control"
                                                            value="<?php echo $gender; ?>">
                                                    </p>
                                                    <p>
                                                        <span class="detail">D.O.B</span> <br>
                                                        <input type="date" value="<?php echo $dob; ?>" class="form-control" name="dob">
                                                    </p>
                                                    <p>
                                                        <span class="detail">Marital Status</span> <br>
                                                        <input type="text" name="marital_status" id="" class="form-control"
                                                            value="<?php echo $marital_status; ?>">
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
                                                        <select name="department" id="" class="form-control">
                                                            <?php foreach($departments as $dp) : ?>
                                                                <?php if($dp == $department) : ?>
                                                                    <option value="<?php echo $dp; ?>" selected><?php echo $dp; ?></option>
                                                                <?php else: ?>
                                                                    <option value="<?php echo $dp; ?>" ><?php echo $dp; ?></option>
                                                                <?php endif ; ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>
                                                        <span class="detail">Description</span> <br>
                                                        <input type="text" name="description" id="" class="form-control"
                                                            value="<?php echo $description; ?>">
                                                    </p>
                                                    <p>
                                                        <span class="detail">Position</span> <br>
                                                        <input type="text" name="position" id="" class="form-control"
                                                            value="<?php echo $position; ?>">
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
                                                        <input type="text" name="street" id="" class="form-control"
                                                            value="<?php echo $street; ?>">
                                                    </p>
                                                    <p>
                                                        <span class="detail">Province</span> <br>
                                                        <input type="text" name="province" id="" class="form-control"
                                                            value="<?php echo $province; ?>">
                                                    </p>
                                                    <p>
                                                            <select name="country" id="" class="form-control">
                                                            <?php foreach($countries as $c) : ?>
                                                                <?php if($c== $country) : ?>
                                                                    <option value="<?php echo $c; ?>" selected><?php echo $c; ?></option>
                                                                <?php else: ?>
                                                                    <option value="<?php echo $c; ?>" ><?php echo $c; ?></option>
                                                                <?php endif ; ?>
                                                            <?php endforeach; ?>
                                                            </select>
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>
                                                        <span class="detail">City</span> <br>
                                                        <input type="text" name="city" id="" class="form-control"
                                                            value="<?php echo $city; ?>">
                                                    </p>
                                                    <p>
                                                        <span class="detail">Zip Code</span> <br>
                                                        <input type="text" name="zip" id="" class="form-control"
                                                            value="<?php echo $zip; ?>">
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
                                                        <input type="text" name="phone" id="" class="form-control"
                                                            value="<?php echo $phone; ?>">
                                                    </p>
                                                    <p>
                                                        <span class="detail">Email</span> <br>
                                                        <input type="email" name="email" id="" class="form-control"
                                                            value="<?php echo $email; ?>">
                                                    </p>
                                                </div>
                                            </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div id="menu2" class="tab-pane fade">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3>Expertise</h3>
                                            <hr class="underLine" align="left">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p>
                                                        <span class="detail">Languages</span> <br>
                                                        <input type="text" name="language" id="" class="form-control"
                                                            value="<?php echo $language; ?>">

                                                    </p>

                                                    <p>
                                                        <span class="detail">Applications</span> <br>
                                                        <input type="text" name="application" id="" class="form-control"
                                                            value="<?php echo $application; ?>">

                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>
                                                        <span class="detail">Certificate or Degree</span> <br>
                                                            <input type="text" name="certificate" id="" class="form-control"
                                                            value="<?php echo $certificate; ?>">
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </section>
        <!--main content end-->
    </section>
    <?php include 'includes/footer.php'; ?>
