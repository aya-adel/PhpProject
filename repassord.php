<?php
session_start();
if(isset($_GET['submit'])) {
        session_destroy();
    }
include ('config.php');

if (isset($_POST['email'])&&isset($_POST['pass'])&&isset($_POST['rpass'])) {
    $link = mysqli_connect(
            $config['server'], $config['username'], $config['passoword'], $config['database']);

    if (!$link) {
        echo " error :unable " . mysqli_connect_error();
    }
    
    
   
    $email=$_POST['email'];
    $passwd=$_POST['pass'];
    $rpasswd=$_POST['rpass'];
    

    

    $user = mysqli_query($link,"select * from data where email ='$email'  ;");
    
if($user) {
    
     $user1 = mysqli_query($link, "   
                   
                  UPDATE data SET 
                 passwd = '$passwd',
                WHERE email = '$email'
           
                  ");
    echo "   UPDATE data SET 
                 passwd = " . $_POST['pass'] . ",
                WHERE email = '" . $_POST['email'] . "'";
    
    }

}
?>