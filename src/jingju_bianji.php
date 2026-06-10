<?php
require_once 'db.php';
require_once 'auth.php';
require_once 'models.php';
check_login();
verify_csrf_token();

// 获取表单数据
$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$mingcheng = isset($_POST['mingcheng']) ? trim($_POST['mingcheng']) : '';
$jieshao = isset($_POST['jieshao']) ? trim($_POST['jieshao']) : '';
$tupian = isset($_POST['tupian']) ? trim($_POST['tupian']) : '';

// 验证输入
if ($id <= 0 || empty($mingcheng) || empty($jieshao) || empty($tupian)) {
    header("Location: jingju_guanli.php?error=empty");
    exit();
}

// 更新数据
if (update_jingju($id, $mingcheng, $jieshao, $tupian)) {
    header("Location: jingju_guanli.php?success=edit");
} else {
    header("Location: jingju_guanli.php?error=edit");
}
?>

