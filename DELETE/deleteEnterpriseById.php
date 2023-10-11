<?php

function deleteEnterpriseById($id)
{

    // delete tout les users associée a l'entreprise

    $users = json_decode(getUsersByEnterpriseId($id));



    for ($i = 0; $i < count($users); $i++) {

        deleteUserById($users[$i]->id);
    }
    // delete tout les jobs associée a l'entreprise
    $jobs = json_decode(getJobsByEnterpriseId($id));
    for ($i = 0; $i < count($jobs); $i++) {

        deleteJobById($jobs[$i]->id);
    }



    $info = getDatabaseInfo();
    $con = mysqli_connect($info["host"], $info["user"], $info["password"], $info["db_name"]);
    if ($con) {

        $sql = "delete from enterprise where id=" . $id;
        try {
            $result = mysqli_query($con, $sql);

            if (mysqli_affected_rows($con) == 0) {

                return "Rien a supprimer ici";

            }
        } catch (Exception $e) {
            return "erreur de foreign key surement";
        }

        return "suppression efectuée";

    }
}