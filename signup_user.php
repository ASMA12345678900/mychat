<?php


include("include/connection.php");



if(isset($_POST['sign_up'])){
   $name=htmlentities(mysqli_real_escape_string($con,$_POST['user_name']));
   $pass=htmlentities(mysqli_real_escape_string($con,$_POST['user_pass']));
   $email=htmlentities(mysqli_real_escape_string($con,$_POST['user_email']));
   $country=htmlentities(mysqli_real_escape_string($con,$_POST['user_country']));
   $gender=htmlentities(mysqli_real_escape_string($con,$_POST['user_gender']));
   $rand=rand(1, 2 );
   $rand=rand(3, 4);


    if($name==''){
        echo " <script> alert ('we can not verify your name')</script>";

     }
    if(strlen($pass)<8){
        echo" <script> alert('Password should be menimum 8 character!')</script>";
        exit();  

                    }
    $check_email="select * from user where user_email='$email'";
    $run_email=mysqli_query($con,$check_email);

    $check=mysqli_num_rows($run_email);

    if($check==1){

        echo" <script> alert('Email already exits, please try again!')</script>";
        echo "<script> window.open('signup.php','_self')</script>"; 
        exit();  
                }
     if($rand==1)
     $profile_pic="images/img3.jpg"; 
     else if($rand==2) 
         $profile_pic="images/img4.png"; 
     else if ($rand==3)
         $profile_pic="images/img5.jpg"; 
     else if($rand==4) 
          $profile_pic="images/img6.jpg"; 

    $insert="insert into user(user_name,user_pass,user_email,user_profile,user_country,user_gender) values ('$name','$pass','$email','$profile_pic','$country','$gender') ";     

    $query=mysqli_query($con,$insert);

    if($query){

          echo"<script>alert('congratulations $name , your account has been created successfully')</script>";
          echo "<script> window.open('signin.php','_self') </script>";
     } 
     else{

          echo  " <script> alert('Reristration failed , try again!')</script>";
          echo  " <script> window.open('signup.php','_self') </script>";
     }
}


 
?>