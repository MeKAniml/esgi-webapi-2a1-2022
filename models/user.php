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

    public static function createOne($user) {
        $databaseConnection = DatabaseSettings::getConnection();
        $query = $databaseConnection->query("INSERT INTO users(name, username, email, phone, website, password, role) VALUES({$user['name']}, {$user['username']}, {$user['email']}, {$user['phone']}, {$user['website']}, {$user['password']}, {$user['role']});");

    }
}
