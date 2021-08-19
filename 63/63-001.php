<?php
session_start();
header("Content-Type: text/html; charset=Shift_JIS");
?>
<body>
<form action="">
�����O:<input name=name value="<?php echo htmlspecialchars(
    $_GET["name"],
    ENT_QUOTES
); ?>"><BR>
���[���A�h���X:<input name=mail value="<?php echo htmlspecialchars(
    $_GET["mail"],
    ENT_QUOTES
); ?>"><BR>
<input type="submit">
</form>
</body>
