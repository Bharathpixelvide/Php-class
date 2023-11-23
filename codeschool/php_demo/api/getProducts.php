<?php

require_once("./utils/functions.php");
require_once("./utils/db.php");

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    response("Only POST method accepted!");
}

if (!isset($_POST["token"])) {
    response("Token is required!");
}

$token = $_POST["token"];

$pdo = getPDO();

$user = validateToken($pdo, $token);

$query = "SELECT * FROM products WHERE user_id = :user_id";
$user_id = $user["id"];
