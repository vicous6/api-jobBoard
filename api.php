<?php
require "autoload.php";

$URL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$URL = explode("/", $URL);
$URL = array_slice($URL, 5);
var_dump($_POST);
var_dump($URL);


// var_dump(isTokenValid($_POST["token"]));

if (isset($_POST["token"]) && isTokenValid($_POST["token"])) {

    $role = whatRoleForThatToken($_POST["token"]);
    var_dump($role);
    // roles possible [admin,user,promoter]
// a faire : restreindre en fonction des roles


    // route public
    if ($role == "user") {

        if (isset($URL[0]) && $URL[0] == "enterprises") {
            echo getAllEnterprises();
        }
        if (isset($URL[0]) && $URL[0] == "enterprise" && isset($URL[1])) {
            echo getEnterpriseById($URL[1]);
        }
        if (isset($URL[0]) && $URL[0] == "jobs") {
            echo getAllJobs();
        }
        if (isset($URL[0]) && $URL[0] == "job" && isset($URL[1])) {
            echo getJobById($URL[1]);
        }

    } else if ($role == "admin") {

        if (isset($URL[0]) && $URL[0] == "users") {
            echo getAllUsers();
        }
        if (isset($URL[0]) && $URL[0] == "user" && isset($URL[1])) {
            echo getUserById($URL[1]);
        }
        if (isset($URL[0]) && $URL[0] == "deleteUser" && isset($URL[1])) {
            echo deleteUserById($URL[1]);
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

        // POST

        if (isset($URL[0]) && $URL[0] == "createUser") {
            echo createUser($_POST);
        }
        if (isset($URL[0]) && $URL[0] == "createEnterprise") {
            echo createEnterprise($_POST);
        }
        if (isset($URL[0]) && $URL[0] == "createJob") {
            echo createJob($_POST);
        }
        if (isset($URL[0]) && $URL[0] == "createApplyList") {
            echo createApplyList($_POST);
        }
        if (isset($URL[0]) && $URL[0] == "modifyJob") {
            echo updateJob($_POST);
        }



    }


} else {
    // si pas de token 

    // si route register
    if (isset($URL[0]) && $URL[0] == "register") {
        // echo getAllUsers();
        var_dump($_POST);
        // si le form est rempli
        if (isset($_POST["submit"])) {

            // si le form est rempli
            if (registerValidation($_POST)) {
                // si le form est valide

                echo createUser($_POST);

            } else {
                // si le form contient un problème
                echo "erreur de formulaire";
            }


        } else {
            echo "pas de formulaire ";
        }


    } else
        // si route login
        if (isset($URL[0]) && $URL[0] == "login") {

            if (isset($_POST["submit"]) && loginValidation($_POST)) {
                // var_dump($_POST);
                $currentUser = json_decode(getUserByUsername($_POST["username"]));
                var_dump($currentUser);
                // die;
                echo updateToken($currentUser[0]->id);
            } else {
                echo json_encode("erreur dans le formulaire");
            }


        } else if (isset($URL[0]) && $URL[0] == "logout") {

        } else {

            echo "need to login";
        }


}


// if (isset($URL[0]) && $URL[0] == "applyLists" && isset($URL[1])) {
//     // echo getJobById($URL[1]);
// }

// if (isset($URL[0]) && $URL[0] == "applyLists" && isset($URL[1])) {
//     // echo deleteJobById($URL[1]);
// }
