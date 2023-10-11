<?php

function deleteApplyListsByUserId($id)
{
    // a gerer : problème de foreign key a la suppression
    // delete jobs+ delete+applylist
    $info = getDatabaseInfo();
    $con = mysqli_connect($info["host"], $info["user"], $info["password"], $info["db_name"]);
    if ($con) {

        $sql = "delete from applyList where user_id=" . $id;
        try {
            $result = mysqli_query($con, $sql);

            if (mysqli_affected_rows($con) == 0) {


                return "Rien a supprimer ici";
            }
        } catch (Exception $e) {
            return "erreur de foreign key surement";
        }

        return "suppression(s) efectuée";


    }
}