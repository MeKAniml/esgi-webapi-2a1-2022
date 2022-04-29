<?php

include __DIR__ . "/../library/response.php";
include __DIR__ . "/../models/user.php";

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
        $statusCode = 200;

        $headers = [];

        UserModel::createOne([
            "name" => "Amin",
            "username" => "aminnairi",
            "email" => "anairi@esgi.fr",
            "phone" => "0102030405",
            "website" => "https://github.com/aminnairi",
            "password" => "password",
            "role" => "USER"
        ]);

        $body = [
            "success" => true
        ];

        Response::json($statusCode, $headers, $body);
    }
}
