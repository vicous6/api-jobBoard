<?php


function getMyApplyListsByUserId($id)
{

    $info = getDatabaseInfo();
    $dbh = new PDO('mysql:host=' . $info["host"] . ';dbname=' . $info["db_name"], $info["user"], $info["password"]);
    $query = $dbh->prepare("SELECT * FROM applyList 
    INNER JOIN job ON applyList.job_id = job.id
    WHERE applyList.user_id = :id");
    $parameters = [

        "id" => $id
    ];

    $query->execute($parameters);
    $user = $query->fetchAll(PDO::FETCH_ASSOC);

    if ($user == []) {

        return json_encode("rien ici");

    } else {

        return json_encode($user);
    }
}