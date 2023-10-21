<?php

function clean($data): string
{


    return htmlspecialchars($data);
}