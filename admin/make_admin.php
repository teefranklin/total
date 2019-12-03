<?php
include '../connection/database.php';

$id=$_GET['id'];
session_start();

if($_SESSION['role']=='participant'){
    header('Location:../index.php');
}

$query ="SELECT * FROM login WHERE user_id='".$id."'";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

foreach($result as $row){
    if($row['role']=='participant'){
        $query ="UPDATE login SET role='admin' WHERE user_id='".$id."'";
        $statement = $connect->prepare($query);
        $statement->execute(); 
        header('Location:../users.php');
    }else if($row['role']=='admin'){
        $query ="UPDATE login SET role='participant' WHERE user_id='".$id."'";
        $statement = $connect->prepare($query);
        $statement->execute(); 
        header('Location:../users.php');
    }
    

}
     
	
?>