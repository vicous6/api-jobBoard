<?php


function createUserPromoter()
{
    $info = getDatabaseInfo();
    $dbh = new PDO('mysql:host=' . $info["host"] . ';dbname=' . $info["db_name"], $info["user"], $info["password"]);

    $query = $dbh->prepare("INSERT INTO 
    user (id, username,password,role,email,first_name,last_name,phone,enterprise_id) 
    VALUES (null, :username, :password, :role, :email, :first_name,:last_name,:phone,:enterprise_id)");
    
    $pass= generateToken();
    $email1=generateToken();
    $email2=generateToken();
    $email1.=$email2;
    var_dump($email1);
    $parameters = [
        "username" => generateToken(),
        "password" => cryptPassword($pass),
        "role" => "promoter",
        "email" => ,
        "first_name" => $post["first_name"],
        "last_name" => $post["last_name"],
        "phone" => $post["phone"],
        "enterprise_id" => $post["enterprise_id"]
    ];

    try {

        $query->execute($parameters);

        echo "ca marche";

    } catch (Exception $e) {
        // var_dump($e);
        return false;
    }
}