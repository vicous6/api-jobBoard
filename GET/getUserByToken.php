<?php


function getUserByToken(string $token)
{


    $info = getDatabaseInfo();
    $dbh = new PDO('mysql:host=' . $info["host"] . ';dbname=' . $info["db_name"], $info["user"], $info["password"]);
    $query = $dbh->prepare("SELECT * FROM user WHERE token='$token'");
    var_dump($query);
    $parameters = [];

    $query->execute($parameters);
    $user = $query->fetchAll(PDO::FETCH_ASSOC);

    if ($user == []) {

        return false;

    } else {

        return json_encode($user);
    }
}