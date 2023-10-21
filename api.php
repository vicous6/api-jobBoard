<?php
require "autoload.php";
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers:*");
$URL = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$URL = explode("/", $URL);
$URL = array_slice($URL, 5);
// var_dump($_POST);
// var_dump($URL);
$headers = apache_request_headers();

if (isset($headers['Authorization']) && $headers['Authorization'] != null) {

    $_POST["token"] = $headers['Authorization'];
}
// var_dump(isTokenValid($_POST["token"]));
// var_dump($_POST["token"]);
if (isset($_POST["token"]) && isTokenValid($_POST["token"])) {

    $role = whatRoleForThatToken($_POST["token"]);
    $user = json_decode(getUserByToken($_POST["token"]));
    // var_dump($role);
    // roles possible [admin,user,promoter]

    // var_dump($role);
    // route public
    if ($role == "user") {
        if (isset($URL[0]) && $URL[0] == "getMyApplyList") {
            echo getMyApplyListsByUserId($user[0]->id);
        } else
            if (isset($URL[0]) && $URL[0] == "deleteMyUser") {
                echo deleteMyUser($user[0]->id);
            } else
                if (isset($URL[0]) && $URL[0] == "enterprises") {
                    echo getAllEnterprises();
                } else
                    if (isset($URL[0]) && $URL[0] == "enterprise" && isset($URL[1])) {
                        echo getEnterpriseById($URL[1]);
                    } else
                        if (isset($URL[0]) && $URL[0] == "jobs") {
                            echo getAllJobs();
                        } else
                            if (isset($URL[0]) && $URL[0] == "job" && isset($URL[1])) {
                                echo getJobById($URL[1]);
                            } else
                                if (isset($URL[0]) && $URL[0] == "createApplyList" && isset($URL[1])) {
                                    echo createApplyList($URL[1], $user[0]);
                                } else
                                    if (isset($URL[0]) && $URL[0] == "applyListByUserId") {
                                        echo getApplyListsByUserId($user[0]->id);
                                    } else {
                                        echo json_encode("not autorize or not exist");
                                    }
    } else if ($role == "admin") {
        if (isset($URL[0]) && $URL[0] == "getAllApplyList") {
            echo getApplyLists();
        } else
            if (isset($URL[0]) && $URL[0] == "getMyApplyList") {
                echo getMyApplyListsByUserId($user[0]->id);
            } else
                if (isset($URL[0]) && $URL[0] == "deleteMyUser") {
                    echo deleteMyUser($user[0]->id);
                } else
                    if (isset($URL[0]) && $URL[0] == "enterprises") {
                        echo getAllEnterprises();
                    } else if (isset($URL[0]) && $URL[0] == "updateUser") {
                        echo updateUser($_POST);
                    } else
                        if (isset($URL[0]) && $URL[0] == "updateEnterprise") {
                            echo updateEnterprise($_POST);
                        } else
                            if (isset($URL[0]) && $URL[0] == "users") {
                                echo getAllUsers();
                            } else
                                if (isset($URL[0]) && $URL[0] == "user" && isset($URL[1])) {
                                    echo getUserById($URL[1]);
                                } else
                                    if (isset($URL[0]) && $URL[0] == "deleteUser" && isset($URL[1])) {

                                        echo deleteUserById($URL[1]);
                                    } else
                                        if (isset($URL[0]) && $URL[0] == "enterprise" && isset($URL[1])) {
                                            echo getEnterpriseById($URL[1]);
                                        } else
                                            if (isset($URL[0]) && $URL[0] == "deleteEnterprise" && isset($URL[1])) {
                                                echo deleteEnterpriseById($URL[1]);
                                            } else
                                                if (isset($URL[0]) && $URL[0] == "jobs") {
                                                    echo getAllJobs();
                                                } else
                                                    if (isset($URL[0]) && $URL[0] == "job" && isset($URL[1])) {
                                                        echo getJobById($URL[1]);
                                                    } else
                                                        if (isset($URL[0]) && $URL[0] == "deleteJobById" && isset($URL[1])) {
                                                            echo deleteJobById($URL[1]);
                                                        } else
                                                            if (isset($URL[0]) && $URL[0] == "applyListByJobId" && isset($URL[1])) {
                                                                echo getApplyListsByJobId($URL[1]);
                                                            } else
                                                                if (isset($URL[0]) && $URL[0] == "applyListByUserId") {
                                                                    echo getApplyListsByUserId($user[0]->id);
                                                                } else
                                                                    // POST

                                                                    if (isset($URL[0]) && $URL[0] == "createUser") {
                                                                        echo createUser($_POST);
                                                                    } else
                                                                        // creer une entreprise + un promorteur , retourne les logs
                                                                        if (isset($URL[0]) && $URL[0] == "createEnterprise") {
                                                                            $state = createEnterprise($_POST);

                                                                            $enterpriseId = json_decode(getEnterpriseByName($_POST["name"]))[0]->id;
                                                                            // var_dump($enterpriseId);


                                                                            if ($state == true) {
                                                                                $userPromoter = createUserPromoter($enterpriseId);
                                                                                echo json_encode($userPromoter);
                                                                            }
                                                                        } else
                                                                            if (isset($URL[0]) && $URL[0] == "createJob") {
                                                                                echo createJob($_POST);
                                                                            } else
                                                                                if (isset($URL[0]) && $URL[0] == "createApplyList" && isset($URL[1])) {
                                                                                    echo createApplyList($URL[1], $user[0]);
                                                                                } else
                                                                                    if (isset($URL[0]) && $URL[0] == "modifyJob") {
                                                                                        echo updateJob($_POST);
                                                                                    } else {
                                                                                        echo json_encode("not exist");
                                                                                    }



    } else if ($role == "promoter") {
        if (isset($URL[0]) && $URL[0] == "getJobByEnterpriseId") {
            echo getJobsByEnterpriseId($user[0]->enterprise_id);
        } else
            if (isset($URL[0]) && $URL[0] == "getMyApplyList") {
                echo getMyApplyListsByUserId($user[0]->id);
            } else
                if (isset($URL[0]) && $URL[0] == "deleteMyUser") {
                    echo deleteMyUser($user[0]->id);
                } else
                    if (isset($URL[0]) && $URL[0] == "createApplyList" && isset($URL[1])) {
                        echo createApplyList($URL[1], $user[0]);
                    } else
                        if (isset($URL[0]) && $URL[0] == "applyListByJobId" && isset($URL[1])) {
                            echo getApplyListsByUserId($URL[1]);
                        } else
                            if (isset($URL[0]) && $URL[0] == "enterprises") {
                                echo getAllEnterprises();
                            } else
                                if (isset($URL[0]) && $URL[0] == "enterprise" && isset($URL[1])) {
                                    echo getEnterpriseById($URL[1]);
                                } else
                                    if (isset($URL[0]) && $URL[0] == "jobs") {
                                        echo getAllJobs();
                                    } else
                                        if (isset($URL[0]) && $URL[0] == "job" && isset($URL[1])) {
                                            echo getJobById($URL[1]);
                                        } else
                                            // pouvoir suplementaire du promoteur
                                            if (isset($URL[0]) && $URL[0] == "applyListByUserId") {
                                                echo getApplyListsByUserId($user[0]->id);
                                            } else

                                                if (isset($URL[0]) && $URL[0] == "createJob") {
                                                    echo createJob($_POST);
                                                } else {
                                                    echo json_encode("not exist or not authorize");
                                                }
    }


} else {
    // si pas de token 

    // si route register
    if (isset($URL[0]) && $URL[0] == "register") {

        // si le form est rempli


        // si le form est rempli
        if (registerValidation($_POST)) {
            // si le form est valideù
            var_dump($_POST);
            $_POST["username"] = clean($_POST["username"]);
            $_POST["password"] = clean($_POST["password"]);
            $_POST["first_name"] = clean($_POST["first_name"]);
            $_POST["last_name"] = clean($_POST["last_name"]);
            $_POST["phone"] = clean($_POST["phone"]);
            $_POST["email"] = clean($_POST["email"]);
            // var_dump("")
            // if (
            //     strlen($_POST["username"]) > 30 ||
            //     strlen($_POST["password"]) > 50 ||
            //     strlen($_POST["first_name"]) > 30 ||
            //     strlen($_POST["last_name"]) > 30 ||
            //     strlen($_POST["phone"]) > 10 ||
            //     strlen($_POST["email"]) > 50
            // ) {
            //     return json_encode(false);
            // } else {

            echo json_encode(createUser($_POST));
            // }

        } else {
            // si le form contient un problème
            echo json_encode("erreur de formulaire");
        }



    } else
        // si route login
        if (isset($URL[0]) && $URL[0] == "login") {

            if (loginValidation($_POST)) {
                // var_dump($_POST);
                $currentUser = json_decode(getUserByUsername($_POST["username"]));
                // var_dump($currentUser);
                $value = updateToken($currentUser[0]->id);

                echo json_encode([$value, $currentUser[0]->role]);
            } else {
                echo json_encode("erreur dans le formulaire");
            }


        } else if (isset($URL[0]) && $URL[0] == "logout") {

        } else {

            echo json_encode("need to login");
        }


}


// if (isset($URL[0]) && $URL[0] == "applyLists" && isset($URL[1])) {
//     // echo getJobById($URL[1]);
// }

// if (isset($URL[0]) && $URL[0] == "applyLists" && isset($URL[1])) {
//     // echo deleteJobById($URL[1]);
// }
