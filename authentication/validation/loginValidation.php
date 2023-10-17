<?php

function loginValidation($form)
{

    if (
        isset($form["username"]) &&
        $form["username"] != null &&
        isset($form["password"]) &&
        $form["password"] != null
    ) {

        if (getUserByUsername($form["username"])) {

            $user = json_decode(getUserByUsername($form["username"]));

            if (password_verify($form["password"], $user[0]->password) == true) {

                return true;
            }


        }
        return false;

    }




}