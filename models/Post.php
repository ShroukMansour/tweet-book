<?php

/**
 * Created by PhpStorm.
 * User: Shrouk Mansour
 * Date: 22-Dec-17
 * Time: 19:30
 */
require_once 'Config.php';
class Post {
    static public function addPost($user_id, $content, $created_at) {
        $conn = connection::createConnection();
        echo $created_at;
        $query = "INSERT INTO `post` (`user_id`, `content`, `tweeted_at`) VALUES ( '{$user_id}', '{$content}', '{$created_at}');";
        if (!$conn ->query($query)) {
            echo "INSERT failed: (" . $conn ->errno . ") " . $conn ->error;
        } else
            echo "done";
        connection::closeConnection($conn);
    }
    static function getPostsOfUser($id) {
        $query = "SELECT * FROM post WHERE user`.`id` = $id";
        $conn = connection::createConnection();
        $result = $conn->query($query);
        connection::closeConnection($conn);
        return $result;
    }
    static public function getNewsFeedTweets($user_id)  {
        $conn = connection::createConnection();
        $query = "SELECT * FROM post, friend, user WHERE `user`.`id` = $user_id and `friend`.`user_id` = $user_id and `post`.`user_id` = `friend`.`friend_id`";
        mysql_set_charset("UTF8");
        header('Content-type: text/html; charset=utf-8');
        $conn->set_charset('UTF8');
        $result = $conn->query($query);
        echo "ree,";
        if (!$result) {
            throw new Exception("Database Error ");
}
        connection::closeConnection($conn);
        return $result;
    }
}