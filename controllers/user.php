<?php

include __DIR__ . "/../library/response.php";

class UserController
{
    public static function get()
    {
        $statusCode = 200;

        $headers = [];

        $database = new PDO();
        $query = $database->query();
        $users = $query->fetchAll();

        $body = [
            "success" => true,
            "users" => $users
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
