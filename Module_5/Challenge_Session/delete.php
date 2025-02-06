<?php
include 'config.php';

$id = $_GET['id'];

$sql = "DELETE
::contentReference[oaicite:0]{index=0}
 
