<?php


function createJob($post)
{
    $info = getDatabaseInfo();
    $dbh = new PDO('mysql:host=' . $info["host"] . ';dbname=' . $info["db_name"], $info["user"], $info["password"]);

    $query = $dbh->prepare("INSERT INTO 
    job (id, name,descriptionworking_time,location,enterprise_id) 
    VALUES (null, :name, :description,:working_time,:location,:enterprise_id)");

    $parameters = [
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
        echo "ca marche";

    } catch (Exception $e) {
        // var_dump($e);
        echo "raté ca marche pas";
    }
}