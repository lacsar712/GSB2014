<?php
require_once 'db.php';
require_once 'auth.php';
require_once 'models.php';
check_login();

$page_title = '京剧艺术 - 首页';
$active_page = 'shouye';
include 'includes/header.php';
?>

    <div class="hero-section">
        <div class="hero-content">
            <h1>国粹京剧 · 艺术瑰宝</h1>
            <p class="hero-subtitle">传承中华文化，弘扬京剧艺术</p>
            <a href="jingju_guanli.php" class="cta-button">探索京剧世界</a>
        </div>
    </div>

    <div class="container">
        <section class="intro-section">
            <h2 class="section-title">京剧简介</h2>
            <div class="intro-content">
                <p>京剧，曾称平剧，是中国五大戏曲剧种之一，被视为中国国粹，位列中国戏曲三鼎甲"榜首"。京剧走遍世界各地，成为介绍、传播中国传统艺术文化的重要媒介。</p>
                <p>京剧表演的四种艺术手法：唱、念、做、打，也是京剧表演四项基本功。京剧有"生、旦、净、丑"四大行当，每个行当都有其独特的表演特色 and 艺术魅力。</p>
            </div>
        </section>

        <section class="features-section">
            <h2 class="section-title">京剧特色</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">🎭</div>
                    <h3>脸谱艺术</h3>
                    <p>京剧脸谱色彩鲜明，图案精美，是京剧艺术的重要组成部分</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🎵</div>
                    <h3>唱腔优美</h3>
                    <p>京剧唱腔以西皮、二黄为主，旋律优美，韵味十足</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">👘</div>
                    <h3>服饰华丽</h3>
                    <p>京剧服饰色彩艳丽，做工精细，充分展现人物身份</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">⚔️</div>
                    <h3>武打精彩</h3>
                    <p>京剧武戏动作优美，技巧高超，观赏性极强</p>
                </div>
            </div>
        </section>

        <section class="stats-section">
            <h2 class="section-title">数据统计</h2>
            <div class="stats-grid">
                <?php $total = get_jingju_count(); ?>
                <div class="stat-card">
                    <div class="stat-number"><?php echo $total; ?></div>
                    <div class="stat-label">京剧剧目</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">200+</div>
                    <div class="stat-label">年历史</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">4</div>
                    <div class="stat-label">大行当</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">1000+</div>
                    <div class="stat-label">传统剧目</div>
                </div>
            </div>
        </section>
    </div>

<?php include 'includes/footer.php'; ?>

