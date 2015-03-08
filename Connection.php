<?php

function connect()  
{ 
	$host="localhost"; // Host name
	$username_db="root"; // Mysql username
	$password_db=""; // Mysql password
	$db_name="bed_and_breakfast"; // Database name


   if (!($link=mysql_connect("$host", "$username_db", "$password_db")))  
   {  
      echo "Cannot connect";  
      exit();  
   }  
   if (!mysql_select_db("$db_name",$link))  
   {  
      echo "Cannot connect to data base.";  
      exit();  
   }  
   return $link; 

}

?>