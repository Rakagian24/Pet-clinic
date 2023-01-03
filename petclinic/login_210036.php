<?php
session_start(); //start the session
if(isset($_POST['login'])) { // check POST variable from FORM
    include "connection_210036.php"; // call connection

    // make the query based on userame
    $query="SELECT * FROM users_210036 WHERE username_210036='$_POST[username_210036]'";

    // run the query
    $login=mysqli_query($db_connection,$query);

    if(mysqli_num_rows($login) > 0) {  // check if the username found or not
        $user=mysqli_fetch_assoc($login); // if user found, extract the data
        if(password_verify($_POST['password_210036'], $user['password_210036'])) {   // verify the password   
        
            // if password match, then make session variable
            $_SESSION['login']=TRUE;
            $_SESSION['userid']=$user['userid_210036'];
            $_SESSION['username']=$user['username_210036'];
            $_SESSION['password']=$user['password_210036'];
            $_SESSION['usertype']=$user['usertype_210036'];
            $_SESSION['fullname']=$user['fullname_210036'];

            // success login msg
            echo "<script>alert('Login Success !');window.location.replace('index.php');</script>";
        }    else { // password did not match
            // wrong password msg then redirect to login form
            echo "<script>alert('Login Failed, Wrong Password !');window.location.replace('form_login_210036.php');</script>";
            }
        }   else { // user not found
            // login failed msg then redirect to login form
            echo "<script>alert('Login Failed, User Not Found !');window.location.replace('form_login_210036.php');</script>";
        }
}
?>