<!DOCTYPE html>
<?php
session_start();
include("include/connection.php");

if (!isset($_SESSION['user_email'])) {
    header("location:signin.php");
}

?>

    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MY CHAT - HOME</title>
        <link rel="stylesheet"  type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css"  href="css/home.css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    </head>

    <body>
        <div class="container main-section">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12 left-sidebar">
                    <div class="input-group searchbox ">
                        <div class="input-group-btn">
                            <center><a href="include/find_friends.php"><button class="btn btn-default search-icon" name="search_user" type="submit">Add new user</button></a></center>

                        </div>
                    </div>

                    <div class="left-chat">
                        <ul>
                            <?php include("include/get_users_data.php"); ?>
                        </ul>
                        

                    </div>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12 right-sidebar">
                    <div class="row">
                        <!-- getting the user informations who is logged in page -->
                        <?php

                        $user = $_SESSION['user_email'];
                        $get_user = "SELECT * FROM user WHERE user_email='$user'";
                        $run_user = mysqli_query($con, $get_user);
                        $row = mysqli_fetch_array($run_user);

                        $user_id = $row['user_id'];
                        $user_name = $row['user_name'];
                        $_SESSION['user_name'] = $row['user_name'];

                    
                        // <!-- getting the user data on which user click -->

                        if (isset($_GET['user_name'])) {
                           

                            $get_username = $_GET['user_name'];

                            $get_user = "SELECT * FROM user WHERE user_name='$get_username'";
                            $run_user =  mysqli_query($con, $get_user);
                            $row_user = mysqli_fetch_array($run_user);
                
                            $username = $row_user['user_name'];
                            print"
                                     $username";
                    
                            $user_profile_image = $row_user['user_profile'];
                        }

                        //  onother table users_chat

                        $total_messages = "SELECT * FROM users_chat WHERE(sender_username='$user_name' AND receiver_username='$username') 
                          OR (receiver_username='$user_name' AND sender_username='$username')";
                        $run_messages = mysqli_query($con, $total_messages);
                        $total = mysqli_num_rows($run_messages);


                        ?>
                        <div class="col-md-12 right-header">
                            <div class="right-header-img">
                                <!-- raj3iii azmar -->
                                <img src=<?php echo "$user_profile_image"; ?>>
                                


                            </div>
                            <div class="right-header-detail">
                                <form method="post">
                                    <p><?php echo "$username"; ?></p>
                                    <span> <?php echo $total; ?> messages</span>&nbsp &nbsp
                                        <a href="logout.php" name="logout" class="btn btn-danger">Logout</a>

                                </form>
                                <?php
                                    // if (isset($_POST['logout'])){
                                    //     $update_msg = mysqli_query($con, "UPDATE user SET log_in='Offline' WHERE user_name='$user_name'");
                                    //     header("location: header.php");
                                    //     exit();
                                    // } 

                                ?>
                            </div>

                        </div>

                    </div>
                    <div class="row">
                       
                        <div id="scrolling_to_bottom" class="col-md-12 right-header-contentChat">
                            <?php
                            $update_msg = mysqli_query($con, "UPDATE users_chat SET msg_status='red' WHERE sender_username='$user_name' AND receiver_username='$username'");
                            $sel_msg = "select * from users_chat where (sender_username='$user_name' AND receiver_username='$username')
                                OR(receiver_username='$user_name' AND sender_username='$username') ORDER BY 1 Asc";
                            $run_msg = mysqli_query($con, $sel_msg);

                            while ($row = mysqli_fetch_array($run_msg)) {

                                $sender_username = $row['sender_username'];
                                $receiver_username = $row['receiver_username'];
                                $msg_content = $row['msg_content'];
                                $msg_date = $row['msg_date'];
                                
                                

                            ?>
                                <ul>
                                    <?php

                                    if ($user_name == $sender_username and $username == $receiver_username) {

                                        echo "
                                <li>
                                
                                  <div class='rightside-right-chat'>
                                 <span>  <strong>  $user_name</strong> <small>$msg_date</small></span> <br><br>
                                 <p>$msg_content</p>
                                 </div>
                                
                                </li>";
                                    } else if ($user_name == $receiver_username and $username == $sender_username) {

                                        echo "
                                <li>
                                    <div class='rightside-left-chat'>
                                    <span><strong>  $username</strong> <small>$msg_date</small></span><br><br>
                                    <p>$msg_content</p>
                                    </div>
                            
                              </li>";
                                    }


                                    ?>
                                </ul>
                            <?php
                            }
                            ?>


                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12 right-chat-textbox">
                            <form method="post" action="home.php?user_name=<?php echo $username; ?>">
                                <input autocomplete="off" type="text" name="msg_content" placeholder="Write your messaj.....">
                                <button class="btn" name="submit"><i class="fa fa-telegram" aria-hidden="true"></i></button>




                            </form>
                        </div>

                    </div>

                </div>

            </div>


        </div>
        <?php
        if (isset($_POST['submit'])) {
            $msg = htmlentities($_POST['msg_content']);
            // echo $msg;
            if ($msg == "") {
                echo "
                <div class='alert alert-danger'>
                <strong> <center>Message was unable to send</center></strong>
                
                </div>
                ";
            } elseif (strlen($msg) > 100) {
                echo "
                <div class='alert alert-danger'>
                <strong> <center>Message is too long.use only 100 caracter</center></strong>
                
                </div>
                ";
            } else {
                $insert = "insert into users_chat(sender_username,receiver_username,msg_content,msg_status,msg_date) values('$user_name','$username','$msg','unread',NOW())";
                $run_insert = mysqli_query($con, $insert);
            }
        }

        ?>
<script>
  $('#scrolling_to_bottom').animate({
    scrollTop: $('#scrolling_to_bottom').get(0).scrollHeight},1000);

</script>

<script type="text/javascript">
    $(document).ready(function(){
        var height = $(window).height();
        $('.left-chat').css('height',(height - 92)+ 'px');
        $('.right-header-contentChat').css('hight' , (height - 163 ) +'px');



    });


</script>
    </body>

    </html>
