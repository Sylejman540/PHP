<?php
// if statement, if... elseif stament, if...elseif...else statement, switch statement




$num = -1;


if ($num <0) { echo "$num is less than0"; // Changed 'greater' to 'less'  
}  

$age =144;  
if ($age >18) {  
 echo "You are a grandfather (wow)"; // Added a space before (wow)  
} else {  
 echo "You are under18 <br>";  
}  

if (($age >12) && ($age <20)) {  
 echo "Discount for you!!!";  
}  

if ($num <0) {  
 echo "The value of $num is negative";  
}elseif ($num ==0) {  
 echo "The value of $num is0";  
} else {  
 echo "The value of $num is a positive number"; // Changed 'pos' to 'positive'  
}  

$score =12;  

if ($score >=90 && $score <=100) {  
 echo "A";  
} elseif ($score >=70 && $score <=89) {  
 echo "B";  
} elseif ($score >=50 && $score <=69) {  
 echo "C";  
} else {  
 echo "F";  
}  

$grade = 'B';  

switch ($grade) {  
 case 'A': // Changed ';' to ':'  
 echo 'Excellent! You got an A';  
 break;  
 case 'B': // Changed ';' to ':'  
 echo 'Excellent! You got a B';  
 break;  
 case 'C': // Changed ';' to ':'  
 echo 'Well done! You got a C!';  
 break;  
 case 'D': // Changed ';' to ':'  
 echo 'Study more next time! You got a D';  
 break;  
 case 'F': // Changed ';' to ':'  
 echo 'You failed! You got an F';  
 break;  
 default:  
 echo 'Invalid value';  
 break;  
}  

for ($x = 0; $x <= 10;$x++){
    echo "The number is $x <br>";
    }

$x = 1;
do {
    echo "The number is $x<br>";
    $x++;
} while ($x <= 5);

$x = 1;
while ($x <= 5) {
    echo "The number is $x<br>";
    $x++;
};

$car = array("BMW", "VW", "Audi", "Tesla");
    foreach($car as $value){
    echo "$value <br>";
    }

    $age = array("John" => "18", "Michael" => "23", "Joe" => "10");
    foreach($age as $x=> $value){
    echo "$x=$val <br>";
    }







?>  

