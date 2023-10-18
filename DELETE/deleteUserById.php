<?php

function deleteUserById($id)
{

    deleteApplyListsByUserId($id);

    $info = getDatabaseInfo();
    $dbh = new PDO('mysql:host=' . $info["host"] . ';dbname=' . $info["db_name"], $info["user"], $info["password"]);
    $query = $dbh->prepare("DELETE FROM user WHERE id=$id");

    $parameters = [];
    try {

        $query->execute($parameters);
        $count = $query->rowCount();
        if ($count == 1) {

            return json_encode("suppression effectue");
        } else {
            return json_encode("rien ici");
        }
    } catch (PDOException $e) {
        return json_encode("erorr");
    }
}