<?php

$con = mysqli_connect("localhost", "root", "", "mydb");
var_dump($_GET);


if ($_GET["GET"] == "allUsers") {


    if ($con) {
        // echo ("connexion etablished");

        $sql = "select * from user";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $i = 0;
            while ($row = mysqli_fetch_assoc($result)) {

                $response[$i]["id"] = $row["id"];
                $response[$i]["username"] = $row["username"];
                $response[$i]["password"] = $row["password"];
                $response[$i]["role"] = $row["role"];
                $response[$i]["first_name"] = $row["first_name"];
                $response[$i]["last_name"] = $row["last_name"];
                $response[$i]["phone"] = $row["phone"];

                $i++;
            }
            echo json_encode($response, JSON_PRETTY_PRINT);
            var_dump($response);
        }
    }



}

if ($_GET["GET"] == "allEnterprises") {

    if ($con) {
        // echo ("connexion etablished");

        $sql = "select * from enterprise";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $i = 0;
            while ($row = mysqli_fetch_assoc($result)) {

                $response[$i]["id"] = $row["id"];
                $response[$i]["name"] = $row["name"];
                $response[$i]["description"] = $row["description"];
                $response[$i]["sector"] = $row["sector"];


                $i++;
            }
            echo json_encode($response, JSON_PRETTY_PRINT);
            var_dump($response);
        }
    }
}

if ($_GET["GET"] == "allJobs") {
    if ($con) {

        $sql = "select * from job";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $i = 0;
            while ($row = mysqli_fetch_assoc($result)) {

                $response[$i]["id"] = $row["id"];
                $response[$i]["name"] = $row["name"];
                $response[$i]["description"] = $row["description"];
                $response[$i]["status"] = $row["status"];
                $response[$i]["workplace"] = $row["workplace"];
                $response[$i]["wages"] = $row["wages"];
                $response[$i]["working_time"] = $row["working_time"];
                $response[$i]["location"] = $row["location"];
                $response[$i]["short_description"] = $row["short_description"];



                $i++;
            }
            echo json_encode($response, JSON_PRETTY_PRINT);
            var_dump($response);
        }
    }
}






?>