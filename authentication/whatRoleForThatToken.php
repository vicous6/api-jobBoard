<?php
function whatRoleForThatToken($token)
{

    $user = json_decode(getUserByToken($token));
    var_dump($user[0]->role);
    $role = $user[0]->role;

    return $role;
}