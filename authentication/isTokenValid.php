<?php
function isTokenValid($token)
{

    if (getUserByToken($token)) {

        return true;

    } else {

        return false;
    }

}