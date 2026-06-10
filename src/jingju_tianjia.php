<?php
require_once 'db.php';
require_once 'auth.php';
require_once 'models.php';
check_login();

// 验证CSRF令牌
if (!verify_csrf_token()) {
    header("Location: jingju_guanli.php?error=csrf");
    exit();
}

// 获取表单数据
$mingcheng = isset($_POST['mingcheng']) ? trim($_POST['mingcheng']) : '';
$jieshao = isset($_POST['jieshao']) ? trim($_POST['jieshao']) : '';
$tupian = isset($_POST['tupian']) ? trim($_POST['tupian']) : '';

// 验证输入
if (empty($mingcheng) || empty($jieshao) || empty($tupian)) {
    header("Location: jingju_guanli.php?error=empty");
    exit();
}

// 插入数据
if (add_jingju($mingcheng, $jieshao, $tupian)) {
    header("Location: jingju_guanli.php?success=add");
} else {
    header("Location: jingju_guanli.php?error=add");
}
?>

