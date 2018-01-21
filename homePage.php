<?php
session_start();

require_once "controllers/PostController.php";
require_once 'models/UserModel.php';
    if (isset($_SESSION['username'])  ) {
        $user_id = UserModel::getUserID($_SESSION['username']);
        $user = UserModel::getUserInfo($user_id);
    }
    if (isset($_POST['submit']) && $_SERVER["REQUEST_METHOD"] == "POST" ) {
        PostController::addPost($user_id,$_POST['tweet-content']);
    }
//$user_id = UserModel::getUserID($_SESSION['username']);
$tweets = PostController::getNewsFeedTweets($user_id);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Twitter</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/font-awesome.min.css">
     <link rel="stylesheet" href="public/css/homepage.css">

</head>
<body>

<nav>
    <div class="container" >
        <div style="display: inline-block; " class="navLeft">
            <ul>
                <li><a href="" style=""><i class="fa fa-home"></i> Home</a></li>
                <li><a href=""> <i class="fa fa-flash" style="background-repeat: no-repeat;"></i> Moment</a></li>
                <li><a href=""><i class="fa fa-globe"></i> Notifications</a></li>
                <li><a href=""><i class="fa fa-envelope-o"></i> Message</a></li>
                <li><a href="" style="color: #1da1f2;" ><i class="fa fa-twitter" style="font-size:20px; padding-left: 250px; "></i></a></li>
                <li style="padding-left: 125px;">
                    <a class="search">
                        <input type="search" name="" placeholder="Search Tweetbook" placeholder="fa fa-search">
                    <a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <img  src="public/images/shrouk.jpg" alt="shrouk ">
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="views/profile.php">Profile</a></li>
                        <li><a href="logout.php">Log out</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </li>
                <button class="nav-tweet-btn">Tweet</button>
            </ul>
        </div>

    </div>
</nav>


<div class="container">
    <div class="row">
        <div class="col-md-3 dashboard-profile-card">
            <div class="dashboard-profile-card-bg">
                <img  src="public/images/eva.jpg" alt="shrouk ">
            </div>
            <div class="dashboard-profile-card-profile">
                <img  src="public/images/shrouk.jpg" alt="shrouk ">
            </div>
            <div class="info">
             <a href="/tweetbook/profile.php"  class="name"><?php echo $user['name'];?></a>
                <a href="#" class="user_name">@<?php echo $user['email'];?></a>
            </div>
            <div class="profile-stats">
                <ul>
                    <li>Tweets</li>
                    <li>Following</li>
                    <li>Followers</li>
                </ul>
            </div>
            <div class="profile-stats-num">
                <ul>
                    <li>6</li>
                    <li>68</li>
                    <li>13</li>
                </ul>
            </div>
        </div>



        <div class="col-md-6">
            <div class="tweet-box">
                <img src="public/images/shrouk.jpg" alt="">
                <form action="#" method="post">
                    <textarea name="tweet-content" id="tweet-content" cols="30" rows="2" placeholder="What's happening?">
                    </textarea>
                    <button class="btn-info btn-tweet-post" value="submit" name="submit">Tweet</button>
                </form>
            </div>

            <?php while ( $tweeta = $tweets->fetch_assoc()){?>

                <div class="tweet">
                    <div class="tweet-info" id="tweet-info">
                        <img class="user-tweet-img" src="public/images/shrouk.jpg" alt="">
                        <a href="#" class="user-tweet-name"><?php echo  $tweeta['name'];?></a>
                        <a href="#" class="user-tweet-user-name"><?php echo  $tweeta['email'];?></a>
                        <a href="#" class="user-tweet-date">
                            <span class="caret"></span>
                            <?php
                                $dt = new DateTime($tweeta['tweeted_at']);
                                $date = $dt->format('m/d');
                                $time = $dt->format('H:i');
                                if ($date == date('m/d'))
                                    echo $time;
                                else
                                    echo $date;
                            ?>
                        </a>
                    </div>
                    <div class="tweet-post" id="tweet-post">
                        <?php echo  $tweeta['content'];?>
                    </div>
                </div>
            <?php } ?>
        </div>



        <div class="col-md-3">
            <div class="who-to-follow">
                <h3>Who to follow</h3>
                <div class="follower">
                    <img  src="public/images/shrouk.jpg" alt="shrouk ">
                    <a class="full-name">Shrouk Mansour</a>
                    <a href="#" class="user-name">@shroukmansour</a>
                    <button class="follow-btn">Follow</button>
                </div>
                <div class="follower">
                    <img  src="public/images/shrouk.jpg" alt="shrouk ">
                    <a class="full-name">Shrouk Mansour</a>
                    <a href="#" class="user-name">@shroukmansour</a>
                    <button class="follow-btn">Follow</button>
                </div>
                <div class="follower">
                    <img  src="public/images/shrouk.jpg" alt="shrouk ">
                    <a class="full-name">Shrouk Mansour</a>
                    <a href="#" class="user-name">@shroukmansour</a>
                    <button class="follow-btn">Follow</button>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="public/js/jquery-3.1.0.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/main.js"></script>
<script src="public/js/homePageTweets.js"></script>
</body>
</html>
