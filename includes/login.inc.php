<?php

session_start();
include ("DatabaseConnector.php");

$errorMsReg='';
$errorMsgLogin='';

//login form



if(isset($_POST['submit'])){
    include_once ("DatabaseConnector.php");

    $query = "SELECT * FORM users WHERE username = :USER_uid AND password = :USER_pwd";

}
//    include 'DatabaseConnector.php';
//    //Retrieve the field values from our login form.
//    $username = !empty($_POST['user_uid']) ? trim($_POST['user_uid']) : null;
//    $passwordAttempt = !empty($_POST['pwd']) ? trim($_POST['pwd']) : null;
//
//    //Retrieve the user account information for the given username.
////    $sql = "SELECT * FROM users WHERE user_uid= '$uid' OR user_email='$uid'";
//       $sql = "SELECT user_id, user_uid, user_pwd FROM users WHERE user_email = :username";
////    $sql = "SELECT  user_uid, user_pwd FROM users WHERE user_uid = :user_uid";
//    $sql = $database->query("SELECT * FROM users WHERE user_uid= '$uid' OR user_email='$uid'" );
//    $stmt = $database->prepare($sql);
//
//    //Bind value.
//    $stmt->bindValue(':user_uid', $username);
//
//    //Execute.
//    $stmt->execute();
//
//    //Fetch row.
//    $user = $stmt->fetch(PDO::FETCH_ASSOC);
//    if (empty($uid) || empty($pwd)) {
//        header("location: ../index.php?login=empty");
//        exit();
//    }else{
//        if($user == false){
//            //Could not find a user with that username!
//            //PS: You might want to handle this error in a more user-friendly manner!
//            header("location: ../index.php?login=firsterror");
//            exit();
//        } else{
//            //User account found. Check to see if the given password matches the
//            //password hash that we stored in our users table.
//
//            //Compare the passwords.
//            $validPassword = password_verify($passwordAttempt, $user['pwd']);
//
//            //If $validPassword is TRUE, the login has been successful.
//            if($validPassword){
//
//                //Provide the user with a login session.
//                $_SESSION['user_uid'] = $user['uid'];
//                $_SESSION['logged_in'] = time();
//
//                //Redirect to our protected page, which we called home.php
//                header('Location: ../index.php?login = succes');
//                exit;
//
//            } else{
//                //$validPassword was FALSE. Passwords do not match.
//                die('Incorrect username / password combination!');
//            }
//        }
//    }
//
//
//
//}

//    $uid = mysqli_real_escape_string($database, $_POST['uid']);
//    $pwd = mysqli_real_escape_string($database, $_POST['pwd']);
//
//    //error handlers
//    //check if inputs are empty
//    if (empty($uid) || empty($pwd)){
//        header("location: ../index.php?login=empty");
//        exit();
//    }else{
//        $sql = "SELECT * FROM users WHERE user_uid= '$uid' OR user_email='$uid'";
//        $result = mysqli_query($conn, $sql);
//        $resultCheck = mysqli_num_rows($result);
//        if ($resultCheck < 1){
//            header("location: ../index.php?login=firsterror");
//            exit();
//        }else{
//            if ($row = mysqli_fetch_assoc($result)){
//                //dehashing the password
//                $hashedPwdCheck= password_verify($pwd, $row['USER_pwd']);
//                if ($hashedPwdCheck == false){
//                    header("location: ../index.php?login=lasterror");
//                    exit();
//                }elseif ($hashedPwdCheck == true){
//                    //log  in the user here
//                    $_SESSION['u_id'] = $row['USER_id'];
//                    $_SESSION['u_first'] = $row['USER_first'];
//                    $_SESSION['u_last'] = $row['USER_last'];
//                    $_SESSION['u_email'] = $row['USER_email'];
//                    $_SESSION['u_uid'] = $row['USER_uid'];
//                    header("location: ../index.php?login=success");
//                    exit();
//                }
//            }
//        }
//    }
//}else{
//    header("location: ../index.php?login=error");
//    exit();
//}