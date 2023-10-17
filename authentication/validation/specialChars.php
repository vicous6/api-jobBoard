<?php

function clean($data): string
{

    $safeCode = htmlspecialchars($data);
    return $safeCode;
}