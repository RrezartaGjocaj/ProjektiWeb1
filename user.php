<?php
require_once "Database.php";


class User {
    private $connect;
    

   public function __construct() {
    $db = new Database();
    $this->connect = $db->connect();
}

    public function register($name,$email,$password) {
        $password = password_hash($password, PASSWORD_DEAFAULT);


        $sql = "INSERT INTO users (name, email, password, role)
                VALUES (:name, :email, :password, 'user')";


        $stmt = $this->connect->prepare($sql);
        return $stmt->excute([
            ':name'=> $name,
            ':email'=> $email,
            ':password'=> $password,
        ]);
      }

 
        public function login($email , $password) {
            $sql = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->connect->prepare($sql);
            $stmt->excute([':email'=> $email]);

            $user = $stmt-> fetch(PDO::FETCH_ASSOC);

            if($user && password_verify($password , $user['password'])){
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];
                return true;
            }
            return false;
        }

        public function isAdmin(){
            return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
        }

        public function logout(){
            session_start();
            session_destroy();
        }
    }
