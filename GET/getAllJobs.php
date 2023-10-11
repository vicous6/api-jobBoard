<?php


function getAllJobs()
{
    $info = getDatabaseInfo();
    $con = mysqli_connect($info["host"], $info["user"], $info["password"], $info["db_name"]);
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
                $response[$i]["enterprise_id"] = $row["enterprise_id"];



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