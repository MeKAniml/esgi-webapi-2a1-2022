<?php

include __DIR__ . "/../database/settings.php";

class PostModel
{
    public static function getAll()
    {
        $databaseConnection = DatabaseSettings::getConnection(); 
        $query = $databaseConnection->query("SELECT * FROM posts");
        $posts = $query->fetchAll();

        return $posts;
    }
}
