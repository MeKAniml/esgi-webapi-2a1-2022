<?php

include __DIR__ . "/../library/response.php";
include __DIR__ . "/../models/photos.php";
include __DIR__ . "/../library/request.php";

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

        $json = Request::json();

        PhotoModel::createOne([
            "albumId" => $json->albumId,
            "title" => $json->title,
            "url" => $json->url,
            "thumbnailUrl" => $json->thumbnailUrl
        ]);

        $body = [
            "success" => true
        ];

        Response::json($statusCode, $headers, $body);
    }
}
