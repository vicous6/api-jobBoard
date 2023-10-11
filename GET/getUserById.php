<?php


function getUserById($id)
{
    $info = getDatabaseInfo();
    // $con = mysqli_connect($info["host"], $info["user"], $info["password"], $info["db_name"]);
    $dbh = new PDO('mysql:host=' . $info["host"] . ';dbname=' . $info["db_name"], $info["user"], $info["password"]);



    $query = $dbh->prepare("SELECT * FROM user WHERE id=$id");
    $parameters = [];

    $query->execute($parameters);

    $user = $query->fetchAll(PDO::FETCH_ASSOC);

    if ($user == []) {

        return "rien ici";

    } else {

        return json_encode($user);
    }




    // if ($con) {

    //     $sql = "select * from user where id=" . $id;
    //     $result = mysqli_query($con, $sql);
    //     $row = mysqli_fetch_assoc($result);
    //     if ($result) {
    //         // header("Content-Type: JSON");
    //         $response[0]["id"] = $row["id"];
    //         $response[0]["username"] = $row["username"];
    //         $response[0]["password"] = $row["password"];
    //         $response[0]["role"] = $row["role"];
    //         $response[0]["first_name"] = $row["first_name"];
    //         $response[0]["last_name"] = $row["last_name"];
    //         $response[0]["phone"] = $row["phone"];
    //         $response[0]["enterprise_id"] = $row["enterprise_id"];
    //         if (isset($response)) {

    //             return json_encode($response);

    //         } else {
    //             return "Il n'y a rien ici";
    //         }

    //     }
    // }
}