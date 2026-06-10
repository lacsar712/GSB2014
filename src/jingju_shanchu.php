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

// 获取ID
$id = isset($_POST['id']) ? intval($_POST['id']) : 0;

if ($id <= 0) {
    header("Location: jingju_guanli.php?error=invalid");
    exit();
}

// 删除数据
if (delete_jingju($id)) {
    header("Location: jingju_guanli.php?success=delete");
} else {
    header("Location: jingju_guanli.php?error=delete");
}
?>

