<?php

function registerValidation($post)
{

    // "username" => $post["username"],
    // "password" => cryptPassword($post["password"]),
    // "role" => $post["role"],
    // "email" => $post["email"],
    // "first_name" => $post["first_name"],
    // "last_name" => $post["last_name"],
    // "phone" => $post["phone"],
    // "enterprise_id" => $post["enterprise_id"],
    // "token" => $post["token"]
    if (
        isset($post["username"]) && $post["username"] != null &&
        isset($post["role"]) && $post["role"] != null &&
        isset($post["first_name"]) && $post["first_name"] != null &&
        isset($post["last_name"]) && $post["last_name"] != null &&
        isset($post["phone"]) && $post["phone"] != null &&
        isset($post["enterprise_id"])

    ) {

        // verifier que le username existe deja
        $truc = 4;
    }

    if (!getUserByUsername($post["username"])) {
        $truc = 5;

    }

    return true;
}