<?php
require_once 'db.php';
require_once 'auth.php';
require_once 'models.php';
check_login();

$page_title = '京剧管理 - 京剧艺术';
$active_page = 'guanli';
include 'includes/header.php';

// 获取所有京剧数据
$jieguo = get_all_jingju();
?>

    <div class="container">
        <div class="page-header">
            <h1>京剧剧目管理</h1>
            <button class="add-btn" onclick="showAddModal()">+ 添加京剧</button>
        </div>

        <?php if(isset($_GET['success'])): ?>
            <div class="success-message">
                <?php 
                    if($_GET['success'] == 'add') echo '添加成功！';
                    elseif($_GET['success'] == 'edit') echo '修改成功！';
                    elseif($_GET['success'] == 'delete') echo '删除成功！';
                ?>
            </div>
        <?php endif; ?>

        <?php if(isset($_GET['error'])): ?>
            <div class="error-message">
                <?php
                    if($_GET['error'] == 'csrf') echo '安全验证失败，请重试！';
                    else echo '操作失败，请重试！';
                ?>
            </div>
        <?php endif; ?>

        <div class="jingju-grid">
            <?php while($jingju = mysqli_fetch_assoc($jieguo)): ?>
                <div class="jingju-card">
                    <div class="jingju-image" onclick="showImageModal('<?php echo htmlspecialchars($jingju['tupian']); ?>', '<?php echo htmlspecialchars($jingju['mingcheng']); ?>')">
                        <img src="images/<?php echo htmlspecialchars($jingju['tupian']); ?>" 
                             alt="<?php echo htmlspecialchars($jingju['mingcheng']); ?>"
                             onerror="this.src='images/default.jpg'">
                        <div class="image-overlay">
                            <span>点击放大</span>
                        </div>
                    </div>
                    <div class="jingju-content">
                        <h3><?php echo htmlspecialchars($jingju['mingcheng']); ?></h3>
                        <p class="jingju-description"><?php echo htmlspecialchars($jingju['jieshao']); ?></p>
                        <div class="jingju-actions">
                            <button class="edit-btn" onclick='showEditModal(<?php echo json_encode($jingju); ?>)'>编辑</button>
                            <button class="delete-btn" onclick="confirmDelete(<?php echo $jingju['id']; ?>, '<?php echo htmlspecialchars($jingju['mingcheng']); ?>')">删除</button>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <form id="deleteForm" action="jingju_shanchu.php" method="POST" style="display:none;">
        <?php csrf_token_field(); ?>
        <input type="hidden" name="id" id="delete_id">
    </form>

    <!-- 图片放大模态框 -->
    <div id="imageModal" class="modal">
        <span class="close" onclick="closeImageModal()">&times;</span>
        <img class="modal-content" id="modalImage">
        <div id="caption"></div>
    </div>

    <!-- 添加京剧模态框 -->
    <div id="addModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-header">
                <h2>添加京剧</h2>
                <span class="close" onclick="closeAddModal()">&times;</span>
            </div>
            <form action="jingju_tianjia.php" method="POST" enctype="multipart/form-data">
                <?php csrf_token_field(); ?>
                <div class="form-group">
                    <label for="mingcheng">名称</label>
                    <input type="text" id="mingcheng" name="mingcheng" required>
                </div>
                <div class="form-group">
                    <label for="jieshao">介绍</label>
                    <textarea id="jieshao" name="jieshao" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <label for="tupian">图片文件名（如：bawangbieji.jpg）</label>
                    <input type="text" id="tupian" name="tupian" required placeholder="请输入图片文件名">
                    <small>请确保图片已上传到 images 目录</small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="cancel-btn" onclick="closeAddModal()">取消</button>
                    <button type="submit" class="submit-btn">添加</button>
                </div>
            </form>
        </div>
    </div>

    <!-- 编辑京剧模态框 -->
    <div id="editModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-header">
                <h2>编辑京剧</h2>
                <span class="close" onclick="closeEditModal()">&times;</span>
            </div>
            <form action="jingju_bianji.php" method="POST">
                <?php csrf_token_field(); ?>
                <input type="hidden" id="edit_id" name="id">
                <div class="form-group">
                    <label for="edit_mingcheng">名称</label>
                    <input type="text" id="edit_mingcheng" name="mingcheng" required>
                </div>
                <div class="form-group">
                    <label for="edit_jieshao">介绍</label>
                    <textarea id="edit_jieshao" name="jieshao" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <label for="edit_tupian">图片文件名</label>
                    <input type="text" id="edit_tupian" name="tupian" required>
                    <small>请确保图片已上传到 images 目录</small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="cancel-btn" onclick="closeEditModal()">取消</button>
                    <button type="submit" class="submit-btn">保存</button>
                </div>
            </form>
        </div>
    </div>

<?php include 'includes/footer.php'; ?>

