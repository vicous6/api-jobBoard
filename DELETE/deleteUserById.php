<?php

function deleteUserById($id)
{
    // a gerer : problème de foreign key a la suppression-
    // delete jobs+ delete+applylist
    // $isUserManager = json_decode(getUserById($id))[0]->enterprise_id;

    // var_dump($isUserManager);
    // die;
    deleteApplyListsByUserId($id);


    $info = getDatabaseInfo();
    $con = mysqli_connect($info["host"], $info["user"], $info["password"], $info["db_name"]);
    if ($con) {

        $sql = "delete from user where id=" . $id;
        try {
            $result = mysqli_query($con, $sql);

            if (mysqli_affected_rows($con) == 0) {


                return "Rien a supprimer ici";
            }
        } catch (Exception $e) {
            var_dump($e);
            return "erreur de foreign key surement";
        }







        return "suppression(s) efectuée";


    }
}