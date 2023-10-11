<?php

function getUsersByEnterpriseId($enterprise_id)
{
    $info = getDatabaseInfo();
    $con = mysqli_connect($info["host"], $info["user"], $info["password"], $info["db_name"]);
    if ($con) {

        $sql = "select * from user where enterprise_id=" . $enterprise_id;
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
            $response[0]["enterprise_id"] = $row["enterprise_id"];
            if (isset($response)) {

                return json_encode($response);

            } else {
                return "Il n'y a rien ici";
            }

        }
    }
}