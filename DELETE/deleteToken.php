<?php

function deleteToken($token)
{



    $info = getDatabaseInfo();
    $dbh = new PDO('mysql:host=' . $info["host"] . ';dbname=' . $info["db_name"], $info["user"], $info["password"]);
    $query = $dbh->prepare("DELETE token FROM user WHERE token=$token");

    $parameters = [];
    try {

        $query->execute($parameters);
        $count = $query->rowCount();
        if ($count == 1) {

            return "suppression effectué";
        } else {
            return "rien ici";
        }
    } catch (PDOException $e) {
        die('Error' . $e->getMessage());
    }
}