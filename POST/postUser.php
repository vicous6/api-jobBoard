<?php


function createUser($post)
{
    $info = getDatabaseInfo();
    $dbh = new PDO('mysql:host=' . $info["host"] . ';dbname=' . $info["db_name"], $info["user"], $info["password"]);

    $query = $dbh->prepare("INSERT INTO 
    user (id, username,password,role,email,first_name,last_name,phone,enterprise_id,token) 
    VALUES (null, :username, :password, :role, :email, :first_name,:last_name,:phone,:enterprise_id,:token)");
    // var_dump();
    if ($post["enterprise_id"] == "") {
        $post["enterprise_id"] = null;
    }
    if ($post["token"] == "") {
        $post["token"] = null;
    }
    $parameters = [
        "username" => $post["username"],
        "password" => cryptPassword($post["password"]),
        "role" => $post["role"],
        "email" => $post["email"],
        "first_name" => $post["first_name"],
        "last_name" => $post["last_name"],
        "phone" => $post["phone"],
        "enterprise_id" => $post["enterprise_id"],
        "token" => $post["token"]

    ];

    try {

        $query->execute($parameters);
        echo "ca marche";

    } catch (Exception $e) {
        var_dump($e);
        echo "raté ca marche pas";
    }
}