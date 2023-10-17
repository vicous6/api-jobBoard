<?php

function loginValidation($form)
{
    // var_dump(json_encode($form));
    if (
        isset($form["username"]) &&
        $form["username"] != null &&
        isset($form["password"]) &&
        $form["password"] != null
    ) {
        // $form["username"] = clean($form["username"]);
        // $form["password"] = clean($form["password"]);
        // if username exist
        if (getUserByUsername($form["username"])) {

            $user = json_decode(getUserByUsername($form["username"]));
            // ifpass ok 
            if (password_verify($form["password"], $user[0]->password) == true) {

                return true;
            }


        }
        return false;

    }





}