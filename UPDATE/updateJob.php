<?php

function updateJob($post)
{
    $info = getDatabaseInfo();
    $dbh = new PDO('mysql:host=' . $info["host"] . ';dbname=' . $info["db_name"], $info["user"], $info["password"]);

    $query = $dbh->prepare("UPDATE 
    job SET 
    name=:name,
    description=:description,
    -- status=:status,
    -- workplace=:workplace,
    -- wages=:wages,
    working_time=:working_time,
    location=:location,
    -- short_description=:short_description,
    enterprise_id=:enterprise_id
    WHERE id=:id"
    );

    $parameters = [
        "id" => $post["id"],
        "name" => $post["name"],
        "description" => $post["description"],
        // "status" => $post["status"],
        // "workplace" => $post["workplace"],
        // "wages" => $post["wages"],
        "working_time" => $post["working_time"],
        "location" => $post["location"],
        // "short_description" => $post["short_description"],
        "enterprise_id" => $post["enterprise_id"]

    ];

    try {

        $query->execute($parameters);
        return json_encode("ca marche");

    } catch (Exception $e) {
        // var_dump($e);
        return json_encode("raté ca marche pas");
    }
}