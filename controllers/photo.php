<?php

include __DIR__ . "/../library/response.php";
include __DIR__ . "/../models/photo.php";

class PhotoController
{
    public static function get()
    {
        $statusCode = 200;

        $headers = [];

        $photos = PhotoModel::getAll();

        $body = [
            "success" => true,
            "photos" => $photos
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
