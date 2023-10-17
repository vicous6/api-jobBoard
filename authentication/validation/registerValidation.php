<?php

function registerValidation($post)
{


    if (
        isset($post["username"]) && $post["username"] != null &&
        isset($post["role"]) && $post["role"] != null &&
        isset($post["first_name"]) && $post["first_name"] != null &&
        isset($post["last_name"]) && $post["last_name"] != null &&
        isset($post["phone"]) && $post["phone"] != null &&
        isset($post["email"]) && $post["email"] != null &&
        isset($post["enterprise_id"])

    ) {

        $isUsernameAvailable = json_decode(getUserByUsername($post["username"]));
        $isEmailAvailable = json_decode(getUserByEmail($post["email"]));
        // var_dump($isUsernameAvailable);
        // var_dump($isEmailAvailable);
        if ($isUsernameAvailable != null) {
            return false;
        }
        if ($isEmailAvailable != null) {
            return false;
        }

    }


    return true;
}