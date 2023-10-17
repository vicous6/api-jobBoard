<?php
function whatRoleForThatToken($token)
{

    $user = json_decode(getUserByToken($token));

    $role = $user[0]->role;

    return $role;
}