<?php


function getAllEnterprises()
{

    $info = getDatabaseInfo();
    $con = mysqli_connect($info["host"], $info["user"], $info["password"], $info["db_name"]);
    if ($con) {

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
            return json_encode($response);

        }
    }
}