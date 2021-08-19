<?php
$callback = $_GET["callback"];
$json = json_encode(["time" => date("G:i")]);
echo "$callback($json);";
