<?php

include __DIR__ . "/../database/settings.php";

class UserModel
{
    public static function getAll() 
    {
        $databaseConnection = DatabaseSettings::getConnection();
        $query = $databaseConnection->query("SELECT * FROM users");
        $users = $query->fetchAll();

        return $users;
    }
}
