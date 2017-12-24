<?php
require_once __DIR__."/controllers/PostController.php";
session_start();
    if (isset($_POST['submit']) && $_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['username'])) {
        $id = UserModel::getUserID($_SESSION['username']);
        PostController::addPost($id,$_POST['tweet-content']);
    }
    $user_id = 1;
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
    <link rel="stylesheet" href="public/css/homepage2.css">
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Moments</a></li>
                <li><a href="#">Notifications</a></li>
                <li><a href="#">Messages</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <button class="btn-info">Tweet</button>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>


<div class="container">
    <div class="row">
        <div class="col-md-3 dashboard-profile-card">
            <div class="dashboard-profile-card-bg">
                <img  src="../public/images/eva.jpg" alt="shrouk ">
            </div>
            <div class="dashboard-profile-card-profile">
                <img  src="../public/images/shrouk.jpg" alt="shrouk ">
            </div>
            <div class="info">
                <a href="/tweetbook/profile.php" class="name">Shrouk Mansour</a>
                <a href="#" class="user_name">@shroukmansour99</a>
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
                <img src="../public/images/shrouk.jpg" alt="">
                <form action="#" method="post">
                    <textarea name="tweet-content" id="tweet-content" cols="30" rows="2" placeholder="What's happening?">
                    </textarea>
                    <button class="btn-info btn-tweet-post" value="submit" name="submit">Tweet</button>
                </form>
            </div>

            <?php while ( $tweeta = $tweets->fetch_assoc()){?>

                <div class="tweet">
                    <div class="tweet-info">
                        <img class="user-tweet-img" src="../public/images/shrouk.jpg" alt="">
                        <a href="#" class="user-tweet-name"><?php echo  $tweeta['name'];?></a>
                        <a href="#" class="user-tweet-user-name"><?php echo  $tweeta['email'];?></a>
                        <a href="#" class="user-tweet-date">
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
                    <div class="tweet-post">

                        <?php echo  $tweeta['content'];?>
                    </div>
                </div>
            <?php } ?>
        </div>



        <div class="col-md-3">teset</div>
    </div>
</div>
<script src="../public/js/jquery-3.1.0.min.js"></script>
<script src="../public/js/bootstrap.min.js"></script>
<script src="../public/js/main.js"></script>
</body>
</html>
