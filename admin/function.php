
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


    function updateLogo($REQUEST, $SOURCE_FILE) {
        $logoId = $REQUEST['logoId'];
        $pined = $REQUEST['pined'] ? '1' : '0';
        $now = now();
        if($SOURCE_FILE['name']) {
            $thumbnail = fileUploader($SOURCE_FILE);
        } else {
            $thumbnail = $REQUEST['oldThumbnail'];
        }
        db_connect()->exec("UPDATE `website_logo` SET `thumbnail` = '$thumbnail', `pined` = '$pined', `updated_at` = '$now' WHERE `id` = $logoId;");
    }


    // Create category 
    function createCategory($REQUEST, $author_id) {
        $category = $REQUEST['category'];
        $now = now();
        $insert_query = "INSERT INTO `category`(`name`, `author_id`, `is_deleted`, `created_at`, `updated_at`)
        VALUES ('$category', '$author_id', '0', '$now', '$now'); ";
        db_connect()->exec($insert_query); 
        echo 'Category created successfully';
    }


    // List category 
    function listCategory($author_id) {
        $select_query = "SELECT * FROM `category` WHERE `author_id` = '$author_id' ORDER BY `id` DESC;";
        return db_connect()->query( $select_query )->fetchAll(PDO::FETCH_ASSOC);
    }

    // Add News
    function addNews($REQEUST, $SOURCE_FILE, $author_id) {
        $title = $REQEUST['title'];
        $category_id = $REQEUST['category_id'];
        $pined = $REQEUST['pined'] ? 1 : 0;
        $thumbnail = fileUploader($SOURCE_FILE);
        $description = $REQEUST['description'];
        $now = now();

        $insert_news = "INSERT INTO `news`(`title`, `pined`, `thumbnail`, `description`, `author_id`, `category_id`, `created_at`, `updated_at`)
                        VALUES ('$title', '$pined', '$thumbnail', '$description', '$author_id', '$category_id', '$now', '$now');";
    
        db_connect()->exec( $insert_news );

        echo 'news created successfully';

    }


    function listNews($author_id) {
        $list_news_query = "SELECT * FROM `news` INNER JOIN `category` on news.category_id = category.id WHERE news.author_id = $author_id;";
        $all_news = db_connect()->query( $list_news_query )->fetchAll(PDO::FETCH_ASSOC);

        foreach($all_news as $news) {
            echo '                      
                <tr>
                    <td> <div style="width: 200px;  overflow: hidden;white-space: nowrap; text-overflow: ellipsis;" class="truncated-text">'.$news['title'].'</div></td>
                    <td>'.$news['name'].'</td>
                    <td><img src="assets/images/'.$news['thumbnail'].'"></td>
                    <td>'.$news['created_at'].'</td>
                    <td class="d-flex gap-2"  width="150px">
                        <a href=""class="btn btn-primary">Update</a>
                        <button type="button" remove-id="1" class="btn btn-danger btn-remove" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Remove
                        </button>
                    </td>
                </tr>
            ';
        }
    }






