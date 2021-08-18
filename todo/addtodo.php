<?php
require_once './common.php';
require_loggedin($user);

$todo       = filter_input(INPUT_POST, "todo");
$due_date   = filter_input(INPUT_POST, "due_date");
$public     = filter_input(INPUT_POST, "public") ? 1 : 0;
$token      = filter_input(INPUT_POST, TOKENNAME);
$attachment = $_FILES["attachment"];

require_token($token);
$id = $user->get_id();
$name = null;
if (empty($todo)) {
  die('todoが空です');
}
if ($attachment['error'] === 0) {
  $tmp_name = $attachment["tmp_name"];
  $name = $attachment["name"];
  move_uploaded_file($tmp_name, "attachment/$name");
}

try {
  $dbh = dblogin();

  $sql = 'INSERT INTO todos VALUES(NULL, ?, ?, CURDATE(), DATE_ADD(CURDATE(), INTERVAL ? DAY), 0, ?, ?)';
  $sth = $dbh->prepare($sql);
  $rs = $sth->execute(array($id, $todo, $due_date, $name, $public));
} catch (PDOException $e) {
  $logger->add('クエリに失敗しました: ' . $e->getMessage());
  die('只今サイトが大変混雑しています。もうしばらく経ってからアクセスしてください');
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/common.css">
<title>Todo追加</title>
</head>
<body>
<div id="top">
<?php require "menu.php"; ?>
  <div id="done">
    1件追加しました
  </div><!-- /#done -->
  <div id="footer">
    <div class="copyright">Copyright &copy; 2018 Hiroshi Tokumaru All Rights Reserved.</div>
  </div><!-- /#footer-->
</div>
</body>
</html>
