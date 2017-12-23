<?php
/**
 * Created by PhpStorm.
 * User: Shrouk Mansour
 * Date: 22-Dec-17
 * Time: 19:30
 */
require_once __DIR__.'/../Config.php';
class Post
{
    private $id;
    private $user_id = 1;
    private $content;
    private $created_at;

    public function addPost($user_id, $content, $created_at)
    {
        $conn = connection::createConnection();
        $q = "INSERT INTO `post` ( `user_id`, `content`, `tweeted_at`) VALUES ( '{$user_id}', '{$content}', '{$created_at}');";
        if (!$conn ->query($q)) {
            echo "INSERT failed: (" . $conn ->errno . ") " . $conn ->error;
        } else
            echo "done";
        connection::closeConnection($conn);
    }

    public function getNewsFeedTweets($user_id)
    {
        $conn = connection::createConnection();
        $q = "SELECT * FROM `post`, `friend`, `user` WHERE `user`.`id` = {$user_id} and `friend`.`user_id` = '{$user_id}' and `post`.`user_id` = `friend`.`friend_id`";
        mysql_set_charset("UTF8");
        header('Content-type: text/html; charset=utf-8');
        $conn->set_charset('UTF8');
        $result = $conn->query($q);
        connection::closeConnection($conn);
//        while ( $tweeta = $result->fetch_assoc())
//            echo $tweeta['content'];
        return $result;
    }
}