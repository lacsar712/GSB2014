<?php
require_once 'db.php';

/**
 * 获取所有京剧剧目
 */
function get_all_jingju() {
    global $lianjie;
    $sql = "SELECT * FROM jingju ORDER BY id DESC";
    return mysqli_query($lianjie, $sql);
}

/**
 * 根据ID获取京剧剧目
 */
function get_jingju_by_id($id) {
    global $lianjie;
    $sql = "SELECT * FROM jingju WHERE id = ?";
    $stmt = mysqli_prepare($lianjie, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_get_result($stmt);
}

/**
 * 添加京剧剧目
 */
function add_jingju($mingcheng, $jieshao, $tupian) {
    global $lianjie;
    $sql = "INSERT INTO jingju (mingcheng, jieshao, tupian) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($lianjie, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $mingcheng, $jieshao, $tupian);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $result;
}

/**
 * 更新京剧剧目
 */
function update_jingju($id, $mingcheng, $jieshao, $tupian) {
    global $lianjie;
    $sql = "UPDATE jingju SET mingcheng = ?, jieshao = ?, tupian = ? WHERE id = ?";
    $stmt = mysqli_prepare($lianjie, $sql);
    mysqli_stmt_bind_param($stmt, "sssi", $mingcheng, $jieshao, $tupian, $id);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $result;
}

/**
 * 删除京剧剧目
 */
function delete_jingju($id) {
    global $lianjie;
    $sql = "DELETE FROM jingju WHERE id = ?";
    $stmt = mysqli_prepare($lianjie, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $result;
}

/**
 * 获取京剧总数
 */
function get_jingju_count() {
    global $lianjie;
    $sql = "SELECT COUNT(*) as total FROM jingju";
    $result = mysqli_query($lianjie, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['total'];
}

/**
 * 用户登录验证
 */
function login_user($zhanghao, $mima) {
    global $lianjie;
    $sql = "SELECT * FROM yonghu WHERE zhanghao = ? AND mima = ?";
    $stmt = mysqli_prepare($lianjie, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $zhanghao, $mima);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    return $user;
}
?>
