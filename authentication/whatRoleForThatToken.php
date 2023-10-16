<?php
function whatRoleForThatToken($token)
{

    $user = json_decode(getUserByToken($token));
    var_dump("user")
    $role = $user["role"];

    return $role;
}