<?php


function createApplyList($id, $user)
{
    // var_dump($id);
    // var_dump($user);
    $message = "Hello i'm Mr/Mrs" . $user->last_name . "and i'm very interested in the job " . strval($id);
    date_default_timezone_set('UTC');
    // var_dump($post);
    $info = getDatabaseInfo();
    $dbh = new PDO('mysql:host=' . $info["host"] . ';dbname=' . $info["db_name"], $info["user"], $info["password"]);

    $query = $dbh->prepare("INSERT INTO 
    applylist (job_id, user_id, message,date) 
    VALUES (:job_id, :user_id, :message, :date)");

    $parameters = [
        "job_id" => strval($id),
        "user_id" => $user->id,
        "message" => $message,
        "date" => date('Y-m-d')
    ];

    try {

        $query->execute($parameters);
        echo json_encode(true);
    } catch (Exception $e) {
        var_dump($e);
        echo json_encode(false);
    }
}