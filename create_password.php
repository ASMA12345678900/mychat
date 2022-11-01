<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login to your account</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/signin.css">
</head>

<body>
    <div class="signin-form ">
        <form action="" method="POST">
            <div class="form-header ">
                <h2>Create New Password</h2>
                <p>  MyChat</p>
            </div>

            <div class="form-group">
                <label for="">Enter Password</label>
                <input type="password" class="form-control" name="pass1" placeholder="password" autocomplete="off" required>
            </div>
            
            <div class="form-group">
                <label for=""> Confirm Password</label>
                <input type="password" class="form-control" name="pass2" placeholder="Confirm password" autocomplete="off" required>
            </div>
           
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg" name="change"> Change </button>
            </div>
              
        </form>
     
    </div>
    <?php
    session_start();
    include('include/connection.php');

    if(isset($_POST['change'])){
        $user=$_POST['user_email'];
        $pass1=$_POST['pass1'];
        $pass2=$_POST['pass2'];

        if($pass1 !==$pass2){

            echo "
            <div class='alert alert-danger'>
            <strong> Your New password didn't match with confirm password</strong>
            </div>
        ";
        } 
 
        if($pass1 < 9 AND $pass2 < 9){
            echo "
            <div class='alert alert-danger'>
            <strong> Use 9 or more than 9 caracter</strong>
            </div>
        ";
        }

        if($pass1==$pass2 ){
            $update_pass=mysqli_query($con,"UPDATE user SET user_pass='$pass1' WHERE user_email='$user'");
             session_destroy();

            }else{
                echo"<script> alert('Go ahead and signin.')</script>";
                echo"<script>window.open('signin.php','_self')</script>";
            }





    }








?>

</body>

</html> 