<?php 



$filename = 'example.txt';

if(file_exists($filename)) {
    $content = file_get_contents($filename);

    echo \n($content);
} else {
    echo "THe file doesnt exist!!";
}
             
        
          
    














?>