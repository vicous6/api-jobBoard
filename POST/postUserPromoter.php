<?php


function createUserPromoter($enterprise_id)
{
    $info = getDatabaseInfo();
    $dbh = new PDO('mysql:host=' . $info["host"] . ';dbname=' . $info["db_name"], $info["user"], $info["password"]);

    $query = $dbh->prepare("INSERT INTO 
    user (id, username,password,role,email,first_name,last_name,phone,enterprise_id) 
    VALUES (null, :username, :password, :role, :email, :first_name,:last_name,:phone,:enterprise_id)");
    $username = generateToken();
    $pass = generateToken();
    $email1 = generateToken();
    $email2 = generateToken();
    $email1 .= "@" . $email2 . ".com";

    $parameters = [
        "username" => $username,
        "password" => cryptPassword($pass),
        "role" => "promoter",
        "email" => $email1,
        "first_name" => generateToken(),
        "last_name" => generateToken(),
        "phone" => "0606060606",
        "enterprise_id" => "" . $enterprise_id . ""
    ];

    try {

        $query->execute($parameters);

        return ["username" => $username, "password" => $pass];
    } catch (Exception $e) {
        // var_dump($e);
        return false;
    }
}