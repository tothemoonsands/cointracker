<?php

  $DB_host = “localhost”;
  $DB_user = “user”;
  $DB_pass = “pass”;
  $DB_name = "cointable";
  
  $db = new MySQLi($DB_host,$DB_user,$DB_pass,$DB_name);
    
     if($MySQLi_CON->connect_error)
     {
         die("ERROR : -> ".$MySQLi_CON->connect_error);
     }

?>