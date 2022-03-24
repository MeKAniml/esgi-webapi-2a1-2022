<?php

include __DIR__ . "/../library/response.php";
include __DIR__ . "/../models/post.php";

class PostController
{
    public static function get()
    {
        $statusCode = 200;

        $headers = [];

        $posts = PostModel::getAll();

        $body = [
            "success" => true,
            "posts" => $posts
        ];

        Response::json($statusCode, $headers, $body);
    }

    public static function post()
    {
        $statusCode = 200;

        $headers = [];

        $body = [
            "success" => true
        ];

        Response::json($statusCode, $headers, $body);
    }
}
