<?php

require 'GET/getAllUsers.php';
require "GET/getAllEnterprises.php";
require 'GET/getAllJobs.php';

require 'GET/getUserById.php';
require 'GET/getEnterpriseById.php';
require 'GET/getJobById.php';

include "getDatabaseInfo.php";

$actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// var_dump($actual_link);
$actual_link = explode("/", $actual_link);
$actual_link = array_slice($actual_link, 5);
// var_dump($actual_link);




if (isset($actual_link[0]) && $actual_link[0] == "users") {

    echo getAllUsers();

}
if (isset($actual_link[0]) && $actual_link[0] == "user" && isset($actual_link[1])) {
    echo getUserById($actual_link[1]);
}




if (isset($actual_link[0]) && $actual_link[0] == "enterprises") {

    echo getAllEnterprises();
}
if (isset($actual_link[0]) && $actual_link[0] == "enterprise" && isset($actual_link[1])) {
    echo getEnterpriseById($actual_link[1]);
}




if (isset($actual_link[0]) && $actual_link[0] == "jobs") {
    echo getAllJobs();
}
if (isset($actual_link[0]) && $actual_link[0] == "job" && isset($actual_link[1])) {
    echo getJobById($actual_link[1]);
}









?>