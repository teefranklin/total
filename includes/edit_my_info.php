<?php
include '../connection/database.php';

session_start();

if(isset($_POST['save_changes'])){
    $target_dir = "../avatars/";
    $target_file = $target_dir . basename($_FILES["change"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $avatar=basename($_FILES["change"]["name"]);
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "") {
        die("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    }
    if (move_uploaded_file($_FILES["change"]["tmp_name"], $target_file)|| $imageFileType == "") {
        //getting personal information
        $user_id=$_SESSION['user_id'];
        
        $firstname=trim($_POST['firstname']);
        $middlename=trim($_POST['middlename']);
        $lastname=trim($_POST['lastname']);
        $nationality=trim($_POST['nationality']);
        $gender=trim($_POST['gender']);
        $dob=$_POST['dob'];
        $marital_status=trim($_POST['marital_status']);

        //getiing job information
        $department=trim($_POST['department']);
        $description=trim($_POST['description']);
        $position=trim($_POST['position']);
        $role=trim($_POST['role']);

        //getting contact information
        $phone=trim($_POST['phone']);
        $email=trim($_POST['email']);

        //getting address
        $street=trim($_POST['street']);
        $city=trim($_POST['city']);
        $country=trim($_POST['country']);
        $zip=trim($_POST['zip']);
        $province=trim($_POST['province']);

        //getting expertise
        $language=trim($_POST['language']);
        $application=trim($_POST['application']);
        $certificate=trim($_POST['certificate']);

        //creating a default password
        $password='Password12';
        $password=password_hash($password,PASSWORD_DEFAULT);
        $username=$firstname .'_'.$lastname;

        if($imageFileType != ""){
                $_SESSION['avatar']=$avatar;
                //inserting personal info
                $query="UPDATE personal_information SET
                        firstname='$firstname',
                        middlename='$middlename',
                        lastname='$lastname',
                        nationality='$nationality',
                        gender='$gender',
                        dob='$dob',
                        marital_status='$marital_status',
                        avatar='$avatar'
                        WHERE user_id='$user_id'
                        ";
                $statement = $connect->prepare($query);
                $statement->execute();  
        }else{
                //inserting personal info
                $query="UPDATE personal_information SET
                        firstname='$firstname',
                        middlename='$middlename',
                        lastname='$lastname',
                        nationality='$nationality',
                        gender='$gender',
                        dob='$dob',
                        marital_status='$marital_status'
                        WHERE user_id='$user_id'
                        ";
                $statement = $connect->prepare($query);
                $statement->execute();  
        }
        

        //inserting job info
        $query="UPDATE job_information SET
                department='$department',
                job_description='$description',
                position='$position'
                WHERE user_id='$user_id'";
        $statement = $connect->prepare($query);
        $statement->execute();

        //inserting contact details
        $query="UPDATE contact_details SET
                phones='$phone',
                email='$email'
                WHERE user_id='$user_id'";
        $statement = $connect->prepare($query);
        $statement->execute();

        //inserting address info
        $query="UPDATE address SET
                street='$street',
                city='$city',
                province='$province',
                country='$country',
                zip='$zip'
                WHERE user_id='$user_id'";
        $statement = $connect->prepare($query);
        $statement->execute();

        //inserting address info
        $query="UPDATE expertise SET
                languages='".$language."',
                applications='".$application."',
                certificates='".$certificate."'
                WHERE user_id='".$user_id."'";
        $statement = $connect->prepare($query);
        $statement->execute();

        header('Location:../prof.php?msg=edit successful');
    } else {
        die("Sorry, there was an error uploading your file.");
    }
    

}

