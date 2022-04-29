<?php

include __DIR__ . "/../database/settings.php";

class TodoModel
{
    public static function getAll()
    {
        $databaseConnection = DatabaseSettings::getConnection();
        $query = $databaseConnection->query("SELECT * FROM todos");
        $todos = $query->fetchAll();

        return $todos;
    }
    
    public static function createOne($todo)
    {
        $databaseConnection = DatabaseSettings::getConnection();
        $query = $databaseConnection->prepare("INSERT INTO todos(title, completed, userId) VALUES(:title, :completed, :userId)");
        $query->execute($todo);
    }
}
