<?php

include __DIR__ . "/../library/response.php";

class UserController
{
    public static function get()
    {
        Response::json(200, [], '{"email":true}');
    }

    public static function post()
    {
        Response::json(200, [], '{"email":true}');
    }
}
