<?php
require_once "./common.php";
require_loggedin($user);
$id = $user->get_id();
?><html>
<head>
<link rel="stylesheet" type="text/css" href="css/common.css">
<title>インポート</title>
</head>
<body>
<div id="top">
<?php
$menu = 3;
require "menu.php";
?>
  <div id="newuser">
    TODOインポート<BR>
    <form action="importdo.php" method="POST" enctype="multipart/form-data">
    <table>
    <tr>
    <td>XMLファイル</td><td><input type="file" name="attachment"></td>
    </tr>
    <tr>
    <td></td><td><input type="submit" value="登録"></td>
    </tr>
    </table>
    </form>
  </div><!-- /#newuser -->
  <div id="footer">
    <div class="copyright">Copyright &copy; 2018 Hiroshi Tokumaru All Rights Reserved.</div>
  </div><!-- /#footer-->
</div>
</body>
</html>
