<?php
session_start();
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: http://example.jp");
// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Credentials: true');
if (empty($_SESSION["counter"])) {
    $_SESSION["counter"] = 1;
} else {
    $_SESSION["counter"]++;
}
echo json_encode(["count" => $_SESSION["counter"]]);
