<?php

include __DIR__ . "/../library/response.php";
include __DIR__ . "/../models/posts.php";
include __DIR__ . "/../library/request.php";

class PostController
{
    public static function get()
    {
        try {
            $statusCode = 200;

            $headers = [];

            $posts = PostModel::getAll();

            $body = [
                "success" => true,
                "posts" => $posts
            ];

            Response::json($statusCode, $headers, $body);
        } catch (PDOException $exception) {
            Response::json(500, [], ["success" => false, "error" => $exception->getMessage()]);
        }
    }

    public static function post()
    {
        try {
            $statusCode = 200;

            $headers = [];

            $json = Request::json();

            PostModel::createOne([
                "userId" => $json->userId,
                "title" => $json->title,
                "body" => $json->body
            ]);

            $body = [
                "success" => true
            ];

            Response::json($statusCode, $headers, $body);
        } catch (PDOException $exception) {
            Response::json(500, [], ["success" => false, "error" => $exception->getMessage()]);
        }
    }
}
