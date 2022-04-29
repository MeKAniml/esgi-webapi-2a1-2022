<?php

include __DIR__ . "/../database/settings.php";

class AlbumModel
{
    public static function getAll()
    {
        $databaseConnection = DatabaseSettings::getConnection();
        $query = $databaseConnection->query("SELECT * FROM albums");
        $albums = $query->fetchAll();

        return $albums;
    }

    public static function createOne($album)
    {
        $databaseConnection = DatabaseSettings::getConnection();
        $query = $databaseConnection->prepare("INSERT INTO albums(title, userId) VALUES(:title, :userId)");
        $query->execute($album);
    }
}
