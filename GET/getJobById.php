<?php


function getJobById($id)
{
    $info = getDatabaseInfo();
    $con = mysqli_connect($info["host"], $info["user"], $info["password"], $info["db_name"]);
    if ($con) {

        $sql = "select * from job where id=" . $id;
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        if ($result) {
            // header("Content-Type: JSON");

            $response[0]["id"] = $row["id"];
            $response[0]["name"] = $row["name"];
            $response[0]["description"] = $row["description"];
            $response[0]["status"] = $row["status"];
            $response[0]["workplace"] = $row["workplace"];
            $response[0]["wages"] = $row["wages"];
            $response[0]["working_time"] = $row["working_time"];
            $response[0]["location"] = $row["location"];
            $response[0]["short_description"] = $row["short_description"];
            return json_encode($response);

        }
    }
}