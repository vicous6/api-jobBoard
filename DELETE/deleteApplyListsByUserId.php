<?php

function deleteApplyListsByUserId($id)
{
    // a gerer : problème de foreign key a la suppression
    // delete jobs+ delete+applylist
    $info = getDatabaseInfo();
    $dbh = new PDO('mysql:host=' . $info["host"] . ';dbname=' . $info["db_name"], $info["user"], $info["password"]);
    $query = $dbh->prepare("DELETE FROM applyList WHERE user_id=$id");

    $parameters = [];
    try {

        $query->execute($parameters);
        $count = $query->rowCount();
        if ($count == 1) {

            return "suppression effectué";
        } else {
            return "rien ici";
        }
    } catch (PDOException $e) {
        die('Error' . $e->getMessage());
    }
}