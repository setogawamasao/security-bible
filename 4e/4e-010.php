<?php
$colors = ["red", "green", "blue"];
setcookie("COLORS", serialize($colors));
echo "クッキーをセットしました";
