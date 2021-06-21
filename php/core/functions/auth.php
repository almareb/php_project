<?php

require_once __DIR__ . "/db.php";

function checkUsername($username){
    $connection = connectToDB();
    $statement = $connection->prepare("SELECT id FROM  user WHERE username = :username");
    $statement->bindParam(":username", $username);
    $statement->execute();
    $data = $statement->fetch();
    return empty($data);
}

function checkEmail($email){
    $connection = connectToDB();
    $statement = $connection->prepare("SELECT id FROM  user WHERE email = :email");
    $statement->bindParam(":email", $email);
    $statement->execute();
    $data = $statement->fetch();
    return empty($data);
}