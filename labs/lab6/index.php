<?php
session_start();
?>

<!DOCTYPE html>

<html>
    <head>
              <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title> Lab 6: Admin Login Page </title>
        <meta charset="utf-8">
    </head>
    <body>
    
        
       <h1> Admin Login </h1>
        
        <form method="POST" action="loginProcess.php">
            
            Username: <input type="text" name="username"/> <br />
            
            Password: <input type="password" name="password"/> <br />
            
            <input type="submit" name="login" value="Login"/>
            <br>
            <?php
            
            if($_SESSION['invalid']==true){
                echo "Wrong Password or Username";
            }
            ?>
        </form>

    </body>
</html>
<?php
unset($_SESSION['invalid']);
?>