<?php
require_once "./common.php";
$token = get_token();
?><html>
<head>
<link rel="stylesheet" type="text/css" href="css/common.css">
<title>パスワードリセット</title>
</head>
<body>
<div id="top">
<?php require "menu.php"; ?>
  <div id="newuser">


パスワードを忘れた方は登録済みメールアドレスを入力してください<BR>
<form action="resetpwddo.php" method="POST">
<table>
<tr>
<td>Eメール</td><td><input name="email" size="32"></td>
</tr>
<tr>
<td></td><td><input type=submit value="変更"></td>
</tr>
</table>
<input type="hidden" name="<?php echo TOKENNAME; ?>" value="<?php echo $token; ?>">
</form>

  </div><!-- /#newuser -->
  <div id="footer">
    <div class="copyright">Copyright &copy; 2018 Hiroshi Tokumaru All Rights Reserved.</div>
  </div><!-- /#footer-->
</div>
</body>
</html>
