<?php

include __DIR__ . "/../library/response.php";
include __DIR__ . "/../models/todos.php";
include __DIR__ . "/../library/request.php";

class TodoController
{
    public static function get()
    {
        try {
            $statusCode = 200;

            $headers = [];

            $todos = TodoModel::getAll();

            $body = [
                "success" => true,
                "todos" => $todos
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

            TodoModel::createOne([
                "userId" => $json->userId,
                "title" => $json->title,
                "completed" => $json->completed
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
