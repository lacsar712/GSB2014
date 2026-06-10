<?php
require_once 'db.php';
require_once 'auth.php';
require_once 'models.php';
check_login();
verify_csrf_and_redirect();

$mingcheng = isset($_POST['mingcheng']) ? trim($_POST['mingcheng']) : '';
$jieshao = isset($_POST['jieshao']) ? trim($_POST['jieshao']) : '';
$tupian = isset($_POST['tupian']) ? trim($_POST['tupian']) : '';

if (empty($mingcheng) || empty($jieshao) || empty($tupian)) {
    header("Location: jingju_guanli.php?error=empty");
    exit();
}

if (add_jingju($mingcheng, $jieshao, $tupian)) {
    header("Location: jingju_guanli.php?success=add");
} else {
    header("Location: jingju_guanli.php?error=add");
}
?>

