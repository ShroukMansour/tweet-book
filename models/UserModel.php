<?php

require_once __DIR__."/../pair.php";
class User {
    private $ID;
    private $name;
    private $email;
    private $password;
    
    public function  setID($ID) {
        $this->ID = $ID;
    }
    public function getID() {
        return $this->ID;
    }
     public function  setName($name) {
        $this->name = $name;
    }
    public function getName() {
        return $this->name;
    }
     public function  setEmail($email) {
        $this->email = $email;
    }
    public function getEmail(){
        return $this->email;
    }
     public function setPassword($password) {
        $this->password = $password;
    }
    public function getPassword() {
        return $this->password ;
    }
    public function checkIfUserExsits($user_name, $password) {
        $db = new connection();
        $conn = $db->createConnection();
        $username = mysqli_real_escape_string($conn, $user_name);
        $password = mysqli_real_escape_string($conn, $password); 
        $sql = "SELECT id FROM user WHERE name = '$username' and password = '$password'";
        $result = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($result);
        $db->closeConnection();
        if ($count == 1) 
            return true;
        return false;
    }
    public function insertUser($full_name, $user_name, $password){
        $db = new connection();
        $conn = $db->createConnection();
        $full_name = mysqli_real_escape_string($conn, $full_name);
        $username = mysqli_real_escape_string($conn, $user_name);
        $password = mysqli_real_escape_string($conn, $password);
        $query="insert into user (name,email,password) values  ('$full_name','$username','$password') ";
        $result = mysqli_query($conn,$query);
        $db->closeConnection();
        if($result){
            return true;
        }
        else{
            return false;
        }
    }
}
?>
