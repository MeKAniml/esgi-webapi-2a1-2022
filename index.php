<?php

/**
 * Permet d'ajouter un en-tête à la réponse
 * @see https://www.php.net/manual/en/function.header.php
 */
header("Content-Type: text/plain");

/**
 * Modifier le code de statut de la réponse
 * @see https://www.php.net/manual/en/function.http-response-code.php
 */
http_response_code(200);

/**
 * La route que l'utilisateur essaie de récupérer
 * @see https://www.php.net/manual/en/reserved.variables.request.php
 */
$route = $_REQUEST["route"];

/**
 * La méthode HTTP
 * @see https://www.php.net/manual/en/reserved.variables.server.php
 */
$method = $_SERVER["REQUEST_METHOD"];

var_dump($method);

// comments
// albums
// photos
// todos

if ($route === "users") {
    include "./controllers/user.php";

    if ($method === "GET") {
        UserController::get();
        return;
    }
    
    if ($method === "POST") {
        UserController::post();
        return;
    }
}

if ($route === "posts") {
    include "./controllers/post.php";

    if ($method === "GET") {
        PostController::get();
        return;
    }

    if ($method === "POST") {
        PostController::post();
        return;
    }
}

include "./controllers/not-found.php";

NotFoundController::all();
