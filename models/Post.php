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
        $q = "INSERT INTO `post` ( `user_id`, `content`, `created_at`) VALUES ( '{$user_id}', '{$content}', '{$created_at}');";
        if (!$conn ->query($q)) {
            echo "INSERT failed: (" . $conn ->errno . ") " . $conn ->error;
        } else
            echo "done";
        $connection->closeConnection();
    }
}