<?php


function createApplyList($post)
{
    date_default_timezone_set('UTC');
    var_dump($post);
    $info = getDatabaseInfo();
    $dbh = new PDO('mysql:host=' . $info["host"] . ';dbname=' . $info["db_name"], $info["user"], $info["password"]);

    $query = $dbh->prepare("INSERT INTO 
    applylist (job_id, user_id, message,date) 
    VALUES (:job_id, :user_id, :message, :date)");

    $parameters = [
        "job_id" => $post["job_id"],
        "user_id" => $post["user_id"],
        "message" => $post["message"],
        "date" => date('m/d/Y h:i:s a', time())
    ];

    try {

        $query->execute($parameters);
        echo true;
    } catch (Exception $e) {
        var_dump($e);
        echo false;
    }
}