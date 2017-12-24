<?php
/**
 * Created by PhpStorm.
 * User: Shrouk Mansour
 * Date: 22-Dec-17
 * Time: 19:30
 */
require_once '../Config.php';
class Post
{
    private $id;
    private $user_id = 1;
    private $content;
    private $created_at;

    public function addPost($user_id, $content, $created_at)
    {
        $connection = new connection();
        $conn = $connection->createConnection();

        $q = "INSERT INTO `post` ( `user_id`, `content`, `tweeted_at`) VALUES ( '{$user_id}', '{$content}', '{$created_at}');";
        if (!$conn ->query($q)) {
            echo "INSERT failed: (" . $conn ->errno . ") " . $conn ->error;
        }
        $connection->closeConnection();
    }

    public function getNewsFeedTweets($user_id)
    {
        $connection = new connection();
        $conn = $connection->createConnection();
        $q = "SELECT DISTINCT * FROM `user`, `friend`,`post` WHERE (friend.user_id = {$user_id} and post.user_id = friend.friend_id 
                and user.id = friend.friend_id) or user.id = post.user_id ORDER BY `post`.`tweeted_at` DESC";
        mysql_set_charset("UTF8");
        header('Content-type: text/html; charset=utf-8');
        $conn->set_charset('UTF8');
        $result = $conn->query($q);
        $connection->closeConnection();
//        while ( $tweeta = $result->fetch_assoc())
//            echo $tweeta['content'];
        return $result;
    }
}