<?php


function getApplyListsByJobId($id)
{
    // pas sur a voir si utile
    $info = getDatabaseInfo();
    $con = mysqli_connect($info["host"], $info["user"], $info["password"], $info["db_name"]);
    if ($con) {

        $sql = "select * from applyList where job_id =" . $id;
        $result = mysqli_query($con, $sql);
        if ($result) {
            $i = 0;
            while ($row = mysqli_fetch_assoc($result)) {

                $response[$i]["job_id"] = $row["job_id"];
                $response[$i]["user_id"] = $row["user_id"];
                $response[$i]["message"] = $row["message"];
                $response[$i]["date"] = $row["date"];


                $i++;
            }
            if (isset($response)) {

                return json_encode($response);

            } else {
                return "Il n'y a rien ici";
            }

        }
    }
}