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
    if($row['status']=='active' && $_SESSION['role']=='admin'){
        $query ="UPDATE login SET status='disabled' WHERE user_id='".$id."'";
        $statement = $connect->prepare($query);
        $statement->execute(); 
        header('Location:../users.php');
    }else if($row['status']=='disabled' && $_SESSION['role']=='admin'){
        $query ="UPDATE login SET status='active' WHERE user_id='".$id."'";
        $statement = $connect->prepare($query);
        $statement->execute(); 
        header('Location:../users.php');
    }
}
     
	
?>