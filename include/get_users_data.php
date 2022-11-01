<?php

$con= mysqli_connect("localhost","root","","mychat") ;


 $user="select * from user";

 $run_user=mysqli_query($con,$user);


while($row_user=mysqli_fetch_array($run_user)){  
        $user_id=$row_user['user_id'];
        $user_name=$row_user['user_name'];
        $user_profile=$row_user['user_profile'];
        $log_in=$row_user['log_in'];
         

               // ALL USER WHO CONNECT

        echo "
        <li>
              
    
            <div class='chat-left-img'>
             <img src='$user_profile'>
            </div>
            <div class='chat-left-detail'>
                <p><a href='home.php?user_name=$user_name'> $user_name </a></p>";
                if($log_in=='online'){
                    echo "<span><i class='fa fa-circle' aria-hidden='true'></i>online</span>";
                
                }else{
                    echo "<span><i class='fa fa-circle-o' aria-hidden='true'></i>Offline</span>";

                }
             "
            </div>

        </li> 
              ";
 
}



?>