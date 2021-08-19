<?php
require_once "./common.php";

// HTTPヘッダインジェクション脆弱性のある header関数
// わざとらしいが、HTTPヘッダインジェクションの診断用
function vulnerable_header($h)
{
    $headers = preg_split('/\r?\n/', $h);
    foreach ($headers as $header) {
        header($header);
    }
}
try {
    $dbh = dblogin();
    $userid = filter_input(INPUT_POST, "userid");
    $pwd = substr($_POST["pwd"], 0, 6);
    $url = filter_input(INPUT_POST, "url");

    $sql = "SELECT id, userid FROM users WHERE userid='$userid'";
    $sth = $dbh->query($sql);
    $row = $sth->fetch(PDO::FETCH_ASSOC);
    $sth = null;
    if (!empty($row)) {
        $sqlstm = "SELECT id, userid, super FROM users WHERE userid='$userid' AND pwd='$pwd'";
        $sth = $dbh->query($sqlstm);
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        if (!empty($row)) {
            $_SESSION["login"] = true;
            $user = new User($row["id"], $userid, $row["super"]);
            setcookie("USER", serialize($user), 0, "/");
            vulnerable_header("Location: " . $url . "?" . SID);
            exit();
        } else {
            e("パスワードが違います");
            exit();
        }
    } else {
        e("そのユーザーは登録されていません");
        exit();
    }
} catch (PDOException $e) {
    die("接続に失敗しました: " . $e->getMessage());
}
?><body>
ログイン成功しました<br>
自動的に遷移しない場合は以下のリンクをクリックして下さい。
<a href="<?php echo "$url?" . SID; ?>">todo一覧に遷移</a>
</body>
