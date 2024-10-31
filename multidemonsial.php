<!-- multidimensional arrays are arrays that have more than 2 values  -->
 <!-- 
Types of arrays:
 Two-Dimensional Array (2D Array),
Three-Dimensional Array (3D Array). -->


<?php 

 $dogs = array(
    array ("Chichuahsah", "Mexico", "20"),
    array ("Husky","Siberia","15"),
    array("Bulldog","England","10"),
 );



echo $dogs [0][0]. ":Origin: " . $dogs[0][1] . ",Life Span" . $dogs[0][2]. "<br>";
echo $dogs [1][0]. ":Origin: " . $dogs[1][1] . ",Life Span" . $dogs[1][2]. "<br>";
echo $dogs [2][0]. ":Origin: " . $dogs[2][1] . ",Life Span" . $dogs[2][2]. "<br>";



for ($row = 0; $row< 3; $row++){
    echo "p<br> number $row </br></p>";
    echo "<ul>";
    for($col = 0; $col< 3; $col++){
        echo "<li>",$dogs[$row][$col]."<li>";
    }
    echo "</ul>";
}

// Nasty loop

$arrays = array(
    array(1,2,3),
    array(1,2,3),
    array(1,2,3)
);

for($i = 1; $i<4; $i++){
    for($j = 1; $j<4; $j++){
        echo "Array: $i Element: $j <br>";
    }
};



for($i = 1; $i <5; $i++){
    for($j = 1; $j <=$i; $j++){
        echo "*";
    }

    echo '<br/>';
}
