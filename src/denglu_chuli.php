<?php
require_once 'db.php';
require_once 'auth.php';
require_once 'models.php';

// 获取表单数据
$zhanghao = isset($_POST['zhanghao']) ? trim($_POST['zhanghao']) : '';
$mima = isset($_POST['mima']) ? trim($_POST['mima']) : '';

// 验证输入
if (empty($zhanghao) || empty($mima)) {
    header("Location: index.php?error=empty");
    exit();
}

// 查询用户
$yonghu = login_user($zhanghao, $mima);

if ($yonghu) {
    // 登录成功
    $_SESSION['yonghu_id'] = $yonghu['id'];
    $_SESSION['zhanghao'] = $yonghu['zhanghao'];
    
    header("Location: shouye.php");
    exit();
} else {
    // 登录失败
    header("Location: index.php?error=wrong");
    exit();
}
?>

