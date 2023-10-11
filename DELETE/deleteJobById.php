<?php

// require "../deleteApplyListByJobId.php";
// require "/DELETE/deleteApplyListsByJobId.php";
function deleteJobById($id)
{


    // delette all the applyList to avoir foreign key error
    deleteApplyListsByJobId($id);


    $info = getDatabaseInfo();
    $dbh = new PDO('mysql:host=' . $info["host"] . ';dbname=' . $info["db_name"], $info["user"], $info["password"]);
    $query = $dbh->prepare("DELETE FROM job WHERE id=$id");

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