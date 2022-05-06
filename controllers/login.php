<?php

include __DIR__ . "/../library/request.php";
include __DIR__ . "/../database/settings.php";
include __DIR__ . "/../library/response.php";

class LoginController
{
    public static function post()
    {
        try {
            $json = Request::json();
            $databaseConnection = DatabaseSettings::getConnection();
            $query = $databaseConnection->prepare("SELECT id, email, password FROM users WHERE email = :email");

            $query->execute([
                "email" => $json->email
            ]);

            $user = $query->fetch();

            if (!$user) {
                Response::json(400, [], ["success" => false, "error" => "Bad request"]);
                return;
            }

            if (!password_verify($json->password, $user["password"])) {
                Response::json(400, [], ["success" => false, "error" => "Bad request"]);
                return;
            }

            $token = bin2hex(random_bytes(16));

            $query = $databaseConnection->prepare("UPDATE users SET token = :token WHERE id = :id");

            $query->execute([
                "token" => $token,
                "id" => $user["id"]
            ]);

            Response::json(200, [], ["success" => true, "token" => $token]);
        } catch (PDOException $exception) {
            Response::json(500, [], ["success" => false, "error" => $exception->getMessage()]);
        }
    }

    public static function delete()
    {
        try {
            $json = Request::json();
            $headers = Request::headers();

            if (!isset($headers["token"])) {
                Response::json(403, [], ["success" => false, "error" => "Forbidden"]);
                return;
            }

            $databaseConnection = DatabaseSettings::getConnection();
            $query = $databaseConnection->prepare("UPDATE users SET token = '' WHERE token = :token");

            $query->execute([
                "token" => $headers["token"]
            ]);

            Response::json(200, [], ["success" => false]);
        } catch (PDOException $exception) {
            Response::json(500, [], ["success" => false, "error" => $exception->getMessage()]);
        }
    }
}
