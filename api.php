<?php
require "autoload.php";

$URL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$URL = explode("/", $URL);
$URL = array_slice($URL, 5);
// var_dump($URL);




if (isset($URL[0]) && $URL[0] == "users") {
    echo getAllUsers();
}
if (isset($URL[0]) && $URL[0] == "user" && isset($URL[1])) {
    echo getUserById($URL[1]);
}
if (isset($URL[0]) && $URL[0] == "deleteUser" && isset($URL[1])) {
    echo deleteUserById($URL[1]);
}




if (isset($URL[0]) && $URL[0] == "enterprises") {
    echo getAllEnterprises();
}
if (isset($URL[0]) && $URL[0] == "enterprise" && isset($URL[1])) {
    echo getEnterpriseById($URL[1]);
}
if (isset($URL[0]) && $URL[0] == "deleteEnterprise" && isset($URL[1])) {
    echo deleteEnterpriseById($URL[1]);
}




if (isset($URL[0]) && $URL[0] == "jobs") {
    echo getAllJobs();
}
if (isset($URL[0]) && $URL[0] == "job" && isset($URL[1])) {
    echo getJobById($URL[1]);
}

if (isset($URL[0]) && $URL[0] == "deleteJobById" && isset($URL[1])) {
    echo deleteJobById($URL[1]);
}




if (isset($URL[0]) && $URL[0] == "applyListByJobId" && isset($URL[1])) {
    echo getApplyListsByJobId($URL[1]);
}




// if (isset($URL[0]) && $URL[0] == "applyLists" && isset($URL[1])) {
//     // echo getJobById($URL[1]);
// }

// if (isset($URL[0]) && $URL[0] == "applyLists" && isset($URL[1])) {
//     // echo deleteJobById($URL[1]);
// }










?>