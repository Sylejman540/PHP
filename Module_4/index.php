<?php
// if statement, if... elseif stament, if...elseif...else statement, switch statement




$num = -1;


if($num < 0){  
    echo "$num is greater than 0";
}


$age = 144;
if($age > 18){
    echo "You are a grandfather(wow)";
}else{
    echo "You are under 18 <br>";
}

if(($age > 12)  && ($age < 20)){
    echo "Discount for you!!!";
}

// 
if($num<0){
    echo "The value of $num is negative";
}elseif($num == 0){
    echo "The value of $num is 0";
}else{
    echo "The value of $num is a pos number";
}


$score = 12;

if($score >= 90 && $score <= 100){
    echo "A";
}elseif($score >=70 && $score <=89){
    echo "B";
}
elseif($score >=50 && $score <=69){
    echo "C";
}
else {
    echo "F";
}




$grade = 'B';

switch($grade){
    case 'A';
        echo 'Excellent! You got an A';
    break;
    case 'B';
        echo 'Excellent! You got a B';
    break;
    case 'C';
        echo 'Well done! You got a C!';
    break;
    case 'D';
        echo 'Study more next time! You got a D';
    break;
    case 'F';
        echo 'You failed! You got a F';
    break;
    default:
    echo 'Invalid value';
    break;
}

?>
