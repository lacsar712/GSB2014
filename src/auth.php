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

/**
 * 生成CSRF令牌
 */
function generate_csrf_token() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * 获取CSRF令牌
 */
function get_csrf_token() {
    return generate_csrf_token();
}

/**
 * 校验CSRF令牌
 */
function verify_csrf_token($token = null) {
    if ($token === null) {
        $token = $_POST['csrf_token'] ?? '';
    }
    
    if (empty($_SESSION['csrf_token']) || empty($token)) {
        return false;
    }
    
    return hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * 生成CSRF令牌隐藏字段HTML
 */
function csrf_field() {
    $token = get_csrf_token();
    return '<input type="hidden" name="csrf_token" value="' . htmlspecialchars($token) . '">';
}
?>
