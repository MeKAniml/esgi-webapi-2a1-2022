<?php

include __DIR__ . "/../library/response.php";
include __DIR__ . "/../models/todo.php";

class TodoController
{
    public static function get()
    {
        $statusCode = 200;

        $headers = [];

        $todos = TodoModel::getAll();

        $body = [
            "success" => true,
            "todos" => $todos
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
