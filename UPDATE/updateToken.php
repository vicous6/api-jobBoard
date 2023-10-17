<?php

function updateToken($id)
{

    $token = generateToken();
    $info = getDatabaseInfo();
    $dbh = new PDO('mysql:host=' . $info["host"] . ';dbname=' . $info["db_name"], $info["user"], $info["password"]);

    $query = $dbh->prepare("UPDATE 
    user SET 
    token=:token
    WHERE id=:id"
    );

    $parameters = [
        "id" => $id,
        "token" => $token
    ];

    try {

        $query->execute($parameters);
        echo json_encode($token);

    } catch (Exception $e) {

        echo json_encode("raté ca marche pas");
    }
}