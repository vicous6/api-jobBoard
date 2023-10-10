<?php


function getUserById($id)
{
    $info = getDatabaseInfo();
    $con = mysqli_connect($info["host"], $info["user"], $info["password"], $info["db_name"]);
    if ($con) {

        $sql = "select * from user where id=" . $id;
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        if ($result) {
            // header("Content-Type: JSON");
            $response[0]["id"] = $row["id"];
            $response[0]["username"] = $row["username"];
            $response[0]["password"] = $row["password"];
            $response[0]["role"] = $row["role"];
            $response[0]["first_name"] = $row["first_name"];
            $response[0]["last_name"] = $row["last_name"];
            $response[0]["phone"] = $row["phone"];
            return json_encode($response);

        }
    }
}