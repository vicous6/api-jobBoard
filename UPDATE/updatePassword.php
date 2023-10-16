<?php

// function updatePassword($password)
// {

//     $token = generateToken();
//     $info = getDatabaseInfo();
//     $dbh = new PDO('mysql:host=' . $info["host"] . ';dbname=' . $info["db_name"], $info["user"], $info["password"]);

//     $query = $dbh->prepare("UPDATE 
//     user SET 
//     password=:password
//     WHERE id=:id"
//     );

//     $parameters = [
//         "id" => $id,
//         "token" => $token
//     ];

//     try {

//         $query->execute($parameters);
//         echo json_encode($token);

//     } catch (Exception $e) {

//         echo "raté ca marche pas";
//     }
// }