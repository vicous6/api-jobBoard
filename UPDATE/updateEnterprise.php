<?php

function updateEnterprise($post)
{
    var_dump($post);
    $post = json_decode(file_get_contents("php://input"));
    $info = getDatabaseInfo();
    $dbh = new PDO('mysql:host=' . $info["host"] . ';dbname=' . $info["db_name"], $info["user"], $info["password"]);
    var_dump($post);
    $query = $dbh->prepare("UPDATE 
    job SET 
    name=:name,
    description=:description,
    sector=:sector
   
    WHERE id=:id"
    );

    $parameters = [
        "id" => $post->id,
        "name" => $post->name,
        "description" => $post->description,
        "sector" => $post->sector,
    ];

    try {

        $query->execute($parameters);
        return json_encode("ca marche");

    } catch (Exception $e) {
        // var_dump($e);
        return json_encode("raté ca marche pas");
    }
}