<?php include '../connection/database.php'; ?>
<?php

session_start();

if(isset($_POST['add_multiple'])){
    $question_number=$_POST['question_number'];
    $question_text1=$_POST['question_text'];
    $choices=array();
    $question_text="";
    $choices[1]=$_POST['choice1'];
    $choices[2]=$_POST['choice2'];
    $choices[3]=$_POST['choice3'];
    $choices[4]=$_POST['choice4'];
    $choices[5]=$_POST['choice5'];
    $result = str_split($question_text1);
    $result[count($result)]='.';
    $result[count($result)+1]='.';
    $result[count($result)+2]='.';
    for($i=0;$i<count($result)-2;$i++){
        if(($result[$i]=='i' && $result[$i+1]==')') || ($result[$i]=='i' && $result[$i+1]=='i' && $result[$i+2]==')') || ($result[$i]=='i' && $result[$i+1]=='i' && $result[$i+2]=='i' && $result[$i+3]==')') || ($result[$i]=='i' && $result[$i+1]=='v' && $result[$i+2]==')')){
            $n++;
            if($n>1){
                $question_text.=$result[$i];
            }else{
                $question_text.='<br>'.$result[$i];
            }
        }else{
            $n=0;
            $question_text.=$result[$i];
            
        }
    }
    $correct_choice=$_POST['correct_choice'];
    $query="INSERT INTO `questions` (question_number,text)
            VALUES('$question_number','$question_text')";
    $statement = $connect->prepare($query);
    $statement->execute();

    foreach ($choices as $choice => $value) {
        if($value != ''){
            if($correct_choice==$choice){
                $is_correct=1;
            }else{
                $is_correct=0;
            }
            $query="INSERT INTO `choices` (question_number,is_correct,text)
                    VALUES('$question_number','$is_correct','$value')";
            $statement = $connect->prepare($query);
            $statement->execute();
        }
    }

    header("Location:../admin/add.php?msg=Question has been Added");
}