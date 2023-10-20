<?php


function createJob($post)
{
    $info = getDatabaseInfo();
    $dbh = new PDO('mysql:host=' . $info["host"] . ';dbname=' . $info["db_name"], $info["user"], $info["password"]);

    $query = $dbh->prepare("INSERT INTO 
    job (id, name,description,working_time,location,enterprise_id) 
    VALUES (null, :name, :description,:working_time,:location,:enterprise_id)");

    $parameters = [
        "name" => $post["name"],
        "description" => $post["description"],
        "working_time" => $post["working_time"],
        "location" => $post["location"],
        "enterprise_id" => $post["enterprise_id"]

    ];

    try {

        $query->execute($parameters);
        echo json_encode("ca marche");

    } catch (Exception $e) {
        // var_dump($e);
        echo json_encode("raté ca marche pas");
    }
}