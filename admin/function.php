<?php
    include("utils.php");
    include("db_connect.php");

    session_start();

    // Register User function
    function UserRegister($_REQEUST, $SOURCE_FILE) {
        $username  = $_REQEUST['username'];
        $email     = $_REQEUST['email'];
        $password  = $_REQEUST['password'];
        $profile   = fileUploader($SOURCE_FILE);
        $now = now();

        $insert_query = "INSERT INTO `users`(`username`, `email`, `password`, `profile`, `created_at`, `updated_at`) 
          VALUES ('$username', '$email', '$password', '$profile', '$now', '$now'); ";

        db_connect()->exec(statement:$insert_query);
    }



    // Vertify user login 
    function UserLogin($_REQEUST) {
        $username_email  = $_REQEUST['username_email'];
        $password        = $_REQEUST['password'];

        $login_query = "SELECT `id` FROM `users` 
                        WHERE (`username` = '$username_email' OR `email` = '$username_email') 
                        AND `password` = '$password';";

        $user = db_connect()->query(query: $login_query)->fetchAll(PDO::FETCH_ASSOC)[0];

        if (empty($user)) 
            echo ' <p class="message"> Invalid Credentail </p>';
        else {
            $_SESSION['user_id'] = $user['id'];
            header("Location: index.php");
        }
    }


    // Get Current User
    function getCurrentUser($user_id) {
        $getUser_query = "SELECT * FROM `users` WHERE `id` = $user_id";
        $user = db_connect()->query(query:$getUser_query )->fetchAll(PDO::FETCH_ASSOC)[0];
        return $user;
    }   


    // User Logout 
    function UserAccepLogout() {
        session_destroy();
    }