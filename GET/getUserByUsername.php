<?php


function getUserByUsername(string $username)
{
    var_dump($username);

    $info = getDatabaseInfo();
    $dbh = new PDO('mysql:host=' . $info["host"] . ';dbname=' . $info["db_name"], $info["user"], $info["password"]);
    $query = $dbh->prepare("SELECT * FROM user WHERE username='$username'");
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