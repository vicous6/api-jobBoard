<?php


function getJobsByEnterpriseId($enterprise_id)
{
    $info = getDatabaseInfo();
    // $con = mysqli_connect($info["host"], $info["user"], $info["password"], $info["db_name"]);
    $dbh = new PDO('mysql:host=' . $info["host"] . ';dbname=' . $info["db_name"], $info["user"], $info["password"]);



    $query = $dbh->prepare("SELECT * FROM job  WHERE enterprise_id=$enterprise_id");
    $parameters = [];

    $query->execute($parameters);

    $user = $query->fetchAll(PDO::FETCH_ASSOC);

    if ($user == []) {

        return "rien ici";

    } else {

        return json_encode($user);
    }
}