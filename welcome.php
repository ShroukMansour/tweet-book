<?php

include "controllers/UserController.php";
if (isset($_POST['login']) && $_SERVER["REQUEST_METHOD"] == "POST") {
    UserController::login($_POST['uname'], $_POST['psw']);

}
if (isset($_POST['signup']) && $_SERVER["REQUEST_METHOD"] == "POST") {
    UserController::signup($_POST['fname'],$_POST['uname'], $_POST['psw']);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/styleWelcome.css">
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<nav>
		<div class="container" >
			<div style="display: inline-block; "class="navLeft">
				<ul>
					<li><a href="" style=""><i class="fa fa-twitter"></i>Home</a></li>
					<li><a href=""> <i class="fa fa-flash" style="background-repeat: no-repeat;"></i>Moment</a></li>
					
				</ul>
			</div>
			
		</div>
	</nav>
	<!--- ///////////////////Start Main //////////////////////////-->
		<main>
			<div class="container2" style="display: inline-block;">
		      
		     <div class="WelcomeToTwitter" style="display: inline-block; width: 50%">
		     	<div class="front-welcome" style="display: inline-block;">
		     		<div class="front-welcome-text" style="display: inline-block;">
			     		<h1>Welcome To Tweetbook</h1>
			     		<br>
			     		<p>Connect with your friends — and other fascinating people. Get in-the-moment updates on the things that interest you. And watch events unfold, in real time, from every angle.</p>
		     		</div>
		     	</div>
		     	
		     </div>
		     <div class="Form"  style="display: inline-block;">
		     	<form method="post" action="#" class="login">
		     		<input type="text" id= "uname" name="uname" placeholder="Phone or username" style="margin-top: 8px" required><br>
		     		<input type="password" id="psw" name="psw" placeholder="password" style="margin-top: 15px" required><br><br>
		     		 <input type="checkbox" checked="checked" id="rememberme" name="rememberme" value="rememberme" ><span style="color: #71797f;">remember me .</span>
		     		 <a href=""> forget Password</a>
		     		<input type="submit" name="login" value="login">

		     	</form>
		     	<br>

		     	<form class="signup" action="#" method="post">
		     		<h2 style="color: #14171a;font-size: 14px;">New to Tweetbook? <span>Sign up</span></h2>
		     		<input type="text" id="fname" name="fname" placeholder="fullname" style="margin-top: 8px" required><br>
		     		<input type="text" id="uname" name="uname" placeholder="Email" style="margin-top: 8px" required><br>
		     		<input type="password" id="psw" name="psw" placeholder="password" style="margin-top: 8px" required><br>
		     		<input type="submit" name="signup" value="signup for Tweetbook" style="margin-top: 8px" id="signupButton">
		     	</form>
		     </div>
		     <footer style="margin-left: 150px;">
			     <table style="">
			     	<tr>
			     		<td><a href="" style="margin-left: 100px;">About</a>	</td>
			     		<td><a href="">Help</a>	</td>
			     		<td><a href="">Center<a>	</td>
			     		<td><a href="">Blog<a>	</td>
			     		<td><a href=""> Status</a></td>
			     		<td><a href="">Job</a></td>
			     		<td><a href="">Terms</a></td>
			     		<td><a href="">privacyPolicy</a></td>
			     		<td><a href="">Cookies</a></td>
			     		<td><a href="">Ads Info</a></td>
			     		<td><a href="">Brand</a></td>
			     		<td><a href="">Directory</a></td>
			     		<td><a href="">© 2017</a></td>
			     		<td><a href="">Tweetbook</a></td>
			     	</tr> <br><br>
			     </table>  
		 </footer>
	    	</div>
		</main>	
</body>
</html>