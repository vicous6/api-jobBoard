<?php

function loginValidation($form)
{

    if (
        isset($form["username"]) &&
        $form["username"] != null &&
        isset($form["password"]) &&
        $form["password"] != null
    ) {
        var_dump($form);
        if (getUserByUsername($form["username"])) {

            $user = json_decode(getUserByUsername($form["username"]));
            var_dump($user);
            var_dump($form["password"]);
            $res = password_verify($form["password"], $user[0]->password);
            var_dump($res);
            die;

        }



        return true;

    }




}