<?php

include __DIR__ . "/../library/response.php";
include __DIR__ . "/../models/album.php";

class AlbumController
{
    public static function get()
    {
        $statusCode = 200;

        $headers = [];

        $albums = AlbumModel::getAll();

        $body = [
            "success" => true,
            "albums" => $albums
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
