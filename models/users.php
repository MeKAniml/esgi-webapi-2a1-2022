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

    public static function createOne($user)
    {
        $databaseConnection = DatabaseSettings::getConnection();
        $query = $databaseConnection->prepare("INSERT INTO users(name, username, email, phone, website, password, role) VALUES(:name, :username, :email, :phone, :website, :password, :role);");
        $query->execute($user);
    }

    public static function getOneByEmail($email)
    {
        $databaseConnection = DatabaseSettings::getConnection();
        $query = $databaseConnection->prepare("SELECT * FROM users WHERE email = :email");

        $query->execute([
            "email" => $email
        ]);

        $user = $query->fetch();

        return $user;
    }

    public static function getOneByToken($token)
    {
        $databaseConnection = DatabaseSettings::getConnection();
        $query = $databaseConnection->prepare("SELECT * FROM users WHERE token = :token");

        $query->execute([
            "token" => $token
        ]);

        $user = $query->fetch();

        return $user;
    }

    public static function updateOneById($id, $user)
    {
        $set = [];
        $allowedKeys = ["name", "username", "email", "phone", "website", "password", "role", "token"];

        foreach ($user as $key => $value) {
            if (!in_array($key, $allowedKeys)) {
                continue;
            }

            $set[] = "$key = :$key";
        }

        $set = implode(", ", $set);
        $databaseConnection = DatabaseSettings::getConnection();
        $query = $databaseConnection->prepare("UPDATE users SET $set WHERE id = :id");
        $query->execute(array_merge(["id" => $id], $user));
    }
}
