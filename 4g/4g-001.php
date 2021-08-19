<?php
header("Content-Type: application/jsont; charset=utf-8");
echo json_encode(["time" => date("G:i")]);
