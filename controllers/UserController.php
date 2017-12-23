<?php
include ('/opt/lampp/htdocs/tweetbook/Pair.php');
include ('/opt/lampp/htdocs/tweetbook/models/UserModel.php');
class UserController {
  
 static function follow($userID, $followerID) {
     User::insertFriend($userID,$followerID);
 }

 static function showFollowers($userID) {
     $followers = UserModel::getUserFollowers($userID); 
     return $followers;
}

static function suggestFollowers($userID) {
    $followers = UserController::showFollowers($userID);
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
        $orderedFollowers_friends = UserController::showFollowers($friendID);
        for($j = 0 ;$j < sizeof($orderedFollowers_friends) && sizeof($sugestedFollowers) <= 100;$j++) {
            /// friendOfFriend not friend of mine
           if(sizeof(UserModel::checkThatFriendOfFriendNotYourFriend($orderedFollowers_friends[$j], $userID)) == 0 && in_array($orderedFollowers_friends[$j] , $markFollowers) == false)  {
               array_push($sugestedFollowers, $orderedFollowers_friends[$j]);
               array_push($markFollowers, $orderedFollowers_friends[$j]);
            }
        }
    }
    return $sugestedFollowers;
}
    static function checkName($followerID, $searchedName) {
        $followerName = UserModel::getUserName($followerID);
        if (strpos($followerName, $searchedName) !== false) {
            return true;
        }
        return false;
    }
    static function search($userID, $name) {
        $followers = UserController::showFollowers($userID);
        $sugestedFollowers = array();
        $markFollowers = array();
     for($i = 0;$i < sizeof($followers);$i++) {
        if(in_array($followers[$i] , $markFollowers) == false &&  UserController::checkName($followers[$i], $name) == true)   {
         array_push($sugestedFollowers,$followers[$i]);  
         array_push($markFollowers, $followers[$i]);
        }
     }
    for($i = 0;$i < sizeof($followers);$i++) {
        $friendID =  $followers[$i];
        $friendsOfFriends = UserController::showFollowers($followers[$i]);
        for($j = 0 ;$j < sizeof($friendsOfFriends) && sizeof($sugestedFollowers) <= 100;$j++) {
           if(in_array($friendsOfFriends[$j] , $markFollowers) == false && UserController::checkName($friendsOfFriends[$j], $name) == true)  {
               array_push($sugestedFollowers, $friendsOfFriends[$j]); 
               array_push($markFollowers, $friendsOfFriends[$j]);
            }
        }
    }
        return $sugestedFollowers;   
    }
 
 static function login($user_name, $password) {
     $userExisits = UserModel::checkIfUserExsits($user_name, $password);
     if($userExisits) {
        echo "done";
        UserController::createSessions($user_name, $password);
        echo "done";
        header("location: welcome.php");
      } else {
         echo "Your Login Name or Password is invalid";
      }
 }
    static function createSessions($username, $password) { 
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