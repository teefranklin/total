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
    if($questions<=0){
        die('Number of questions should be greater than 0');
    }
    $response_id=get_random_response_id($connect);
    

    $_SESSION['system_tested']=$system;
    $_SESSION['practice_id']=$response_id;
    $_SESSION['total']=$questions;
    $query ="SELECT * FROM questions where system ='".$system."'";
            
    $statement = $connect->prepare($query);
    $statement->execute();
    $count= $statement -> rowCount();
    $result = $statement->fetchAll();

    if($count>0){
        $_SESSION['questions_array']=check($i,$myQuestions,$count,$questions);
        foreach($result as $row){
            array_push($all_questions,$row['question_number']);
        }    
    }else{
        die('questions for selected system not found');
    }

    while($j<$questions){
        array_push($real_questions,$all_questions[$_SESSION['questions_array'][$j]]);
        $j++;
    }
    $_SESSION['all_questions']=$real_questions;
    //print_r($_SESSION['all_questions']);
    //die();
    header('Location:../questions.php?n=0');

}else if(isset($_POST['next_question'])){
        $_SESSION['ansad']++;
        $number = $_POST['number'];
        $choice = $_POST['choice'];
        $a = $_GET['n'];
        $next = $a+1;
        $_SESSION['ansas'][$a] = $choice;


    if($next == $_SESSION['total']){
        $start_date=date('Y-m-d H:i:s');
        $fullname=$_SESSION['fullname'];

        $query="SELECT * FROM choices 
                WHERE question_number = $number and is_correct=1";
        $statement = $connect->prepare($query);
        $statement->execute();
        $count = $statement -> rowCount();
        $result = $statement->fetchAll();

        foreach($result as $row){
            $correct_choice=$row['id'];
        }

        if($choice == $correct_choice){
            $_SESSION['score']++;
        }

        $query = "INSERT INTO marks(user_id,practice_id,start_date,mark_attained,mark_limit,percentage,system)
        VALUES('".$_SESSION['user_id']."',
        '".$_SESSION['practice_id']."',
        '$start_date',
        '".$_SESSION['score']."',
        '".$_SESSION['total']."',
        ".round(($_SESSION['score']/$_SESSION['total'])*100).",
        '".$_SESSION['system_tested']."')";

        $statement = $connect->prepare($query);
        $statement->execute();

        //$_SESSION['system_tested']='';
        //$_SESSION['practice_id']='';
        //$_SESSION['total']=0;
        //$_SESSION['ansad']=0;
        //$_SESSION['score']=0;
        

        //take all answers and create pdf
        header('Location:../view_answers.php');
    }else{

        $query="SELECT * FROM choices 
                WHERE question_number = $number and is_correct=1";
        $statement = $connect->prepare($query);
        $statement->execute();
        $count = $statement -> rowCount();
        $result = $statement->fetchAll();

        foreach($result as $row){
            $correct_choice=$row['id'];
        }

        if($choice == $correct_choice){
            $_SESSION['score']++;
        }

        header('Location:../questions.php?n='.$next);
    }
    

    
}

//generate random response id
function  get_random_response_id($connect){
    $q='P'.rand(2000,2999);
    $id=check_response_in_DB($q,$connect); 
    return $id;
}

function check_response_in_DB($id,$connect){
    $query ="SELECT * FROM marks
    WHERE practice_id ='".$id."'";

	$statement = $connect->prepare($query);
	$statement -> execute();
    $count = $statement -> rowCount();

    //die(''.$count);
    if($count == 0){
        return $id;
    }else{
        get_random_response_id($connect);
    }
}

function check($i,$myQuestions,$count,$questions){
    while($i < $questions){
        $q = rand(1,$count);
        
        if(in_array($q, $myQuestions)){
            check($i, $myQuestions,$count,$questions);
        }else{
            $myQuestions[$i] = $q;
            $i++;
        }
    }
    return $myQuestions;
}