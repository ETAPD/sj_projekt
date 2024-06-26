<?php

class Database {

    protected $pdo;

    public function __construct() {

        try {
        
            $this->pdo = new PDO('mysql:host=localhost;dbname=sj_projekt', "root", "");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        } catch (PDOException $error) {
    
            echo "Pripojenie zlyhalo: " . $error->getMessage();
    
        }
    }

    protected function disconnect() {
        $this->pdo = null;
    }
}
