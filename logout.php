<?php
session_start();
session_unset();
session_destroy();
setcookie("TweetbookUsername", $username, time() - 60 * 60 * 30);
setcookie("TweetbookPassword", $password, time() - 60 * 60 * 30);
header("Location: welcome.php");
/**
 * Created by PhpStorm.
 * User: Shrouk Mansour
 * Date: 24-Dec-17
 * Time: 12:40
 */
