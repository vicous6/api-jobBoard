<?php


function getApplyListsByJobId($id)
{
    $info = getDatabaseInfo();
    $dbh = new PDO('mysql:host=' . $info["host"] . ';dbname=' . $info["db_name"], $info["user"], $info["password"]);
    $query = $dbh->prepare("SELECT * FROM applyList WHERE job_id=$id");
    $parameters = [];

    $query->execute($parameters);
    $user = $query->fetchAll(PDO::FETCH_ASSOC);

    if ($user == []) {

        return json_encode("rien ici");

    } else {

        return json_encode($user);
    }
}