<?php
//
require_once "/opt/lampp/htdocs/tweetbook/Config.php";
include ('/opt/lampp/htdocs/tweetbook/Pair.php');
include ('/opt/lampp/htdocs/tweetbook/models/UserModel.php');

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

static function suggestFollowers($userID) {
    $userID = $user->getID();
    $followers = UserController::showFollowers("SELECT friend_id from friend where user_id = $userID");
    //ordered according to number of msgs between the follower and user
    $orderedFollowers = array();
    for($i = 0; $i < sizeof($followers);$i++) {
         ///count msgs of each friend when we have friends msgs table
        $cnt = mt_rand();
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
 
    static searchByFollowers($userID) {
        $userID = $user->getID();
        $followers = UserController::showFollowers("SELECT friend_id from friend where user_id = $userID");
        $sugestedFollowers = array();
        $markFollowers = array();
     for($i = 0;$i < sizeof($followers);$i++) {
        if(array_key_exists('$followers[$i]', $markFollowers) == false)   {
         array_push($followers,$followers[i]);
         $markFollowers['$orderedFollowers_friends[$j]'] = true;
        }
     }
    for($i = 0;$i < sizeof($followers);$i++) {
        $friendID =  $followers[$i];
        $friendsOfFriends = UserController::showFollowers("SELECT friend_id from friend where user_id = $friendID");
        for($j = 0 ;$j < sizeof($friendsOfFriends) && sizeof($sugestedFollowers) <= 100;$j++) {
           if(array_key_exists('$friendsOfFriends[$j]', $markFollowers) == false)  {
               array_push($sugestedFollowers, $friendsOfFriends[$j]);
               $markFollowers['$friendsOfFriends[$j]'] = true;
            }
        }
    }
    return $sugestedFollowers;   
    }
 
 static function login($user_name, $password) {
     $user = new User();
     $userExisits = $user->checkIfUserExsits($user_name, $password);
     if($userExisits) {
        echo "done";
        UserController::createSessions($user_name, $password);
        echo "done";
        header("location: welcome.php");
      } else {
         echo "Your Login Name or Password is invalid";
      }
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