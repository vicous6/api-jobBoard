<?php

function deleteEnterpriseById($id)
{
    var_dump($id);
    // delete tout les users associée a l'entreprise
    try {

        $users = json_decode(getUsersByEnterpriseId($id));
        // var_dump($users);
        if ($users != null) {
            for ($i = 0; $i < count($users); $i++) {

                deleteUserById($users[$i]->id);
            }

        }

    } catch (PDOException $e) {
        // $error = $e;
    }
    // delete tout les jobs associée a l'entreprise
    try {

        $jobs = json_decode(getJobsByEnterpriseId($id));
        if ($jobs != null) {
            for ($i = 0; $i < count($jobs); $i++) {

                deleteJobById($jobs[$i]->id);
            }
        }
    } catch (PDOException $e) {
        $error = $e;
    }

    $info = getDatabaseInfo();
    $dbh = new PDO('mysql:host=' . $info["host"] . ';dbname=' . $info["db_name"], $info["user"], $info["password"]);
    $query = $dbh->prepare("DELETE FROM enterprise WHERE id=$id");

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