<?php
declare(strict_types=1);
require_once 'db_oop.php';

class Post extends Database {
    
    private $upload_folder = 'media/uploads/';

    function create_post(string $post_title, string $post_content, int $post_category) {
        
        $title_img = "media/img/default_img.jpg";
        
        $query = "INSERT INTO posts (user_id, title, content, category_id, title_img) VALUES (:user_id ,:post_title, :post_content, :post_category, :title_img);";
        $stmt = $this->pdo->prepare($query);

        $stmt->bindParam(":user_id", $_SESSION['user_id']);
        $stmt->bindParam(":post_title", $post_title);
        $stmt->bindParam(":post_content", $post_content);
        $stmt->bindParam(":post_category", $post_category);
        $stmt->bindParam(":title_img", $title_img);

        
        $stmt->execute();  
        $post_id = $this->pdo->lastInsertId();
        return $post_id;

    }
    
    
    function get_all_post() {

        $query = "SELECT * FROM posts p JOIN stats s ON p.post_id = s.post_id WHERE user_id = :user_id;";
    
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }
    
    function delete_post(int $post_id) {
        
        $query = "DELETE FROM posts WHERE post_id = :post_id;";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":post_id", $post_id);
        $stmt->execute();
        
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
        
    }
     
    function read_post(int $post_id) {

        $query = "SELECT * FROM posts WHERE post_id = :post_id;";
        $stmt = $this->pdo->prepare($query);

        $stmt->bindParam(":post_id", $post_id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
        
    }

    function get_all_category() {

        $query = "SELECT * FROM categories";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function update_img(int $post_id, string $file_name, string $file_tmp_name, int $file_size, int $file_error, string $file_type) {

        $file_ext = explode('.', $file_name);
        $file_actual_ext = strtolower(end($file_ext));

        $allowed = array('jpg', 'jpeg', 'png');

        if (in_array($file_actual_ext, $allowed)) {
            if ($file_error === 0) {
                if ($file_size < 5000000) {
                    $file_name_new = uniqid('', true).".".$file_actual_ext;
                    $file_destination = $this->upload_folder.$file_name_new;
                    move_uploaded_file($file_tmp_name, $file_destination);
                } else {    
                    echo "Váš súbor je príliš veľký!";
                    die();
                } 
            }else {
                echo "Pri nahrávaní súboru sa vyskytla chyba!";
                die();
            }
        } else {
            echo "Nemôžete nahrávať súbory tohto typu!";
            die();
        }
        
        $query = "UPDATE posts SET title_img = :title_img WHERE post_id = :post_id;";
        $stmt = $this->pdo->prepare($query);

        $stmt->bindParam(":title_img",  $file_destination);
        $stmt->bindParam(":post_id", $post_id);
        $stmt->execute();
        
    }
    
    function get_most_views() {

        $query = "SELECT posts.title, posts.title_img, posts.content, posts.post_id FROM posts JOIN stats ON posts.post_id = stats.post_id ORDER BY views DESC LIMIT 9;";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $posts;
        

    }            

    function search_post(string $searchQuery) {

        $query = "SELECT * FROM posts WHERE title LIKE :searchQuery OR content LIKE :searchQuery;";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([":searchQuery" => "%$searchQuery%"]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        
    }


}