<?php

function getUsersByEnterpriseId($enterprise_id)
{

    $info = getDatabaseInfo();
    $dbh = new PDO('mysql:host=' . $info["host"] . ';dbname=' . $info["db_name"], $info["user"], $info["password"]);
    $query = $dbh->prepare("SELECT * FROM user WHERE enterprise_id=$enterprise_id");
    $parameters = [];

    $query->execute($parameters);

    $users = $query->fetchAll(PDO::FETCH_ASSOC);

    if ($users == []) {

        return "rien ici";

    } else {

        return json_encode($users);
    }

}