<?php

// LEFT JOIN enterprise ON job.enterprise_id = enterprise.id 
function getAllJobs()
{
    $info = getDatabaseInfo();
    $dbh = new PDO('mysql:host=' . $info["host"] . ';dbname=' . $info["db_name"], $info["user"], $info["password"]);
    $query = $dbh->prepare("SELECT * FROM job ");

    $parameters = [];
    $query->execute($parameters);
    $user = $query->fetchAll(PDO::FETCH_ASSOC);

    if ($user == []) {

        return json_encode("rien ici");

    } else {

        return json_encode($user);
    }
}