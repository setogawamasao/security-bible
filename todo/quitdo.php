<?php
require_once './common.php';
require_loggedin($user);

$reqid = filter_input(INPUT_POST, "id");
$token = filter_input(INPUT_POST, TOKENNAME);

// CSRF対策

$id = $user->get_id();

try {
  $dbh = dblogin();
  $sql = 'SELECT file FROM todos WHERE id=?';
  $sth = $dbh->prepare($sql);
  $rs = $sth->execute(array($item));
  $result = $sth->fetch();
  $file = $result['file'];
var_dump($file);
  unlink("attachment/$file");

  $sql = 'UPDATE todos SET file=null WHERE id=?';
  $sth = $dbh->prepare($sql);
  $rs = $sth->execute(array($item));
} catch (PDOException $e) {
var_dump($e);
  $logger->add('クエリに失敗しました: ' . $e->getMessage());
  die('只今サイトが大変混雑しています。もうしばらく経ってからアクセスしてください');
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/common.css">
<title>Todo変更</title>
</head>
<body>
<div id="top">
<?php require "menu.php"; ?>
  <div id="done">
    添付フィルを削除しました
  </div><!-- /#done -->
  <div id="footer">
    <div class="copyright">Copyright &copy; 2018 Hiroshi Tokumaru All Rights Reserved.</div>
  </div><!-- /#footer-->
</div>
</body>
</html>
