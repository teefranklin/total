<?php

include '../connection/database.php';

$task_id=$_GET['task_id'];
session_start();

$query ="SELECT * FROM tasks where task_id ='".$task_id."'";
    
    
$statement = $connect->prepare($query);
$statement->execute();
$count= $statement -> rowCount();
$result = $statement->fetchAll();

if($count>0){
    $query ="DELETE FROM tasks where task_id ='".$task_id."'";
    
    $statement = $connect->prepare($query);
    $statement->execute();

    $query ="DELETE FROM notification where response_id ='".$task_id."'";
    
    $statement = $connect->prepare($query);
    $statement->execute();

    header('Location:../tasks.php');
}else{
    die('task not found');
}