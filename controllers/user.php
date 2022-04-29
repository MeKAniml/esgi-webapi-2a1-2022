<?php

include __DIR__ . "/../library/response.php";
include __DIR__ . "/../models/user.php";
include __DIR__ . "/../library/request.php";

class UserController
{
    public static function get()
    {
        $statusCode = 200;

        $headers = [];

        $users = UserModel::getAll();

        $body = [
            "success" => true,
            "users" => $users
        ];

        Response::json($statusCode, $headers, $body);
    }

    public static function post()
    {
        try {
            $json = Request::json();

            $statusCode = 200;

            $headers = [];

            UserModel::createOne([
                "name" => $json->name,
                "username" => $json->username,
                "email" => $json->email,
                "phone" => $json->phone,
                "website" => $json->website,
                "password" => $json->password,
                "role" => $json->role
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
