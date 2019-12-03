<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<?php 
include '../connection/database.php';
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
$id=$_GET['id'];
if($_SESSION['role']=='participant'){
    header('Location:../index.php');
}
$query ="SELECT * FROM personal_information WHERE user_id='".$id."'";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

/*


$query ="SELECT * FROM job_information WHERE user_id='".$id."'";
$statement = $connect->prepare($query);
$statement->execute();

$query ="SELECT * FROM contact_details WHERE user_id='".$id."'";
$statement = $connect->prepare($query);
$statement->execute();

$query ="SELECT * FROM expertise WHERE user_id='".$id."'";
$statement = $connect->prepare($query);
$statement->execute();

$query ="SELECT * FROM address WHERE user_id='".$id."'";
$statement = $connect->prepare($query);
$statement->execute();

$query ="SELECT * FROM login WHERE user_id='".$id."'";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
*/
?>
    <section id="main-content">
        <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-users"></i>Users</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="../index.php">Home</a></li>
                            <li><i class="fa fa-users"></i><a href="../users.php">All Users</a></li>
                            <li><i class="fa fa-users"></i><a href="edit_user.php?id=<?php echo $id ?>">Edit Users</a></li>
                        </ol>
                    </div>
                </div>
                <div class="add-header">
                    <form action="../includes/process.php?id=<?php echo $id ?>" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <legend>Personal Information</legend>
                            <?php foreach($result as $row): ?>
                                <label for="name">First Name</label>
                                <input type="text" name="firstname" id="" class="form-control"  value="<?php echo $row['firstname']; ?>" required>
                                <label for="name">Middle Name</label>
                                <input type="text" name="middlename" id="" class="form-control" value="<?php echo $row['middlename']; ?>">
                                <label for="name">Last Name</label>
                                <input type="text" name="lastname" id="" class="form-control" value="<?php echo $row['lastname']; ?>" required>
                                <label for="">Nationality</label>
                                <select name="nationality" id="" class="form-control">
                                    <?php foreach($nationality as $nation): ?>
                                        <?php if($row['nationality'] == $nation): ?>
                                            <option value="<?php echo $nation; ?>" selected> <?php echo $nation; ?></option>
                                        <?php else: ?>
                                            <option value="<?php echo $nation; ?>"> <?php echo $nation; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <label for="">Gender</label>
                                <select name="gender" id="" class="form-control">
                                    <?php foreach($gender as $g): ?>
                                        <?php if($row['gender'] == $g): ?>
                                            <option value="<?php echo $g; ?>" selected> <?php echo $g; ?></option>
                                        <?php else: ?>
                                            <option value="<?php echo $g; ?>"> <?php echo $g; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <label for="">DOB</label>
                                <input type="date" name="dob" id="" placeholder="25-08-1996" class="form-control" value="<?php echo $row['dob']; ?>" >
                                <label for="">Marital Status</label>
                                <select name="marital_status" id="" class="form-control">
                                    <?php foreach($ms as $status): ?>
                                        <?php if($row['marital_status'] == $status): ?>
                                            <option value="<?php echo $status; ?>" selected> <?php echo $status; ?></option>
                                        <?php else: ?>
                                            <option value="<?php echo $status; ?>"> <?php echo $status; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            <?php endforeach; ?>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <?php 
                                    
                                    $query ="SELECT * FROM job_information WHERE user_id='".$id."'";
                                    $statement = $connect->prepare($query);
                                    $statement->execute();
                                    $result = $statement->fetchAll();
                                
                                ?>
                                <?php foreach($result as $row): ?>
                                    <legend>Job Information</legend>
                                    <Label>Department</Label>
                                    <select name="department" id="" class="form-control">
                                    <?php foreach($departments as $department): ?>
                                        <?php if($row['department'] == $department): ?>
                                            <option value="<?php echo $department; ?>" selected> <?php echo $department; ?></option>
                                        <?php else: ?>
                                            <option value="<?php echo $department; ?>"> <?php echo $department; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    </select>
                                    <label for="">Job Description</label>
                                    <input type="text" name="description" id="" class="form-control" value="<?php echo $row['job_description']; ?>">
                                    <label for="">Position</label>
                                    <input type="text" name="position" id="" class="form-control" value="<?php echo $row['position']; ?>" required>
                                <?php endforeach; ?>
                                <br>
                                <a href="make_admin.php?id=<?php echo $id ?>" class="btn btn-success">Make / Remove From Admin</a>
                                <a href="#" data-toggle="modal" data-target="#myModal2" class="btn btn-default">Change Password</a>
                                <br>
                                <br>
                                <?php 
                                    
                                    $query ="SELECT * FROM contact_details WHERE user_id='".$id."'";
                                    $statement = $connect->prepare($query);
                                    $statement->execute();
                                    $result = $statement->fetchAll();
                                
                                ?>
                                <?php foreach($result as $row): ?>
                                    <legend>Contact Information</legend>
                                    <label for="">Phone Number</label>
                                    <input type="text" name="phone" id="" class="form-control" value="<?php echo $row['phones']; ?>">
                                    <label for="">Email</label>
                                    <input type="email" name="email" id="" class="form-control" value="<?php echo $row['email']; ?>" required>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <?php 
                                    
                                    $query ="SELECT * FROM address WHERE user_id='".$id."'";
                                    $statement = $connect->prepare($query);
                                    $statement->execute();
                                    $result = $statement->fetchAll();
                                
                                ?>
                                <?php foreach($result as $row): ?>
                                    <legend>Address</legend>
                                    <label for="">Street</label>
                                    <input type="text" name="street" id="" class="form-control" value="<?php echo $row['street']; ?>" >
                                    <label for="name">City</label>
                                    <input type="text" name="city" id="" class="form-control" value="<?php echo $row['city']; ?>"d>
                                    <label for="">Country</label>
                                    <select name="country" id="" class="form-control">
                                    <?php foreach($countries as $country): ?>
                                        <?php if($row['country'] == $country): ?>
                                            <option value="<?php echo $country; ?>" selected> <?php echo $country; ?></option>
                                        <?php else: ?>
                                            <option value="<?php echo $country; ?>"> <?php echo $country; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    </select>
                                    <label for="">Zip Code</label>
                                    <input type="text" name="zip" id="" class="form-control" value="<?php echo $row['zip']; ?>">
                                    <label for="">Province</label>
                                    <input type="text" name="province" id="" class="form-control" value="<?php echo $row['province']; ?>">
                                <?php endforeach; ?>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <?php 
                                    
                                    $query ="SELECT * FROM expertise WHERE user_id='".$id."'";
                                    $statement = $connect->prepare($query);
                                    $statement->execute();
                                    $result = $statement->fetchAll();
                                
                                ?>
                                <?php foreach($result as $row): ?>
                                    <legend>Expertise</legend>
                                    <label for="">Language(s)</label>
                                    <input type="text" name="language" id="" class="form-control" value="<?php echo $row['languages']; ?>">
                                    <span><i>many languages can be seperated by a comma </i></span> <br> <br>
                                    <label for="">Application(s)</label>
                                    <input type="text" name="application" id="" class="form-control" value="<?php echo $row['applications']; ?>">
                                    <span><i>many applications can be seperated by a comma </i></span> <br> <br>
                                    <label for="">Degree(s) or Certificates</label>
                                    <input type="text" name="certificate" id="" class="form-control" value="<?php echo $row['certificates']; ?>">
                                    <span><i>many certifictes can be seperated by a comma </i></span> <br> <br>
                                <?php endforeach; ?>
                            </div>
                        </div>
                       <br>
                       <div class="row">

                            <div class="col-md-4"></div>
                            <div class="col-md-4"> <input type="submit" name="edit_user" id="" class="btn btn-primary" value="Edit User"></div>
                            <div class="col-md-4"></div>
                       </div>
                    </form>
                </div>
        </section>
    </section>
</section>
<?php include 'includes/footer.php'; ?>