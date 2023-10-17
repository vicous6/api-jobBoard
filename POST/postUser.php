<?php


function createUser($post)
{
    $info = getDatabaseInfo();
    $dbh = new PDO('mysql:host=' . $info["host"] . ';dbname=' . $info["db_name"], $info["user"], $info["password"]);

    $query = $dbh->prepare("INSERT INTO 
    user (id, username,password,role,email,first_name,last_name,phone) 
    VALUES (null, :username, :password, :role, :email, :first_name,:last_name,:phone)");

    $parameters = [
        "username" => $post["username"],
        "password" => cryptPassword($post["password"]),
        "role" => "user",
        "email" => $post["email"],
        "first_name" => $post["first_name"],
        "last_name" => $post["last_name"],
        "phone" => $post["phone"]
    ];

    try {

        $query->execute($parameters);

        return true;

    } catch (Exception $e) {
        // var_dump($e);
        return false;
    }
}