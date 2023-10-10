<?php


function getEnterpriseById($id)
{
    $info = getDatabaseInfo();
    $con = mysqli_connect($info["host"], $info["user"], $info["password"], $info["db_name"]);
    if ($con) {

        $sql = "select * from enterprise where id=" . $id;
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        if ($result) {
            // header("Content-Type: JSON");
            $response[0]["id"] = $row["id"];
            $response[0]["name"] = $row["name"];
            $response[0]["description"] = $row["description"];
            $response[0]["sector"] = $row["sector"];
            return json_encode($response);

        }
    }
}