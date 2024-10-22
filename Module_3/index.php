<?php
   $the_string = 'Digital School';

   // Correct way to use strlen
   echo strlen($the_string . "\n");

   $programming = 'Programming is not cool';

   // Correct way to use str_replace
   echo str_replace("not", "very", $programming);
  
   $another_string = 'Programming';
   
   // Correct way to use strrev
   echo strrev($another_string);
?>
