<?php

include __DIR__ . "/../library/response.php";
include __DIR__ . "/../models/albums.php";
include __DIR__ . "/../library/request.php";

class AlbumController
{
    public static function get()
    {
        try {
            $statusCode = 200;

            $headers = [];

            $albums = AlbumModel::getAll();

            $body = [
                "success" => true,
                "albums" => $albums
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

            AlbumModel::createOne([
                "title" => $json->title,
                "userId" => $json->userId
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
