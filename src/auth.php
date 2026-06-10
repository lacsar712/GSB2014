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
 * 生成并返回 CSRF 令牌（首次调用时生成，并保存在 Session 中复用）
 */
function get_csrf_token() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * 输出隐藏的 CSRF 令牌表单字段，供表单直接调用
 */
function csrf_field() {
    $token = htmlspecialchars(get_csrf_token(), ENT_QUOTES, 'UTF-8');
    echo '<input type="hidden" name="csrf_token" value="' . $token . '">';
}

/**
 * 校验 CSRF 令牌：仅允许 POST 请求，且 token 必须与 Session 中一致
 * 校验失败则中断请求，返回 403
 */
function verify_csrf_token() {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
        exit('Method Not Allowed');
    }
    $token = $_POST['csrf_token'] ?? '';
    if (empty($_SESSION['csrf_token']) || !is_string($token) || !hash_equals($_SESSION['csrf_token'], $token)) {
        http_response_code(403);
        exit('CSRF 校验失败，请求被拒绝');
    }
}
?>
