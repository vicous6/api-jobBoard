<?php


function getTokenByUserId($id)
{
    $info = getDatabaseInfo();
    $dbh = new PDO('mysql:host=' . $info["host"] . ';dbname=' . $info["db_name"], $info["user"], $info["password"]);
    $query = $dbh->prepare("SELECT token FROM user WHERE id=$id");
    $parameters = [];

    $query->execute($parameters);
    $token = $query->fetchAll(PDO::FETCH_ASSOC);

    if ($token == []) {

        return "rien ici";

    } else {

        return json_encode($token);
    }
}