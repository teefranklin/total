<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
    <section id="main-content">
        <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-users"></i>Users</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="../index.php">Home</a></li>
                            <li><i class="fa fa-users"></i><a href="../users.php">All Users</a></li>
                            <li><i class="fa fa-users"></i><a href="add_user.php">Add Users</a></li>
                        </ol>
                    </div>
                </div>
                <div class="add-header">
                <h5><i>Not Every Field is to be filled, The user will complete their Own Profile</i></h5>
                    <form action="../includes/process.php" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <legend>Personal Information</legend>
                                <label for="name">First Name</label>
                                <input type="text" name="firstname" id="" class="form-control" placeholder="Enter Your Fisrt Name Here"  required>
                                <label for="name">Middle Name</label>
                                <input type="text" name="middlename" id="" class="form-control" placeholder="Enter Your Middle Name Here">
                                <label for="name">Last Name</label>
                                <input type="text" name="lastname" id="" class="form-control" placeholder="Enter Your Last Name Here" required>
                                <label for="">Nationality</label>
                                <select name="nationality" id="" class="form-control">
                                    <option value="Uganda"> Uganda</option>
                                    <option value="Zimbabwean" selected>Zimbabwean</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Tanzania">Tanzania</option>
                                    <option value="Rwanda">Rwanda</option>
                                </select>
                                <label for="">Gender</label>
                                <select name="gender" id="" class="form-control">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                                <label for="">DOB</label>
                                <input type="date" name="dob" id="" placeholder="25-08-1996" class="form-control">
                                <label for="">Marital Status</label>
                                <select name="marital_status" id="" class="form-control">
                                    <option value="Married">Married</option>
                                    <option value="Single">Single</option>
                                </select>
                                <label for="">IGG</label>
                                <input type="text" name="igg" id="" placeholder="J04654648" class="form-control" required>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <legend>Job Information</legend>
                                <Label>Department</Label>
                                <select name="department" id="" class="form-control">
                                    <option value="Business Development">Business Development</option>
                                    <option value="Technical">Technical</option>
                                    <option value="HR">HR</option>
                                    <option value="Marketing">Marketing</option>
                                </select>
                                <label for="">Job Description</label>
                                <input type="text" name="description" id="" class="form-control" placeholder="Enter Job Description Here">
                                <label for="">Position</label>
                                <input type="text" name="position" id="" class="form-control" placeholder="Enter Position Here" required>
                                <label for="">Role</label>
                                <select name="role" id="" class="form-control">
                                    <option value="admin">Admin</option>
                                    <option value="participant">Participant</option>
                                </select>
                                <br>
                                <legend>Contact Information</legend>
                                <label for="">Phone Number</label>
                                <input type="text" name="phone" id="" class="form-control" placeholder="Enter Phone Number Here">
                                <label for="">Email</label>
                                <input type="email" name="email" id="" class="form-control" placeholder="Enter Email Here" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <legend>Address</legend>
                                <label for="">Street</label>
                                <input type="text" name="street" id="" class="form-control" placeholder="Enter Street Address Here">
                                <label for="name">City</label>
                                <input type="text" name="city" id="" class="form-control" placeholder="Enter City Here">
                                <label for="">Country</label>
                                <select name="country" id="" class="form-control">
                                    <option value="Uganda"> Uganda</option>
                                    <option value="Zimbabwe" selected>Zimbabwe</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Tanzania">Tanzania</option>
                                    <option value="Rwanda">Rwanda</option>
                                </select>
                                <label for="">Zip Code</label>
                                <input type="text" name="zip" id="" class="form-control" placeholder="Enter Zip Code Here">
                                <label for="">Province</label>
                                <input type="text" name="province" id="" class="form-control" placeholder="Enter Province Here">
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <legend>Expertise</legend>
                                <label for="">Language(s)</label>
                                <input type="text" name="language" id="" class="form-control" placeholder="e.g. Shona, English, Ndebele">
                                <span><i>many languages can be seperated by a comma </i></span> <br> <br>
                                <label for="">Application(s)</label>
                                <input type="text" name="application" id="" class="form-control" placeholder="e.g. C-one, IBM-BI, E-Board">
                                <span><i>many applications can be seperated by a comma </i></span> <br> <br>
                                <label for="">Degree(s) or Certificates</label>
                                <input type="text" name="certificate" id="" class="form-control" placeholder="e.g. Bachelors of Science in Information Technology">
                                <span><i>many certifictes can be seperated by a comma </i></span> <br> <br>
                            </div>
                        </div>
                       <br>
                       <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4"> <input type="submit" name="add_user" id="" class="btn btn-success" value="Add User"></div>
                            <div class="col-md-4"></div>
                       </div>
                    </form>
                </div>
        </section>
    </section>
</section>

<br><br><br>
<?php include 'includes/footer.php'; ?>