<?php
declare(strict_types=1);
require_once 'db_oop.php';

class Stat extends Database {

    function create_stat(int $post_id) {
        $query = "INSERT INTO stats (post_id) VALUES (:post_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":post_id", $post_id);
        
        $stmt->execute();  
        $stat_id = $this->pdo->lastInsertId();
        return $stat_id;
        $this->disconnect();
    }

    function add_view(int $post_id) {
        
        $query = "UPDATE stats SET views = views + 1 WHERE post_id = :post_id;";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":post_id", $post_id);
        $stmt->execute();
        $this->disconnect();
    }
}