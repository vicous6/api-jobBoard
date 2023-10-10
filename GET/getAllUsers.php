<?php


function getAllUsers()
{
    $info = getDatabaseInfo();
    $con = mysqli_connect($info["host"], $info["user"], $info["password"], $info["db_name"]);
    if ($con) {


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
            return json_encode($response);

        }
    }



}