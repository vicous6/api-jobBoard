<?php


function updateUser($post)
{
    // var_dump(json_encode($post));
    $info = getDatabaseInfo();
    $dbh = new PDO('mysql:host=' . $info["host"] . ';dbname=' . $info["db_name"], $info["user"], $info["password"]);

    $query = $dbh->prepare("UPDATE 
    user SET 
    username=:username,
    email=:email,
    first_name=:first_name,
    last_name=:last_name,
    phone=:phone
    WHERE id=:id"
    );

    $parameters = [
        "id" => $post["id"],
        "username" => $post["username"],
        "email" => $post["email"],
        "first_name" => $post["first_name"],
        "last_name" => $post["last_name"],
        "phone" => $post["phone"],


    ];

    try {

        $query->execute($parameters);

        echo json_encode("ca marche");

    } catch (Exception $e) {
        // var_dump($e);
        echo json_encode("raté ca marche pas");
    }
}