<?php

require __DIR__ . "/../library/response.php";
require __DIR__ . "/../models/users.php";
require __DIR__ . "/../library/request.php";

class UserController
{
    /**
     * @route GET /users
     */
    public static function get()
    {
        try {
            $headers = Request::headers();

            if (!isset($headers["token"])) {
                Response::json(400, [], ["success" => false, "error" => "Bad request"]);
                return;
            }

            $user = UserModel::getOneByToken($headers["token"]);

            if (!$user) {
                Response::json(404, [], ["success" => false, "error" => "Not found"]);
                return;
            }

            if ($user["role"] !== "ADMINISTRATOR") {
                Response::json(401, [], ["success" => false, "error" => "Unauthorized"]);
                return;
            }

            $statusCode = 200;

            $headers = [];

            $users = UserModel::getAll();

            $body = [
                "success" => true,
                "users" => $users
            ];

            Response::json($statusCode, $headers, $body);
        } catch (PDOException $exception) {
            Response::json(500, [], ["success" => false, "error" => $exception->getMessage()]);
        }
    }

    public static function post()
    {
        try {
            $headers = Request::headers();

            if (!isset($headers["token"])) {
                Response::json(400, [], ["success" => false, "error" => "Bad request"]);
                return;
            }

            $user = UserModel::getOneByToken($headers["token"]);

            if (!$user) {
                Response::json(404, [], ["success" => false, "error" => "Not found"]);
                return;
            }

            $json = Request::json();

            $statusCode = 200;

            $headers = [];

            UserModel::createOne(
                [
                "name" => $json->name,
                "username" => $json->username,
                "email" => $json->email,
                "phone" => $json->phone,
                "website" => $json->website,
                "password" => password_hash($json->password, PASSWORD_BCRYPT),
                "role" => $json->role
                ]
            );

            $body = [
                "success" => true
            ];

            Response::json($statusCode, $headers, $body);
        } catch (PDOException $exception) {
            Response::json(500, [], ["success" => false, "error" => $exception->getMessage()]);
        }
    }
}
