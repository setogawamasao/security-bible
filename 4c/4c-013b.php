<?php
define("UPLOADPATH", "/var/upload");
$mimes = ["pdf" => "application/pdf"];

$file = $_GET["file"];
$info = pathinfo($file); // ファイル情報の取得
$ext = strtolower($info["extension"]); // 拡張子
$content_type = $mimes[$ext]; // Content-Typeの取得
if (!$content_type) {
    die("拡張子はpdfを指定ください");
}
header("Content-Type: " . $content_type);
header("X-Content-Type-Options: nosniff");
header("X-Frame-Options: deny");
header('Content-Disposition: attachment; filename="' . basename($file) . '"');
readfile(UPLOADPATH . "/" . basename($file));
?>
