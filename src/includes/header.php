<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? '京剧艺术'; ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <h2>京剧艺术</h2>
            </div>
            <ul class="nav-menu">
                <li><a href="shouye.php" class="<?php echo $active_page === 'shouye' ? 'active' : ''; ?>">首页</a></li>
                <li><a href="jingju_guanli.php" class="<?php echo $active_page === 'guanli' ? 'active' : ''; ?>">京剧管理</a></li>
                <li class="nav-user">
                    <span>欢迎，<?php echo htmlspecialchars($_SESSION['zhanghao']); ?></span>
                    <a href="tuichu.php" class="logout-btn">退出</a>
                </li>
            </ul>
        </div>
    </nav>
