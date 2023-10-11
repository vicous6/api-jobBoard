<?php

// require "../deleteApplyListByJobId.php";
// require "/DELETE/deleteApplyListsByJobId.php";
function deleteJobById($id)
{


    // delette all the applyList to avoir foreign key error
    deleteApplyListsByJobId($id);


    $info = getDatabaseInfo();
    $con = mysqli_connect($info["host"], $info["user"], $info["password"], $info["db_name"]);
    if ($con) {

        $sql = "delete from job where id=" . $id;
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