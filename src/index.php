<?php header('Content-Type: text/html; charset=UTF-8'); ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>京剧艺术 - 登录</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="login-page">
    <div class="login-container">
        <div class="login-box">
            <div class="login-header">
                <h1>京剧艺术管理系统</h1>
                <p class="subtitle">传承国粹 · 弘扬文化</p>
            </div>
            
            <?php if(isset($_GET['error'])): ?>
                <div class="error-message">
                    <?php 
                        if($_GET['error'] == 'wrong') {
                            echo '账号或密码错误，请重试！';
                        } elseif($_GET['error'] == 'empty') {
                            echo '请输入账号和密码！';
                        }
                    ?>
                </div>
            <?php endif; ?>
            
            <form action="denglu_chuli.php" method="POST" class="login-form">
                <div class="form-group">
                    <label for="zhanghao">账号</label>
                    <input type="text" id="zhanghao" name="zhanghao" required placeholder="请输入账号">
                </div>
                
                <div class="form-group">
                    <label for="mima">密码</label>
                    <div class="password-wrapper">
                        <input type="password" id="mima" name="mima" required placeholder="请输入密码">
                        <button type="button" class="toggle-password" onclick="togglePassword()">
                            <span id="eye-icon">👁️</span>
                        </button>
                    </div>
                </div>
                
                <button type="submit" class="login-btn">登录</button>
            </form>
            
            <div class="login-footer">
                <p>测试账号：admin / admin123</p>
            </div>
        </div>
    </div>
    
    <script>
        function togglePassword() {
            const mimaInput = document.getElementById('mima');
            const eyeIcon = document.getElementById('eye-icon');
            
            if (mimaInput.type === 'password') {
                mimaInput.type = 'text';
                eyeIcon.textContent = '🙈';
            } else {
                mimaInput.type = 'password';
                eyeIcon.textContent = '👁️';
            }
        }
    </script>
</body>
</html>
