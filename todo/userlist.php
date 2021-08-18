<?php
  require_once('./common.php');
  $id = $user->get_id();
  if (empty($id))
    $id = -1;
  $reqid = filter_input(INPUT_GET, 'id');
  if (empty($reqid))
    $reqid = -1;

  try {
    $dbh = dblogin();
    $sql = "SELECT id, userid, pwd, email, icon, super FROM users";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($reqid, $reqid < 0, $id, $user->is_super()));
?><html>
<head>
<link rel="stylesheet" type="text/css" href="css/common.css">
<script src="../js/jquery-1.8.3.js"></script>
<title>ユーザ一覧</title>
</head>
<body>
<div id="top">
<?php $menu = 7; require "menu.php"; ?>
  <div id="contents">
    <table border=1>
    <tr>
    <th>ID</th>
    <th>パスワード</th>
    <th>メールアドレス</th>
    <th>アイコン</th>
    <th>種別</th>
    </tr>
    <?php
      foreach ($sth as $row) :
    ?><tr>
    <td><a href="mypage.php?id=<?php e($row['id']); ?>"><?php e($row['userid']); ?></a></td>
    <td><a href="changepwd.php?id=<?php e($row['id']); ?>"><?php e($row['pwd']); ?></a></td>
    <td><a href="changemail.php?id=<?php e($row['id']); ?>"><?php e($row['email']); ?></a></td>
    <td><a href="changeicon.php?id=<?php e($row['id']); ?>"><?php e($row['icon']); ?></a></td>
    <td><?php e($row['super'] ? '管理者' : '一般'); ?></td>
    </tr><?php
        endforeach;
      } catch (PDOException $e) {
        $logger->add('クエリに失敗しました: ' . $e->getMessage());
        die('只今サイトが大変混雑しています。もうしばらく経ってからアクセスしてください');
      }
    ?>
    </table><br>
    <a href="newuser.php">新規追加</a><br>
    <br>
  </div><!-- /#contents -->
  <div id="footer">
    <div class="copyright">Copyright &copy; 2018 Hiroshi Tokumaru All Rights Reserved.</div>
  </div><!-- /#footer-->
</div>
</body>
</html>
