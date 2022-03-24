<?php

include __DIR__ . "/../library/response.php";

class AlbumController
{
    public static function get()
    {
        $statusCode = 200;

        $headers = [];

        $body = [
            "success" => true,
            "amin" => false
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
