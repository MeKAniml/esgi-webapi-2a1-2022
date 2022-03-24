<?php

include __DIR__ . "/../library/response.php";
include __DIR__ . "/../models/comment.php";

class CommentController
{
    public static function get()
    {
        $statusCode = 200;

        $headers = [];

        $comments = CommentModel::getAll();

        $body = [
            "success" => true,
            "comments" => $comments
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
