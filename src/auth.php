<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * 检查用户是否已登录
 */
function check_login() {
    if (!isset($_SESSION['yonghu_id'])) {
        header("Location: index.php");
        exit();
    }
}

/**
 * 获取当前登录用户信息
 */
function get_current_user_info() {
    return [
        'id' => $_SESSION['yonghu_id'] ?? null,
        'zhanghao' => $_SESSION['zhanghao'] ?? null
    ];
}
?>
