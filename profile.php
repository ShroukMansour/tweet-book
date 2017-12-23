
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	    <link rel="stylesheet" type="text/css" href="../public/css/profile.css">

	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  	<title>Profile</title>
</head>
<body>
	<nav>
		<div class="container" >
			<div style="display: inline-block; " class="navLeft">
				<ul>
					<li><a href="" style=""><i class="fa fa-home"></i>Home</a></li>
					<li><a href=""> <i class="fa fa-flash" style="background-repeat: no-repeat;"></i>Moment</a></li>
					<!--<li><a href=""> <i class="fa fa-globe">Notifications</a></li>-->
					<li><a href=""><i class="fa fa-globe"></i>Notifications</a></li>	
					<li><a href=""><i class="fa fa-envelope-o"></i>Message</a></li>
					<li><a href="" style="color: #1da1f2;" ><i class="fa fa-twitter" style="font-size:20px; padding-left: 250px; "></i></a></li>
					<li style="padding-left: 125px;"><form class="search">
						<input type="search" name="" placeholder="search Twittbook" placeholder="fa fa-search"></form></li>
					<li style=""><a href=""><i class="fa fa-user"></i><a></li>
					<li style=""><a class="search"><button>Tweetbook</button><a></li>
				</ul>
			</div>
			
		</div>
	</nav>
	<nav>
		<div style="width: 100%;height: 120px; background-color: #1da1f2;"></div>
		<div class="container">
			
			<div class="ProfilePhoto">
				<form method="POST" action="getdata.php" enctype="multipart/form-data">
 					<input type="file" name="myimage">
					 <input type="submit" name="submit_image" value="Upload">
				</form>
				
			</div>
			<ul style="padding-bottom: 10px">
					<li><a href=""> <i class="fa fa-flash" style="background-repeat: no-repeat;"></i>Following</a></li>
					<li><a href=""><i class="fa fa-globe"></i>List</a></li>	
					<li><a href=""><i class="fa fa-envelope-o"></i>Moment</a></li>
					<li style=""><a class="search"><button>Edit profile</button><a></li>
			</ul>
		</div>
	</nav>
	<main>
		<div class="tweetPost" style=" float:center;margin-top: 20px; background-color: #e8f5fd; height: 150px; width: 400px;">
			<textarea rows="4" cols="50" style="margin-left: 20px; margin-top: 20px; " placeholder="What's happening"></textarea> <br>
			
			<input type="submit" name="" value="Tweet" class="Tweet">

			
		</div>
		<!-------------------------------------------------///-->
		 <div class="col-md-6">
            <div class="tweet-box">
                <img src="../public/images/shrouk.jpg" alt="">
                <form action="#" method="post">
                    <textarea name="tweet-content" id="tweet-content" cols="30" rows="2" placeholder="What's happening?">
                    </textarea>
                    <button class="btn-info btn-tweet-post" value="submit" name="submit">Tweet</button>
                </form>
            </div>

            <div class="tweet">
                <div class="tweet-info">
                    <img class="user-tweet-img" src="../public/images/shrouk.jpg" alt="">
                    <a href="#" class="user-tweet-name">shrouk mansour</a>
                    <a href="#" class="user-tweet-user-name">@shroukmansour99</a>
                    <a href="#" class="user-tweet-date">30:95</a>
                </div>
                <div class="tweet-post">
                    وَمَا خَلَقْنَا السَّمَاء وَالأَرْضَ وَمَا بَيْنَهُمَا لاعِبِينَ
                </div>
            </div>
        </div>


	</main>

	
</body>
</html>
