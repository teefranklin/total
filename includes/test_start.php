<?php

include '../connection/database.php';
session_start();
$myQuestions=array();
$all_questions=array();
$real_questions=array();
$i=0;
$j=0;
 if(isset($_POST['start_test'])){
    $system=trim($_POST['system_tested']);
    $questions=$_POST['number_of_questions'];
    $practice_company=$_POST['practice_company'];
    $response_id=get_random_response_id($connect);
    $assigned_to=trim($_POST['assign_to_user_id']);

    $_SESSION['system_tested']=$system;
    $_SESSION['practice_company']=$practice_company;
    $_SESSION['response_id']=$response_id;
    $_SESSION['total']=$questions;
    $_SESSION['assigned']=$assigned_to;

    $query ="SELECT * FROM tender_response_questions where system ='".$system."'";
            
    $statement = $connect->prepare($query);
    $statement->execute();
    $count= $statement -> rowCount();
    $result = $statement->fetchAll();

    if($count>0){
        $_SESSION['questions_array']=check($i,$myQuestions,$count,$questions);
        foreach($result as $row){
            array_push($all_questions,$row['question_id']);
        }
        
    }else{
        die('questions for selected system not found');
    }

    while($j<$questions){
        array_push($real_questions,$all_questions[$_SESSION['questions_array'][$j]]);
        $j++;
    }
    $_SESSION['all_questions']=$real_questions;
    header('Location:../tender_test.php?n=0');

}else if(isset($_POST['next_question'])){
    $next =(int) $_GET['n'];
    $id =(int) $_GET['question_id'];
    $answer=$_POST['answer'];

    if($next==$_SESSION['total']){
        $query="SELECT * FROM personal_information WHERE user_id='".$_SESSION['user_id']."'";
        $statement = $connect->prepare($query);
        $statement->execute();
        $count= $statement -> rowCount();
        $result = $statement->fetchAll();

        $start_date=date('Y-m-d');
        $fullname='';
        foreach($result as $row){
            $fullname=$row['firstname']." ".$row['lastname'];
        }

        $query="INSERT INTO tender_response_answers
             (question_id,response_id,answer,practice_company,date_started,initiator)
        VALUES('$id','".$_SESSION['response_id']."','$answer','".$_SESSION['practice_company']."','$start_date','$fullname')";
        $statement = $connect->prepare($query);
        $statement->execute();

        


        //take all answers and create pdf
        header('Location:../pdf/practice.php');
    }else{
        $query="SELECT * FROM personal_information WHERE user_id='".$_SESSION['user_id']."'";
        $statement = $connect->prepare($query);
        $statement->execute();
        $count= $statement -> rowCount();
        $result = $statement->fetchAll();

        $start_date=date('Y-m-d');
        $fullname='';
        foreach($result as $row){
            $fullname=$row['firstname']." ".$row['lastname'];
        }

        $query="INSERT INTO tender_response_answers
             (question_id,response_id,answer,practice_company,date_started,initiator)
        VALUES('$id','".$_SESSION['response_id']."','$answer','".$_SESSION['practice_company']."','$start_date','$fullname')";
        $statement = $connect->prepare($query);
        $statement->execute();

        header('Location:../tender_test.php?n='.$next);
    }
    

    
}
//generate random response id
function  get_random_response_id($connect){
    $q='RES'.rand(2000,2999);
    $id=check_response_in_DB($q,$connect); 
    return $id;
}
function check_response_in_DB($id,$connect){
    $query ="SELECT * FROM tender_response_answers
	WHERE response_id='$id'";
			
	$statement = $connect->prepare($query);
	$statement -> execute();
    $count= $statement -> rowCount();
    if($count==0){
        return $id;
    }else{
        get_random_response_id($connect);
    }
}
function check($i,$myQuestions,$count,$questions){
    while($i<$questions){
        $q=rand(1,$count);
        
        if(in_array($q, $myQuestions)){
            check($i, $myQuestions,$count,$questions);
        }else{
            $myQuestions[$i]=$q;
            $i++;
        }
    }
    return $myQuestions;
}