<?php

class Database {
   private $host = "localhost";
   private $db = "ProjektiWeb1";
   private $user = "root";
   private $pass = "";

   public function connect() {
     try {
     return new PDO(
        "mysql:host={$this->host};dbname={$this->db}",
        $this->user,
        $this->pass,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
     );
     } catch (PDOException $e) {
           die("Database connection failed");
       } 
   }
}