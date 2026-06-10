<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function check_login() {
    if (!isset($_SESSION['yonghu_id'])) {
        header("Location: index.php");
        exit();
    }
}

function get_current_user_info() {
    return [
        'id' => $_SESSION['yonghu_id'] ?? null,
        'zhanghao' => $_SESSION['zhanghao'] ?? null
    ];
}

function generate_csrf_token() {
    if (function_exists('random_bytes')) {
        $token = bin2hex(random_bytes(32));
    } else {
        $token = bin2hex(openssl_random_pseudo_bytes(32));
    }
    $_SESSION['csrf_token'] = $token;
    return $token;
}

function get_csrf_token() {
    if (empty($_SESSION['csrf_token'])) {
        return generate_csrf_token();
    }
    return $_SESSION['csrf_token'];
}

function validate_csrf_token($token) {
    if (empty($_SESSION['csrf_token']) || empty($token)) {
        return false;
    }
    return hash_equals($_SESSION['csrf_token'], $token);
}

function csrf_token_field() {
    echo '<input type="hidden" name="csrf_token" value="' . htmlspecialchars(get_csrf_token(), ENT_QUOTES, 'UTF-8') . '">';
}

function verify_csrf_and_redirect() {
    $token = isset($_POST['csrf_token']) ? $_POST['csrf_token'] : '';
    if (!validate_csrf_token($token)) {
        header("Location: jingju_guanli.php?error=csrf");
        exit();
    }
}
?>
