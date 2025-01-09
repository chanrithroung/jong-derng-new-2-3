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


    // Get current Data
    function getCurrentData($id, $table) {
        $getData_query = "SELECT * FROM `$table` WHERE `id` = $id";
        $data = db_connect()->query(query:$getData_query )->fetchAll(PDO::FETCH_ASSOC)[0];
        return $data;
    }   


    // User Logout 
    function UserAccepLogout() {
        session_destroy();
    }

    // Add Logo 
    function AddLogo($REQEUST, $SOURCE_FILE, $author_id) {
        $thumbnail = fileUploader($SOURCE_FILE);
        $pined = !$REQEUST['pined']? '0':'1';
        $now = now();
        $add_logo_query = "INSERT INTO `website_logo` (`thumbnail`, `pined`, `author_id`, `is_deleted`, `created_at`, `updated_at`)
                            VALUES ('$thumbnail', '$pined', '$author_id', '0', '$now', '$now' )";
        db_connect()->exec($add_logo_query);
        echo 'Logo created successfully';
    }


    // List Logo
    function ListLogo( $author_id ) {
        return db_connect()->query( query: "SELECT * FROM `website_logo` WHERE `author_id` = '$author_id';" )->fetchAll(PDO::FETCH_ASSOC);
    }


    function updateLogo($REQEUST, $SOURCE_FILE) {
        $logoId = $REQEUST['logoId'];
        $pined = $REQEUST['pined'] ? '1' : '0';
        $now = now();
        if($SOURCE_FILE['name']) {
            $thumbnail = fileUploader($SOURCE_FILE);
        } else {
            $thumbnail = $REQEUST['oldThumbnail'];
        }
        db_connect()->exec("UPDATE `website_logo` SET `thumbnail` = '$thumbnail', `pined` = '$pined', `updated_at` = '$now' WHERE `id` = $logoId;");
        header("Location: list-logo.php");
    }

