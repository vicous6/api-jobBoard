<?php


function createUser($post)
{
    $info = getDatabaseInfo();
    $dbh = new PDO('mysql:host=' . $info["host"] . ';dbname=' . $info["db_name"], $info["user"], $info["password"]);

    $query = $dbh->prepare("INSERT INTO 
    user (id, username,password,role,email,first_name,last_name,phone,enterprise_id) 
    VALUES (null, :username, :password, :role, :email, :first_name,:last_name,:phone,:enterprise_id)");

    $parameters = [
        "username" => $post["username"],
        "password" => $post["password"],
        "role" => $post["role"],
        "email" => $post["email"],
        "first_name" => $post["first_name"],
        "last_name" => $post["last_name"],
        "phone" => $post["phone"],
        "enterprise_id" => $post["enterprise_id"]

    ];

    try {

        $query->execute($parameters);
        echo "ca marche";

    } catch (Exception $e) {

        echo "raté ca marche pas";
    }
}