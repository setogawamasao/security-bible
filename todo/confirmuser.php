<?php
require_once "./common.php";

$id = $_POST["id"];
$pwd = $_POST["pwd"];
$email = $_POST["email"];
$icon = $_FILES["icon"];
if ($icon["error"] !== 0) {
    die("アイコン画像を指定してください");
}
$tmp_name = $icon["tmp_name"];
$iconfname = $icon["name"];
move_uploaded_file($tmp_name, "icons/$iconfname");
?><html>
<head>
<link rel="stylesheet" type="text/css" href="css/common.css">
<title>会員登録</title>
</head>
<body>
<div id="top">
<?php require "menu.php"; ?>
  <div id="confirm">
    入力を確認してください<BR>
    <form action="adduser.php" method="POST">
    <table>
    <tr>
    <td>ユーザID</td><td><?php e(
        $id
    ); ?><input name="id" type="hidden" value="<?php e($id); ?>"></td>
    </tr>
    <tr>
    <td>パスワード</td><td>********<input name="pwd" type="hidden" value="<?php e(
        $pwd
    ); ?>"></td>
    </tr>
    <tr>
    <td>Eメール</td><td><?php e(
        $email
    ); ?><input name="email" type="hidden" value="<?php e($email); ?>"></td>
    </tr>
    <tr>
    <td>アイコンファイル</td><td><?php e(
        $iconfname
    ); ?><input name="iconfname" type="hidden" value="<?php e(
    $iconfname
); ?>"></td>
    </tr>
    <tr>
    <td></td><td><input type=submit value="登録"></td>
    </tr>
    </table>
    </form>
  </div><!-- /#confirm -->
  <div id="footer">
    <div class="copyright">Copyright &copy; 2018 Hiroshi Tokumaru All Rights Reserved.</div>
  </div><!-- /#footer-->
</div>
</body>
</html>
