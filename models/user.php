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
        $query = $databaseConnection->prepare("INSERT INTO users(name, username, email, phone, website, password, role) VALUES(:name, :username, :email, :phone, :website, :password, :role);");
        $query->execute($user);
    }
}
