<?php
<<<<<<< HEAD
include "/opt/lampp/htdocs/tweetbook/Config.php";
class UserModel {
    static public function checkIfUserExsits($user_name, $password) {
        $conn = connection::conncreateConnection();
        $username = mysqli_real_escape_string($conn, $user_name);
        $password = mysqli_real_escape_string($conn, $password); 
        $sql = "SELECT id FROM user WHERE name = '$username' and password = '$password'";
        $result = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($result);
        connection::closeConnection($conn);
        if ($count == 1) 
            return true;
        return false;
    }
    static public function getUserFollowers($ID) {
        $query = "SELECT friend_id from friend where user_id = $ID";
        $followers = UserModel::getFromDB($query, 'friend_id');
        return $followers;
    }
    static public function getUserName($ID) {
        $query = "SELECT name from user where id = $ID";
        $conn = connection::createConnection();
        $result = $conn->query($query);
        $array_name = "";
        while($row = $result->fetch_assoc()) {
            $array_name =  $row["name"];
        }
        connection::closeConnection($conn);
        return $array_name;
    }
     static public function checkThatFriendOfFriendNotYourFriend($friendOfFriendID,$userID) {
        $query = "SELECT friend_id from friend where friend_id = $friendOfFriendID and user_id = $userID";
        $friend = UserModel::getFromDB($query, 'friend_id');
        return $friend;
        
    }
    static public function insertFriend($userId,$followerId){ 
        $query = "INSERT INTO friend(user_id,friend_id) VALUES($userId, $followerId)";
        $conn = connection::createConnection();
        $conn->query($query);
        connection::closeConnection($conn);
    }
      static function getFromDB($sql,$rowI) {
        $conn = connection::createConnection();
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $result = $conn->query($sql);
        $followers = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($followers, $row[$rowI]);
            }
        }
        connection::closeConnection($conn);
        return $followers;
      }
    public function insertUser($full_name, $user_name, $password){
        $conn = connection::createConnection();
        $full_name = mysqli_real_escape_string($conn, $full_name);
        $username = mysqli_real_escape_string($conn, $user_name);
        $password = mysqli_real_escape_string($conn, $password);
        $query="insert into user (name,email,password) values  ('$full_name','$username','$password') ";
        $result = mysqli_query($conn,$query);
        connection::closeConnection($conn);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }
}
?>
