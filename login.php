<?php
function createsessions($username,$password) 
{ 
    $_SESSION["username"] = $username; 
    $_SESSION["password"] = md5($password); 
     
    if(isset($_POST['rememberme'])) 
    { 
        //Add to cookie array
        setcookie("TweetbookUsername", $_SESSION['username'], time()+60*60); 
        setcookie("TweetbookPassword", $_SESSION['password'], time()+60*60); 
        return; 
    } 
} 
?>

<?php

 session_start();
   $db=mysqli_connect("localhost","root","","tweet_book");
   if($_SERVER["REQUEST_METHOD"] == "POST") {      
      $username = mysqli_real_escape_string($db,$_POST['uname']);
      $password = mysqli_real_escape_string($db,$_POST['psw']); 
      
      $sql = "SELECT id FROM user WHERE email = '$username' and password = '$password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['id'];
      $count = mysqli_num_rows($result);		
      if($count == 1) {
         createsessions($username,$password);
         header("location: welcome.php");
      }else {
         echo "Your Login Name or Password is invalid";
      }
   }else{
    echo "not post";
   }

?>