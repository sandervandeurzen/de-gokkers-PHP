<?php

if (isset($_POST['submit'])){

    include_once 'dbh.inc.php';

    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last = mysqli_real_escape_string($conn, $_POST['last']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    //error handlers
    //check for empty fields
    if (empty($first) || empty($last) || empty($email) || empty($uid)
        || empty($pwd)){
        header("location: ../signup.php?signup=empty");
        exit();
    }else{
        //check if input characters are valid
        if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)){
            header("location: ../signup.php?signup=invalid");
            exit();
        }else{
            //check if email is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                header("location: ../signup.php?signup=email");
                exit();
            }else{
                $sql = "SELECT * FROM users WHERE user_uid= '$uid'";
                $result = mysqli_query($conn, $sql);
                $resultCheck =  mysqli_num_rows();

                if ($resultCheck > 0){
                    header("location: ../signup.php?signup=usertaken");
                    exit();
                }else{
                    //hashing the password
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    //insert the user into the database
                    $sql = "INSERT INTO users (user_first, user_last, user_email,
                        user_uid, user_pwd) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd');";
                    mysqli_query($conn, $sql);
                    header("location: ../signup.php?signup=succes");
                    exit();

                }
            }
        }
    }
} else{
    header("location: ../signup.php");
    exit();
}




//
//if (isset($_POST['submit'])){
//
//    include_once 'dbh.inc.php';
//
//    $first = mysqli_real_escape_string($conn, $_POST['first']);
//    $last = mysqli_real_escape_string($conn, $_POST['last']);
//    $email = mysqli_real_escape_string($conn, $_POST['email']);
//    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
//    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
//
//    //error handlers
//    //check for empty fields
//    if (empty($first) || empty($last) || empty($email) || empty($uid)
//        || empty($pwd)){
//        header("location: ../signup.php?signup=empty");
//        echo "please fill everything in";
//        exit();
//    }else{
//        //check if input characters are valid
//        if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)){
//            header("location: ../signup.php?signup=invalid");
//            echo "something went wrong! Try again";
//
//            exit();
//        }else{
//            //check if email is valid
//            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
//                header("location: ../signup.php?signup=email");
//                exit();
//            }else{
//                $sql = "SELECT * FROM users WHERE user_uid= '$uid'";
//                $result = mysqli_query($conn, $sql);
//                $resultCheck =  mysqli_num_rows();
//
//                if ($resultCheck > 0){
//                    header("location: ../signup.php?signup=usertaken");
//                    exit();
//                }else{
//                    // checking if the email has been taken
//                   $query = $conn->prepare("SELECT * FROM users WHERE USER_email = :email");
//                   $query->bindValue($conn, $query);
//                   $query->execute();
//
//                    if ($query->rowcount() > 0){
//                       $_SESSION['message'] = "the email already has been taken";
//                        exit();
//                    }else{
//                       // hashing the password
//                        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
//                        if (strlen($pwd) >= 7){
//                            if (!ctype_upper($pwd) && !ctype_lower($pwd)){
//                                echo "het werkt";
//
//                                $sql = "INSERT INTO users (user_first, user_last, user_email,
//                                user_uid, user_pwd) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd');";
//                                mysqli_query($conn, $sql);
//
//                                header("location: ../signup.php?signup=succes");
//                                echo '<h2>login succes</h2>';
//                                exit();
//                            }
//                        }
//                        //insert the user into the database
//
//                    }
//                }
//            }
//        }
//    }
//} else{
//    header("location: ../signup.php");
//    exit();
//}