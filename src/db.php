<?php
// 数据库连接配置
define('DB_HOST', 'db');
define('DB_USER', 'root');
define('DB_PASS', 'root123');
define('DB_NAME', 'wupengyuan');

/**
 * 获取数据库连接
 * @return mysqli
 */
function get_db_connection() {
    static $connection = null;
    
    if ($connection === null) {
        $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        
        if (!$connection) {
            die("数据库连接失败: " . mysqli_connect_error());
        }
        
        mysqli_set_charset($connection, "utf8mb4");
    }
    
    return $connection;
}

// 自动连接（为了兼容现有代码中的 $lianjie 变量）
$lianjie = get_db_connection();
?>
