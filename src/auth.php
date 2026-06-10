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
 * 生成 CSRF 令牌
 */
function generate_csrf_token() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * 获取 CSRF 令牌的 HTML 隐藏字段
 */
function csrf_token_field() {
    $token = generate_csrf_token();
    return '<input type="hidden" name="csrf_token" value="' . htmlspecialchars($token) . '">';
}

/**
 * 校验 CSRF 令牌
 */
function verify_csrf_token() {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        return false;
    }
    
    $submitted_token = $_POST['csrf_token'] ?? '';
    $session_token = $_SESSION['csrf_token'] ?? '';
    
    if (empty($submitted_token) || empty($session_token)) {
        return false;
    }
    
    return hash_equals($session_token, $submitted_token);
}

/**
 * 校验 CSRF 令牌，失败则终止请求
 */
function check_csrf_token() {
    if (!verify_csrf_token()) {
        http_response_code(403);
        die('CSRF 令牌验证失败');
    }
}
?>
