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
}
