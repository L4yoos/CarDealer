<?php 
 session_start();
 $user_id = $_SESSION['id'];
 echo "<input type='hidden' id='$user_id'>"; 
 $counter_file = "count.txt"; 
 if(!file_exists($counter_file)){ 
 $f = fopen($counter_file, "w"); 
 fwrite($f,"0"); 
 fclose($f); 
 } 
 $f = fopen($counter_file, "r"); 
 $count = fread($f, filesize($counter_file)); 
 fclose($f); 
 if(!isset($_SESSION['visitedBefore'])){ 
 $_SESSION['visitedBefore'] = TRUE; 
 $count++; 
 $f = fopen($counter_file, "w"); 
 fwrite($f, $count); 
 fclose($f); 
 } 
?> 