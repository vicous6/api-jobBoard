<?php

function deleteEnterpriseById($id)
{
    $info = getDatabaseInfo();
    $con = mysqli_connect($info["host"], $info["user"], $info["password"], $info["db_name"]);
    if ($con) {

        $sql = "delete from enterprise where id=" . $id;
        try {
            $result = mysqli_query($con, $sql);

            if (mysqli_affected_rows($con) == 1) {

                return "suppression efectuée";

            }
        } catch (Exception $e) {
            return "erreur de foreign key surement";
        }
        return "Rien a supprimer ici";


    }
}