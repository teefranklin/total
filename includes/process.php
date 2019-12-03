<?php
include '../connection/database.php';

session_start();

if(isset($_POST['add_user']) && $_SESSION['role']=='admin'){
    //getting personal information
    $user_id=trim($_POST['igg']);
    $firstname=trim($_POST['firstname']);
    $middlename=trim($_POST['middlename']);
    $lastname=trim($_POST['lastname']);
    $nationality=trim($_POST['nationality']);
    $gender=trim($_POST['gender']);
    $dob=$_POST['dob'];
    $marital_status=trim($_POST['marital_status']);
    $avatar='';
    if($gender=='Male'){
        $avatar='default_male.png';
    }else if($gender=='Female'){
        $avatar='default_female.png';
    }else{
        $avatar='default_other.png';
    }

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

    //inserting personal info
    $query="INSERT INTO personal_information
             (user_id,firstname,middlename,lastname,nationality,gender,dob,marital_status,avatar)
    VALUES('$user_id','$firstname','$middlename','$lastname','$nationality','$gender','$dob','$marital_status','$avatar')";
    $statement = $connect->prepare($query);
    $statement->execute();

    //inserting job info
    $query="INSERT INTO job_information
             (user_id,department,job_description,position)
    VALUES('$user_id','$department','$description','$position')";
    $statement = $connect->prepare($query);
    $statement->execute();

    //inserting contact details
    $query="INSERT INTO contact_details
             (user_id,phones,email)
    VALUES('$user_id','$phone','$email')";
    $statement = $connect->prepare($query);
    $statement->execute();

    //inserting address info
    $query="INSERT INTO address
             (user_id,street,city,province,country,zip)
    VALUES('$user_id','$street','$city','$province','$country','$zip')";
    $statement = $connect->prepare($query);
    $statement->execute();

    //inserting address info
    $query="INSERT INTO expertise
             (user_id,languages,applications,certificates)
    VALUES('$user_id','$language','$application','$certificate')";
    $statement = $connect->prepare($query);
    $statement->execute();

    //inserting login info
    $query="INSERT INTO login
             (user_id,username,password,status,role)
    VALUES('$user_id','$username','$password','active','$role')";
    $statement = $connect->prepare($query);
    $statement->execute();

    header('Location:../users.php');

}else if(isset($_POST['edit_user']) && $_SESSION['role']=='admin'){
    //getting personal information
    
    $user_id=$_GET['id'];
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

    //inserting login info
    //$query="INSERT INTO login
            /// (user_id,username,password,status,role)
    ///VALUES('$user_id','$username','$password','active','$role')";
    //$statement = $connect->prepare($query);
    ///$statement->execute();

    header('Location:../users.php');

}else if(isset($_POST['update_password'])){
    $old_password=$_POST['old_password'];
    $new_password=$_POST['new_password'];
    $confirm_new_password=$_POST['confirm_new_password'];

    if($new_password == $confirm_new_password){
        $query ="SELECT * FROM login 
		WHERE username= :username";

		$statement = $connect->prepare($query);
		$statement -> execute(
			array(
				':username' => $_SESSION['username']
			)
		);
        $count= $statement -> rowCount();
        if($count>0){
            $result = $statement -> fetchAll();
				foreach($result as $row){
                    if(password_verify($_POST['old_password'],$row['password'])){
                        $new_password=password_hash($new_password,PASSWORD_DEFAULT);
                        $sub_query="
							UPDATE login SET password='".$new_password."'
                            WHERE user_id='".$_SESSION['user_id']."'";
						$statement = $connect -> prepare($sub_query);
                        $statement -> execute();
                        header('Location:../index.php');
                    }
                }
        }
    }else{
        die('passwords do not match click <a href ="../index.php">here</a> to go back to the homepage');
    }
}else if(isset($_POST['admin_update_password'])){
    $id=$_GET['id'];
    $new_password=$_POST['new_password'];
    $confirm_new_password=$_POST['confirm_new_password'];

    if($new_password == $confirm_new_password){
        
            $new_password=password_hash($new_password,PASSWORD_DEFAULT);
            $sub_query="
				UPDATE login SET password='".$new_password."'
			    WHERE user_id='".$id."'";
			$statement = $connect -> prepare($sub_query);
            $statement -> execute();
            header('Location:../users.php');
    }else{
        die('passwords do not match click <a href ="../index.php">here</a> to go back to the homepage');
    }
    
}else if($_POST['create_task']){
    $task_id=get_random_task_id($connect);
    $progress=0;
    $status="waiting";
    $start_date=date('Y-m-d');
    
    $assigned_by=$_SESSION['user_id'];

    $description=trim($_POST['description']);
    $due_date=$_POST['due_date'];

    if($_POST['assign_to'] == 'myself'){
        $assigned_to=$_SESSION['user_id'];
    }else if($_POST['assign_to'] == 'other'){
        $assigned_to=$_POST['assign_to_user_id'];
    }

      if($_SESSION['role']=='admin'){
        $target_dir = "../resources/tasks/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $document_file_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $document_name=basename($_FILES["file"]["name"]);
      
        $target_file = $target_dir . $start_date.'-'.$task_id.'.pdf';
        if(strtotime($start_date)<=strtotime($due_date)){
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file) && $assigned_to !='myself' ) {
                //inserting task
                $query="INSERT INTO tasks
                    (task_id,description,start_date,due_date,progress,status,assigned_by,assigned_to,supporting_document)
                    VALUES('$task_id','$description','$start_date','$due_date',$progress,'$status','$assigned_by','$assigned_to','".$start_date."-".$task_id.".pdf')";
                $statement = $connect->prepare($query);
                $statement->execute();
                header('Location:../tasks.php');
            }else{
                //inserting task
                $query="INSERT INTO tasks
                    (task_id,description,start_date,due_date,progress,status,assigned_by,assigned_to)
                    VALUES('$task_id','$description','$start_date','$due_date',$progress,'$status','$assigned_by','$assigned_to')";
                $statement = $connect->prepare($query);
                $statement->execute();
                header('Location:../tasks.php');
            }
                
        }else{
            die('due date is less than today !');
        }
      }else{
        if(strtotime($start_date)<strtotime($due_date)){
            //inserting task
            $query="INSERT INTO tasks
            (task_id,description,start_date,due_date,progress,status,assigned_by,assigned_to)
            VALUES('$task_id','$description','$start_date','$due_date',$progress,'$status','$assigned_by','$assigned_to')";
                $statement = $connect->prepare($query);
                $statement->execute();
                header('Location:../tasks.php');
                
        }else{
            die('due date is less than today !');
        }
      }
      
}else if($_POST['add_question']){
    $question_id=$_POST['question_number'];
    $question_text=$_POST['question_text'];
    $system=$_POST['for_system'];

    //add question
    $query="INSERT INTO tender_response_questions
            (text,system)
            VALUES('$question_text','$system')";
    $statement = $connect->prepare($query);
    $statement->execute();
    header('Location:../admin/add_question.php');

}

else{
    header('Location:../index.php');
}
//generate random user id
function  get_random_id($connect){
    $q='C'.rand(108000,199999);
    $id=checkDB($q,$connect); 
    return $id;
}
function checkDB($id,$connect){
    $query ="SELECT * FROM personal_information
	WHERE user_id=$id";
			
	$statement = $connect->prepare($query);
	$statement -> execute();
    $count= $statement -> rowCount();
    if($count==0){
        return $id;
    }else{
        get_random_id($connect);
    }
}
//generate random task id
function  get_random_task_id($connect){
    $q='T'.rand(1500,1999);
    $id=check_task_in_DB($q,$connect); 
    return $id;
}
function check_task_in_DB($id,$connect){
    $query ="SELECT * FROM tasks
	WHERE task_id=$id";
			
	$statement = $connect->prepare($query);
	$statement -> execute();
    $count= $statement -> rowCount();
    if($count==0){
        return $id;
    }else{
        get_random_task_id($connect);
    }
}
function get_users($connect){
    $query ="SELECT * FROM personal_information where 
    firstname LIKE '".$_POST['search']."%' OR 
    lastname LIKE '".$_POST['search']."%'  OR
    user_id LIKE '".$_POST['search']."%'";
    
    $statement = $connect->prepare($query);
    $statement->execute();
    $count= $statement -> rowCount();
    $result = $statement->fetchAll();

    $output='';
    
    if($count>0){
        foreach ($result as $row) {
            $output.="
                <tr><td>".$row['user_id'] ."</td>
                <td>".$row['firstname'] ."</td>
                <td>".$row['lastname']."</td>
            ";
            $query ="SELECT * FROM login where user_id='".$row['user_id']."'";
            $statement = $connect->prepare($query);
            $statement->execute();
            $login_info = $statement->fetchAll();
            foreach ($login_info as $data) {
                if($data['status']=='active'){
                    $output.="
                        <td><span class='label label-success'>".$data['status'] ."</span></td>
                        <a href='admin/deactivate_user.php?id=".$row['user_id']."' class='label label-warning'>Deactivate</a>
                    ";
                }else{
                    $output.="
                        <td><span class='label label-danger'>".$data['status'] ."</span></td>
                        <a href='admin/deactivate_user.php?id=".$row['user_id']."' class='label label-success'>Activate</a>
                    ";
                }
                
                if($_SESSION['role']=='admin'){
                    $output.="
                        <a href='admin/delete_user.php?id=".$row['user_id']."' class='label label-danger'>Delete</a>
                    
                    </tr>
                    ";
                }
            }
        }
    }else{
        $query ="SELECT * FROM login where 
        role LIKE '".$_POST['search']."%' OR 
        status LIKE '".$_POST['search']."%'";
        
        $statement = $connect->prepare($query);
        $statement->execute();
        $count= $statement -> rowCount();
        $login_info = $statement->fetchAll();

        if($count>0){
            $query ="SELECT * FROM personal_information where user_id='".$row['user_id']."'";
            $statement = $connect->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            foreach ($login_info as $data) {
                foreach ($result as $row) {
                    $output.="
                        <tr>
                        <td>".$row['user_id'] ."</td>
                        <td>".$row['firstname'] ."</td>
                        <td>".$row['lastname'] ."</td>
                    ";
                    if($data['status']=='active'){
                        $output.="
                            <td><span class='label label-success'>".$data['status'] ."</span></td>
                            <a href='admin/deactivate_user.php?id=".$row['user_id']."' class='label label-warning'>Deactivate</a>
                        ";
                    }else{
                        $output.="
                            <td><span class='label label-danger'>".$data['status'] ."</span></td>
                            <a href='admin/deactivate_user.php?id=".$row['user_id']."' class='label label-success'>Activate</a>
                        ";
                    }
                    
                    if($_SESSION['role']=='admin'){
                        $output.="
                            <a href='admin/delete_user.php?id=".$row['user_id']."' class='label label-danger'>Delete</a>
                        </tr>
                        ";
                    }
                }
            }
        }
    }
    return $output;
}
//generate random notification id
function  get_random_notification_id($connect){
    $q='N'.rand(3000,3999);
    $id=check_notification_in_DB($q,$connect); 
    return $id;
  }
  function check_notification_in_DB($id,$connect){
    $query ="SELECT * FROM notification
    WHERE notification_id=$id";
      
    $statement = $connect->prepare($query);
    $statement -> execute();
    $count= $statement -> rowCount();
    if($count==0){
        return $id;
    }else{
        get_random_notification_id($connect);
    }
  }