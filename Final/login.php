<?php
if(!isset($_SESSION)){
        session_start();
    } 

    require_once "connectdb.php";

    $username = mysqli_escape_string($db, $_POST['username']);
    $password = mysqli_escape_string($db, $_POST['password']);
   // $role = mysqli_escape_string($db,$_POST['role']);
   

    
    $query = "SELECT * From cloudusers2 WHERE username = '$username' and password = '$password'";

    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_row($result);
   

if ($username !=$row[0] || $password != $row[1])
{echo "<script language='javascript'>
                    alert('Unable to log in - check your username & password.');
                    window.location.href = 'index.html';
                  </script>";
}

else { echo "<script language='javascript'>
                    alert('WELCOME BACK!')
                    window.location.href = 'flightSchedule.php';
                    </script>";
	
	
}
	
?>