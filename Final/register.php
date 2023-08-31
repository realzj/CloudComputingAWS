<?php

 require_once "connectdb.php"; //connect to database

 $username = mysqli_real_escape_string($db, $_POST['username']);
 $password = mysqli_real_escape_string($db, $_POST['password']);
 $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
 $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
 $email = mysqli_real_escape_string($db, $_POST['email']);
 $phone_number = mysqli_real_escape_string($db, $_POST['phone_number']);
 $passport_number = mysqli_real_escape_string($db, $_POST['passport_number']);
 $hashed_password = password_hash($password, PASSWORD_DEFAULT);

 $stm = mysqli_prepare($db, "INSERT INTO cloudusers2 VALUES (?,?,?,?,?,?,?)");

 $query = "SELECT username FROM cloudusers2 WHERE username='$username'";
 $query2 = "SELECT passport_number FROM cloudusers WHERE passport_number='$passport_number'";
 $query3 = "SELECT email FROM cloudusers2 WHERE email='$email'";
 $query4 = "SELECT phone_number FROM cloudusers WHERE phone_number='$phone_number'";

$result = mysqli_query($db, $query);
$result2 = mysqli_query($db, $query2);
$result3 = mysqli_query($db, $query3);
$result4 = mysqli_query($db, $query4);

  if (mysqli_num_rows($result)==1){
        echo "<script type='text/javascript'>
        alert('Username already taken - please enter a different username.');
		alert('Unable to register - check your details again please.');
		window.location.href = 'register.html';
    </script>";
		
       
    }
   if (mysqli_num_rows($result2)==1){
        echo "<script type='text/javascript'>
        alert('Passport number already in use - please log in to your account.');
		alert('Unable to register - check your details again please.');
		window.location.href = 'register.html';
    </script>";
			
    }
 if (mysqli_num_rows($result3)==1){
	 echo "<script type='text/javascript'>
        alert('email already in use - please log in to your account.');
		alert('Unable to register - check your details again please.');
		window.location.href = 'register.html';
    </script>";
 }
if (mysqli_num_rows($result4)==1){
        echo "<script type='text/javascript'>
        alert('Phone number already in use - please log in to your account.');
		alert('Unable to register - check your details again please.');
		window.location.href = 'register.html';
    </script>";
			
    }

//inserts data into databse 
else {
        mysqli_stmt_bind_param($stm, "sssssss", $username, $hashed_password, $first_name, $last_name, $email, $phone_number, $passport_number);
			
        
    //execute sql query
        mysqli_stmt_execute($stm);

    //alerts the user that their registration was successful with a java script prompt
echo "<script language='javascript'>
                    alert('Registered successfully!')
                    window.location.href='flightSchedule.php'; 
                    </script>";
        
    } 

  

      
?>