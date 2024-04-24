<?php
declare(strict_types=1);
require_once 'db_oop.php';

class Post extends Database {

    function create_post(string $post_title, string $post_content,  $post_category) {
        
        $query = "INSERT INTO posts (user_id, title, content, category) VALUES (:user_id ,:post_title, :post_content, :post_category);";
        $stmt = $this->pdo->prepare($query);

        $stmt->bindParam(":user_id", $_SESSION['user_id']);
        $stmt->bindParam(":post_title", $post_title);
        $stmt->bindParam(":post_content", $post_content);
        $stmt->bindParam(":post_category", $post_category);
        
        $stmt->execute();  
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
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function get_all_category() {

        $query = "SELECT * FROM categories";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}