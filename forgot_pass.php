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
                <h2>Forgot Password</h2>
                <p>  MyChat</p>
            </div>
            <div class="form-group">
                <label> Email</label>
                <input type="email" class="form-control" name="email" placeholder="someone@site.com" autocomplete="off"equired>
            </div>
            <div class="form-group">
                <label for=""> Bestfriend Name</label>
                <input type="text" class="form-control" name="bf" placeholder="password" autocomplete="off" required>
            </div>
           
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_in"> Sign in </button>
            </div>
              <?php include("signin_user.php"); ?>   
        </form>
        <div class="text-center small" style="color:#67428B;">Back to signin ? <a href="signin.php"> Click here</a></div>
    </div>
    <?php
    session_start();
    include("include/connection.php");

        if(isset($_POST['submit'])){

            $email=htmlentities(mysqli_real_escape_string($con,$_POST['email']));
            $r_a=htmlentities(mysqli_real_escape_string($con,$_POST['bf']));
             
            $select="select * from user where user_email='$email' AND forgetten_answer='$r_a'";
             
            $query=mysqli_query($con,$select);

            $check_user=mysqli_num_rows($query);
            if($check_user==1){
                $_SESSION['user_email']=$email;

                echo" <script> window.open('create_password.php','_self')</script>";

            }else{
                echo"<script> alert('your email or bestfriend name is incorrrect.')</script>";
                echo"<script>window.open('forgot_pass.php','_self')</script>";
            }
            


        }
        



?>








</body>

</html> 