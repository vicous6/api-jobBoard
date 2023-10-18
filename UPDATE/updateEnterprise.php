<?php

function updateEnterprise($post, $id)
{
    $info = getDatabaseInfo();
    $dbh = new PDO('mysql:host=' . $info["host"] . ';dbname=' . $info["db_name"], $info["user"], $info["password"]);

    $query = $dbh->prepare("UPDATE 
    job SET 
    name=:name,
    description=:description,
    sector=:sector
   
    WHERE id=:id"
    );

    $parameters = [
        "id" => $id,
        "name" => $post["name"],
        "description" => $post["description"],
        "status" => $post["status"],
    ];

    try {

        $query->execute($parameters);
        return json_encode("ca marche");

    } catch (Exception $e) {
        // var_dump($e);
        return json_encode("raté ca marche pas");
    }
}