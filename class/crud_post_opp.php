<?php
declare(strict_types=1);
require_once 'db_oop.php';

class Post extends Database {
    
    private $upload_folder = 'media/uploads/';

    function create_post(string $post_title, string $post_content, int $post_category, int $stat_id) {
        
        $query = "INSERT INTO posts (user_id, title, content, category_id, stat_id) VALUES (:user_id ,:post_title, :post_content, :post_category, :stat_id);";
        $stmt = $this->pdo->prepare($query);

        $stmt->bindParam(":user_id", $_SESSION['user_id']);
        $stmt->bindParam(":post_title", $post_title);
        $stmt->bindParam(":post_content", $post_content);
        $stmt->bindParam(":post_category", $post_category);
        $stmt->bindParam(":stat_id", $stat_id);
        
        $stmt->execute();  
        $this->disconnect();

    }
    
    
    function get_all_post() {

        $query = "SELECT * FROM posts WHERE user_id = :user_id;";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->disconnect();
    }
    
    function delete_post(int $post_id) {
        
        $query = "DELETE FROM posts WHERE post_id = :post_id;";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":post_id", $post_id);
        $stmt->execute();
        $this->disconnect();
    }

    function update_post(int $post_id, string $post_title, string $post_content,int $post_category) {
        
        $query = "UPDATE posts SET title = :post_title, content = :post_content, category_id = :post_category, last_update = :last_update WHERE post_id = :post_id;";
        $stmt = $this->pdo->prepare($query);
        $datetime = date('Y-m-d H:i:s');

        $stmt->bindParam(":post_title", $post_title);
        $stmt->bindParam(":post_content", $post_content);
        $stmt->bindParam(":post_category", $post_category);
        $stmt->bindParam(":post_id", $post_id);
        $stmt->bindParam(":last_update", $datetime);
        $stmt->execute();
        $this->disconnect();
    }
     
    function read_post(int $post_id) {

        $query = "SELECT * FROM posts WHERE post_id = :post_id;";
        $stmt = $this->pdo->prepare($query);

        $stmt->bindParam(":post_id", $post_id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
        $this->disconnect();
    }

    function get_all_category() {

        $query = "SELECT * FROM categories";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        $this->disconnect();
    }

    function update_img(int $post_id, string $file_name, string $file_tmp_name, int $file_size, int $file_error, string $file_type) {

        $file_ext = explode('.', $file_name);
        $file_actual_ext = strtolower(end($file_ext));

        $allowed = array('jpg', 'jpeg', 'png');

        if (in_array($file_actual_ext, $allowed)) {
            if ($file_error === 0) {
                if ($file_size < 500000) {
                    $file_name_new = uniqid('', true).".".$file_actual_ext;
                    $file_destination = $this->upload_folder.$file_name_new;
                    move_uploaded_file($file_tmp_name, $file_destination);
                } else {    
                    echo "Your file is too big!";
                } 
            }else {
                echo "There was an error uploading your file!";
            }
        } else {
            echo "You cannot upload files of this type!";
        }
        
        $query = "UPDATE posts SET title_img = :title_img WHERE post_id = :post_id;";
        $stmt = $this->pdo->prepare($query);

        $stmt->bindParam(":title_img",  $file_destination);
        $stmt->bindParam(":post_id", $post_id);
        $stmt->execute();
        $this->disconnect();
    }
    
    function get_most_views() {

        $query = "SELECT posts.title, posts.title_img, posts.content, posts.post_id FROM posts JOIN stats ON posts.stat_id = stats.stat_id ORDER BY views DESC LIMIT 9;";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $posts;
        $this->disconnect();

    }            

    function search_post(string $searchQuery) {

        $query = "SELECT * FROM posts WHERE title LIKE :searchQuery OR content LIKE :searchQuery;";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([":searchQuery" => "%$searchQuery%"]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        $this->disconnect();
    }


}