<?php


function getJobsByEnterpriseId($enterprise_id)
{
    $info = getDatabaseInfo();
    $dbh = new PDO('mysql:host=' . $info["host"] . ';dbname=' . $info["db_name"], $info["user"], $info["password"]);
    $query = $dbh->prepare("SELECT * FROM job WHERE enterprise_id=$enterprise_id");
    $parameters = [];

    $query->execute($parameters);

    $job = $query->fetchAll(PDO::FETCH_ASSOC);

    if ($job == []) {

        return "rien ici";

    } else {

        return json_encode($job);
    }
}