<?php

include_once "config.php";
session_start();
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($email) && !empty($password)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email ='{$email}'");
        if (mysqli_num_rows($select_sql2) > 0) {
            $result = mysqli_fetch_assoc($select_sql2);
            $user_pass = md5($password);
            $enc_pass = $result['password'];
            if ($user_pass === $enc_pass) {
                $status = 'online';
                $sql2 = mysqli_query($conn, "UPDATE users SET status ='{$status}' WHERE unique_id = {$result['unique_id']}");
                if ($sql2) {
                    $_SESSION['unique_id'] = $result["unique_id"];
                    echo "success";
                } else {
                    echo "something went wrong. Please tey again!";
                }
            } else {
                echo "Password is Incorrect!";
            }
        } else {
            echo "This email address does not exist!";
        }
    } else {
        echo "$email is not a valid email";
    }
} else {
    echo "All inputs are required";
}
