<?php
/**
 * Created by PhpStorm.
 * User: Shrouk Mansour
 * Date: 22-Dec-17
 * Time: 19:17
 */
require_once '../models/Post.php';
class PostController
{


    static function addPost($post_content) {
        $post = new Post();
        $user_id = 1;
        $content = $post_content;
        $created_at = date('Y-m-d H:i:s');
        echo "from controller" . $content;
        $post->addPost($user_id, $content, $created_at);
    }
}