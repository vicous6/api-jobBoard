<?php


function updateUser($post)
{
    $info = getDatabaseInfo();
    $dbh = new PDO('mysql:host=' . $info["host"] . ';dbname=' . $info["db_name"], $info["user"], $info["password"]);

    $query = $dbh->prepare("UPDATE 
    user SET 
    username=:username,
    -- role=:role,
    email=:email,
    first_name=:first_name,
    last_name=:last_name,
    phone=:phone,
    -- enterprise_id=:enterprise_id,

    WHERE id=:id"
    );

    $parameters = [
        "id" => $post["id"],
        "username" => $post["username"],
        // "role" => $post["role"],
        "email" => $post["email"],
        "first_name" => $post["first_name"],
        "last_name" => $post["last_name"],
        "phone" => $post["phone"],
        // "enterprise_id" => $post["enterprise_id"],

    ];

    try {

        $query->execute($parameters);
        echo "ca marche";

    } catch (Exception $e) {

        echo "raté ca marche pas";
    }
}