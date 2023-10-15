<?php
function cryptPassword($pass)
{

    return password_hash($pass, PASSWORD_DEFAULT);
}