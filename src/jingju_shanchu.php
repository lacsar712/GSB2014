<?php
require_once 'db.php';
require_once 'auth.php';
require_once 'models.php';
check_login();
verify_csrf_and_redirect();

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;

if ($id <= 0) {
    header("Location: jingju_guanli.php?error=invalid");
    exit();
}

if (delete_jingju($id)) {
    header("Location: jingju_guanli.php?success=delete");
} else {
    header("Location: jingju_guanli.php?error=delete");
}
?>

