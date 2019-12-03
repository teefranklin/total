<?php

include '../connection/database.php';
session_start();
$id=$_GET['id'];


if($_SESSION['role']=='participant'){
    header('Location:../index.php');
}
$query ="SELECT * FROM login WHERE user_id='".$id."'";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$count= $statement -> rowCount();

if($count>0){
    $query ="DELETE FROM login WHERE user_id='".$id."'";
    $statement = $connect->prepare($query);
    $statement->execute();

    $query ="DELETE FROM personal_information WHERE user_id='".$id."'";
    $statement = $connect->prepare($query);
    $statement->execute();

    $query ="DELETE FROM job_information WHERE user_id='".$id."'";
    $statement = $connect->prepare($query);
    $statement->execute();

    $query ="DELETE FROM contact_details WHERE user_id='".$id."'";
    $statement = $connect->prepare($query);
    $statement->execute();

    $query ="DELETE FROM expertise WHERE user_id='".$id."'";
    $statement = $connect->prepare($query);
    $statement->execute();

    $query ="DELETE FROM address WHERE user_id='".$id."'";
    $statement = $connect->prepare($query);
    $statement->execute();

    header('Location:../users.php');
}else{
    echo "<script>alert('selected user has already been deleted');</script>";
}
?>