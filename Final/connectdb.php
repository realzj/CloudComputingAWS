<?php
	 //http://smcse.city.ac.uk/student/adbt154/
	 $db = new mysqli('smcse-stuproj00.city.ac.uk', 'adbt154', '200021901', 'adbt154');
	 if ($db->connect_error) {
		 printf("Connection failed: %s\n", $db->connect_error);
		 exit();
	 } 
 ?>