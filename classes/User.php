<?php
require_once "Database.php";


class User {
    private $conn;
    

   public function __construct() {
    $db = new Database();
    $this->conn = $db->connect();
}
    //CREATE
   public function register($name, $email, $password) {
    $hashed = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, email, password)
            VALUES (?, ?, ?)";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([$name, $email, $hashed]);
}



 
    public function login($email, $password) {
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute(['email' => $email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'] ?? 'user';
        return true;
    }
    return false;
}


        //READ
        public function getAllUsers() {
        $sql = "SELECT * FROM users";
        $stmt = $this->conn->query($sql);
       return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

        public function isAdmin(){
            return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
        }

        public function logout(){
            session_start();
            session_destroy();
        }

        


}


        

    
