<?php
/**
 * Created by PhpStorm.
 * User: Shrouk Mansour
 * Date: 22-Dec-17
 * Time: 19:17
 */
require_once "models/Post.php";
class PostController {
    static function addPost($user_id, $post_content) {
        $content = $post_content;
        $created_at = date('Y-m-d H:i:s');
        echo $created_at;
        post::addPost($user_id, $content, $created_at);
    }

    public static function getNewsFeedTweets($user_id) {
        $tweets = post::getNewsFeedTweets($user_id);
        return $tweets;
    }
     public static function getPostsOfUser($user_id) {
        $tweets = post::getPostsOfUser($user_id);
        return $tweets;
    }
}