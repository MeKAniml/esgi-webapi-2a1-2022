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

    public static function createOne($comment)
    {
        $databaseConnection = DatabaseSettings::getConnection();
        $query = $databaseConnection->prepare("INSERT INTO comments(email, name, postId) VALUES(:email, :name, :postId)");
        $query->execute($comment);
    }
}
