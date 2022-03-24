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
}
