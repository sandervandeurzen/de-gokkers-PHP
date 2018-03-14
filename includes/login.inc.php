<?php

session_start();

if (isset($_POST['submit'])){
    include 'dbh.inc.php';

    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    //error handlers
    //check if inputs are empty
    if (empty($uid) || empty($pwd)){
        header("location: ../index.php?login=empty");
        exit();
    }else{
        $sql = "SELECT * FROM users WHERE user_uid= '$uid' OR user_email='$uid'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck < 1){
            header("location: ../index.php?login=firsterror");
            exit();
        }else{
            if ($row = mysqli_fetch_assoc($result)){
                //dehashing the password
                $hashedPwdCheck= password_verify($pwd, $row['USER_pwd']);
                if ($hashedPwdCheck == false){
                    header("location: ../index.php?login=lasterror");
                    echo '<script>alert("I am an alert box!")</script>';
                    exit();
                }elseif ($hashedPwdCheck == true){
                    //log  in the user here
                    $_SESSION['u_id'] = $row['USER_id'];
                    $_SESSION['u_first'] = $row['USER_first'];
                    $_SESSION['u_last'] = $row['USER_last'];
                    $_SESSION['u_email'] = $row['USER_email'];
                    $_SESSION['u_uid'] = $row['USER_uid'];
                    header("location: ../index.php?login=success");
                    exit();
                }
            }
        }
    }
}else{
    header("location: ../index.php?login=error");
    exit();
}