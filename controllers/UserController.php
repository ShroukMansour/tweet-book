<?php
//
require_once __DIR__."/../config.php";
require __DIR__."/../pair.php";
require __DIR__. "/../models/UserModel.php";

class UserController {
  
 static function follow($user, $followerID) {
    $sql = "INSERT INTO friend(user_id,friend_id) VALUES($user->getID(), $followerID)";
 }

 static function showFollowers($mysql) {
    $connect = new connection();
    $sql = $mysql;
    $followers = $connect->getFromDB($sql);
    return $followers;
}

static function suggestFollowers($userID = 1) {
    $followers = UserController::showFollowers("SELECT friend_id from friend where user_id = $userID");
    //ordered according to number of msgs between the follower and user
    $orderedFollowers = array();
    for($i = 0; $i < sizeof($followers);$i++) {
         ///count msgs of each friend 
        $cnt = $i ;
        $follower = new Pair($cnt , $followers[$i]);
        array_push($orderedFollowers, $follower);
    }
    usort($orderedFollowers,function($b, $a) {
    return strcmp($a->first, $b->first);});
    
    $sugestedFollowers = array();
    $markFollowers = array();
    for($i = 0;$i < sizeof($orderedFollowers);$i++) {
        $friendID =  $orderedFollowers[$i]->getSecond();
        $orderedFollowers_friends = UserController::showFollowers("SELECT friend_id from friend where user_id = $friendID");
        for($j = 0 ;$j < sizeof($orderedFollowers_friends) && sizeof($sugestedFollowers) <= 100;$j++) {
           if(sizeof(UserController::showFollowers("SELECT friend_id from friend where user_id = $userID and friend_id = $orderedFollowers_friends[$j]")) == 0 && array_key_exists('$orderedFollowers_friends[$j]', $markFollowers) == false)  {
               array_push($sugestedFollowers, $orderedFollowers_friends[$j]);
               $markFollowers['$orderedFollowers_friends[$j]'] = true;
            }
        }
    }
    return $sugestedFollowers;
 }
 
 static function login($user_name, $password) {
     $user = new User();
     $userExisits = $user->checkIfUserExsits($user_name, $password);
     if($userExisits) {
        UserController::createSessions($user_name, $password);
        header("Location: homePage.php");
        exit;
      } else {
         echo "Your Login Name or Password is invalid";
      }
 }
 static function signup($full_name,$username,$password){
     $user = new User();
     $userExisits = $user->checkIfUserExsits($username, $password);
     if($userExisits) {
         echo "User name is already taken";
     }
     if (!preg_match("/^[0-9_a-zA-Z]*$/", $username) || !preg_match("/^[0-9_a-zA-Z]*$/", $full_name) || !preg_match("/^[0-9_a-zA-Z]*$/", $password) ) {
         echo "Only letters and numbers are allowed";
     }
     else{
         $checkInsertion =$user->insertUser($full_name,$username,$password);
     }
         if ($checkInsertion)
         {
             UserController::login($username, $password);

         }
         else
         {
             echo "user not inserted in db";
         }
 }
 static function logout($username, $password){
     session_start();
     UserController::clearsessionscookies($username, $password) ;
     header("Location: welcome.php");
 }
    function clearsessionscookies($username,$password)
    {
        unset($_SESSION['username']);
        unset($_SESSION['password']);

        session_unset();
        session_destroy();


            setcookie("TweetbookUsername", $username, time() - 60 * 60 * 30);
            setcookie("TweetbookPassword", $password, time() - 60 * 60 * 30);
            return;
    }
static function createSessions($username, $password) 
    { 
        $_SESSION["username"] = $username;
        $_SESSION["password"] = md5($password);

        if(isset($_POST['rememberme'])) 
        { 
            setcookie("TweetbookUsername", $_SESSION['username'], time() + 60 * 60 * 30); 
            setcookie("TweetbookPassword", $_SESSION['password'], time() + 60 * 60 * 30); 
            return; 
        } 
    } 
}
?>