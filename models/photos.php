<?php

include __DIR__ . "/../database/settings.php";

class PhotoModel
{
    public static function getAll()
    {
        $databaseConnection = DatabaseSettings::getConnection();
        $query = $databaseConnection->query("SELECT * FROM photos");
        $photos = $query->fetchAll();

        return $photos;
    }

    public static function createOne($photo)
    {
        $databaseConnection = DatabaseSettings::getConnection();
        $query = $databaseConnection->prepare("INSERT INTO photos(title, url, thumbnailUrl, albumId) VALUES(:title, :url, :thumbnailUrl, :albumId)");
        $query->execute($photo);
    }
}
