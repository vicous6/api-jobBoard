<?php


function createEnterprise($post)
{
    var_dump($post);
    $info = getDatabaseInfo();
    $dbh = new PDO('mysql:host=' . $info["host"] . ';dbname=' . $info["db_name"], $info["user"], $info["password"]);

    $query = $dbh->prepare("INSERT INTO 
    enterprise (id, name, description,sector) 
    VALUES (null, :name, :description, :sector)");

    $parameters = [
        "name" => $post["name"],
        "description" => $post["description"],
        "sector" => $post["sector"]
    ];

    try {

        $query->execute($parameters);
        echo "ca marche";
    } catch (Exception $e) {
        var_dump($e);
        echo "raté ca marche pas";
    }
}