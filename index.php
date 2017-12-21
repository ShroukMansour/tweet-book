
<?php 
include "controllers/UserController.php";
    if (isset($_POST['submit']) && $_SERVER["REQUEST_METHOD"] == "POST") {
        UserController::login($_POST['uname'], $_POST['password']);
    }
?>

<!DOCTYPE html>
<html>
<head> 
<style>
    
    * {
        padding: 0;
        margin: 0;
    }
    body {
        background: #1da1f2;
        
    }

    navbar ul li{
        display: inline;
        padding: 10px;
        color: #66757f;
        font-size: 13px;
        font-weight: bold;
       font-family: 'Karla', sans-serif;


    }
    navbar ul {
        background: #fff;
        padding: 10px;
        padding-left: 78px  ;

    } 
    navbar .language {
        float: right;
        margin-top: -10px;
        padding-right: 90px;

    }
    
</style>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab|Karla|Quattrocento" rel="stylesheet">
</head>
<body>
    <navbar class="nav">
        <ul>
            <li>Home</li>
            <li>About</li>
            <li class="language"> Language: English</li>
            
        </ul>
    </navbar>
    <form name="loginForm" action="#" method="post">
        <div class="container">
            <input type="text" placeholder="Email" name="uname" id="uname"required><br>
            
            <!--<label><b>Password</b></label>-->
            <input type="password" placeholder="Password" name="password" id="psw" required><br>

            <button type="submit" name="submit">Log in</button><br>
            <input type="checkbox" checked="checked" name="rememberme" id="rememberme" > Remember me
        </div><br>
        <div class="container" style="background-color:#f1f1f1">
            <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
    </form>
    
    <p><span>New to Tweetbook? </span>Sign up</p><br>
    <form name="loginForm" action="signup.php" method="post">
        
        <div class="container">
            <input type="text" placeholder="Full name" name="fname" id="fname"required><br>
            <input type="text" placeholder="Email" name="uname" id="uname"required><br>
            
            <!--<label><b>Password</b></label>-->
            <input type="password" placeholder="Password" name="psw" id="psw" required><br>

            <button type="submit">Sign up</button><br>
            <input type="checkbox" checked="checked" > Remember me
        </div><br>
    </form>
    
    </body>
</html>

