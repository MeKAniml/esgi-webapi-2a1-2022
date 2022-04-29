<?php

include __DIR__ . "/../library/response.php";
include __DIR__ . "/../models/comments.php";
include __DIR__ . "/../library/request.php";

class CommentController
{
    public static function get()
    {
        try {
            $statusCode = 200;

            $headers = [];

            $comments = CommentModel::getAll();

            $body = [
                "success" => true,
                "comments" => $comments
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

            CommentModel::createOne([
                "name" => $json->name,
                "email" => $json->email,
                "postId" => $json->postId
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
