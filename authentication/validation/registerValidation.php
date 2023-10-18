<?php

function registerValidation($post)
{


    if (
        isset($post["username"]) && $post["username"] != null &&
        isset($post["password"]) && $post["password"] != null &&
        isset($post["first_name"]) && $post["first_name"] != null &&
        isset($post["last_name"]) && $post["last_name"] != null &&
        isset($post["phone"]) && $post["phone"] != null &&
        isset($post["email"]) && $post["email"] != null

    ) {
        // $post["username"] = clean($post["username"]);
        // $post["password"] = clean($post["password"]);
        // $post["first_name"] = clean($post["first_name"]);
        // $post["last_name"] = clean($post["last_name"]);
        // $post["phone"] = clean($post["phone"]);
        // $post["email"] = clean($post["email"]);

        // if (
        //     strlen($post["username"]) > 30 ||
        //     strlen($post["password"]) > 50 ||
        //     strlen($post["first_name"]) > 30 ||
        //     strlen($post["last_name"]) > 30 ||
        //     strlen($post["phone"]) > 10 ||
        //     strlen($post["email"]) > 50
        // ) {
        //     return false;
        // }






        // $isUsernameAvailable = json_decode(getUserByUsername($post["username"]));
        // $isEmailAvailable = json_decode(getUserByEmail($post["email"]));
        // if ($post["username"])

        //     if ($isUsernameAvailable != null) {
        //         return false;
        //     }
        // if ($isEmailAvailable != null) {
        //     return false;
        // }
        return true;
    }


    return false;
}