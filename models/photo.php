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
}
