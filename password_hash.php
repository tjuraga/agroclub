<?php
$password = "mySecret123";
$hash = password_hash($password, PASSWORD_DEFAULT);
echo $hash; 
?>