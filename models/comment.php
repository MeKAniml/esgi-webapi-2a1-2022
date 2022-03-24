<?php

include __DIR__ . "/../database/settings.php";

class CommentModel
{
    public static function getAll()
    {
        $databaseConnection = DatabaseSettings::getConnection();
        $query = $databaseConnection->query("SELECT * FROM comments");
        $comments = $query->fetchAll();

        return $comments;
    }
}
