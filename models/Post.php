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
        $query = "INSERT INTO `post` ( `user_id`, `content`, `tweeted_at`) VALUES ( '{$user_id}', '{$content}', '{$created_at}');";
        if (!$conn ->query($query)) {
            echo "INSERT failed: (" . $conn ->errno . ") " . $conn ->error;
        } else
            echo "done";
        connection::closeConnection($conn);
    }
    static function getPostsOfUser($user_id) {
        $query = "SELECT content FROM post WHERE user_id = $user_id";
        $conn = connection::createConnection();
        $result = $conn->query($query);
        connection::closeConnection($conn);
        $contents = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($contents, $row['content']);
            }
        }
        return $contents;
    }
    

    static public function getNewsFeedTweets($user_id)  {
        $conn = connection::createConnection();
        $query = "SELECT * FROM `post`, `friend`, `user` WHERE `user`.`id` = {$user_id} and `friend`.`user_id` = '{$user_id}' and `post`.`user_id` = `friend`.`friend_id`";
        mysql_set_charset("UTF8");
        header('Content-type: text/html; charset=utf-8');
        $conn->set_charset('UTF8');
        $result = $conn->query($query);
        connection::closeConnection($conn);
//        while ( $tweeta = $result->fetch_assoc())
//            echo $tweeta['content'];
        return $result;
    }
}