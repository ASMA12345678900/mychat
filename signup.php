<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create new account</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/signup.css">
</head>

<body>
    <div class="signup-form ">
        <form action="" method="post">
            <div class="form-header ">
                <h2>Sign Un</h2>
                <p> fill out this form and start chating with your friend</p>
            </div>
            <div class="form-group">
                <label> User name</label>
                <input type="text" class="form-control" name="user_name" placeholder="Example:assma" autocomplete="off"equired>
            </div>
            <div class="form-group">
                <label for=""> Password</label>
                <input type="password" class="form-control" name="user_pass" placeholder="password" autocomplete="off" required>
            </div>
            
            <div class="form-group">
                <label> Email address</label>
                <input type="email" class="form-control" name="user_email" placeholder="someone@site.com" autocomplete="off"equired>
            </div>
            <div class="form-group">
                <label> Country</label>
            <select class="form-control" name="user_country" required>
                <option disabled> Select a Country</option>
                <option > Morocco</option>
                <option >Algerie</option>
                <option > France</option>
                <option > Canada </option>
                <option >Uk</option>
            </select>
            </div>
            <div class="form-group">
                <label> Gender</label>
            <select class="form-control" name="user_gender" required>
                <option disabled> Select your Gender</option>
                <option > Male</option>
                <option >Female</option>
                <option > Others</option>
            </select>
            </div>
            <div class="form-group">
                <label class="checkbox-inline"> <input type="checkbox" required > I accept the <a href="#"> Terms of Use </a>&amp; <a href="#">Privacy Policy</a></label>


            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_up"> Sign Up </button>
            </div>

              
            
        <?php include("signup_user.php"); ?> 
        </form>
        <div class="text-center small" style="color:red;">Already have an account? <a href="signin.php"> Signin here</a></div>
    </div>

</body>

</html>